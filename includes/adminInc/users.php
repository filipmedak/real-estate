

<div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Basic Datatable</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Id</th>
                                                <th>First name</th>
                                                <th>Last name</th>
                                                <th>E-mail</th>
                                                <th>Rights</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php

$sql = "SELECT * FROM users";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    $counter=1;
    while($row = mysqli_fetch_assoc($result)) {
        
if ($row["isadmin"]==0) {
    $admin="User";
}else{
    $admin="Admin";
}

echo '

    <tr>
        <td>'.$counter.'</td>
        <td>'.$row["id"].'</td>
        <td>'.ucfirst($row["firstname"]).'</td>
        <td>'.ucfirst($row["lastname"]).'</td>
        <td>'.$row["email"].'</td>
        <td>'.$admin.'</td>
    </tr>

';
    
$counter++;

    }
} else {
    echo "0 results";
}

?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Id</th>
                                                <th>First name</th>
                                                <th>Last name</th>
                                                <th>E-mail</th>
                                                <th>Rights</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>