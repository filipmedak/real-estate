//Postavljanje globalnih varijabli
let galleryImages = document.querySelectorAll(".gallery-img");
let getLatestOpenedImg;
let windowWidth = window.innerWidth;

//Prolazak kroz sve slike unutar varijable galleryImages
if(galleryImages){
    galleryImages.forEach(function(image, index) {
        image.onclick = function() {
            //Spremanje CSS postavki da mozemo mijenjati background
            let getElementsCss = window.getComputedStyle(image);
            let getFullImageUrl = getElementsCss.getPropertyValue("background-image");
            //Ciscenje urla da dobijemo samo naziv datoteke
            let getImgUrlPos = getFullImageUrl.split("/1/thumbnail/");
            let setNewImgUrl = getImgUrlPos[1].replace('")', '');
            
            //Povecanje varijable za 1 da bude iste vrijednosti kao i naziv slike
            getLatestOpenedImg = index + 1;

            //Stvaranje elementa za fullscreen sliku
            let container = document.body;
            let newImgWindow = document.createElement("div");
            container.appendChild(newImgWindow);
            newImgWindow.setAttribute("class", "img-window");
            newImgWindow.setAttribute("onclick", "closeImg()");

            //Dodavanje slike u gornji element
            let newImg = document.createElement("img");
            newImgWindow.appendChild(newImg);
            newImg.setAttribute("src", "../../img/estates/1/" + setNewImgUrl);
            newImg.setAttribute("id", "current-img");

            //Kreiranje gumba nakon ucitavanja fullscreen slike
            newImg.onload = function(){
                //Spremanje sirine slike i racunanje prostor od ruba slike do ruba preglednika
                let imgWidth = this.width;
                let calcImgToEdge = ((windowWidth - imgWidth) / 2) - 175;        
                
                if(imgWidth < 600){
                    //Next gumb
                    let newNextBtn = document.createElement("a");
                    let btnNextText = document.createTextNode("Next");
                    newNextBtn.appendChild(btnNextText);
                    container.appendChild(newNextBtn);
                    newNextBtn.setAttribute("class", "img-btn-next");
                    newNextBtn.setAttribute("onclick", "changeImg(1)");
                    //Spusatmo gubm ispod slike na mobilnoj verziji 
                    newNextBtn.style.cssText = "right:20%; top:550px;";
                    
                    //Previous gumb
                    let newPrevBtn = document.createElement("a");
                    let btnPrevText = document.createTextNode("Prev");
                    newPrevBtn.appendChild(btnPrevText);
                    container.appendChild(newPrevBtn);
                    newPrevBtn.setAttribute("class", "img-btn-prev");
                    //Spusatmo gubm ispod slike na mobilnoj verziji 
                    newPrevBtn.style.cssText = "left:20%; top:550px;";
                }
                else{
                    //Next gumb
                    let newNextBtn = document.createElement("a");
                    let btnNextText = document.createTextNode("Next");
                    newNextBtn.appendChild(btnNextText);
                    container.appendChild(newNextBtn);
                    newNextBtn.setAttribute("class", "img-btn-next");
                    newNextBtn.setAttribute("onclick", "changeImg(1)"); 
                    newNextBtn.style.cssText = "right: " + calcImgToEdge + "px;";

                    //Previous gumb
                    let newPrevBtn = document.createElement("a");
                    let btnPrevText = document.createTextNode("Prev");
                    newPrevBtn.appendChild(btnPrevText);
                    container.appendChild(newPrevBtn);
                    newPrevBtn.setAttribute("class", "img-btn-prev");
                    newPrevBtn.setAttribute("onclick", "changeImg(0)");
                    newPrevBtn.style.cssText = "left: " + calcImgToEdge + "px;";
                }
            }
        }
    });
}

//Funkcija koja brise fullscreen sliku i gumbe
function closeImg(){
    document.querySelector(".img-window").remove();
    document.querySelector(".img-btn-next").remove();
    document.querySelector(".img-btn-prev").remove();
}

//Funkcija za prolazak kroz slike
function changeImg(changeDir){
    document.querySelector("#current-img").remove();

    let getImgWindow = document.querySelector(".img-window");
    let newImg = document.createElement("img");
    getImgWindow.appendChild(newImg);

    let calcNewImg;
    if(changeDir === 1){
        calcNewImg = getLatestOpenedImg + 1;
        if(calcNewImg > galleryImages.length){
            calcNewImg = 1;
        }
    }
    else if(changeDir === 0){
        calcNewImg = getLatestOpenedImg - 1;
        if(calcNewImg < 1){
            calcNewImg = galleryImages.length;
        }
    }

    //Mijenjanje putanje sa thumb na fullscreen sliku
    newImg.setAttribute("src", "../../img/estates/1/img" + calcNewImg + ".jpg");
    newImg.setAttribute("id", "current-img");

    getLatestOpenedImg = calcNewImg;

    //Ista funkcija kao linija 40, provjerava sirinu nove ucitane slike
    newImg.onload = function(){
        let imgWidth = this.width;
        let calcImgToEdge = ((windowWidth - imgWidth) / 2) - 80; 

        let nextBtn = document.querySelector(".img-btn-next");
        newNextBtn.style.cssText = "right: " + calcImgToEdge + "px";

        let prevBtn = document.querySelector(".img-btn-prev");
        newPrevBtn.style.cssText = "left: " + calcImgToEdge + "px";
    }
}