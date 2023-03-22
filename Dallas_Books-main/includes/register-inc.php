<?php

if(isset($_POST["submit"])) {
    
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordConfirm = $_POST["passwordConfirm"];
    $phoneNum = $_POST["phoneNum"];
    $address = $_POST["address"];
    $status = "pending";
    $isAdmin = FALSE;
    
    require_once 'config.php';
    require_once 'functions-inc.php';

    if(passwordMatch($password, $passwordConfirm) !== false){
        header("location: ../register.php?error=passwordsdontmatch");
        exit();
    }

    createUser($conn, $firstName, $lastName, $email, $password, $phoneNum, $address, $status, $isAdmin);
}
else {
    header("location: ../index.php?error=stuffhappened");
}