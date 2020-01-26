<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../index.php");
    exit;
}
 
// Include config file
require_once "dbh.inc.php";
 
// Define variables and initialize with empty values
$username = $password = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 

    $email = trim($_POST["email"]);
    $password = trim($_POST["passw"]);
    
        // Prepare a select statement
        $sql = "SELECT id, firstname, lastname, email, password FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                   
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $firstname, $lastname, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        echo $password.'<br>';
                        echo $hashed_password.'<br>';
                        // if(password_verify($password, $hashed_password)){
                            if($password===$hashed_password){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            $_SESSION["firstname"] = $firstname; 
                            $_SESSION["lastname"] = $lastname;                             
                            
                            // Redirect user to welcome page
                            header("location: ../index.php");
                        } else{
                            // Display an error message if password is not valid
                            $_SESSION["login-error"]="Incorrect email or password";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $_SESSION["login-error"]="Incorrect email or password";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        
    
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($connection);

    print_r($_SESSION);
}
?>