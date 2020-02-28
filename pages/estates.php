<?php

$previousSearch="";

if (isset($_POST["filterEstates"])) {

    if (isset($_GET["pag"])) {
        unset($_GET["pag"]);
    }

    $filter=[];

    if (isset($_POST["cityEs"])) {
        $filter["city"]=$_POST["cityEs"];
    }
    if (isset($_POST["search"])) {
        $filter["search"]=$_POST["search"];
        $previousSearch=$filter["search"];
    }
    if (isset($_POST["typeEs"])) {
        $filter["type"]=$_POST["typeEs"];
    }
    if (isset($_POST["balcony"])){
        $filter["balcony"]=$_POST["balcony"];
    }
    if (isset($_POST["terrace"])){
        $filter["terrace"]=$_POST["terrace"];
    }
    if (isset($_POST["parking"])){
        $filter["parking"]=$_POST["parking"];
    }
    if (isset($_POST["garage"])){
        $filter["garage"]=$_POST["garage"];
    }
    if (isset($_POST["lift"])){
        $filter["lift"]=$_POST["lift"];
    }
    if (isset($_POST["barrierFreeAccess"])){
        $filter["barrier_free"]=$_POST["barrierFreeAccess"];
    }
    if (isset($_POST["minEs"])) {
        $filter["min"]=$_POST["minEs"];
    }
    if (isset($_POST["maxEs"])) {
        $filter["max"]=$_POST["maxEs"];
    }
    if (isset($_POST["en_class"])) {
        $filter["en_class"]=$_POST["en_class"];

        $classA="";
        $classB="";
        $classC="";
        $classD="";
        $classE="";
        $classF="";
        
        switch ($filter["en_class"]) {
            case 'A':
                $classA="selected";
                break;
            case 'B':
                $classB="selected";
                break;
            case 'C':
                $classC="selected";
                break;
            case 'D':
                $classD="selected";
                break;
            case 'E':
                $classE="selected";
                break;
            case 'F':
                $classF="selected";
                break;
            default:
                # nothing...
                break;
        }
    }
    if (isset($_POST["sort"])) {
        $filter["sort"]=$_POST["sort"];

        $priceLowest="";
        $priceHighest="";
        $dateOldest="";
        $dateNewest="";
        

        switch ($filter["sort"]) {
            case 'price ASC':
                $priceLowest="selected";
                break;
            case 'price DESC':
                $priceHighest="selected";
                break;
            case 'ASC':
                $dateOldest="selected";
                break;
            case 'DESC':
                $dateNewest="selected";
                break;
            default:
                # nothing...
                break;
        }
    }
}

?>



<div id="realEsateContent">
    <form action="" method="POST" class="mt-5">
        
        <div class="form-group">
        <h4 class="text-center mb-5">Filter your search</h4>


        <div class="search-input"><i class="fas fa-search"></i><input name="search" class="form-control mb-4" type="text" placeholder="Search" value="<?php echo $previousSearch ?>"></input></div>

            <select class="form-control" name="sort" id="sort">
                <option value="">Sort by:</option>
            <?php
                echo '
                <option value="price ASC" '.$priceLowest.'>Price: Lowest first</option>
                <option value="price DESC" '.$priceHighest.'>Price: Highest first</option>
                <option value="ASC" '.$dateOldest.'>Oldest first</option>
                <option value="DESC" '.$dateNewest.'>Newest first</option>
                ';
            ?>
            </select>


            <select class="form-control" name="cityEs" id="realEstateLocation">
                    <option value="">Location:</option>
                    <?php 
                    
                    $query_state = "SELECT * FROM city ORDER BY name ASC";
                    $result_state = mysqli_query($connection, $query_state);

                    while($row = mysqli_fetch_array($result_state)){
                        $pbr = $row["pbr"];
                        $name = ucfirst($row["name"]);
                        if ($pbr==$filter["city"]) {
                            echo '<option value="'.$pbr.'" selected>'.$name.'</option>';
                        }else{
                            echo '<option value="'.$pbr.'">'.$name.'</option>';
                        }
                        
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

                    if ($id==$filter["type"]) {
                        echo '<option value="'.$id.'" selected>'.$type.'</option>';
                    }else{
                        echo '<option value="'.$id.'">'.$type.'</option>';
                    }
                    
                }

                ?>
            </select>

            
            <select class="form-control" name="en_class" id="en_class">
                    <option value="">Energy class:</option>
            <?php
                    echo '
                    <option value="A" '.$classA.'>A</option>
                    <option value="B" '.$classB.'>B</option>
                    <option value="C" '.$classC.'>C</option>
                    <option value="D" '.$classD.'>D</option>
                    <option value="E" '.$classE.'>E</option>
                    <option value="F" '.$classF.'>F</option>
                    ';
            ?>
            </select>

            <div class="input-group range-slider">
                <p>Min/max price</p>
                <span class="rangeValues"></span><br>
                <?php 
                
                $sql = "SELECT MIN(price) as `min`, MAX(price) as `max` FROM estates";
                $result = mysqli_query($connection, $sql);
                $ranges = mysqli_fetch_array($result);

                if (isset($filter["min"])) {
                    $minFilter=$filter["min"];
                }else{
                    $minFilter=$ranges["min"];
                }
                if (isset($filter["max"])) {
                    $maxFilter=$filter["max"];
                }else{
                    $maxFilter=$ranges["max"];
                }

                $min=$ranges["min"];
                $max=$ranges["max"];
                
                echo '
                <input value="'.$minFilter.'" min="'.$min.'" max="'.$max.'" step="1000" type="range" id="minSlider" name="minEs">
                <input value="'.$maxFilter.'" min="'.$min.'" max="'.$max.'" step="1000" type="range" id="maxSlider" name="maxEs">';
                

                ?>
            </div>


            <div id="searchEngineBarTextDetails">
            <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkBalcony" name="balcony" <?php if(isset($filter["balcony"])){ echo 'checked';} ?>>
                    <label class="form-check-label" for="checkBalcony">Balcony</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkTerrace" name="terrace" <?php if(isset($filter["terrace"])){ echo 'checked';} ?>>
                    <label class="form-check-label" for="checkTerrace">Terrace</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkParking" name="parking" <?php if(isset($filter["parking"])){ echo 'checked';} ?>>
                    <label class="form-check-label" for="checkParking">Parking</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkGarage" name="garage" <?php if(isset($filter["garage"])){ echo 'checked';} ?>>
                    <label class="form-check-label" for="checkGarage">Garage</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkLift" name="lift" <?php if(isset($filter["lift"])){ echo 'checked';} ?>>
                    <label class="form-check-label" for="checkLift">Lift</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="checkBarrierFreeAccess" name="barrierFreeAccess" <?php if(isset($filter["barrier_free"])){ echo 'checked';} ?>>
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

               

                $lastFilter=$_SESSION["lastUsedFilter"];
                $lastFilter=trim($lastFilter,"SELECT ");//Remove select to later add count
                $lastFilter=strstr($lastFilter, 'LIMIT', true);//Trim everything after LIMIT in sql so all results are counted
                // echo $lastFilter;
                $firstPart="SELECT count(estates.id) as `posts`, ";
                $sql=$firstPart.$lastFilter;
                
                
                $result = mysqli_query($connection, $sql);
                $count=mysqli_fetch_array($result);
                $pageNumbers=ceil($count["posts"]/12);
                $pagination="";
                for ($i=1; $i <=$pageNumbers ; $i++) { 
                    $pagination.= '<li class="page-item"><a class="page-link" href="index.php?p=estates&pag='.$i.'">'.$i.'</a></li>';
                }
                
                echo $pagination;
            
                ?>
                

            </ul>
        </nav>

    </div>
</div>
