<?php

declare(strict_types=1);


if(isset($_POST["submitLogin"])){

    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once 'config.php';
    require_once 'functions-inc.php';  
    
   userLogin($conn, $email, $password);
   
}
else {
    
}