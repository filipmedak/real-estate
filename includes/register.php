<?php
session_start();
$_SESSION["sign-error"]=NULL;
if(isset($_POST['register'])){

    require 'dbh.inc.php';

    $firstname=trim($_POST['firstname']);
    $lastname=trim($_POST['lastname']);
    $email=trim($_POST['email']);
    $passw=trim($_POST['passw']);
    $confpassw=trim($_POST['confpassw']);


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['sign-error']="<p>Email is not valid! Please enter a valid e-mail.</p>";
    }
    elseif ($passw!==$confpassw) {
        $_SESSION['sign-error']="<p>Passwords do not match!</p>";
    }
    elseif (strlen($passw) < '8') {
        $_SESSION['sign-error']="<p>Password must contain at least 8 characters</p>";
    }
    else {

        //Not prepared stmt
        //Check for the existing email

        // $sql="SELECT email FROM users WHERE email = '$email'";

        // $result = mysqli_query($connection, $sql);

        // if (mysqli_num_rows($result) > 0) {

        //     $_SESSION['sign-error']="<p>There already exists an user with that email</p>";

        // }else{

        //     $password=md5($passw);

        //     $sqlInsert = "INSERT INTO users (firstname, lastname, email, password)
        //         VALUES ('$firstname', '$lastname', '$email', '$password')";

        //         if (mysqli_query($connection, $sqlInsert)) {
        //             echo "New record created successfully";
        //         } else {
        //             echo "Error: " . $sqlInsert . "<br>" . mysqli_error($connection);
        //         }
        // }

        $sql = "SELECT email FROM users WHERE email = ?";
        $stmt = mysqli_prepare($connection, $sql);
        
        if($stmt){               
            
            mysqli_stmt_bind_param($stmt, "s", $email);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $_SESSION['sign-error']="<p>There already exists an user with that email</p>";
                }else{
                // Prepare an insert statement
                $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_prepare($connection, $sql);

                if($stmt){

                    //Hash the password
                    $passw=md5($passw);

                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $email, $passw);

                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        // Redirect to login page
                        header("location: login.php");
                    } else{
                        echo "Something went wrong. Please try again later.";
                    }
                    
                }
                // Close statement
                mysqli_stmt_close($stmt);
                }

            } else{
                $_SESSION['sign-error']="<p>Somin wrong</p>";
            }

        }

    }
}



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
        <form class="form-signin mb-5" action="" method="POST">
            <h1 class="h3 mb-5 mt-5 font-weight-normal">Sign up</h1>

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

                    <!-- <span class="">Username:</span>
                    <input type="text" name="username" id="inputUsername" class="form-control my-3"
                        placeholder="Username"> -->
                        <span class="">E-mail:</span>
                    <input type="email" name="email" id="inputEmail" class="form-control my-3"
                        placeholder="Email address" required>
                </div>
                <div class="col">
                    

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