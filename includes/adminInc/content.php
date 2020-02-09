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


    //Required, so no isset nessecary
    $city_id=$_POST["city_id"];
    $type_id=$_POST["type_id"];
    $price=$_POST["price"];

    //Not required, so isset nessecary
    if (isset($_POST["rooms"])) {
        $rooms=$_POST["rooms"];
    }else{$rooms="";}

    if (isset($_POST["floors"])) {
        $floors=$_POST["floors"];
    }else{$floors=0;}

    if (isset($_POST["property-size"])) {
        $property_size=$_POST["property-size"];
    }else{$property_size=0;}

    if (isset($_POST["internet"])){ 
        $internet=1;
    }else{$internet=0;}

    if (isset($_POST["parking"])) {
        $parking=1;
    }else{$parking=0;}

    if (isset($_POST["barrier-free"])) {
        $barrier_free=1;
    }else{$barrier_free=0;}

    if (isset($_POST["garage"])) {
        $garage=1;
    }else{$garage=0;}

    if (isset($_POST["lift"])) {
        $lift=1;
    }else{$lift=0;}
    
    if (isset($_POST["description"])) {
        $description=$_POST["description"];
    }else{$description="No description provided";}
    
    $sql = "INSERT INTO estates (type, city, price, rooms, property_size, internet, parking, barrier_free, garage, lift, description)
        VALUES ('$type_id', '$city_id', '$price', '$rooms', '$property_size', '$internet', '$parking', '$barrier_free', '$garage', '$lift', '$description')";
    
    if ($connection->query($sql) === TRUE) {
        echo'<div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Successfully added an estate!</h4>
            </div>';
    } else {
        echo'<div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Error!</h4>
                <p>'.$connection->error.'</p>
            </div>';
    }

    // --------------------------------MULTIPLE IMAGE UPLOAD
    $sql = "SELECT id FROM estates ORDER BY id DESC LIMIT 1";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    $id=$row["id"];

    $countfiles = count($_FILES['images']['name']);
    for($i=0;$i<$countfiles;$i++){
        if (!file_exists('img/estates/'.$id)) {
            mkdir('img/estates/'.$id);
            mkdir('img/estates/'.$id.'/thumbnail/');
        }

        $info = pathinfo($_FILES['images']['name'][$i]);
        $ext = $info['extension'];
        $newname = 'img'.($i+1).'.'.$ext; 

        $target = 'img/estates/'.$id.'/thumbnail/'.$newname;
        move_uploaded_file( $_FILES['images']['tmp_name'][$i], $target);

        $target = 'img/estates/'.$id.'/'.$newname;
        move_uploaded_file( $_FILES['images']['tmp_name'][$i], $target);

        
    
    }
    // --------------------------------MULTIPLE IMAGE UPLOAD  
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
                            <select class="select2 form-control custom-select" name="city_id" style="width: 100%; height:36px;" required>
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
                            <select class="select2 form-control custom-select" name="type_id" style="width: 100%; height:36px;" required>
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
                            <input name="price" type="number" class="form-control" id="price" placeholder="Price Here" required>
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
                            <input type="file" name="images[]" id="images" multiple required>
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
    </div>
    <div class="col-md-6">
        <div class="card border-top">
        <form class="form-horizontal" action="" method="POST" enctype='multipart/form-data'>
                <div class="card-body">
                    <h4 class="card-title">Modify existing estate</h4>

                    <!-- ============================================================== -->
                                            <!-- CITY INPUT -->
                    <!-- ============================================================== -->
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Select city</label>
                        <div class="col-sm-9">
                            <select class="select2 form-control custom-select" name="city_id" style="width: 100%; height:36px;" required>
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
                            <select class="select2 form-control custom-select" name="type_id" style="width: 100%; height:36px;" required>
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
                            <input name="price" type="number" class="form-control" id="price" placeholder="Price Here" required>
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
                                <input name="parking" type="checkbox" class="custom-control-input" id="custom1">
                                <label class="custom-control-label" for="custom1">Parking</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input name="garage" type="checkbox" class="custom-control-input" id="custom3">
                                <label class="custom-control-label" for="custom3">Garage</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input name="lift" type="checkbox" class="custom-control-input" id="custom2">
                                <label class="custom-control-label" for="custom2">Lift</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input name="barrier-free" type="checkbox" class="custom-control-input" id="custom4">
                                <label class="custom-control-label" for="custom4">Barrier free
                                    access</label>
                            </div>
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input name="internet" type="checkbox" class="custom-control-input" id="custom5">
                                <label class="custom-control-label" for="custom5">Internet</label>
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
                            <input type="file" name="images[]" id="images" multiple required>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" name="modify_estate" class="btn btn-info">Modify estate</button>
                    </div>
                </div>
            </form>    
            

        
        </div>
    </div>                                
</div>
