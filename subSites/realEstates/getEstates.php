<?php

    


if (isset($_POST["filterEstates"])) {
echo 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $filter=[];

    if (isset($_POST["cityEs"])) {
        $filter["city"]=$_POST["cityEs"];
    }
    if (isset($_POST["typeEs"])) {
        $filter["type"]=$_POST["typeEs"];
    }
    // if (isset($_POST["minEs"])) {
    //     $filter["min"]=$_POST["minEs"];
    // }
    // if (isset($_POST["maxEs"])) {
    //     $filter["max"]=$_POST["maxEs"];
    // }

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
    city.name as `city`,
    estatetypes.type,
    energy_classes.class as `en-class`
    FROM estates
    INNER JOIN city ON (estates.city = city.id)
    INNER JOIN estatetypes ON (estates.type = estatetypes.id)
    INNER JOIN energy_classes ON (estates.energy_class = energy_classes.id)
    WHERE "; 

    // Ovisno o količini elemenata u polju filter, prilagodi sql upit
    if (count($filter)==1) {
        foreach ($filter as $key => $value) {
            if ($key=="city") {
                $sql.="city.name='$value'";
            }
            elseif ($key=="type") {
                $sql.="estatetypes.type='$value'";
            }
            // ...
        }
    }elseif (count($filter)>1) {
        $and="";
        foreach ($filter as $key => $value) {
            if ($key=="city") {
                $sql.=$and."city.name='$value'";
                $and="AND ";
            }
            elseif ($key=="type") {
                $sql.=$and."estatetypes.type='$value'";
                $and="AND ";
            }
            // ...
        }
    }else{
        $sql.="true";
    }

    // Za debug 
    // echo '<pre>';
    // print_r($filter);
    // echo '</pre>';
    // echo $sql;

    $result = $connection->query($sql);
    $result=fillResults($result);
    
}else{
    $sql = "SELECT 
    estates.price,
    estates.rooms,
    estates.property_size,
    estates.id,
    city.name as `city`,
    estatetypes.type,
    energy_classes.class as `en-class`
    FROM estates
    INNER JOIN city ON (estates.city = city.id)
    INNER JOIN estatetypes ON (estates.type = estatetypes.id)
    INNER JOIN energy_classes ON (estates.energy_class = energy_classes.id)"; 
    $result = $connection->query($sql);
    $result=fillResults($result);
}


function fillResults($result){
    $resultAds="";
    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
    
            $imgPath='../../img/estates/'.$row['id'].'/';
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
                <p class="card-text">E-class: <b>'.$row["en-class"].'</b></p>
                <p class="card-text text-center text-muted">ID: <b>'.$row["id"].'</b></p>
                <p class="card-text text-center text-muted hov"><a href="../activePost/activePost.php?id='.$row["id"].'"><b>More info ></b></a></p>
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


$connection->close();
?>