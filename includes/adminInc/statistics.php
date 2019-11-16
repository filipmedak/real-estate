<?php

echo 'statistics';

$sql = "SELECT * FROM estates";
$result = $connection->query($sql);


if ($result->num_rows > 0) {
    echo '<p>There are currently '.$result->num_rows.' real estates displayed on a website.</p>';
}
else {
    echo 'There are currently no users!';
}
?>