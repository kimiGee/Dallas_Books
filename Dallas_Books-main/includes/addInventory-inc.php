<?php
require_once 'config.php';

if(isset($_POST["submit"])) {
    session_start();

    $quality = $_POST['quality'];
    $price = $_POST['price'];
    $forsale = 0;
    $userid = $_SESSION['UserID'];
    $bookid = $_POST['bookID'];

    require_once 'functions-inc.php';

    addInventory($conn, $quality, $price, $forsale, $userid, $bookid);
}
else {
    header("location: ../index.php?error=stuffhappened");
}

?>