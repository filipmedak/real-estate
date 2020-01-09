let galleryImages = document.querySelectorAll(".gallery-img");
let getLatestOpenedImg;

if(galleryImages){
    galleryImages.forEach(function(image, index){
        let getElementsCss = window.getComputedStyle(image);
        console.log(galleryImages[0].childNodes[1].src);
    })
}