<?php include ('../../includes/headerTop.php'); ?>

<link rel="stylesheet" href="../../css/headerFooter.css">
<link rel="stylesheet" href="activePost.css">

<?php include ('../../includes/headerMiddle.php'); ?>

<!-- Navigation Links -->
<li class="nav-item">
  <a class="nav-link" href="../../index.php">Home</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="../realEstates/realEstates.php">Real estates</a>
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

<?php
    require_once("../../includes/dbh.inc.php");

    $id=$_GET["id"];
    $sql="SELECT estates.*,
    city.name as `city`,
    estatetypes.type,
    energy_classes.class as `en-class`
    FROM estates
    INNER JOIN city ON (estates.city = city.id)
    INNER JOIN estatetypes ON (estates.type = estatetypes.id)
    INNER JOIN energy_classes ON (estates.energy_class = energy_classes.id) WHERE estates.id=$id"; 
    

    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $location=ucfirst($row["city"]);
        $type=ucfirst($row["type"]);
        $imgPath='../../img/estates/'.$id.'/';
        $images=scandir($imgPath);
        unset($images[0]);
        unset($images[1]);
        array_pop($images);

        //print_r($images);

        echo '
        <div class="background">
        <div class="activePost">
        <h2 class="text-center pt-5 pb-3">'.$type.' in '.$location.'</h2>
        <p class="smallDescription pt-2">'.$row["price"].'€ ~ '.($row["price"]*7.44).'kn</p>';

        echo'
        <div id="index-gallery">';
            //Zaustavljamo prikaz više od 4 slike na stranici
            $i = 0;
            foreach ($images as $key => $value) {
                if($i <= 3){
                    echo '
                    <div class="gallery-img">
                        <img src="'.$imgPath.'/thumbnail/'.$value.'" class="mainImg galleryImg">
                    </div>';
                    $i++;
                }
                else if($i >= 4){
                    echo '
                    <div class="gallery-img">
                        <img src="" class="mainImg galleryImg d-none">
                    </div>';
                    $i++;
                }
            }
            echo '
        </div>';
        

        echo'
        <div id="smallDescription" class="mt-4">
            <p>Post ID: <span id="postID">'.$id.'</span></p>
            <p>Posted: <span>25.11.2019</span></p>
        </div>
        <a href="#" class="mb-3"><button type="button" class="btn btn-dark mt-3 pl-5 pr-5">Contact us</button></a>
        <div id="smallDescriptionImportant" class="text-center mt-4">
            <div>
                <p class="bolderP pt-3"><i class="fas fa-expand-arrows-alt"></i><br>Estate m²</p>
                <p>'.$row["property_size"].'m²</p>
            </div>
            <div>
                <p class="bolderP pt-3"><i class="fas fa-globe"></i><br>Whole m²</p>
                <p>82,37m²</p>
            </div>
            <div>
                <p class="bolderP pt-3"><i class="fas fa-bed"></i><br>Rooms</p>
                <p>'.$row["rooms"].'</p>
            </div>
            <div>
                <p class="bolderP pt-3"><i class="fas fa-bath"></i><br>Bathrooms</p>
                <p>2</p>
            </div>
        </div>
        
        <div id="basicInformation" class="text-center">';
            echo 
            '<div class="basicInformationGrid">
                <p class="blue">Location:</p>
                <p class="boldBlack">'.$location.'</p>
            </div>
            <div class="basicInformationGrid">
                <p class="blue">Estate type:</p>
                <p class="boldBlack">'.$type.'</p>
            </div>  
            <div class="basicInformationGrid">
                <p class="blue">Number of rooms:</p>
                <p class="boldBlack">'.$row["rooms"].'</p>
            </div>  
            <div class="basicInformationGrid">
                <p class="blue">Floors:</p>
                <p class="boldBlack">'.$row["floors"].'</p>
            </div>  
            <div class="basicInformationGrid">
                <p class="blue">Property size:</p>
                <p class="boldBlack">'.$row["property_size"].'m²</p>
            </div>  
            <div class="basicInformationGrid">
                <p class="blue">Living space:</p>
                <p class="boldBlack">'.$row["living_space"].'m²</p>
            </div> 
            <div class="basicInformationGrid">
                <p class="blue">Heating:</p>
                <p class="boldBlack">'.$row["heating_system"].'</p>
            </div>  
            <div class="basicInformationGrid">
               <p class="blue">Energy class:</p>
               <p class="boldBlack">'.$row["energy_class"].'</p>
            </div>  
            <div class="basicInformationGrid">
                <p class="blue">Year of construction:</p>
                <p class="boldBlack">'.$row["construction_year"].'</p>
            </div>
            <div class="basicInformationGrid">
               <p class="blue">Last renovation:</p>
               <p class="boldBlack">'.$row["last_renovation"].'</p>
            </div>  
            
        </div>

        <div class="embed ml-2 mr-5 mt-5 w-100">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2780.9369209235624!2d15.94505191556919!3d45.81252167910666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d6dbb5a8ed03%3A0x3cbbed9018ef1850!2sPivana!5e0!3m2!1shr!2shr!4v1574777272363!5m2!1shr!2shr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>     
        </div>
  
        <div id="buildingInformation">
                <h2><i class="fas fa-info-circle"></i>   Building Information</h2>';
                
                if($row["balcony"] == 1){
                    echo '<div><p>Balcony</p><p>✔</p></div>';
                }
                else if($row["balcony"] == 0){
                    echo '<div class="ghost"><p>Balcony</p><p>✘</p></div>';
                }
                else{
                    echo '';
                }

                
                    if($row["terrace"] == 1){
                        echo '<div><p>Terrace</p><p>✔</p></div>';
                    }
                    else if($row["terrace"] == 0){
                        echo '<div class="ghost"><p>Terrace</p><p>✘</p></div>';
                    }
                    else{
                        echo '';
                    }

                        if($row["parking"] == 1){
                            echo '<div><p>Parking</p><p>✔</p></div>';
                        }
                        else if($row["terrace"] == 0){
                            echo '<div class="Parking"><p>Garage</p><p>✘</p></div>';
                        }
                        else{
                            echo '';
                        }
                        
                            if($row["garage"] == 1){
                                echo '<div><p>Garage</p><p>✔</p></div>';
                            }
                            else if($row["terrace"] == 0){
                                echo '<div class="ghost"><p>Garage</p><p>✘</p></div>';
                            }
                            else{
                                echo '';
                            }
                            
                                if($row["lift"] == 1){
                                    echo '<div><p>Lift</p><p>✔</p></div>';
                                }
                                else if($row["terrace"] == 0){
                                    echo '<div class="ghost"><p>Lift</p><p>✘</p></div>';
                                }
                                else{
                                    echo '';
                                }

                                    if($row["barrier_free"] == 1){
                                        echo '<div><p>Barrier-free access</p><p>✔</p></div>';
                                    }
                                    else if($row["terrace"] == 0){
                                        echo '<div class="ghost"><p>Barrier-free access</p><p>✘</p></div>';
                                    }
                                    else{
                                        echo '';
                                    }

                                        if($row["internet"] == 1){
                                            echo '<div><p>Internet access</p><p>✔</p></div>';
                                        }
                                        else if($row["terrace"] == 0){
                                            echo '<div class="ghost"><p>Internet access</p><p>✘</p></div>';
                                        }
                                        else{
                                            echo '';
                                        }
                    
        echo'     
        </div>
    </div>

    <div id="customInformation">
        <h2><i class="fas fa-asterisk"></i>  Additional Information</h2>
        <p>'.$row["description"].'</p>
    </div>

    <div id="suggestedPosts">
        <div class="card-deck">
            <div class="card shadow-lg mb-5" data-aos="fade-right" data-aos-duration="1500">
                <img src="../../img/promoImage01.jpg" class="card-img-top" alt="Real estate image">
                <div class="card-body">
                    <h3 class="card-title text-center pt-3 pb-1">House in Zagreb</h5>
                    <p class="card-text">Price: <b>60,000€</b></p>
                    <p class="card-text">Type: <b>House</b></p>
                    <p class="card-text">Location: <b>Zagreb</b></p>
                    <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i>Size: <b>53,38m²</b></p>
                    <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>5</b></p>
                    <p class="card-text text-center text-muted">ID: <b>7328193</b></p>
                    <p class="card-text text-start text-muted""><a href="#"><b>More ></b></a></p>
                </div>
            </div>
            <div class="card shadow-lg mb-5" data-aos="fade-right" data-aos-duration="1500">
                <img src="../../img/promoImage02.jpg" class="card-img-top" alt="Real estate image">
                <div class="card-body">
                    <h3 class="card-title text-center pt-3 pb-1">House in Zagreb</h5>
                    <p class="card-text">Price: <b>60,000€</b></p>
                    <p class="card-text">Type: <b>House</b></p>
                    <p class="card-text">Location: <b>Zagreb</b></p>
                    <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i>Size: <b>53,38m²</b></p>
                    <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>5</b></p>
                    <p class="card-text text-center text-muted">ID: <b>7328193</b></p>
                    <p class="card-text text-start text-muted""><a href="#"><b>More ></b></a></p>
                </div>
            </div>
            <div class="card shadow-lg mb-5" data-aos="fade-right" data-aos-duration="1500">
                <img src="../../img/promoImage03.jpg" class="card-img-top" alt="Real estate image">
                <div class="card-body">
                    <h3 class="card-title text-center pt-3 pb-1">House in Zagreb</h5>
                    <p class="card-text">Price: <b>60,000€</b></p>
                    <p class="card-text">Type: <b>House</b></p>
                    <p class="card-text">Location: <b>Zagreb</b></p>
                    <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i>Size: <b>53,38m²</b></p>
                    <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>5</b></p>
                    <p class="card-text text-center text-muted">ID: <b>7328193</b></p>
                    <p class="card-text text-start text-muted""><a href="#"><b>More ></b></a></p>
                </div>
            </div>
            <div class="card shadow-lg mb-5" data-aos="fade-right" data-aos-duration="1500">
                <img src="../../img/promoImage04.jpg" class="card-img-top" alt="Real estate image">
                <div class="card-body">
                    <h3 class="card-title text-center pt-3 pb-1">House in Zagreb</h5>
                    <p class="card-text">Price: <b>60,000€</b></p>
                    <p class="card-text">Type: <b>House</b></p>
                    <p class="card-text">Location: <b>Zagreb</b></p>
                    <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i>Size: <b>53,38m²</b></p>
                    <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>5</b></p>
                    <p class="card-text text-center text-muted">ID: <b>7328193</b></p>
                    <p class="card-text text-start text-muted""><a href="#"><b>More ></b></a></p>
                </div>
            </div>
        </div>
    </div>

</div>';
}

echo '<script src="../../js/gallery.js"></script>';


?>

<!---------------------------------------------------- NEW CONTENT!! --------------------------------------------------------------->
    
<?php include ('../../includes/footer.php'); 
$connection->close();
?>
