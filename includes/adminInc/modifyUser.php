<?php

if(isset($_POST["save"]))
{
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$phone_nmb = $_POST["phone_nmb"];
    
    if (isset($_POST["isAdmin"])) {
       $admin=1;
    }else{
        $admin=0;
    }

	// provjere
    $id=$_GET["userId"];
    
	$query_ins = "UPDATE users SET 
					firstname = '$firstname',
					lastname = '$lastname',
					email = '$email',
					phone_nmb = '$phone_nmb',
					isAdmin = '$admin'
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

if(isset($_GET["userId"]) && $_GET["userId"] > 0)
{
	$userId = $_GET["userId"];
	
	$query = "SELECT * FROM users WHERE id = '$userId'";
	$result = mysqli_query($connection, $query);
	
	$user = mysqli_fetch_array($result);
	
	$firstname  = $user["firstname"];
	$lastname = $user["lastname"]; 
	$email   = $user["email"];
	$phone_nmb  = $user["phone_nmb"];
	$isAdmin = $user["isAdmin"];

}
else
{
	$firstname  = "";
	$lastname = ""; 
	$email   = "";
	$phone_nmb  = "";
	$isAdmin = "";
}



echo '
<div class="col-6">
<div class="card-body">
<form method="POST" action="" class="form-horizontal">

    <div class="form-group row">
        <label for="fname" class="col-sm-3 text-right control-label col-form-label">First Name</label>
        <div class="col-sm-9">
            <input name="firstname" type="text" class="form-control" id="fname" placeholder="First Name Here" value="'.$firstname.'">
        </div>
    </div>
    <div class="form-group row">
        <label for="flname" class="col-sm-3 text-right control-label col-form-label">Last Name</label>
        <div class="col-sm-9">
            <input name="lastname" type="text" class="form-control" id="flname" placeholder="Last Name Here" value="'.$lastname.'">
        </div>
    </div>
    <div class="form-group row">
        <label for="flname" class="col-sm-3 text-right control-label col-form-label">Last Name</label>
        <div class="col-sm-9">
            <input name="email" type="text" class="form-control" id="flname" placeholder="Last Name Here" value="'.$email.'">
        </div>
    </div>

    <div class="form-group row">
        <label for="phone-mask" class="col-sm-3 text-right control-label col-form-label">Phone</label>
        <div class="col-sm-9">
        <input name="phone_nmb" value="'.$phone_nmb.'" type="number" class="form-control" id="phone-mask" placeholder="Enter Phone Number">
        </div>
    </div>
    
    
    <div class="form-group row">
        <label class="col-sm-3 text-right">Has admin rights</label>
        <div class="col-md-9">
            <div class="custom-control custom-checkbox mr-sm-2">';

            if ($isAdmin==1) {
                echo '<input name="isAdmin" type="checkbox" class="custom-control-input" id="customControlAutosizing1" checked>';
            }else{
                echo '<input name="isAdmin" type="checkbox" class="custom-control-input" id="customControlAutosizing1">';
            }

            echo '
                <label class="custom-control-label" for="customControlAutosizing1"></label>
            </div>
        </div>
    </div>

	
	<br />
	
	<input class="btn btn-primary" type="submit" name="save" value="Save" />

</form>
</div>
</div>';


?>