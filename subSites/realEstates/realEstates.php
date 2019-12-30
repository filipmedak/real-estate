<?php include ('../../includes/headerTop.php'); ?>

<?php include ('../../includes/headerMiddle.php'); ?>

<link rel="stylesheet" href="../../css/style.css">
<link rel="stylesheet" href="realEstates.css">



<!-- Navigation Links -->
<li class="nav-item">
  <a class="nav-link" href="../../index.php">Home</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="#">Real estates</a>
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
  <a class="nav-link" href="../contact/contact.php">Contact</a>
</li>
<!-- END -->

<?php include ('../../includes/headerBottom.php'); ?>


<!---------------------------------------------------- NEW CONTENT!! --------------------------------------------------------------->

<div id="realEsateContent">
    <form action="" method="POST">
    <div id="realEstateSearchBar">
        <div id="searchBar" class="mb-4">
            <h3 class="text-center">Filter your results:</h3>
            <div class="input-group mt-3">
                <select class="custom-select" id="inputGroupSelect04">
                    <option selected>State:</option>
                    <option value="1">Zagrebačka županija</option>
                    <option value="2">Bjelovarsko-bilogorska</option>
                    <option value="3">Ličko-senjska</option>
                </select>
            </div>
            <div class="input-group mt-3">
                <select class="custom-select" name="locationEs" id="inputGroupSelect04">
                    <option selected>City:</option>
                    <option value="zagreb">Zagreb</option>
                    <option value="bjelovar">Bjelovar</option>
                    <option value="gospic">Gospić</option>
                </select>
            </div>
            <div class="input-group mt-3">
                <select class="custom-select" name="typeEs" id="inputGroupSelect04">
                    <option selected>Type of real estate:</option>
                    <option value="house">House</option>
                    <option value="apartment">Apartment</option>
                    <option value="cottage">Cottage</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <input type="text" id="search" class="form-control" placeholder="Post ID:">
            </div>
            <!--Search button-->
            <a href="#"><input type="submit" name="getEstates" class="btn btn-dark mt-3 pl-5 pr-5"></a>
    
            <!--Expand button-->
            <div id="accordion" class="mt-3 pb-5">
                <div class="card">
                    <div class="card-header" id="searchEngineButtonExtend">
                        <p><button class="searchEngineButtonExtend btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">More detailed search.</button></p>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <!--Additional setting for search-->
                            <div class="form-group">
                                <div class="input-group mt-3">
                                <input type="text" class="form-control" placeholder="min €" aria-label="" aria-describedby="basic-addon1">
                                <input type="text" class="form-control" placeholder="max €" aria-label="" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mt-3">
                                <input type="text" class="form-control" placeholder="min room" aria-label="" aria-describedby="basic-addon1">
                                <input type="text" class="form-control" placeholder="max room" aria-label="" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mt-3 mb-3">
                                <input type="text" class="form-control" placeholder="min m²" aria-label="" aria-describedby="basic-addon1">
                                <input type="text" class="form-control" placeholder="max m²" aria-label="" aria-describedby="basic-addon1">
                                </div>
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
            <div id="realEstateDesktopOnly">
                <div class="form-group">
                    <div class="input-group mt-1">
                    <input type="text" class="form-control" placeholder="min €" aria-label="" aria-describedby="basic-addon1">
                    <input type="text" class="form-control" placeholder="max €" aria-label="" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mt-3">
                    <input type="text" class="form-control" placeholder="min room" aria-label="" aria-describedby="basic-addon1">
                    <input type="text" class="form-control" placeholder="max room" aria-label="" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mt-3 mb-3">
                    <input type="text" class="form-control" placeholder="min m²" aria-label="" aria-describedby="basic-addon1">
                    <input type="text" class="form-control" placeholder="max m²" aria-label="" aria-describedby="basic-addon1">
                    </div>
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
    </form>
    <div id="searchResults">  

        <div class="card-deck">

        <?php
        include("getEstates.php");
        echo $result;
        ?>
            
        </div> 
        <a href="#" id="moreBtn"><button type="button" class="btn btn-dark mt-3 pl-5 pr-5 mb-5">More posts.</button></a>
    </div>
</div>

<!---------------------------------------------------- NEW CONTENT!! --------------------------------------------------------------->
    
<?php include ('../../includes/footer.php'); ?>



















<!-- Ovako je bilo prije -->


           <!--  <div class="card shadow-lg mt-5 mb-5" data-aos="fade-up" data-aos-duration="1500">
                <img src="../../img/promoImage01.jpg" class="card-img-top" alt="Real estate image">
                <div class="card-body">
                    <h3 class="card-title text-center pb-1">House in Zagreb</h5>
                    <p class="card-text">Price: <b>60,000€</b></p>
                    <p class="card-text">Type: <b>House</b></p>
                    <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>5</b></p>
                    <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i>Size: <b>53,38m²</b></p>
                    <p class="card-text">Location: <b>Zagreb</b></p>
                    <p class="card-text text-center text-muted">ID: <b>7328193</b></p>
                    <p class="card-text text-center text-muted""><a href="../activePost/activePost.php"><b>More ></b></a></p>
                </div>
            </div>
            <div class="card shadow-lg mt-5 mb-5" data-aos="fade-up" data-aos-duration="1500">
                <img src="../../img/promoImage02.jpg" class="card-img-top" alt="Real estate image">
                <div class="card-body">
                    <h3 class="card-title text-center pb-1">House in Zagreb</h5>
                    <p class="card-text">Price: <b>60,000€</b></p>
                    <p class="card-text">Type: <b>House</b></p>
                    <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>5</b></p>
                    <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i>Size: <b>53,38m²</b></p>
                    <p class="card-text">Location: <b>Zagreb</b></p>
                    <p class="card-text text-center text-muted">ID: <b>7328193</b></p>
                    <p class="card-text text-center text-muted""><a href="../activePost/activePost.html"><b>More ></b></a></p>
                </div>
            </div>
            <div class="card shadow-lg mt-5 mb-5" data-aos="fade-up" data-aos-duration="1500">
                <img src="../../img/promoImage03.jpg" class="card-img-top" alt="Real estate image">
                <div class="card-body">
                    <h3 class="card-title text-center pb-1">House in Zagreb</h5>
                    <p class="card-text">Price: <b>60,000€</b></p>
                    <p class="card-text">Type: <b>House</b></p>
                    <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>5</b></p>
                    <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i>Size: <b>53,38m²</b></p>
                    <p class="card-text">Location: <b>Zagreb</b></p>
                    <p class="card-text text-center text-muted">ID: <b>7328193</b></p>
                    <p class="card-text text-center text-muted"><a href="../activePost/activePost.html"><b>More ></b></a></p>
                </div>
            </div>
            <div class="card shadow-lg mt-5 mb-5" data-aos="fade-up" data-aos-duration="1500">
                <img src="../../img/promoImage04.jpg" class="card-img-top" alt="Real estate image">
                <div class="card-body">
                    <h3 class="card-title text-center pb-1">House in Zagreb</h5>
                    <p class="card-text">Price: <b>60,000€</b></p>
                    <p class="card-text">Type: <b>House</b></p>
                    <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>5</b></p>
                    <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i>Size: <b>53,38m²</b></p>
                    <p class="card-text">Location: <b>Zagreb</b></p>
                    <p class="card-text text-center text-muted">ID: <b>7328193</b></p>
                    <p class="card-text text-center text-muted""><a href="../activePost/activePost.html"><b>More ></b></a></p>
                </div>
            </div>
            <div class="card shadow-lg mt-5 mb-5" data-aos="fade-up" data-aos-duration="1500">
                <img src="../../img/promoImage03.jpg" class="card-img-top" alt="Real estate image">
                <div class="card-body">
                    <h3 class="card-title text-center pb-1">House in Zagreb</h5>
                    <p class="card-text">Price: <b>60,000€</b></p>
                    <p class="card-text">Type: <b>House</b></p>
                    <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>5</b></p>
                    <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i>Size: <b>53,38m²</b></p>
                    <p class="card-text">Location: <b>Zagreb</b></p>
                    <p class="card-text text-center text-muted">ID: <b>7328193</b></p>
                    <p class="card-text text-center text-muted""><a href="#"><b>More ></b></a></p>
                </div>
            </div>
            <div class="card shadow-lg mt-5 mb-5" data-aos="fade-up" data-aos-duration="1500">
                <img src="../../img/promoImage01.jpg" class="card-img-top" alt="Real estate image">
                <div class="card-body">
                    <h3 class="card-title text-center pb-1">House in Zagreb</h5>
                    <p class="card-text">Price: <b>60,000€</b></p>
                    <p class="card-text">Type: <b>House</b></p>
                    <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>5</b></p>
                    <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i>Size: <b>53,38m²</b></p>
                    <p class="card-text">Location: <b>Zagreb</b></p>
                    <p class="card-text text-center text-muted">ID: <b>7328193</b></p>
                    <p class="card-text text-center text-muted""><a href="#"><b>More ></b></a></p>
                </div>
            </div>
            <div class="card shadow-lg mt-5 mb-5" data-aos="fade-up" data-aos-duration="1500">
                <img src="../../img/promoImage02.jpg" class="card-img-top" alt="Real estate image">
                <div class="card-body">
                    <h3 class="card-title text-center pb-1">House in Zagreb</h5>
                    <p class="card-text">Price: <b>60,000€</b></p>
                    <p class="card-text">Type: <b>House</b></p>
                    <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>5</b></p>
                    <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i>Size: <b>53,38m²</b></p>
                    <p class="card-text">Location: <b>Zagreb</b></p>
                    <p class="card-text text-center text-muted">ID: <b>7328193</b></p>
                    <p class="card-text text-center text-muted""><a href="#"><b>More ></b></a></p>
                </div>
            </div>
            <div class="card shadow-lg mt-5 mb-5" data-aos="fade-up" data-aos-duration="1500">
                <img src="../../img/promoImage01.jpg" class="card-img-top" alt="Real estate image">
                <div class="card-body">
                    <h3 class="card-title text-center pb-1">House in Zagreb</h5>
                    <p class="card-text">Price: <b>60,000€</b></p>
                    <p class="card-text">Type: <b>House</b></p>
                    <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>5</b></p>
                    <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i>Size: <b>53,38m²</b></p>
                    <p class="card-text">Location: <b>Zagreb</b></p>
                    <p class="card-text text-center text-muted">ID: <b>7328193</b></p>
                    <p class="card-text text-center text-muted""><a href="#"><b>More ></b></a></p>
                </div>
            </div>
            <div class="card shadow-lg mt-5 mb-5" data-aos="fade-up" data-aos-duration="1500">
                <img src="../../img/promoImage02.jpg" class="card-img-top" alt="Real estate image">
                <div class="card-body">
                    <h3 class="card-title text-center pb-1">House in Zagreb</h5>
                    <p class="card-text">Price: <b>60,000€</b></p>
                    <p class="card-text">Type: <b>House</b></p>
                    <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>5</b></p>
                    <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i>Size: <b>53,38m²</b></p>
                    <p class="card-text">Location: <b>Zagreb</b></p>
                    <p class="card-text text-center text-muted">ID: <b>7328193</b></p>
                    <p class="card-text text-center text-muted""><a href="#"><b>More ></b></a></p>
                </div>
            </div>
            <div class="card shadow-lg mt-5 mb-5" data-aos="fade-up" data-aos-duration="1500">
                <img src="../../img/promoImage01.jpg" class="card-img-top" alt="Real estate image">
                <div class="card-body">
                    <h3 class="card-title text-center pb-1">House in Zagreb</h5>
                    <p class="card-text">Price: <b>60,000€</b></p>
                    <p class="card-text">Type: <b>House</b></p>
                    <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>5</b></p>
                    <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i>Size: <b>53,38m²</b></p>
                    <p class="card-text">Location: <b>Zagreb</b></p>
                    <p class="card-text text-center text-muted">ID: <b>7328193</b></p>
                    <p class="card-text text-center text-muted""><a href="#"><b>More ></b></a></p>
                </div>
            </div>
            <div class="card shadow-lg mt-5 mb-5" data-aos="fade-up" data-aos-duration="1500">
                <img src="../../img/promoImage04.jpg" class="card-img-top" alt="Real estate image">
                <div class="card-body">
                    <h3 class="card-title text-center pb-1">House in Zagreb</h5>
                    <p class="card-text">Price: <b>60,000€</b></p>
                    <p class="card-text">Type: <b>House</b></p>
                    <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>5</b></p>
                    <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i>Size: <b>53,38m²</b></p>
                    <p class="card-text">Location: <b>Zagreb</b></p>
                    <p class="card-text text-center text-muted">ID: <b>7328193</b></p>
                    <p class="card-text text-center text-muted""><a href="#"><b>More ></b></a></p>
                </div>
            </div>
            <div class="card shadow-lg mt-5 mb-5" data-aos="fade-up" data-aos-duration="1500">
                <img src="../../img/promoImage03.jpg" class="card-img-top" alt="Real estate image">
                <div class="card-body">
                    <h3 class="card-title text-center pb-1">House in Zagreb</h5>
                    <p class="card-text">Price: <b>60,000€</b></p>
                    <p class="card-text">Type: <b>House</b></p>
                    <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>5</b></p>
                    <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i>Size: <b>53,38m²</b></p>
                    <p class="card-text">Location: <b>Zagreb</b></p>
                    <p class="card-text text-center text-muted">ID: <b>7328193</b></p>
                    <p class="card-text text-center text-muted""><a href="#"><b>More ></b></a></p>
                </div>
            </div>-->