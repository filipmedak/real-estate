let galleryImages = document.querySelectorAll(".galleryImg");
let postID = document.getElementById("postID").innerHTML;
let windowWidth = window.innerWidth;

if(galleryImages){
    galleryImages.forEach(function(image, index){
        image.onclick = function(){
            //Grab the img url and clean it to load the fullscreen image
            let imageUrl = galleryImages[0].src;
            let clearImgUrl = imageUrl.split("thumbnail/");
            let imagePath = clearImgUrl[0];
            
            //Increase index so img1 == 1
            getLatestOpenedImg = index + 1;

            //Crate element for fullscreen image
            let container = document.body;
            let newImgWindow = document.createElement("div");
            container.appendChild(newImgWindow);
            newImgWindow.setAttribute("class", "img-window");
            newImgWindow.setAttribute("onclick", "closeImg()");
            
            //Add image in new element
            let newImg = document.createElement("img");
            newImgWindow.appendChild(newImg);
            newImg.setAttribute("src", imagePath + "img" + getLatestOpenedImg + ".jpg");
            newImg.setAttribute("id", "current-img");

            newImg.onload = function(){
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
                    //Button under image on mobile version
                    newNextBtn.style.cssText = "right:20%; top:550px;";
                    
                    //Previous gumb
                    let newPrevBtn = document.createElement("a");
                    let btnPrevText = document.createTextNode("Prev");
                    newPrevBtn.appendChild(btnPrevText);
                    container.appendChild(newPrevBtn);
                    newPrevBtn.setAttribute("class", "img-btn-prev");
                    newPrevBtn.setAttribute("onclick", "changeImg(0)");
                    //Button under image on mobile version
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

//Function that erases fullscreen image and buttons
function closeImg(){
    document.querySelector(".img-window").remove();
    document.querySelector(".img-btn-next").remove();
    document.querySelector(".img-btn-prev").remove();
}

//Function for going trough images
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

    //Change src on fullscreen image
    newImg.setAttribute("src", "../../img/estates/" + postID + "/img" + calcNewImg + ".jpg");
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