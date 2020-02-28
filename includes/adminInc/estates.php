<?php

function delete_directory($dirname) {
    if (is_dir($dirname))
          $dir_handle = opendir($dirname);
    if (!$dir_handle)
         return false;
    while($file = readdir($dir_handle)) {
          if ($file != "." && $file != "..") {
               if (!is_dir($dirname."/".$file))
                    unlink($dirname."/".$file);
               else
                    delete_directory($dirname.'/'.$file);
          }
    }
    closedir($dir_handle);
    rmdir($dirname);
    return true;
    }

if(isset($_GET["do"]) && $_GET["do"]="delete")
{
        $postId=$_GET["postId"];
		$query = "DELETE FROM estates WHERE id=$postId";
        $result = mysqli_query($connection, $query);
        
        $imgDelResult=delete_directory('img/estates/'.$postId);
        
        if($result)
        {
            echo'<div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Successfully deleted estate!</h4>
                </div>';
        }
        else
        {
            echo'<div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Error!</h4>
            <p>'.$connection->error.'</p>
            </div>';
        }
        if($imgDelResult)
        {
            echo'<div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Successfully deleted estate images!</h4>
                </div>';
        }
        else
        {
            echo'<div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Error while deleting estate images!</h4>
            </div>';
        }
	
}

?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">All estates currently diplayed</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Id</th>
                        <th>City</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Property size</th>
                        <th>Posted By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

<?php

$sql = "SELECT 
    estates.price,
    estates.property_size,
    estates.id,
    users.firstname,
    users.lastname,
    city.name as `city`,
    estatetypes.type as type
    FROM estates
    INNER JOIN city ON (estates.city = city.pbr)
    INNER JOIN estatetypes ON (estates.type = estatetypes.id)
    LEFT JOIN users ON (estates.posted_by=users.id) WHERE estates.status=1"; 
    $result = $connection->query($sql);
    

if (mysqli_num_rows($result) > 0) {
    $counter=1;
    while($row = mysqli_fetch_assoc($result)) {
    

echo '

    <tr>
        <td>'.$counter.'</td>
        <td>'.$row["id"].'</td>
        <td>'.$row["city"].'</td>
        <td>'.$row["type"].'</td>
        <td>'.$row["price"].'</td>
        <td>'.$row["property_size"].'</td>
        <td>'.ucfirst($row["firstname"]).' '.ucfirst($row["lastname"]).'</td>
        <td>
        <a class="btn btn-success" href="admin.php?p=modifyEstate&postId='.$row["id"].'">Edit</a>
        
        <a class="btn btn-danger" href="admin.php?p=estates&do=delete&postId='.$row["id"].'" onclick="return confirm(\'Are you sure?\')">Delete</a>

        <a class="btn btn-info" href="index.php?p=inc/activePost&id='.$row["id"].'">View post</a>
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
                        <th>City</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Property size</th>
                        <th>Posted By</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>