<?php

require_once("../../includes/dbh.inc.php");

    


if (isset($_POST["getEstates"])) {

    // $sql = "SELECT * FROM estates WHERE type='cottage'";
    // $useAnd=0;

    // if (isset($_POST["typeEs"])) {
    //     $type=$_POST["typeEs"];
    //     $sql.=' type="'.$type.'"';
    //     $useAnd=1;
    // }
    // if (isset($_POST["locationEs"])) {
    //     $location=$_POST["locationEs"];
    //     if ($useAnd) {
    //         $sql.='AND location="'.$location.'"';
    //     }else{
    //         $sql.=' location="'.$location.'"';
    //         $useAnd=1;
    //     }
       
    // }
    
    
    $sql = "SELECT * FROM estates"; //od dolje
    $result = $connection->query($sql);
    $result=fillResults($result);
    
}else{
    $sql = "SELECT * FROM estates";
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
                <h3 class="card-title text-center pb-1">'.$type.' in '.$location.'</h5>
                <p class="card-text">Price: <b>'.$row["price"].'€</b></p>
                <p class="card-text">Type: <b>'.$type.'</b></p>
                <p class="card-text"><i class="fas fa-bed"></i>Rooms: <b>'.$row["rooms"].'</b></p>
                <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i>Size: '.$row["property_size"].'m²</b></p>
                <p class="card-text">Location: <b>'.$location.'</b></p>
                <p class="card-text text-center text-muted">ID: <b>'.$row["id"].'</b></p>
                <p class="card-text text-center text-muted hov"><a href="../activePost/activePost.php?id='.$row["id"].'"><b>More ></b></a></p>
            </div>
        </div>';
        }
    
    } else {$resultAds.='<div class="my-3 bg-danger">Database conection error</div>';}

    return $resultAds;
}


$connection->close();
?>