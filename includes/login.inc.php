<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../index.html");
    exit;
}

require_once "dbh.inc.php";

$email=trim($_POST['email']);
$passw=trim($_POST['passw']);


 
        // Prepare a select statement
        $sql = "SELECT userId, name, password FROM users WHERE email = ?";
        $stmt = mysqli_prepare($connection, $sql);

        if($stmt){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $email);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $name, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($passw, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $name;                            
                            
                            // Redirect user to welcome page
                            header("location: ../index.html");
                        } else{
                            // Display an error message if password is not valid
                            $error = "passwNotValid";
                            header('Location: login.php?error='.$error);
                            exit();
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $error = "usernameNotExist";
                    header('Location: login.php?error='.$error);
                    exit();
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
        mysqli_stmt_close($stmt);
        
        
        
    
    
    // Close connection
    mysqli_close($connection);
}
?>