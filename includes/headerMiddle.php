<?php

//headerMiddle.php

echo '
    <script src="https://kit.fontawesome.com/282723246a.js" crossorigin="anonymous"></script>
    </head>

    <body>
    <!-- Navigation -->
    <div id="navigation">
    <div id="navigationTop">
        <div id="navigationTopContent">
            <p id="navigationTopContent01"><a href="tel:+3952738765"><i class="fas fa-phone-volume"></i>Info: +395 273 8765</a></p>
            <p id="navigationTopContent02Mobile">8:00 | 16:00</p>
            <p id="navigationTopContent02Desktop">Radno vrijeme: 8:00 | 16:00</p>
            <div id="navigationTopContent03">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div id="logo">
            <a href="../../index.php"><p class="text-center font-weight-bolder mt-3">Firm</p></a>
            </div>

            <div class="bd-highlight font-weight-bold" id="dropdown">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lang</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item font-weight-bold" href="#"><img src="../../img/cro_lang.png" id="croIcon" alt="Croatian Flag Icon" height="30" width="30"></a>
                    <a class="dropdown-item font-weight-bold" href="#"><img src="../../img/ger_lang.png" id="gerIcon" alt="German Flag Icon" height="30" width="30"></a>
                    <a class="dropdown-item font-weight-bold" href="#"><img src="../../img/eng_lang.png" id="engIcon" alt="English Flag Icon" height="30" width="30"></a>
                </div>
            </li>
            </div>

            <div class="navigationDisplayToggle">
            Hello, Pero P.
            </div>

            <div class="bd-highlight font-weight-bold" id="dropdownProfile">
            <li class="nav-item dropdown mt-2">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item font-weight-bold profileColor" href="includes/login.php"><i class="fas fa-sign-in-alt"></i>Log In</a>
                    <a class="dropdown-item font-weight-bold profileColor" href="includes/register.php"><i class="fas fa-user-plus"></i>Sign Up</a>
                </div>
            </li>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse text-center" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">';

?>