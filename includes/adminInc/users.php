<?php

if(isset($_GET["do"]) && $_GET["do"]="delete")
{
        $userId=$_GET["userId"];
		$query = "DELETE FROM users WHERE id=$userId";
		$result = mysqli_query($connection, $query);
        
        if($result)
        {
            echo'<div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Successfully deleted user!</h4>
                </div>';
        }
        else
        {
            echo'<div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Error!</h4>
            <p>'.$connection->error.'</p>
            <hr>
            <p>Check if the user has any posts!</p>
            </div>';
        }
	
}

?>

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
                        <th>Posts</th>
                        <th>Rights</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

<?php

$sql = "SELECT * FROM users";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    $counter=1;
    while($row = mysqli_fetch_assoc($result)) {
    
    $userId=$row["id"];
    $countPosts = "SELECT * FROM estates WHERE posted_by=$userId";
    $resultPosts = mysqli_query($connection, $countPosts);
    $numPosts=mysqli_num_rows($resultPosts);

    if ($row["isAdmin"]==0) {
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
        <td>'.$numPosts.'</td>
        <td>'.$admin.'</td>
        <td>
        <a class="btn btn-success" href="admin.php?p=modifyUser&userId='.$row["id"].'">Edit</a>
        
        <a class="btn btn-danger" href="admin.php?p=users&do=delete&userId='.$row["id"].'" onclick="return confirm(\'Are you sure?\')">Delete</a>

        <a class="btn btn-info" href="index.php?p=estates&userId='.$row["id"].'">View posts</a>
        </td>
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
                        <th>Posts</th>
                        <th>Rights</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>