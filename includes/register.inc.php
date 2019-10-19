<?php

function backToForm($error,$name){
    header('Location: register.php?error='.$error.'&name='.$name);
    exit();
}

if(isset($_POST['register'])){


    require 'dbh.inc.php';

    $name=$_POST['name'];
    $email=$_POST['email'];
    $confemail=$_POST['confemail'];
    $passw=$_POST['passw'];
    $confpassw=$_POST['confpassw'];


}
if ($email!==$confemail) {
    backToForm('emailNotSame',$name);
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) {
    backToForm('emailNotValid',$name);
}
elseif ($passw!==$confpasswition) {
    backToForm('passwNotSame',$name);
}
elseif (strlen($passw) < '8') {
    backToForm('passwTooShort',$name);
}









