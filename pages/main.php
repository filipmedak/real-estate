    <!-- Search engine -->
    <div id='searchEngine' class="text-center p-4">
      <div id="searchEngineBar" class="p-4">
        <div id="searchEngineBarText" class="p-4" data-aos="zoom-in" data-aos-duration="2000">
          <form action="index.php?p=estates" method="POST" class="mt-5">
          <div class="form-group">

                <h2 class="mb-4">Find your real estate</h2>

                <select class="form-control" name="cityEs" id="realEstateLocation">
                    <option value="">Location:</option>
                    <?php 
                    
                    $query_state = "SELECT * FROM city ORDER BY name ASC";
                    $result_state = mysqli_query($connection, $query_state);

                    while($row = mysqli_fetch_array($result_state))
                    {
                        $pbr = $row["pbr"];
                        $name = ucfirst($row["name"]);

                        echo '<option value="'.$pbr.'">'.$name.'</option>';
                    }

                    ?>
                </select>
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
                    <input value="500" min="500" max="100000" step="500" type="range" id="minSlider" name="minEs">
                    <input value="100000" min="500" max="100000" step="500" type="range" id="maxSlider" name="maxEs">
                </div>


                <div id="searchEngineBarTextDetails">
                <div class="form-check form-check-inline">
                        <input class="form-check-input custom-control custom-checkbox" type="checkbox" id="checkBalcony" name="balcony">
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
                <button class="btn btn-success" value="submit" name="filterEstates" type="submit">Search</button>
            </div>
                  
          </form>
        </div>
      </div>
    </div>
    <!-- Search engine !END! -->

    <!-- Promo -->
    <div id="promo" class="mt-5 mb-5 pt-5 pb-5">
      <div class="card-deck">

        <?php 
                    
        $query="SELECT estates.*,
        city.name as `city`,
        estatetypes.type
        FROM estates
        INNER JOIN city ON (estates.city = city.pbr)
        INNER JOIN estatetypes ON (estates.type = estatetypes.id)
        WHERE estates.status='1' AND estates.city = city.pbr
        ORDER BY RAND()
        LIMIT 4";
        
        $query_result = $connection->query($query);
        if($query_result->num_rows > 0)
        {
          while($row = $query_result->fetch_assoc()){

            $id = $row["id"];
            $location = ucfirst($row["city"]);
            $type=ucfirst($row["type"]);
            $imgPath='img/estates/'.$id.'/';

            echo '
            <div class="card shadow-lg mb-5" data-aos="fade-right" data-aos-duration="1500">
              <img src="'.$imgPath.'img1.jpg" class="card-img-top" alt="Real estate image">
                <div class="card-body">
                  <h3 class="card-title text-center pt-3 pb-1">'.$type.' in '.$location.'</h5>
                  <p class="card-text">Price: <b>'.$row["price"].'€</b></p>
                  <p class="card-text">Type: <b>'.$type.'</b></p>
                  <p class="card-text">Location: <b>'.$location.'</b></p>
                  <div class="cardIcon">
                    <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i>Size: <b>'.$row["property_size"].'²</b></p>
                    <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>'.$row["rooms"].'</b></p>
                    <p class="card-text text-center text-muted">ID: <b>'.$row["id"].'</b></p>
                    <p class="card-text text-start text-muted""><a href="index.php?id='.$id.'&p=inc/activePost"><b>More ></b></a></p>
                  </div>
                </div>
            </div>';

          }
        }

        ?>
      </div>
    </div>

    <!-- Promo !END! -->

    <!-- Services -->
    <div id="services">
      <div id="servicesBar">
        <div id="servicesContent" class="mt-5 mb-5 text-center">
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