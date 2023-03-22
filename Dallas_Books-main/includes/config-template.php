<?php

//Create a new file named 'config.php,' paste this content into it and add in your info

$server = "";
$sqlUsername = "";
$sqlPassword = "";
$databaseName = "";

$conn = new mysqli($server, $sqlUsername, $sqlPassword,$databaseName);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}