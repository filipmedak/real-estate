
<?php

function checkForErrors(){
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
            case 'usernameTaken':
            $error='There is already a registered user with the entered username.';
            break;
            case 'emailExists':
            $error='There is already a registered user with the entered email.';
            break;
            case 'passwNotValid':
            $error='You have entered the wrong password.';
            break;
            case 'usernameNotExist':
            $error='There is no associated account with the entered email.';
            break;
            default:
            $error='An unknown error has occured.';
        }
        $name=$_GET['name'];
    }
    else{$error="";$name="";}

    $returnArray[0]=$error;
    $returnArray[1]=$name;

    return $returnArray;
}




?>