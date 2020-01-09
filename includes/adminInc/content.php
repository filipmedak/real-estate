<?php
if (isset($_POST["submit"])) {

    $type=trim($_POST["type"]);
    $location=trim($_POST["location"]);
    $price=trim($_POST["price"]);
    $rooms=trim($_POST["rooms"]);
    $size=trim($_POST["size"]);

    $type = mysqli_real_escape_string($connection, $type);
    $location = mysqli_real_escape_string($connection, $location);
    $price = mysqli_real_escape_string($connection, $price);
    $rooms = mysqli_real_escape_string($connection, $rooms);
    $size = mysqli_real_escape_string($connection, $size);

    $sql = "SELECT id FROM estates ORDER BY id DESC LIMIT 1";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    $id=$row["id"]+1;

    $target_dir = "../../img/estates/'.$id.'/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



$sql = "INSERT INTO estates (type, location, price, rooms, size)
        VALUES ('$type', '$location', '$price', '$rooms', '$size')";


if (!mysqli_query($connection,$sql)) {
    die('Error: ' . mysqli_error($connection));
  }
  echo '<p class="text-white bg-success p-3">1 record successfuly added</p>';
  
  mysqli_close($connection);
}

?>

<form class="content-form py-5" action="" method="post">
    <h2 class="mb-4">Add a real estate</h2>
    <div>
    <div class="my-2 px-4"><span>Type of a real estate:</span>
    <select name="type">
    <option value="house">House</option>
    <option value="flat">Flat</option>
    <option value="apartment">Apartment</option>
    <option value="cottage">Cottage</option>
    </select></div>
    <br>
    <div class="my-2 px-4"><span>Location: </span><input name="location" type="text"></div>
    <div class="my-2 px-4"><span>Price in €: </span><input name="price" type="number"></div>
    <div class="my-2 px-4"><span>Size(m²): </span><input name="size" type="number"></div>
    <div class="my-2 px-4"><span>Number of rooms: </span><input name="rooms" type="number"></div>
    <div class="my-2 px-4"><span>Image: </span><input class="imgUpload" type="file" name="fileToUpload" id="fileToUpload"></div>
    </div>

    <button class="bg-lightblue text-white border-none mt-3 pl-5 pr-5" type="submit" value="Add" name="submit">Submit</button>
</form>