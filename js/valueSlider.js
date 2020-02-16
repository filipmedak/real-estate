function getValue(){
    // Get slider values
    let parent = this.parentNode;
    let slides = parent.getElementsByTagName("input");
    //Parse the string are return number
    let minSlide = parseFloat(slides[0].value);
    let maxSlide = parseFloat(slides[1].value);

    //Value display
    let displayElement = parent.getElementsByClassName("rangeValues")[0];
    displayElement.innerHTML = "€ " + minSlide + "- €" + maxSlide;

    //console.log(slides[0].value);
    // console.log(minSlide);

}


window.onload = function(){
    //Grab whole div by class
    let sliderSections = document.getElementsByClassName("range-slider");

    for(let x = 0; x < sliderSections.length; x++)
    {
        //Grab sliders by tag
        let sliders = sliderSections[x].getElementsByTagName("input");
        for( let y = 0; y < sliders.length; y++ )
        {
            //Compare by type
            if( sliders[y].type ==="range" )
            {
                sliders[y].oninput = getValue;
                
                // Manually trigger event first time to display values
                sliders[y].oninput();
            }
        }
    }
} 

