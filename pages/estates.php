<div id="realEsateContent">
    <form action="" method="POST" class="mt-5">
        
        <div class="form-group">
        <h4 class="text-center mb-5">Filter your search</h4>
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

            
            <select class="form-control" name="en_class" id="en_class">
                    <option value="">Energy class:</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
            </select>

            <div class="input-group range-slider">
                <p>Min/max price</p>
                <span class="rangeValues"></span><br>
                <input value="500" min="500" max="100000" step="500" type="range" id="minSlider" name="minEs">
                <input value="100000" min="500" max="100000" step="500" type="range" id="maxSlider" name="maxEs">
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
            <button id="filterSubmit" class="btn btn-success" value="submit" name="filterEstates" type="submit">Search</button>
        </div>
                
    </form>

    <div id="searchResults">  

        <div class="card-deck">

        <?php
        include("inc/getEstates.php");
        echo $result;
        ?>
            
        </div> 

        <nav>
            <ul class="pagination justify-content-center my-5">

                <?php

                $sql = "SELECT COUNT(id) as posts FROM estates WHERE status = 1";

                $result = mysqli_query($connection, $sql);
                $count=mysqli_fetch_array($result);
   
                $pageNumbers='<li class="page-item"><a class="page-link" href="index.php?p=estates&pag=1">1</a></li>';
                $pageNum=1;
                $div=1;
                for($i=0; $i <= $count["posts"]; $i++){
                    $div++;

                    if($div == 12){
                        $pageNum++;
                        $pageNumbers.= '<li class="page-item"><a class="page-link" href="index.php?p=estates&pag='.$pageNum.'">'.$pageNum.'</a></li>';
                        $div=0;  
                    }
                }
                
                echo $pageNumbers;
                ?>
                

            </ul>
        </nav>

    </div>
</div>
