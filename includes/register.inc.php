<?php

include 'functions.php';


if(isset($_POST['register'])){


    require 'dbh.inc.php';

    $name=trim($_POST['name']);
    $username=trim($_POST['username']);
    $email=trim($_POST['email']);
    $confemail=trim($_POST['confemail']);
    $passw=trim($_POST['passw']);
    $confpassw=trim($_POST['confpassw']);


    if ($email!==$confemail) {
        backToForm('emailNotSame',$name);
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        backToForm('emailNotValid',$name);
    }
    elseif ($passw!==$confpassw) {
        backToForm('passwNotSame',$name);
    }
    elseif (strlen($passw) < '8') {
        backToForm('passwTooShort',$name);
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
                
                if(mysqli_stmt_num_rows($stmt) == 1){
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
        $sql = "INSERT INTO users (name, username, email, passw) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $sql);

        if($stmt){

            //Hash the password
            $passw=password_hash($passw, PASSWORD_DEFAULT);

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $name, $username, $email, $passw);

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
