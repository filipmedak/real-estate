<?php

if(isset($_GET['error'])){
    switch($_GET['error']){
        case 'emailNotSame':
        $error='E-mail adresses do not match!';
        break;
        case 'emailNotValid':
        $error='E-mail adress is not valid! Please enter a valid E-mail.';
        break;
        case 'passwNotSame':
        $error='Passwords do not match!';
        break;
        case 'passwTooShort':
        $error='Password is too short! Your password must contain at least 8 charachters.';
        break;
        default:
        $error='An unknown error has occured.';
    }
    $name=$_GET['name'];
}
else{$error="";$name="";}



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
    <link href="../css/login.css" rel="stylesheet">

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
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <form class="form-signin" action="register.inc.php" method="POST">
        <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Sign up</h1>


        <?php

            if($error!=""){
                echo '<p class="error-message">'.$error.'</p>';
            }

        ?>

        <label for="inputName" class="sr-only">Name and Lastname</label>
        <?php
        echo '<input type="name" name="name" id="inputName" class="form-control my-3" placeholder="Your name and last name" value="'.$name.'" required autofocus>';
        ?>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control my-3" placeholder="Email address" required>

        <label for="inputConfEmail" class="sr-only">Confirm Email address</label>
        <input type="email" name="confemail" id="ConfirminputEmail" class="form-control my-3"
            placeholder="Confirm Email address" required>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="passw" id="inputPassword" class="form-control my-3" placeholder="Password"
            required>

        <label for="inputConfPassword" class="sr-only">Password</label>
        <input type="password" name="confpassw" id="inputConfPassword" class="form-control my-3"
            placeholder="Confirm Password" required>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
    </form>



    <a href="login.php">Already have an account? Log in.</a>
</body>

</html>