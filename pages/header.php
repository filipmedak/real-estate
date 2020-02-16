<div id="navigation">
    <div id="navigationTop">
        <div id="navigationTopContent">
            <p id="navigationTopContent01"><a href="tel:+3952738765"><i class="fas fa-phone-volume"></i>Info: +395 273 8765</a></p>
            <p id="navigationTopContent02Mobile">8:00 | 16:00</p>
            <p id="navigationTopContent02Desktop">Working hours: 8:00 | 16:00</p>
            <div id="navigationTopContent03">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div id="logo">
            <a href="index.php?p=main"><p class="text-center font-weight-bolder mt-3">Estates</p></a>
            </div>

            <div class="bd-highlight font-weight-bold" id="dropdown">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lang</a>
                <div class="dropdown-menu mobileImg" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item font-weight-bold" href="#"><img src="img/cro_lang.png" id="croIcon" alt="Croatian Flag Icon" height="30" width="30"></a>
                    <a class="dropdown-item font-weight-bold" href="#"><img src="img/ger_lang.png" id="gerIcon" alt="German Flag Icon" height="30" width="30"></a>
                    <a class="dropdown-item font-weight-bold" href="#"><img src="img/eng_lang.png" id="engIcon" alt="English Flag Icon" height="30" width="30"></a>
                </div>
            </li>
            </div>

            <?php

            if (isset($_SESSION["loggedin"])) {
                echo '
                <button class="btn btn-info navigationDisplayToggle ml-auto" type="button"  aria-haspopup="true" aria-expanded="false">
                <a class="text-white" href="index.php?p=profile"><i class="fas fa-user" style="margin:0;padding:5px 10px;"></i>'.trim($_SESSION["name"]).'</a>
                </button>';
            }else{
                echo '
                <button class="btn btn-info navigationDisplayToggle ml-auto" type="button"  aria-haspopup="true" aria-expanded="false">
                <a class="text-white" href="login.php"><i class="fas fa-user" style="margin:0;padding:5px 10px;"></i>Sign In</a>
                </button>';
            }

            ?>


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse text-center" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?p=main">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?p=estates&pag=1">Real estates</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About us</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="index.php?p=about">Service</a>
                        <a class="dropdown-item" href="index.php?p=about">Adresses</a>
                        <a class="dropdown-item" href="index.php?p=about">Finding real estate</a>
                    </div>
                    </li>
                    <li class="nav-item dropdown longerDropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Living in croatia</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="index.php?p=living">Regions</a>
                        <a class="dropdown-item" href="index.php?p=living">General info</a>
                        <a class="dropdown-item" href="index.php?p=living">Useful links</a>
                    </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?p=contact">Contact</a>
                    </li>
               </ul>
            </div>
        </nav>
</div>
<!-- <div id="sticky">
      <a class="dropdown-item font-weight-bold" class="stickyLang" href="#"><img src="img/cro_lang.png" id="croIcon" alt="Croatian Flag Icon" height="30" width="30"></a>
      <a class="dropdown-item font-weight-bold" class="stickyLang" href="#"><img src="img/ger_lang.png" id="gerIcon" alt="German Flag Icon" height="30" width="30"></a>
      <a class="dropdown-item font-weight-bold" class="stickyLang" href="#"><img src="img/eng_lang.png" id="engIcon" alt="English Flag Icon" height="30" width="30"></a>
</div> -->

