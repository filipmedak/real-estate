<?php

include 'functions.php';
session_start();


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Register</title>


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

<body class="text-center">
<?php 
    include("headerMiddle.php");
    include("headerBottom.php");
?>
    <div class="container form-container">
        <form class="form-signin mb-5" action="register.inc.php" method="POST">
            <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-5 font-weight-normal">Sign up</h1>

            <?php
        if(isset($_SESSION["sign-error"])){
            echo '
            <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>'.$_SESSION["sign-error"].'
            </div>
            ';
        }
        ?>

            <div class="row text-left">
                <div class="col">
                    <span class="">First name:</span>
                    <input type="text" name="firstname" id="inputName" class="form-control my-3"
                        placeholder="First name" value="" required autofocus>

                    <span class="">Last name:</span>
                    <input type="text" name="lastname" id="inputName" class="form-control my-3" placeholder="Last name"
                        value="" required>

                    <span class="">Username:</span>
                    <input type="text" name="username" id="inputUsername" class="form-control my-3"
                        placeholder="Username" required>
                </div>
                <div class="col">
                    <span class="">E-mail:</span>
                    <input type="email" name="email" id="inputEmail" class="form-control my-3"
                        placeholder="Email address" required>

                    <span class="">Password:</span>
                    <input type="password" name="passw" id="inputPassword" class="form-control my-3"
                        placeholder="Password" required>

                    <span class="">Confirm password:</span>
                    <input type="password" name="confpassw" id="inputConfPassword" class="form-control my-3"
                        placeholder="Confirm Password" required>
                </div>
            </div>




            <button class="btn btn-lg btn-primary btn-block my-5 w-50 mx-auto" type="submit" name="register">Sign
                up</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
            <a href="login.php">Already have an account? Log in.</a>

        </form>

    </div>

<?php 
    include("footer.php");
?>
</body>

</html>