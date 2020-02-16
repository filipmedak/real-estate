<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// ===============================
// DATABASE CONNECTION FILE($connection)
require_once('includes/dbh.inc.php');
// ===============================


include 'pages/html-head.php';
echo '<title>Real Estate Site</title>';
// ===============================
// ADD STYLESHEETS HERE
echo '<link rel="stylesheet" href="css/realEstates.css">';//FOR REAL ESTATE PAGE
echo '<link rel="stylesheet" href="css/activePost.css">';//FOR ACTIVE POSTS PAGE
echo '<link rel="stylesheet" href="css/profile.css">';//FOR REAL ESTATE PAGE
// ===============================
echo '</head>';
echo '<body>';
include 'pages/header.php';
// ===============================
// MAIN CONTENT HERE

if (isset($_GET["p"])) {
    include 'pages/'.$_GET["p"].'.php';
}else{
    include 'pages/main.php';
}



// ===============================
include 'pages/footer.php';
// ===============================
// ADD SCRIPTS HERE
// if(){
//     <script src="js/valueSlider.js"></script>               
//     <script src="js/autoCorrect.js"></script>
// }
if (isset($_GET["p"]) && isset($_GET["p"])=="inc/activePost") {
    echo '<script src="js/gallery.js"></script>';
}

echo '
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="js/main.js"></script>
<script src="js/valueSlider.js"></script>
<script>AOS.init();</script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>';
// ===============================
echo '</body>
</html>';


?>