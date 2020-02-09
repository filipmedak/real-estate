<?php include ('includes/headerTop.php'); ?>

<link rel="stylesheet" href="css/style.css">

<?php include ('includes/headerMiddle.php'); ?>

<?php require_once 'includes/dbh.inc.php';  ?>


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
          <form action="" method="POST" class="mt-5">
          <div class="form-group">

                <h2>Find your real estate</h2>

                <?php

                //Autocorrect

                $query_cities = "SELECT * FROM city ORDER BY id";
                $result_cities = mysqli_query($connection, $query_cities);

                if(mysqli_num_rows($result_cities) > 0)
                {
                    while($row = mysqli_fetch_assoc($result_cities)) {
                        $cities[] = $row;
                    }
                }

                //print_r($cities);

                ?>

                <input type="text" id="search" class="form-control" value="" placeholder="Insert location:">
                <div id="match-list"></div>
              
                <select class="form-control" name="typeEs" id="realEstateType">
                    <option value="">Type of real estate:</option>
                    <?php 
                    
                    $query_state = "SELECT * FROM estatetypes ORDER BY type";
                    $result_state = mysqli_query($connection, $query_state);

                    while($row = mysqli_fetch_array($result_state))
                    {
                        $id = $row["id"];
                        $type = ucfirst($row["type"]);

                        echo '<option value="'.$id.'">'.$type.'</option>';
                    }

                    ?>
                </select>

                <div class="input-group range-slider">
                    <p>Min/max price</p>
                    <span class="rangeValues"></span><br>
                    <input value="500" min="500" max="50000" step="500" type="range" id="minSlider">
                    <input value="50000" min="500" max="50000" step="500" type="range" id="maxSlider">
                </div>


                <div id="searchEngineBarTextDetails">
                <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="checkBalcony" name="balcony">
                        <label class="form-check-label" for="checkBalcony">Balcony</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="checkTerrace" name="terrace">
                        <label class="form-check-label" for="checkTerrace">Terrace</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="checkParking" name="parking">
                        <label class="form-check-label" for="checkParking">Parking</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="checkGarage" name="garage">
                        <label class="form-check-label" for="checkGarage">Garage</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="checkLift" name="lift">
                        <label class="form-check-label" for="checkLift">Lift</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="checkBarrierFreeAccess" name="barrierFreeAccess">
                        <label class="form-check-label" for="checkBarrierFreeAccess">Barrier-free</label>
                    </div>
                </div>
                <button class="btn btn-success" value="submit" name="filterEstates" type="submit">Submit</button>
            </div>
                  
          </form>
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

  <script src="js/valueSlider.js"></script>               
  <script src="js/autoCorrect.js"></script>
  <script type="text/javascript">
    let cities = <?php echo json_encode($cities) ?>;
  </script>

<?php include ('includes/footer.php'); ?>