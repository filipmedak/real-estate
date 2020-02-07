<?php
// if (isset($_POST["submit"])) {

//     $type=trim($_POST["type"]);
//     $location=trim($_POST["location"]);
//     $price=trim($_POST["price"]);
//     $rooms=trim($_POST["rooms"]);
//     $size=trim($_POST["size"]);

//     $type = mysqli_real_escape_string($connection, $type);
//     $location = mysqli_real_escape_string($connection, $location);
//     $price = mysqli_real_escape_string($connection, $price);
//     $rooms = mysqli_real_escape_string($connection, $rooms);
//     $size = mysqli_real_escape_string($connection, $size);

    // $sql = "SELECT id FROM estates ORDER BY id DESC LIMIT 1";
    // $result = $connection->query($sql);
    // $row = $result->fetch_assoc();
    // $id=$row["id"]+1;

//     $target_dir = "../../img/estates/'.$id.'/";
//     $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//     $uploadOk = 1;
//     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



// $sql = "INSERT INTO estates (type, location, price, rooms, size)
//         VALUES ('$type', '$location', '$price', '$rooms', '$size')";


// if (!mysqli_query($connection,$sql)) {
//     die('Error: ' . mysqli_error($connection));
//   }
//   echo '<p class="text-white bg-success p-3">1 record successfuly added</p>';
  
//   mysqli_close($connection);
// }

if (isset($_POST["post_estate"])) {

    $city_id=$_POST["city_id"];
    $type_id=$_POST["type_id"];
    $price=$_POST["price"];
    $rooms=$_POST["rooms"];
    $floors=$_POST["floors"];
    $property_size=$_POST["property-size"];

    $internet=$_POST["internet"];
    $parking=$_POST["parking"];
    $barrier_free=$_POST["barrier-free"];
    $garage=$_POST["garage"];

    $description=$_POST["description"];


    echo $city_id.'<br>';
    echo $type_id.'<br>';
    echo $price.'<br>';
    echo $rooms.'<br>';
    echo $floors.'<br>';
    echo $property_size.'<br>';
    echo $description.'<br>';

    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';

    $countfiles = count($_FILES['images']['name']);
    $sql = "SELECT id FROM estates ORDER BY id DESC LIMIT 1";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    $id=$row["id"]+1;
    // Looping all files
    for($i=0;$i<$countfiles;$i++){
    $filename = $_FILES['images']['name'][$i];
   
    // Upload file
    move_uploaded_file($_FILES['images']['tmp_name'][$i],'C:\xampp\htdocs\phpProject'.$filename);

    echo $filename;
    
 }

}


?>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <form class="form-horizontal" action="" method="POST" enctype='multipart/form-data'>
                <div class="card-body">
                    <h4 class="card-title">Ad an estate</h4>

                    <!-- ============================================================== -->
                                            <!-- CITY INPUT -->
                    <!-- ============================================================== -->
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Select city</label>
                        <div class="col-sm-9">
                            <select class="select2 form-control custom-select" name="city_id" style="width: 100%; height:36px;">
                                    <?php

                                    $sql = "SELECT * FROM city ORDER BY name ASC";
                                    $result = mysqli_query($connection, $sql);

                                    while($row = mysqli_fetch_array($result)){
                                        echo '<option value="'.$row["id"].'">'.ucfirst($row["name"]).'</option>';
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                                            <!-- TYPE INPUT -->
                    <!-- ============================================================== -->
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Type of estate</label>
                        <div class="col-sm-9">
                            <select class="select2 form-control custom-select" name="type_id" style="width: 100%; height:36px;">
                                    <?php

                                    $sql = "SELECT * FROM estateTypes ORDER BY type ASC";
                                    $result = mysqli_query($connection, $sql);

                                    while($row = mysqli_fetch_array($result)){
                                        echo '<option value="'.$row["id"].'">'.ucfirst($row["type"]).'</option>';
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="price" class="col-sm-3 text-right control-label col-form-label">Price (€)</label>
                        <div class="col-sm-9">
                            <input name="price" type="number" class="form-control" id="price" placeholder="Price Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rooms" class="col-sm-3 text-right control-label col-form-label">Number of
                            rooms</label>
                        <div class="col-sm-9">
                            <input name="rooms" type="number" class="form-control" id="rooms" placeholder="Rooms Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="floors" class="col-sm-3 text-right control-label col-form-label">Floors</label>
                        <div class="col-sm-9">
                            <input name="floors" type="number" class="form-control" id="floors" placeholder="Floors">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="p_size" class="col-sm-3 text-right control-label col-form-label">Property size m2</label>
                        <div class="col-sm-9">
                            <input name="property-size" type="number" class="form-control" id="p_size" placeholder="Property size">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right">Optional info</label>
                        <div class="col-md-9">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input name="parking" type="checkbox" class="custom-control-input" id="customControlAutosizing1">
                                <label class="custom-control-label" for="customControlAutosizing1">Parking</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input name="garage" type="checkbox" class="custom-control-input" id="customControlAutosizing3">
                                <label class="custom-control-label" for="customControlAutosizing3">Garage</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input name="lift" type="checkbox" class="custom-control-input" id="customControlAutosizing2">
                                <label class="custom-control-label" for="customControlAutosizing2">Lift</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input name="barrier-free" type="checkbox" class="custom-control-input" id="customControlAutosizing4">
                                <label class="custom-control-label" for="customControlAutosizing4">Barrier free
                                    access</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input name="internet" type="checkbox" class="custom-control-input" id="customControlAutosizing5">
                                <label class="custom-control-label" for="customControlAutosizing5">Internet</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right">Image Upload</label>
                        <div class="col-md-9">
                            <!-- <div class="custom-file">
                                <input type="file" name="images[]" class="custom-file-input" id="images" multiple required>
                                <label class="custom-file-label" for="images">Choose images...</label>
                            </div> -->
                            <input type="file" name="images[]" id="images" multiple>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" name="post_estate" class="btn btn-primary">Post estate</button>
                    </div>
                </div>
            </form>
        </div>