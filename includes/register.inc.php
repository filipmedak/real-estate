<?php
session_start();
// include 'functions.php';
function backToForm(){
    header('Location: register.php');
    exit();
}

if(isset($_POST['register'])){


    require 'dbh.inc.php';

    $firstname=trim($_POST['firstname']);
    $lastname=trim($_POST['lastname']);
    $username=trim($_POST['username']);
    $email=trim($_POST['email']);
    $passw=trim($_POST['passw']);
    $confpassw=trim($_POST['confpassw']);


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['sign-error']="<p>Email is not valid! Please enter a valid e-mail.</p>";
        backToForm();
    }
    elseif ($passw!==$confpassw) {
        $_SESSION['sign-error']="<p>Passwords do not match!</p>";
        backToForm();
    }
    elseif (strlen($passw) < '8') {
        $_SESSION['sign-error']="<p>Password must contain at least 8 characters</p>";
        backToForm();
    }
    else {

        //Check for the existing username
        
        $sql = "SELECT userId FROM users WHERE username = ?";
        
    
        if($stmt){               
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $username);


            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) >= 1){
                    backToForm('usernameTaken',$name);
                }

                mysqli_stmt_close($stmt);


            } else{
                backToForm('somethingWrong',$name);
            }

        }

        //Check for the existing email

        $sql = "SELECT email FROM users WHERE email = ?";
        $stmt = mysqli_prepare($connection, $sql);

        
        if($stmt){               
            
            mysqli_stmt_bind_param($stmt, "s", $email);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    backToForm('emailExists',$name);
                }
                mysqli_stmt_close($stmt);

            } else{
                backToForm('somethingWrong',$name);
            }

        }


        // Prepare an insert statement
        $sql = "INSERT INTO users (firstname, lastname, username, email, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $sql);

        if($stmt){

            //Hash the password
            $passw=password_hash($passw, PASSWORD_DEFAULT);

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $username, $email, $passw);

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
}







?>
