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

//     $sql = "SELECT id FROM estates ORDER BY id DESC LIMIT 1";
//     $result = $connection->query($sql);
//     $row = $result->fetch_assoc();
//     $id=$row["id"]+1;

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

?>

<div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form class="form-horizontal">
                                <div class="card-body">
                                    <h4 class="card-title">Ad an estate</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">City</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="City Name Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Estate type</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="lname" placeholder="Estate Type Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="lname" placeholder="Price Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Number of rooms</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="lname" placeholder="Rooms Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Company</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="email1" placeholder="Company Name Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Contact No</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="cono1" placeholder="Contact No Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-3 text-right">Optional info</label>
                                    <div class="col-md-9">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing1">
                                            <label class="custom-control-label" for="customControlAutosizing1">Parking</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing3">
                                            <label class="custom-control-label" for="customControlAutosizing3">Garage</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
                                            <label class="custom-control-label" for="customControlAutosizing2">Lift</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing3">
                                            <label class="custom-control-label" for="customControlAutosizing3">Barrier free access</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing3">
                                            <label class="custom-control-label" for="customControlAutosizing3">Internet</label>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-3 text-right">Image Upload</label>
                                    <div class="col-md-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                            <label class="custom-file-label" for="validatedCustomFile">Choose image...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-primary">Post estate</button>
                                    </div>
                                </div>
                            </form>
                        </div>