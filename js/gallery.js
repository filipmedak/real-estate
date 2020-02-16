//Global variables
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
                // Calculate width of image to properly place buttons
                let imgWidth = this.width;
                let calcImgToEdge = ((windowWidth - imgWidth) / 2) - 175;

                if(imgWidth < 600){
                    //Next gumb
                    let newNextBtn = document.createElement("a");
                    let btnNextText = document.createTextNode(">");
                    newNextBtn.appendChild(btnNextText);
                    container.appendChild(newNextBtn);
                    newNextBtn.setAttribute("class", "img-btn-next");
                    newNextBtn.setAttribute("onclick", "changeImg(1)");
                    //Button under image on mobile version
                    newNextBtn.style.cssText = "right:20%; top:550px;";
                    
                    //Previous gumb
                    let newPrevBtn = document.createElement("a");
                    let btnPrevText = document.createTextNode("<");
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
                    let btnNextText = document.createTextNode(">");
                    newNextBtn.appendChild(btnNextText);
                    container.appendChild(newNextBtn);
                    newNextBtn.setAttribute("class", "img-btn-next");
                    newNextBtn.setAttribute("onclick", "changeImg(1)"); 
                    newNextBtn.style.cssText = "right: " + calcImgToEdge + "px;";

                    //Previous gumb
                    let newPrevBtn = document.createElement("a");
                    let btnPrevText = document.createTextNode("<");
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

//Function for going trough images (index)
function changeImg(changeDir){
    document.querySelector("#current-img").remove();

    let getImgWindow = document.querySelector(".img-window");
    let newImg = document.createElement("img");
    getImgWindow.appendChild(newImg);

    //Calculate next image
    let calcNewImg;
    if(changeDir === 1){
        calcNewImg = getLatestOpenedImg + 1;
        //If bigger than length of div, reset to first img (1)
        if(calcNewImg > galleryImages.length){
            calcNewImg = 1;
        }
    }
    else if(changeDir === 0){
        calcNewImg = getLatestOpenedImg - 1;
        //If smaller than length of div, reset to last img
        if(calcNewImg < 1){
            calcNewImg = galleryImages.length;
        }
    }

    //Change src on fullscreen image
    newImg.setAttribute("src", "img/estates/" + postID + "/img" + calcNewImg + ".jpg");
    newImg.setAttribute("id", "current-img");

    getLatestOpenedImg = calcNewImg;

    //Same function like one on line 30 - checks width of new loaded img
    newImg.onload = function(){
        let imgWidth = this.width;
        let calcImgToEdge = ((windowWidth - imgWidth) / 2) - 80; 

        let nextBtn = document.querySelector(".img-btn-next");
        newNextBtn.style.cssText = "right: " + calcImgToEdge + "px";

        let prevBtn = document.querySelector(".img-btn-prev");
        newPrevBtn.style.cssText = "left: " + calcImgToEdge + "px";
    }
}