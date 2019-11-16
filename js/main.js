const backToTopButton = document.querySelector("#backToTop");

window.addEventListener("scroll", scrollFunction);

function scrollFunction(){
    if(window.pageYOffset > 1200){
        backToTopButton.style.display = "block";
    }
    else{
        backToTopButton.style.display = "none";
    }
}