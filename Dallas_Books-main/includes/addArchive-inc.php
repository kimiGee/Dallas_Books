<?php

if(isset($_POST["submit"])) {
    
    $title = $_POST["title"];
    $author = $_POST["author"];
    $pubyear = $_POST["pubyear"];
    $genre = $_POST["genre"];
    $instock = FALSE;
    $coverart = $_POST["coverart"];
    
    require_once 'config.php';
    require_once 'functions-inc.php';

    createBook($conn, $title, $author, $pubyear, $genre, $instock, $coverart);
}
else {
    header("location: ../index.php?error=stuffhappened");
}

?>
