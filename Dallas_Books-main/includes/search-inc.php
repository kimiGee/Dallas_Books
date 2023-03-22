<?php

session_start();

if(isset($_POST['purchase'])){
    echo "Stuff happening?";

    require_once 'config.php';
    require_once 'functions-inc.php';   

    $invID = $_POST['id'];
    $userID = $_SESSION['UserID'];
     
    echo $invID;
    echo $userID;

    if(!createTransaction($conn, $userID, $invID)){       
        header("location: ../search.php?error=transactionerror");
        exit();
    }
    if(!transferOwnership($conn, $userID, $invID)){       
        header("location: ../search.php?error=transfererror");
        exit();
    }
    viewInvoice($conn, $userID, $invID);   

}
else{

}