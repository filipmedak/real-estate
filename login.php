<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// ===============================
// DATABASE CONNECTION FILE($connection)
require_once('includes/dbh.inc.php');
// ===============================
$_SESSION["login-error"]=NULL;
if(isset($_POST["btn_login"]))
{
	$email = $_POST["email"];
	$pass = $_POST["password"];
	
	$email = trim($email);
	$pass = trim($pass);
	
	$pass = md5($pass);
	$query = "SELECT * FROM users 
			  WHERE email LIKE '$email'
			  AND password = '$pass'";
			  
	$result = mysqli_query($connection, $query);
	
	$user_num = mysqli_num_rows($result);
	
	if($user_num)
	{
        $user = mysqli_fetch_array($result);
        $_SESSION["loggedin"] = true;
        $_SESSION["user_id"] = $user["id"];
        $nameLetter = $user["firstname"]; 
        $_SESSION["name"] = $nameLetter[0].'. '.$user["lastname"];

        header("Location: index.php");
        exit;
	}
	else
	{
        $_SESSION["login-error"]="Invalid e-mail or password";
		$_SESSION["user_id"] = NULL;
	}
}

include 'pages/html-head.php';
echo '<title>Real Estate Site</title>';
// ===============================
// ADD STYLESHEETS HERE
echo '<link rel="stylesheet" href="subSites/realEstates/realEstates.css">';//FOR REAL ESTATE PAGE
// ===============================
echo '</head>';
echo '<body>';
include 'pages/header.php';
// ===============================
// MAIN CONTENT HERE
?>

<div class="container form-container">
    <form class="form-signin my-5" action="" method="POST">
        <div class="mx-auto text-left">
        <h1 class="h3 mb-5 font-weight-normal text-center">Sign in</h1>
        <?php
            if(isset($_SESSION["login-error"])){
                echo '
                <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>'.$_SESSION["login-error"].'
                </div>
                ';
            }
            if(isset($_SESSION["login-success"])){
                echo '
                <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>'.$_SESSION["login-success"].'
                </div>
                ';
            }
        ?>
            <label for="inputEmail" class="sr-only">Email address</label>
            <span class="">E-mail:</span><input type="email" name="email" id="inputEmail" class="form-control my-3"  required autofocus>

            <label for="inputPassword" class="sr-only">Password</label>
            <span class="">Password:</span><input type="password" name="password" id="inputPassword" class="form-control my-3"  required>

            <button class="btn btn-lg btn-primary btn-block my-4 " type="submit" name="btn_login">Sign in</button>
            <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2019</p>

            <a class="text-center d-block" href="register.php">Dont have an account? Sign up.</a>
        </div>
    </form>
</div>

<?php
// ===============================
include 'pages/footer.php';
// ===============================
// ADD SCRIPTS HERE
// if(){
//     <script src="js/valueSlider.js"></script>               
//     <script src="js/autoCorrect.js"></script>
// }


echo '
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="js/main.js"></script>
<script src="js/main.js"></script>
<script src="js/valueSlider.js"></script>
<script>AOS.init();</script>';
// ===============================
echo '</body>
</html>';


?>