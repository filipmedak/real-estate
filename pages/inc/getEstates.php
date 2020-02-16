<?php

if(isset($_GET["pag"])){
    $offset = ($_GET["pag"] - 1) * 12;
}
else{
    $offset = 0;
}

if (isset($_POST["filterEstates"])) {
    $filter=[];

    if (isset($_POST["cityEs"])) {
        $filter["city"]=$_POST["cityEs"];
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
    }

    //Provjerava da li postoje prazne vrijednosti, zbog toga što inputi imaju value=""
    function checkForValues($filter){

        foreach ($filter as $key => $value) {
            if ($value=="") {
                unset($filter[$key]);
            }
        }

        return $filter;
    }

    $filter=checkForValues($filter);

    //Priprema sql querya
    $sql="SELECT 
    estates.price,
    estates.rooms,
    estates.property_size,
    estates.id,
    estates.energy_class,
    city.name as `city`,
    estatetypes.type
    FROM estates
    INNER JOIN city ON (estates.city = city.pbr)
    INNER JOIN estatetypes ON (estates.type = estatetypes.id)
    WHERE estates.status=1 "; 

    // Ovisno o količini elemenata u polju filter, prilagodi sql upit
        foreach ($filter as $key => $value) {
            if ($key=="city") {
                $sql.="AND city.pbr='$value' ";
                
            }
            elseif ($key=="type") {
                $sql.="AND estatetypes.id='$value' ";
                
            }
            elseif ($key=="balcony") {
                $sql.="AND estates.balcony=1 ";
                
            }
            elseif ($key=="terrace") {
                $sql.="AND estates.terrace=1 ";
                
            }
            elseif ($key=="parking") {
                $sql.="AND estates.parking=1 ";
                
            }
            elseif ($key=="garage") {
                $sql.="AND estates.garage=1 ";
                
            }
            elseif ($key=="lift") {
                $sql.="AND estates.lift=1 ";
                
            }
            elseif ($key=="barrier_free") {
                $sql.="AND estates.barrier_free=1 ";
                
            }
            elseif ($key=="min") {
                $sql.="AND estates.price>$value ";
                
            }
            elseif ($key=="max") {
                $sql.="AND estates.price<$value ";
                
            }
            elseif ($key=="en_class") {
                $sql.="AND estates.energy_class='$value' ";
            }
            
            // ...
        }
        $sql.="LIMIT 12 OFFSET $offset ";
    

    // Za debug 
    // echo '<pre>';
    // print_r($filter);
    // echo '</pre>';
    // echo $sql;

    $result = $connection->query($sql);
    $result=fillResults($result);
    
}else{

    if (isset($_GET["userId"])){
        $userId=$_GET["userId"];
        $sql = "SELECT 
        estates.price,
        estates.rooms,
        estates.property_size,
        estates.id,
        estates.energy_class,
        city.name as `city`,
        estatetypes.type
        FROM estates
        INNER JOIN city ON (estates.city = city.pbr)
        INNER JOIN estatetypes ON (estates.type = estatetypes.id)
        LEFT JOIN users ON (estates.posted_by=users.id) WHERE estates.status=1 AND estates.posted_by=$userId LIMIT 12 OFFSET $offset "; 
        $result = $connection->query($sql);
        $result=fillResults($result);
    }else{
        $sql = "SELECT 
        estates.price,
        estates.rooms,
        estates.property_size,
        estates.id,
        estates.energy_class,
        city.name as `city`,
        estatetypes.type
        FROM estates
        INNER JOIN city ON (estates.city = city.pbr)
        INNER JOIN estatetypes ON (estates.type = estatetypes.id)
        LEFT JOIN users ON (estates.posted_by=users.id) WHERE estates.status=1 LIMIT 12 OFFSET $offset ";
        $result = $connection->query($sql);
        $result=fillResults($result);
    }


}


function fillResults($result){
    $resultAds="";
    // $_SESSION["numRows"]=$result->num_rows;
    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
    
            $imgPath='img/estates/'.$row['id'].'/';
            $images=scandir($imgPath);

    
            $location=ucfirst($row["city"]);
            $type=ucfirst($row["type"]);
    
            $resultAds.='<div class="card shadow-lg mt-5 mb-5" data-aos="fade-up" data-aos-duration="1500">
            <img src='.$imgPath.$images[2].' class="card-img-top" alt="Real estate image">
            <div class="card-body">
                <h3 class="card-title text-center pb-1">'.$type.' in '.$location.'</h3>
                <p class="card-text">Price: <b>'.$row["price"].'€</b></p>
                <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>'.$row["rooms"].'</b></p>
                <p class="card-text">Location: <b>'.$location.'</b></p>
                <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i>Size: '.$row["property_size"].'m²</b></p>
                <p class="card-text">E-class: <b>'.$row["energy_class"].'</b></p>
                <p class="card-text text-center text-muted">ID: <b>'.$row["id"].'</b></p>
                <p class="card-text text-center text-muted hov"><a href="index.php?id='.$row["id"].'&p=inc/activePost"><b>More info ></b></a></p>
            </div>
        </div>';
        }
    
    } else {$resultAds.='
    <div class="alert alert-dismissible alert-warning">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4 class="alert-heading">No matches!</h4>
        <p class="mb-0">Try <a href="#" class="alert-link">reseting the filter</a>.</p>
    </div>';}

    return $resultAds;
}

?>