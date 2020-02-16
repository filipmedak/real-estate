<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// ===============================
// DATABASE CONNECTION FILE($connection)
require_once('includes/dbh.inc.php');
// ===============================
$_SESSION["sign-error"]=NULL;
if(isset($_POST['register'])){

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
                        $_SESSION["login-success"]="<p>Succefuly created an account, you may sign in now.</p>";
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
        <form class="form-signin mb-5" action="" method="POST">
            <h1 class="h3 mb-5 mt-5 font-weight-normal text-center">Sign up</h1>

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
            <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2020</p>
            <a href="login.php" class="text-center d-block">Already have an account? Log in.</a>

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