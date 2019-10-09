/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function responsiveNavigation() {
  var x = document.getElementById("rwdNav");
  if (x.className === "nav") {
    x.className += " responsive";
  } else {
    x.className = "nav";
  }
}