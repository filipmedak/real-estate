<?php

    $servername="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbName="estateproject";
    

    $connection=mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

    if(!$connection){
        die("Database connection error: ".mysqli_connect_error());

}