<?php

//navigation.php

echo 
'<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Real Estate Site</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/realEstate.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/282723246a.js" crossorigin="anonymous"></script>
        
    </head>

    <body>

      <!-- Navigation -->
      <div id="navigation">
        <div id="navigationTop">
          <div id="navigationTopContent">
              <p id="navigationTopContent01"><img src="img/navPhoneIcon.jpg" alt="..." width="15">Info: +395 273 8765</p>
              <p id="navigationTopContent02Mobile">8:00 | 16:00</p>
              <p id="navigationTopContent02Desktop">Radno vrijeme: 8:00 | 16:00</p>
              <div id="navigationTopContent03">
                  <img src="img/facebookIcon.png" alt="..." width="25">
                  <img src="img/twitterIcon.png" alt="..." width="25">
                  <img src="img/instagramIcon.png" alt="..." width="25">
              </div>
          </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div id="logo">
            <p class="text-center font-weight-bolder mt-3"><a href="index.php">Firm</a></p>
          </div>
  
          <div class="bd-highlight font-weight-bold" id="dropdown">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lang</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item font-weight-bold" href="#"><img src="img/cro_lang.png" id="croIcon" alt="Smiley face" height="30" width="30"></a>
                  <a class="dropdown-item font-weight-bold" href="#"><img src="img/ger_lang.png" id="gerIcon" alt="Smiley face" height="30" width="30"></a>
                  <a class="dropdown-item font-weight-bold" href="#"><img src="img/eng_lang.png" id="engIcon" alt="Smiley face" height="30" width="30"></a>
                </div>
            </li>
          </div>

          <div class="navigationDisplayToggle">
            Hello, Pero Peric
          </div>

          <div class="bd-highlight font-weight-bold" id="dropdownProfile">
            <li class="nav-item dropdown mt-2">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="img/profileIcon.png" alt="Smiley face" height="25" width="25">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item font-weight-bold profileColor" href="includes/login.php"><img src="img/loginIcon.png" alt="Smiley face" height="20" width="20">Log In</a>
                  <a class="dropdown-item font-weight-bold profileColor" href="includes/register.php"><img src="img/signupIcon.png" alt="Smiley face" height="20" width="20">Sign Up</a>
                </div>
            </li>
          </div>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse text-center" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link first" href="realEstate.php">Real estate<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Terms</a>
              </li>
              <li class="nav-item mobileOnly">
                <a class="nav-link" href="#">Hello, Pero Peric</a>
              </li>
              <li class="nav-item mobileOnly">
                <a class="nav-link" href="#"><img src="img/loginIcon.png" alt="Smiley face" height="20" width="20">Log In</a>
              </li>
              <li class="nav-item mobileOnly">
                <a class="nav-link" href="#"><img src="img/signupIcon.png" alt="Smiley face" height="20" width="20">Sign Up</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- Navigation !END! -->';

      ?>