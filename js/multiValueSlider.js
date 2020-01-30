function getVals(){
  // Get slider values
  var parent = this.parentNode;
  var slides = parent.getElementsByTagName("input");
    var slide1 = parseFloat( slides[0].value );
    var slide2 = parseFloat( slides[1].value );
  // Neither slider will clip the other, so make sure we determine which is larger
  if( slide1 > slide2 ){ var tmp = slide2; slide2 = slide1; slide1 = tmp; }
  
  var displayElement = parent.getElementsByClassName("minValue")[0];
  displayElement.innerHTML = slide1;

  var displayElement = parent.getElementsByClassName("maxValue")[0];
    displayElement.innerHTML = slide2;
 
  let minValueSlider = document.getElementById("minValueSlider");

  function updateInput(slide1){
    minValueSlider.value = slide1;
  }

}

window.onload = function(){
  // Initialize Sliders
  var sliderSections = document.getElementsByClassName("range-slider");
      for( var x = 0; x < sliderSections.length; x++ ){
        var sliders = sliderSections[x].getElementsByTagName("input");
        for( var y = 0; y < sliders.length; y++ ){
          if( sliders[y].type ==="range" ){
            sliders[y].oninput = getVals;
            // Manually trigger event first time to display values
            sliders[y].oninput();
          }
        }
      }
}

// let filterSubmit = document.getElementsByName("filterEstates");

// filterSubmit.addEventListener("click", function (e){
//   filterSubmit.preventDefault()
//   console.log(e);
// });


