<?php include ('../../includes/headerTop.php'); ?>

<?php include ('../../includes/headerMiddle.php'); ?>

<link rel="stylesheet" href="../../css/style.css">
<link rel="stylesheet" href="activePost.css">



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
<!-- GLAVNA SLIKA IZNAD SMALL IMAGE GALLERY -->
<!--<img src='.$imgPath.$images[2].' class="card-img-top p-3 mainImg" alt="Real estate image"> -->

<!-- FOR EACH UNUTAR SMALL IMAGE GALLERY -->    
<!-- foreach ($images as $key => $value) {
            echo '<img src='.$imgPath.$value.' class="card-img-top p-1" alt="Real estate image">';
        } -->

<?php
    require_once("../../includes/dbh.inc.php");

    $id=$_GET["id"];
    $sql="SELECT * FROM estates WHERE id=$id";
    

    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $location=ucfirst($row["location"]);
        $type=ucfirst($row["type"]);
        $imgPath='../../img/estates/'.$id.'/';
        $images=scandir($imgPath);
        unset($images[0]);
        unset($images[1]);

        echo '<div class="background">
        <div class="activePost">
        <h2 class="text-center pt-5 pb-3">'.$type.' in '.$location.'</h2>
        <p class="smallDescription pt-2">'.$row["price"].'€ ~ '.($row["price"]*7.44).'kn</p>
        
        <section id="index-gallery" class="wrapper-gallery">
            <div class="gallery-img img1">
                <div><a href="#">Click for bigger image</a></div>
            </div>
            <div class="gallery-img img2">
                <div><a href="#">Click</a></div>
            </div>
            <div class="gallery-img img3">
                <div><a href="#">Click</a></div>
            </div>
            <div class="gallery-img img4">
                <div><a href="#">Click</a></div>
            </div>
        </section>
        ';
        

        echo'
        <div id="smallDescription" class="mt-4">
            <p>Post ID: <span>'.$id.'</span></p>
            <p>Posted: <span>25.11.2019</span></p>
        </div>
        <a href="#" class="mb-3"><button type="button" class="btn btn-dark mt-3 pl-5 pr-5">Send a message</button></a>
        <div id="smallDescriptionImportant" class="text-center mt-4">
            <div>
                <p class="bolderP pt-3"><i class="fas fa-expand-arrows-alt"></i><br>Estate m²</p>
                <p>'.$row["size"].'m²</p>
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
            // <h3 class="mt-5 mb-5">Basic Information</h3>
            echo '<div class="basicInformationGrid blue">
                <p>Location:</p>
                <p class="boldWhite">'.$location.'</p>
            </div>
            <div class="basicInformationGrid">
                <p>Estate type:</p>
                <p class="boldBlack">'.$type.'</p>
            </div>  
            <div class="basicInformationGrid blue">
                <p>Floors:</p>
                <p class="boldWhite">2</p>
            </div>  
            <div class="basicInformationGrid">
                <p>Vrsta kuće:</p>
                <p class="boldBlack">Tekst</p>
            </div>  
            <div class="basicInformationGrid blue">
                <p>Rooms:</p>
                <p class="boldWhite">'.$row["rooms"].'</p>
            </div>  
            <div class="basicInformationGrid">
                <p>Living area:</p>
                <p class="boldBlack">'.$row["size"].'m²</p>
            </div>  
            <div class="basicInformationGrid blue">
                <p>Yard surface:</p>
                <p class="boldWhite">82,37m²</p>
            </div>  
            <div class="basicInformationGrid">
                <p>Year of construction:</p>
                <p class="boldBlack">2005</p>
            </div> 
            <div class="basicInformationGrid blue">
                <p>Last renovation:</p>
                <p class="boldWhite">2015</p>
            </div>  
            <div class="basicInformationGrid">
               <p>Balcony / Terrace:</p>
               <p class="boldBlack">Both</p>
            </div>  
            <div class="basicInformationGrid blue">
                <p>Exchange:</p>
                <p class="boldWhite">No</p>
            </div>
            
        </div>

        <div class="embed ml-2 mr-5 mt-5 w-100">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2780.9369209235624!2d15.94505191556919!3d45.81252167910666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d6dbb5a8ed03%3A0x3cbbed9018ef1850!2sPivana!5e0!3m2!1shr!2shr!4v1574777272363!5m2!1shr!2shr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>     
        </div>

        <div id="additionalInformation" class="text-center">
            <h3 class="mt-5 mb-5">Additional Information</h3>
            <div class="additionalInformationGrid grey">
                <p>Heating:</p>
                <p class="boldBlack">Gas</p>
            </div>
            <div class="additionalInformationGrid">
                <p>Permissions:</p>
                <p class="boldBlack">Yes</p>
            </div>
            <div class="additionalInformationGrid grey">
                <p>Energy class:</p>
                <p class="boldBlack">B+</p>
            </div>
            <div class="additionalInformationGrid">
                <p>Object ID:</p>
                <p class="boldBlack">385712</p>
            </div>
            <div class="additionalInformationGrid grey">
                <p>Parking:</p>
                <p class="boldBlack">Yes</p>
            </div>
            <div class="additionalInformationGrid">
                <p>Garage:</p>
                <p class="boldBlack">No</p>
            </div>
            <div class="additionalInformationGrid grey">
                <p>Lift:</p>
                <p class="boldBlack">Yes</p>
            </div>
            <div class="additionalInformationGrid">
                <p>View:</p>
                <p class="boldBlack">Forrest</p>
            </div>
            <div class="additionalInformationGrid grey">
                <p>Public transportation:</p>
                <p class="boldBlack">Bus</p>
            </div>
            <div class="additionalInformationGrid">
                <p>Shops:</p>
                <p class="boldBlack">Lidl, DM (500m)</p>
            </div>
            <div class="additionalInformationGrid grey">
                <p>Kindergarten:</p>
                <p class="boldBlack">Yes (1km)</p>
            </div>
            <div class="additionalInformationGrid">
                <p>Schools:</p>
                <p class="boldBlack">Yes (2.5km)</p>
            </div>
            <div class="additionalInformationGrid grey">
                <p>Discount:</p>
                <p class="boldBlack">No</p>
            </div>
        </div>
        </div>
        </div>';
    }

    echo '<script src="../../js/gallery.js"></script>';
?>

    <!-- <div class="activePost"> -->
        <!-- <h2 class="text-center mt-5 pb-3">House in Zagreb</h2>
        <p class="smallDescription pt-2">10.000€ ~ 74.348,03kn</p>
        <img src="../../img/promoImage01.jpg" class="card-img-top p-3 mainImg" alt="Real estate image">
        <div id="smallImageGallery">
            <img src="../../img/promoImage02.jpg" class="card-img-top p-1" alt="Real estate image">
            <img src="../../img/promoImage03.jpg" class="card-img-top p-1" alt="Real estate image">
            <img src="../../img/promoImage04.jpg" class="card-img-top p-1" alt="Real estate image">
        </div>
        <div id="smallDescription" class="mt-4">
            <p>Post ID: <span>7328193</span></p>
            <p>Posted: <span>25.11.2019</span></p>
        </div>
        <a href="#" class="mb-3"><button type="button" class="btn btn-dark mt-3 pl-5 pr-5">Send a message</button></a>
        <div id="smallDescriptionImportant" class="text-center mt-4">
            <div>
                <p class="bolderP pt-3"><i class="fas fa-expand-arrows-alt"></i><br>Estate m²</p>
                <p>53,38m²</p>
            </div>
            <div>
                <p class="bolderP pt-3"><i class="fas fa-globe"></i><br>Whole m²</p>
                <p>82,37m²</p>
            </div>
            <div>
                <p class="bolderP pt-3"><i class="fas fa-bed"></i><br>Rooms</p>
                <p>4</p>
            </div>
            <div>
                <p class="bolderP pt-3"><i class="fas fa-bath"></i><br>Bathrooms</p>
                <p>2</p>
            </div>
        </div>
        
        <div id="basicInformation" class="text-center">
            <h3 class="mt-5 mb-5">Basic Information</h3>
            <div class="basicInformationGrid blue">
                <p>Location:</p>
                <p class="boldWhite">Zagreb</p>
            </div>
            <div class="basicInformationGrid">
                <p>Estate type:</p>
                <p class="boldBlack">House</p>
            </div>  
            <div class="basicInformationGrid blue">
                <p>Floors:</p>
                <p class="boldWhite">2</p>
            </div>  
            <div class="basicInformationGrid">
                <p>Vrsta kuće:</p>
                <p class="boldBlack">Tekst</p>
            </div>  
            <div class="basicInformationGrid blue">
                <p>Rooms:</p>
                <p class="boldWhite">4</p>
            </div>  
            <div class="basicInformationGrid">
                <p>Living area:</p>
                <p class="boldBlack">53,38m²</p>
            </div>  
            <div class="basicInformationGrid blue">
                <p>Yard surface:</p>
                <p class="boldWhite">82,37m²</p>
            </div>  
            <div class="basicInformationGrid">
                <p>Year of construction:</p>
                <p class="boldBlack">2005</p>
            </div> 
            <div class="basicInformationGrid blue">
                <p>Last renovation:</p>
                <p class="boldWhite">2015</p>
            </div>  
            <div class="basicInformationGrid">
               <p>Balcony / Terrace:</p>
               <p class="boldBlack">Both</p>
            </div>  
            <div class="basicInformationGrid blue">
                <p>Exchange:</p>
                <p class="boldWhite">No</p>
            </div>
            
        </div>

        <div class="embed ml-2 mr-5 mt-5 w-100">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2780.9369209235624!2d15.94505191556919!3d45.81252167910666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d6dbb5a8ed03%3A0x3cbbed9018ef1850!2sPivana!5e0!3m2!1shr!2shr!4v1574777272363!5m2!1shr!2shr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>     
        </div>

        <div id="additionalInformation" class="text-center">
            <h3 class="mt-5 mb-5">Additional Information</h3>
            <div class="additionalInformationGrid grey">
                <p>Heating:</p>
                <p class="boldBlack">Gas</p>
            </div>
            <div class="additionalInformationGrid">
                <p>Permissions:</p>
                <p class="boldBlack">Yes</p>
            </div>
            <div class="additionalInformationGrid grey">
                <p>Energy class:</p>
                <p class="boldBlack">B+</p>
            </div>
            <div class="additionalInformationGrid">
                <p>Object ID:</p>
                <p class="boldBlack">385712</p>
            </div>
            <div class="additionalInformationGrid grey">
                <p>Parking:</p>
                <p class="boldBlack">Yes</p>
            </div>
            <div class="additionalInformationGrid">
                <p>Garage:</p>
                <p class="boldBlack">No</p>
            </div>
            <div class="additionalInformationGrid grey">
                <p>Lift:</p>
                <p class="boldBlack">Yes</p>
            </div>
            <div class="additionalInformationGrid">
                <p>View:</p>
                <p class="boldBlack">Forrest</p>
            </div>
            <div class="additionalInformationGrid grey">
                <p>Public transportation:</p>
                <p class="boldBlack">Bus</p>
            </div>
            <div class="additionalInformationGrid">
                <p>Shops:</p>
                <p class="boldBlack">Lidl, DM (500m)</p>
            </div>
            <div class="additionalInformationGrid grey">
                <p>Kindergarten:</p>
                <p class="boldBlack">Yes (1km)</p>
            </div>
            <div class="additionalInformationGrid">
                <p>Schools:</p>
                <p class="boldBlack">Yes (2.5km)</p>
            </div>
            <div class="additionalInformationGrid grey">
                <p>Discount:</p>
                <p class="boldBlack">No</p>
            </div>
        </div> -->

        <!-- SUGGESTED POST HTML!!! --

        <div id="suggestedPosts" class="text-center mt-5">
            <h3 class="mb-5">More posts like this..</p>
            <div class="card-deck">
                <div class="card shadow-lg mb-5" data-aos="fade-right" data-aos-duration="1500">
                    <img src="../../img/promoImage04.jpg" class="card-img-top" alt="Real estate image">
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
                <div class="card shadow-lg mb-5" data-aos="fade-right" data-aos-duration="1500">
                    <img src="../../img/promoImage02.jpg" class="card-img-top" alt="Real estate image">
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
                <div class="card shadow-lg mb-0" data-aos="fade-right" data-aos-duration="1500">
                    <img src="../../img/promoImage03.jpg" class="card-img-top" alt="Real estate image">
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
            </div>
        </div>
   </div>

<!---------------------------------------------------- NEW CONTENT!! --------------------------------------------------------------->
    
<?php include ('../../includes/footer.php'); 
$connection->close();
?>
