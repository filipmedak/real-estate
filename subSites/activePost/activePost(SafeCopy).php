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
    $sql="SELECT * FROM estates WHERE id=$id";
    

    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $location=ucfirst($row["city"]);
        $type=ucfirst($row["type"]);
        $imgPath='../../img/estates/'.$id.'/';
        $images=scandir($imgPath);
        unset($images[0]);
        unset($images[1]);

        echo '<div class="background">
        <div class="activePost">
        <h2 class="text-center pt-5 pb-3">'.$type.' in '.$location.'</h2>
        <p class="smallDescription pt-2">'.$row["price"].'€ ~ '.($row["price"]*7.44).'kn</p>';

        echo'
        <div id="index-gallery">
            <div class="gallery-img">
                <img src="'.$imgPath.'thumbnail/img1.jpg" class="mainImg galleryImg">
            </div>
            <div class="gallery-img">
                <img src="'.$imgPath.'thumbnail/img2.jpg" class="secImg galleryImg">
            </div>
            <div class="gallery-img">
                <img src="'.$imgPath.'thumbnail/img3.jpg" class="secImg galleryImg">
            </div>
            <div class="gallery-img">
                <img src="'.$imgPath.'thumbnail/img4.jpg" class="secImg galleryImg">
            </div>
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
            '<div class="basicInformationGrid blue">
                <p>Location:</p>
                <p class="boldWhite">'.$location.'</p>
            </div>
            <div class="basicInformationGrid">
                <p>Estate type:</p>
                <p class="boldBlack">'.$type.'</p>
            </div>  
            <div class="basicInformationGrid blue">
                <p>Number of rooms:</p>
                <p class="boldWhite">'.$row["rooms"].'</p>
            </div>  
            <div class="basicInformationGrid">
                <p>Floors:</p>
                <p class="boldBlack">'.$row["floors"].'</p>
            </div>  
            <div class="basicInformationGrid blue">
                <p>Property size:</p>
                <p class="boldWhite">'.$row["property_size"].'m²</p>
            </div>  
            <div class="basicInformationGrid">
                <p>Living space:</p>
                <p class="boldBlack">'.$row["living_space"].'m²</p>
            </div> 
            <div class="basicInformationGrid blue">
                <p>Terrace:</p>
                <p class="boldWhite">';
                    if($row["terrace"] == 1){
                        echo 'Yes';
                    }
                    else if($row["terrace"] == 0){
                        echo 'No';
                    }
                    else{
                        echo '-';
                    } 
                echo '</p>
            </div>  
            <div class="basicInformationGrid">
               <p>Balcony:</p>
               <p class="boldBlack">'; 
                    if($row["balcony"] == 1){
                        echo 'Yes';
                    }
                    else if($row["balcony"] == 0){
                        echo 'No';
                    }
                    else{
                        echo '-';
                    } 
               echo '</p>
            </div>  
            <div class="basicInformationGrid blue">
                <p>Year of construction:</p>
                <p class="boldWhite">'.$row["construction_year"].'</p>
            </div>
            <div class="basicInformationGrid">
               <p>Last renovation:</p>
               <p class="boldBlack">'.$row["last_renovation"].'</p>
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

<!---------------------------------------------------- NEW CONTENT!! --------------------------------------------------------------->
    
<?php include ('../../includes/footer.php'); 
$connection->close();
?>
