<?php

session_start();
$_SESSION["login-error"]=NULL;
require_once('dbh.inc.php');

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
        $_SESSION["name"] = $user["firstname"].' '.$user["lastname"];
        
        echo 'dobroeeeeeeeeeee';

        header("Location: ../index.php");
        exit;
	}
	else
	{
        $_SESSION["login-error"]="Invalid e-mail or password";
		$_SESSION["user_id"] = NULL;
	}
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Login</title>


    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <!-- <link href="../css/login.css" rel="stylesheet"> -->

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>
    <!-- Custom styles for this template -->
    <!-- <link href="signin.css" rel="stylesheet"> -->
</head>

<body class="">
<?php 
    include("headerMiddle.php");
    include("headerBottom.php");
?>
    <div class="container form-container">
    <form class="form-signin my-5" action="" method="POST">
    
    <div class="w-50 mx-auto text-left">
    <h1 class="h3 mb-5 font-weight-normal text-center">Sign in</h1>
    <?php
            if(isset($_SESSION["login-error"])){
                echo '
                <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>'.$_SESSION["login-error"].'
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

        <a class="text-center d-block" href="register.php" >Dont have an account? Sign up.</a>
    </div>
        

    </form>
    
</div>
<?php 
    include("footer.php");
?>
</body>

</html>