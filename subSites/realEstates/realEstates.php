<?php include ('../../includes/headerTop.php'); ?>

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
    <form action="" method="POST">
        <div class="form-group">
            
            <select class="form-control" id="state">
                <option>Select city:</option>
                <?php 
                
                $query_state = "SELECT * FROM city ORDER BY name";
                $result_state = mysqli_query($connection, $query_state);

                while($row = mysqli_fetch_array($result_state))
                {
                    $id = $row["id"];
                    $state = $row["name"];

                    echo '<option value="'.$id.'">'.$state.'</option>';
                }

                ?>
            </select>
             
            <select class="form-control" id="realEstateType">
                <option>Type of real estate:</option>
                <?php 
                
                $query_state = "SELECT * FROM estatetypes ORDER BY type";
                $result_state = mysqli_query($connection, $query_state);

                while($row = mysqli_fetch_array($result_state))
                {
                    $id = $row["id"];
                    $type = $row["type"];

                    echo '<option value="'.$id.'">'.$type.'</option>';
                }

                ?>
            </select>
            

            <div class="input-group range-slider">
                <p>Min/max price</p>
                <span class="rangeValues"></span><br>
                <input value="500" min="500" max="50000" step="500" type="range">
                <input value="50000" min="500" max="50000" step="500" type="range">
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

