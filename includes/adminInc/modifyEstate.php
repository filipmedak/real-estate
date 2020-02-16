<?php


if(isset($_POST["edit_estate"]))
{
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
    
    $userId=$_SESSION["user_id"];

	// provjere
    $id=$_GET["postId"];
    
	$query_ins = "UPDATE estates SET 
					city = '$city_id',
					type = '$type_id',
					price = '$price',
					rooms = '$rooms',
					floors = '$floors',
                    barrier_free = '$barrier_free',
                    garage = '$garage',
                    property_size = '$property_size',
                    lift = '$lift',
                    internet = '$internet',
                    description = '$description'
				  WHERE id = '$id'";
					
	$result_ins = mysqli_query($connection, $query_ins);
	
	if($result_ins)
	{
        echo'<div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Successfully saved changes!</h4>
            </div>';
    }
	else
	{
        echo'<div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Error!</h4>
        <p>'.$connection->error.'</p>
        </div>';
	}
}


if(isset($_GET["postId"]) && $_GET["postId"] > 0)
{
	$postId = $_GET["postId"];
	
	$query = "SELECT estates.*, 
            city.name as city,
            city.pbr as pbr,
            estatetypes.type as type,
            estatetypes.id as typeId             
            FROM estates 
            INNER JOIN city ON (estates.city=city.pbr)
            INNER JOIN estatetypes ON (estates.type=estatetypes.id)
            WHERE estates.id = '$postId' AND estates.status=1";

	$result = mysqli_query($connection, $query);
	
	$estate = mysqli_fetch_array($result);


}


?>



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
                                    echo '<option value="'.$estate["pbr"].'">'.ucfirst($estate["city"]).'</option>';
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
                        <label class="col-sm-3 text-right control-label col-form-label">Type of estate</label>
                        <div class="col-sm-9">
                            <select class="select2 form-control custom-select" name="type_id" style="width: 100%; height:36px;" required>
                                    <?php
                                    echo '<option value="'.$estate["typeId"].'">'.ucfirst($estate["type"]).'</option>';
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
                            <input value="<?php echo $estate["price"]; ?>" name="price" type="number" class="form-control" id="price" placeholder="Price Here" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rooms" class="col-sm-3 text-right control-label col-form-label">Number of
                            rooms</label>
                        <div class="col-sm-9">
                            <input value="<?php echo $estate["rooms"]; ?>" name="rooms" type="number" class="form-control" id="rooms" placeholder="Rooms Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="floors" class="col-sm-3 text-right control-label col-form-label">Floors</label>
                        <div class="col-sm-9">
                            <input value="<?php echo $estate["floors"]; ?>" name="floors" type="number" class="form-control" id="floors" placeholder="Floors">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="p_size" class="col-sm-3 text-right control-label col-form-label">Property size m2</label>
                        <div class="col-sm-9">
                            <input value="<?php echo $estate["property_size"]; ?>" name="property-size" type="number" class="form-control" id="p_size" placeholder="Property size">
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
                            <textarea name="description" class="form-control"><?php echo $estate["description"]; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" name="edit_estate" class="btn btn-primary">Submit estate</button>
                    </div>
                </div>
            </form>
        </div>
    </div>