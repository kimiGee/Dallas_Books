<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>CS 550 Books</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/custom.css?parameter=12"  type="text/css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Roboto&display=swap" rel="stylesheet">        
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Poppins:wght@300&display=swap" rel="stylesheet">
                 
    </head>
    <body>
        <nav>
            <div class="wrapper">
                <div class="navbar navbar-fixed-top" id="myTopNav">
                    <a href="index.php"><img class="nav-logo" src="./images/logo.svg"/></a>
                    <ul class="nav-menu">                        
                        <?php                       
                             if (isset($_SESSION["FirstName"]) === true) {                            
                                if($_SESSION["IsAdmin"] === 1){
                                    echo "<li class='nav-item'> <a href='admin-dashboard.php' class='nav-link'>Manage Users</a></li>";
                                    echo "<li class='nav-item'> <a href='includes/logout-inc.php' class='nav-link'>Logout</a></li>";
                                    echo "<li class=\"nav-item\"> <a class=\"nav-link\" style=\"pointer-events: none;\">Hi ", $_SESSION["FirstName"], "!</a></li>";
                                }
                                else{ 
                                    echo "<li class='nav-item'> <a href='search.php' class='nav-link'>Book Search</a></li>";
                                    echo "<li class='nav-item'> <a href='user-dashboard.php' class='nav-link'>My Dashboard</a></li>";
                                    echo "<li class='nav-item'> <a href='search-inventory.php' class='nav-link'>My Inventory</a></li>";
                                    echo "<li class='nav-item'> <a href='includes/logout-inc.php' class='nav-link'>Logout</a></li>";
                                    echo "<li class=\"nav-item\"> <a class=\"nav-link\" style=\"pointer-events: none;\">Hi ", $_SESSION["FirstName"], "!</a></li>";
                                }
                            }
                            else{
                                echo "<li class=\"nav-item\"> <a href=\"about.php\" class=\"nav-link\">about</a></li>";
                                echo "<li class=\"nav-item\"> <a href=\"team.php\" class=\"nav-link\">team 9</a></li>";
                              
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>  
        <div class="container">   