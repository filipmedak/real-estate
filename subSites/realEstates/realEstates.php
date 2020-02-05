<?php include ('../../includes/headerTop.php'); 
    require_once '../../includes/dbh.inc.php';  
?>

<link rel="stylesheet" href="../../css/headerFooter.css">
<link rel="stylesheet" href="realEstates.css">

<?php include ('../../includes/headerMiddle.php'); ?>


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
    <form action="" method="POST" class="mt-5">
        <div class="form-group">

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



<script src="../../js/autoCorrect.js"></script>
<script type="text/javascript">
    let cities = <?php echo json_encode($cities) ?>;
</script>


<!---------------------------------------------------- NEW CONTENT!! --------------------------------------------------------------->



<?php include ('../../includes/footer.php'); ?>

