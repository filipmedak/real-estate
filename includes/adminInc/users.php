<?php

echo 'users';

$sql = "SELECT * FROM users";
$result = $connection->query($sql);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
    }
}
else {
    echo '<p>There are currently no users!</p>';
}

?>