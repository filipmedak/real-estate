
<?php

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

    if (isset($_POST["heating"])) {
        $heating=$_POST["heating"];
    }else{$heating="Not specified";}

    if (isset($_POST["energy_class"])) {
        $energy_class=$_POST["energy_class"];
    }else{$energy_class="Not specified";}

    if (isset($_POST["construction_year"])) {
        $construction_year=$_POST["construction_year"];
    }else{$construction_year="Not specified";}

    if (isset($_POST["last_renovation"])) {
        $last_renovation=$_POST["last_renovation"];
    }else{$last_renovation="Not specified";}

    if (isset($_POST["barrier-free"])) {
        $barrier_free=1;
    }else{$barrier_free=0;}

    if (isset($_POST["garage"])) {
        $garage=1;
    }else{$garage=0;}

    if (isset($_POST["lift"])) {
        $lift=1;
    }else{$lift=0;}

    if (isset($_POST["living_space"])) {
        $living_space=$_POST["living_space"];
    }else{$living_space=0;}
    
    if (isset($_POST["description"])) {
        $description=$_POST["description"];
    }else{$description="No description provided";}
    
    $userId=$_SESSION["user_id"];
    $sql = "INSERT INTO estates (posted_by, type, city, price, rooms, property_size, internet, parking, barrier_free, garage, lift, description, living_space, floors, heating_system, energy_class, construction_year, last_renovation)
        VALUES ('$userId', '$type_id', '$city_id', '$price', '$rooms', '$property_size', '$internet', '$parking', '$barrier_free', '$garage', '$lift', '$description', '$living_space', '$floors', '$heating', '$energy_class', '$construction_year', '$last_renovation')";
    
    if ($connection->query($sql) === TRUE) {
        echo'<div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Successfully added an estate!</h4>
            </div>';
    } else {
        echo'<div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">There was an error, please try again!</h4>
            </div>';
            // <p>'.$connection->error.'</p>'.$sql.'
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

        $target1 = 'img/estates/'.$id.'/thumbnail/'.$newname;
        move_uploaded_file( $_FILES['images']['tmp_name'][$i], $target1);

        $target2 = 'img/estates/'.$id.'/'.$newname;

        copy($target1,$target2);
        
    
    }
    // --------------------------------MULTIPLE IMAGE UPLOAD  
}

$userId=$_SESSION["user_id"];

$sql="SELECT * FROM users WHERE id='$userId'";

$result=mysqli_query($connection, $sql);

if (mysqli_num_rows($result)>0) {
    $row = mysqli_fetch_assoc($result);

    $firstname=$row["firstname"];
    $lastname=$row["lastname"];
    $email=$row["email"];
    $phone_nmb=$row["phone_nmb"];

    if ($row["isAdmin"]) {
        $adminLink=true;
    }else{
        $adminLink=false;
    }
}
else{
    echo 'Something went wrong';
}

?>

<div class="container my-5">
    <h1 class="text-center mb-5">Profile</h1>
    <div id="profileBtn">
        <a href="logout.php" class="btn btn-info d-block ">Sign out</a>
        <?php

        if ($adminLink) {
        echo ' <a href="admin.php" class="btn btn-warning d-block ">Admin Panel</a>';
        }

        ?>

    </div>
    <div class="card border-info mb-3" style="">
    <div class="card-header bg-info text-white">Personal information</div>
    <div class="card-body">
        <?php
                echo '
                <p><strong>Name</strong>: '.$firstname.' '.$lastname.'</p>
                <p><strong>E-mail</strong>: '.$email.'</p>
                <p><strong>Phone number</strong>: '.$phone_nmb.'</p>
                ';
        ?>
    </div>
    </div>

    <h3 class="text-center my-5 mx-auto">Your active posts</h3>
    <hr>
    <div id="userPosts">
   
    <?php
    $userId=$_SESSION["user_id"];
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
        INNER JOIN users ON (estates.posted_by=users.id) WHERE estates.status=1 AND users.id='$userId'";
    
    $result=mysqli_query($connection, $sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $imgPath='img/estates/'.$row['id'].'/';
            $images=scandir($imgPath);

    
            $location=ucfirst($row["city"]);
            $type=ucfirst($row["type"]);
    
            echo '
            <div class="card shadow-lg mt-5 mb-5 ">
            <img src='.$imgPath.$images[2].' class="card-img-top" alt="Real estate image">
            <div class="card-body">
                <h3 class="card-title text-center pb-1">'.$type.' in '.$location.'</h3>
                <p class="card-text">Price: <b>'.$row["price"].'€</b></p>
                <p class="card-text"><i class="fas fa-bed"></i> Rooms: <b>'.$row["rooms"].'</b></p>
                <p class="card-text">Location: <b>'.$location.'</b></p>
                <p class="card-text"><i class="fas fa-expand-arrows-alt"></i></i> Size: '.$row["property_size"].'m²</b></p>
                <p class="card-text">E-class: <b>'.$row["energy_class"].'</b></p>
                <p class="card-text text-center text-muted">ID: <b>'.$row["id"].'</b></p>
                <p class="card-text text-center text-muted hov"><a href="index.php?id='.$row["id"].'&p=inc/activePost"><b>More info ></b></a></p>
            </div>
        </div>';
        }

    }
?>

</div>
<hr>

        <div class="mx-auto">
            <div class="card  border-info">
            <form class="form-horizontal" action="" method="POST" enctype='multipart/form-data'>
            <h4 class="card-title my-5 text-center">Ad an estate</h4>
                <div class="card-body row">
                    
                    <div class="col-6">
                        <!-- ============================================================== -->
                                                <!-- CITY INPUT -->
                        <!-- ============================================================== -->
                        <div class="form-group row">
                            <label class="col-sm-5 text-right control-label col-form-label">Select city</label>
                            <div class="col-sm-7">
                                <select class="select2 form-control custom-select" name="city_id" style="width: 100%; height:36px;" required>
                                        <?php

                                        $sql = "SELECT * FROM city ORDER BY name ASC";
                                        $result = mysqli_query($connection, $sql);

                                        while($row = mysqli_fetch_array($result)){
                                            echo '<option value="'.$row["pbr"].'">'.ucfirst($row["name"]).'</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                                                <!-- TYPE INPUT -->
                        <!-- ============================================================== -->
                        <div class="form-group row">
                            <label class="col-sm-5 text-right control-label col-form-label">Type of estate</label>
                            <div class="col-sm-7">
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
                        <!-- ============================================================== -->
                                                <!-- PRICE INPUT -->
                        <!-- ============================================================== -->
                        <div class="form-group row">
                            <label for="price" class="col-sm-5 text-right control-label col-form-label">Price (€)</label>
                            <div class="col-sm-7">
                                <input name="price" type="number" class="form-control" id="price" placeholder="Price Here" required>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                                                <!-- ROOMS INPUT -->
                        <!-- ============================================================== -->
                        <div class="form-group row">
                            <label for="rooms" class="col-sm-5 text-right control-label col-form-label">Number of
                                rooms</label>
                            <div class="col-sm-7">
                                <input name="rooms" type="number" class="form-control" id="rooms" placeholder="Rooms Here">
                            </div>
                        </div>
                        <!-- ============================================================== -->
                                                <!-- Floors INPUT -->
                        <!-- ============================================================== -->
                        <div class="form-group row">
                            <label for="floors" class="col-sm-5 text-right control-label col-form-label">Floors</label>
                            <div class="col-sm-7">
                                <input name="floors" type="number" class="form-control" id="floors" placeholder="Floors">
                            </div>
                        </div>
                        <!-- ============================================================== -->
                                                <!-- PROPERTY SIZE INPUT -->
                        <!-- ============================================================== -->
                        <div class="form-group row">
                            <label for="p_size" class="col-sm-5 text-right control-label col-form-label">Property size m2</label>
                            <div class="col-sm-7">
                                <input name="property-size" type="number" class="form-control" id="p_size" placeholder="Property size">
                            </div>
                        </div>
                        <!-- ============================================================== -->
                                                <!-- LIVING SPACE INPUT -->
                        <!-- ============================================================== -->
                        <div class="form-group row">
                            <label for="p_size" class="col-sm-5 text-right control-label col-form-label">Living space m2</label>
                            <div class="col-sm-7">
                                <input name="living_space" type="number" class="form-control" id="l_space" placeholder="Living space">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- ============================================================== -->
                                                <!-- CONSTRUCTION YEAR INPUT -->
                        <!-- ============================================================== -->
                        <div class="form-group row">
                            <label for="p_size" class="col-sm-5 text-right control-label col-form-label">Year of construction</label>
                            <div class="col-sm-7">
                                <input name="construction_year" type="number" class="form-control" id="y_construction" placeholder="Year of construction">
                            </div>
                        </div>
                        <!-- ============================================================== -->
                                                <!-- LAST RENOVATION INPUT -->
                        <!-- ============================================================== -->
                        <div class="form-group row">
                            <label for="p_size" class="col-sm-5 text-right control-label col-form-label">Last renovated(Year)</label>
                            <div class="col-sm-7">
                                <input name="last_renovation" type="number" class="form-control" id="ly_renov" placeholder="Year of last renovation">
                            </div>
                        </div>
                        <!-- ============================================================== -->
                                                <!-- ENERGY CLASS INPUT -->
                        <!-- ============================================================== -->
                        <div class="form-group row">
                            <label class="col-sm-5 text-right control-label col-form-label">Energy class</label>
                            <div class="col-sm-7">
                                <select class="select2 form-control custom-select" name="energy_class" style="width: 100%; height:36px;" required>
                                    <option value="">Energy class:</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                </select>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                                                <!-- HEATING INPUT -->
                        <!-- ============================================================== -->
                        <div class="form-group row">
                            <label for="p_size" class="col-sm-5 text-right control-label col-form-label">Heating system</label>
                            <div class="col-sm-7">
                                <input name="heating" type="text" class="form-control" id="" placeholder="Heating">
                            </div>
                        </div>
                        <!-- ============================================================== -->
                                                <!-- ADDITIONAL INFO INPUT -->
                        <!-- ============================================================== -->
                        <div class="form-group row">
                            <label class="col-sm-5 text-right">Additional info</label>
                            <div class="col-md-7">
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
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input name="balcony" type="checkbox" class="custom-control-input" id="customControlAutosizing6">
                                    <label class="custom-control-label" for="customControlAutosizing6">Balcony</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input name="terrace" type="checkbox" class="custom-control-input" id="customControlAutosizing7">
                                    <label class="custom-control-label" for="customControlAutosizing7">Terrace</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                                                <!-- DESCRIPTION INPUT -->
                    <!-- ============================================================== -->                       
                    <div class="form-group row col-12">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea name="description" class="form-control" rows="8"></textarea>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                                                <!-- IMAGE UPLOAD -->
                    <!-- ============================================================== -->  
                    <div class="form-group row col-12">
                        <label class="col-sm-3 text-right">Image Upload</label>
                        <div class="col-md-9">
                            <input type="file" name="images[]" id="images" multiple required accept="image/jpg">
                        </div>
                    </div>
                </div>
       <div class="border-top">
                    <div class="card-body ">
                        <button type="submit" name="post_estate" class="btn btn-info mx-auto d-block">Post estate</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>

</div>
