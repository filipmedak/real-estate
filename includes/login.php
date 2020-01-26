<?php

include 'functions.php';

$errArray = checkForErrors();

$error=$errArray[0];
$name=$errArray[1];

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
    <form class="form-signin my-5" action="login.inc.php" method="POST">
        <?php

        if($error!=""){
            echo '<p class="error-message">'.$error.'</p>';
        }

    ?>
    
    <div class="w-50 mx-auto text-left">
    <h1 class="h3 mb-5 font-weight-normal text-center">Sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <span class="">E-mail:</span><input type="email" name="email" id="inputEmail" class="form-control my-3"  required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        <span class="">Password:</span><input type="password" name="passw" id="inputPassword" class="form-control my-3"  required>

        <button class="btn btn-lg btn-primary btn-block my-4 " type="submit">Sign in</button>
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