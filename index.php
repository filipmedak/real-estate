<?php include ('includes/headerTop.php'); ?>

<link rel="stylesheet" href="css/style.css">

<?php include ('includes/headerMiddle.php'); ?>



<!-- Navigation Links -->


<li class="nav-item">
  <a class="nav-link" href="#">Home</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="subSites/realEstates/realEstates.php">Real estates</a>
</li>
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About us</a>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Service</a>
    <a class="dropdown-item" href="#">Adresses</a>
    <a class="dropdown-item" href="#">Finding real estate</a>
  </div>
</li>
<li class="nav-item dropdown longerDropdown">
  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Living in croatia</a>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Regions</a>
    <a class="dropdown-item" href="#">General info</a>
    <a class="dropdown-item" href="#">Useful links</a>
  </div>
</li>
<li class="nav-item">
  <a class="nav-link" href="subSites/contact/contact.php">Contact</a>
</li>


<?php include ('includes/headerBottom.php'); ?>

    <!-- Sticky Language Menu - Desktop only -->
    <div id="sticky">
      <a class="dropdown-item font-weight-bold" class="stickyLang" href="#"><img src="img/cro_lang.png" id="croIcon" alt="Croatian Flag Icon" height="30" width="30"></a>
      <a class="dropdown-item font-weight-bold" class="stickyLang" href="#"><img src="img/ger_lang.png" id="gerIcon" alt="German Flag Icon" height="30" width="30"></a>
      <a class="dropdown-item font-weight-bold" class="stickyLang" href="#"><img src="img/eng_lang.png" id="engIcon" alt="English Flag Icon" height="30" width="30"></a>
    </div>
    <!-- Sticky Language Menu - Desktop only  !END!-->

    <!-- Search engine -->
    <div id='searchEngine' class="text-center p-4">
      <div id="searchEngineBar" class="p-4">
        <div id="searchEngineBarText" class="p-4" data-aos="zoom-in" data-aos-duration="2000">
          <h2 class="pt-3">Search for real estates!</h2>
          <!-- Location autoseach-->    
          <div class="form-group mt-4">
              <input type="text" id="search" class="form-control" placeholder="Insert location:">
          </div>
          <div id="match-list"></div>
          <!--Type of real estate-->
          <div class="input-group">
            <select class="custom-select" id="inputGroupSelect04" method="get">
              <option selected>Type of real estate:</option>
              <option value="house">House</option>
              <option value="apartment">Apartment</option>
              <option value="cottage">Cottage</option>
            </select>
          </div>
          
          <div class="rangeSlider">
            <p>Vrijednost: <span id="demo"></span></p>
            <input type="range" min="1" max="100" value="50" class="mySlider" id="sliderRange">  
          </div>

          <!--Search button-->
          <a href="#"><button type="button" class="blueButton btn btn-dark mt-3 pl-5 pr-5">Search!</button></a>
  
          <!--Expand button-->
          <div id="accordion" class="mt-3">
            <div class="card">
              <div class="card-header" id="searchEngineButtonExtend">
                <h5 class="mb-0">
                  <button class="searchEngineButtonExtend btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    More detailed search.
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                  <!--Additional setting for search-->
                  <div class="form-group">
                    <div id="searchEngineBarTextDetails">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="newBuilding">
                        <label class="form-check-label" for="inlineCheckbox1">New building</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="oldBuilding">
                        <label class="form-check-label" for="inlineCheckbox2">Old building</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="lift">
                        <label class="form-check-label" for="inlineCheckbox3">Lift</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="balcony">
                        <label class="form-check-label" for="inlineCheckbox4">Balcony</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="garage">
                        <label class="form-check-label" for="inlineCheckbox5">Garage</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="parking">
                        <label class="form-check-label" for="inlineCheckbox6">Parking</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="view">
                        <label class="form-check-label" for="inlineCheckbox7">View</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox8" value="discount">
                        <label class="form-check-label" for="inlineCheckbox8">Discount</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Search engine !END! -->

    <!-- Promo -->
    <div id="promo" class="mt-5 mb-5 pt-5 pb-5">
      <div class="card-deck">
        <div class="card shadow-lg mb-5" data-aos="fade-right" data-aos-duration="1500">
          <img src="img/promoImage01.jpg" class="card-img-top" alt="Real estate image">
          <div class="card-body">
            <h3 class="card-title text-center pt-3 pb-1">House in Zagreb</h5>
            <p class="card-text">Price: <b>60,000€</b></p>
            <p class="card-text">Type: <b>House</b></p>
            <p class="card-text">Location: <b>Zagreb</b></p>
            <div class="cardIcon">
              <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i>Size: <b>53,38m²</b></p>
              <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>5</b></p>
              <p class="card-text text-center text-muted">ID: <b>7328193</b></p>
              <p class="card-text text-start text-muted""><a href="#"><b>More ></b></a></p>
            </div>
          </div>
        </div>
        <div class="card shadow-lg mb-5" data-aos="fade-right" data-aos-duration="1500">
          <img src="img/promoImage02.jpg" class="card-img-top" alt="Real estate image">
          <div class="card-body">
            <h3 class="card-title text-center pt-3 pb-1">Flat in Osijek</h5>
            <p class="card-text">Price: <b>80,000€</b></p>
            <p class="card-text">Type: <b>Flat</b></p>
            <p class="card-text">Location: <b>Osijek</b></p>
            <div class="cardIcon">
              <p class="card-text"><i class="fas fa-expand-arrows-alt"></i>Size: <b>40,12m²</b></p>
              <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>3</b></p>
              <p class="card-text text-center text-muted">ID: <b>8762983</b>></p>
              <p class="card-text text-start text-muted""><a href="#"><b>More ></b></a></p>
            </div>
          </div>
        </div>
        <div class="card shadow-lg mb-5" data-aos="fade-right" data-aos-duration="1500">
          <img src="img/promoImage03.jpg" class="card-img-top" alt="Real estate image">
          <div class="card-body">
            <h3 class="card-title text-center pt-3 pb-1">Cottage in Pula</h5>
            <p class="card-text">Price: <b>50,000€</b></p>
            <p class="card-text">Type: <b>Cottage</b></p>
            <p class="card-text">Location: <b>Pula</b></p>
            <div class="cardIcon">
              <p class="card-text"><i class="fas fa-expand-arrows-alt"></i>Size: <b>70,24m²</b></p>
              <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>4</b></p>
              <p class="card-text text-center text-muted">ID: <b>2955432</b>></p>
              <p class="card-text text-start text-muted""><a href="#"><b>More ></b></a></p>
            </div>
          </div>
        </div>
        <div class="card shadow-lg mb-5" data-aos="fade-right" data-aos-duration="1500">
          <img src="img/promoImage04.jpg" class="card-img-top" alt="Real estate image">
          <div class="card-body">
            <h3 class="card-title text-center pt-3 pb-1">House in Rijeka</h5>
            <p class="card-text">Price: <b>120,000€</b></p>
            <p class="card-text">Type: <b>House</b></p>
            <p class="card-text">Location: <b>Rijeka</b></p>
            <div class="cardIcon">
              <p class="card-text"><i class="fas fa-expand-arrows-alt"></i>Size: <b>87,21m²</b></p>
              <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>6</b></p>
              <p class="card-text text-center text-muted">ID: <b>9647267</b>></p>
              <p class="card-text text-start text-muted""><a href="#"><b>More ></b></a></p>
            </div>
          </div>
        </div>
        <div id="promoBtn">
          <a href="#"><button type="button" class="btn btn-dark mt-3 pl-5 pr-5">Find more!</button></a>
        </div>
      </div>
    </div>

    <!-- Promo !END! -->

    <!-- Services -->
    <div id="services">
      <div id="servicesBar">
        <div id="servicesContent" class="mt-5 mb-5 text-center"</div>
          <div id="servicesSection1" class="m-4 pt-4 pb-4" data-aos="zoom-in" data-aos-duration="1000">
            <i class="fas fa-search-dollar"></i>
            <h3 class="text-center">Evaluation</h3>
            <p class="ml-3 mr-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <a href="#"><button type="button" class="blueButton btn btn-dark mt-3 pl-5 pr-5">Find out more!</button></a>
          </div>
          <div id="servicesSection2" class="m-4 pt-4 pb-4" data-aos="zoom-in" data-aos-duration="1000">
            <i class="fas fa-handshake"></i>
            <h3 class="text-center">Broking</h3>
            <p class="ml-3 mr-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <a href="#"><button type="button" class="blueButton btn btn-dark mt-3 pl-5 pr-5">Find out more!</button></a>
          </div>
          <div id="servicesSection3" class="m-4 pt-4 pb-4" data-aos="zoom-in" data-aos-duration="1000">
            <i class="fas fa-balance-scale"></i>
            <h3 class="text-center">Sales</h3>
            <p  class="ml-3 mr-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <a href="#"><button type="button" class="blueButton btn btn-dark mt-3 pl-5 pr-5">Find out more!</button></a>
          </div>
        </div>
      </div>
    </div>
    <!-- END -->

<?php include ('includes/footer.php'); ?>