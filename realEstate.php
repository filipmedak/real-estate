<?php
include("includes/header.php");
?>

<main>
<div class="container my-4">

<?php
require("includes/dbh.inc.php");

$sql = "SELECT * FROM estates";
$result = $connection->query($sql);


if ($result->num_rows > 0) {
    echo '<div class="row">';
    while($row = $result->fetch_assoc()) {

        $images=scandir('img/estates/'.$row['id'].'/');

        $location=ucfirst($row["location"]);
        $type=ucfirst($row["type"]);

        echo '<div class="col-lg-4 col-md-6 mb-5" data-aos="fade-up" data-aos-duration="1500">
        <img src="img/estates/'.$row["id"].'/'.$images[2].'" class="card-img-top" alt="...">
        <div class="card px-3">
            <h3 class="card-title text-center pt-3 pb-1">'.$type.' in '.$location.'</h5>
            <p class="card-text">Price: <b>'.$row["price"].'€</b></p>
            <p class="card-text">Type: <b>'.$type.'</b></p>
            <p class="card-text">Location: <b>'.$location.'</b></p>
            <div class="cardIcon">
            <p class="card-text"><img src="img/sizeIcon.png" alt=".." width="25px">Size: <b>'.$row["size"].'m²</b></p>
            <p class="card-text"><img src="img/roomIcon.png" alt=".." width="25px">Rooms: <b>'.$row["rooms"].'</b></p>
            <p class="card-text text-center text-muted">ID: <b>'.$row["id"].'</b></p>
            <p class="card-text text-start text-muted mb-2"><b>More</b>></p>
            </div>
        </div>
    </div>';

    }
    echo '</div>';
} else {
    echo '<div class="my-3 bg-danger">Database conection error</div>';
}
$connection->close();
?>

</div>
</main>

<?php
include("includes/footer.php");
?>