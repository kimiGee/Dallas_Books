<?php 
    include_once 'header.php';
    require_once 'includes/config.php'; 
    session_start();
?> 

<body class="library-background">
    <div class="center">
        <img class="open-book-img" src="./images/open-book.png">
        <img class="banner-img" src="./images/banner.png">   



        <div class="button-center">
            <button id="addInventory" type="submit" class="lg-blue" name="submit" onclick="window.location.href='search-archive.php'" style="display:inline; width:10em; height:3em; margin-top: 1.5em;">add inventory</button>          
        </div>

        <div id="loginArea">
            <div id="searchForm">
                <h4>
                Personal Inventory Search
                </h4>
                <form id="search-form" action="search-inventory.php" method="POST">
                <input type="text" name="title" id="title" placeholder="Title" class="searchField">
                <input type="text" name="author" id="author" placeholder="Author" class="searchField">
                <input type="text" name="genre" id="genre" placeholder="Genre" size="50" class="searchField">
                <button style="min-width: 50px !important;" type="submit" class="search_button" name="submitSearch"><img src="images/search.png" class="search_img"></button>
                </form>
            </div>
        </div>
       
        <?php
        if(isset($_POST["submitSearch"])){

        if(!empty($_POST["title"])){
            $title = $_POST["title"];        
        }
        else{
            $title = '';
        }

        if(!empty($_POST["author"])){
            $author=$_POST["author"];
        }
        else{
            $author='';
        }

        if(!empty($_POST["genre"])){
            $genre = $_POST["genre"];
        }
        else{
            $genre = '';
        }
        
        $userID = $_SESSION["UserID"];
        $query = "SELECT b.BookID, b.Title, b.Author, b.PubYear, b.Genre, b.CoverArt, i.ForSale, i.InventoryID
        FROM BOOKS AS b, INVENTORY AS i 
        WHERE i.BookID = b.BookID AND i.UserID = '$userID' AND b.Title LIKE '$title%' AND b.author LIKE '$author%' AND b.genre LIKE '$genre%'";

        $result = $conn->query($query);
        
        if($result-> num_rows === 0){
            echo "<div class=\"search-results\">";
            echo "There are no books in your inventory that match your search. Please try another search or add the desired book to your inventory"; 
            echo "</div>";
        }
        else{
        $headers = Array('','Title', 'Author', 'Published', 'Genre', 'For Sale?');
        echo "<div class=\"search-results\">";
        echo "<table>";
            echo "<tr>";
                // fetch attribute names
                foreach($headers as $header) {
                echo "<th style=\"text-align:center\">".$header."</th>"; 
            }
            echo "</tr>";
                
            while($row = $result-> fetch_assoc()){
                $forsale = "NULL";

                if($row['ForSale'] == 1){
                    $forsale = "Yes";
                }
                else{
                    $forsale = "No";
                }
                echo "<tr>
                <td class=\"user-entry\"> <img src='" . $row["CoverArt"] . "'class=\"cover-preview\"></img></td>
                <td class=\"user-entry\">" . $row['Title'] . "</td>
                <td class=\"user-entry\">" . $row['Author'] . "</td>
                <td class=\"user-entry\">" . $row['PubYear'] . "</td>
                <td class=\"user-entry\">" . $row['Genre'] . "</td>
                <td class=\"user-entry\">" . $forsale . "</td>       
                <td>
                    <form action =\"search-inventory.php\" method =\"POST\">
                        <input type = 'hidden' name ='invID' value =" . $row['InventoryID'] . ">
                        <input type = 'hidden' name ='forSale' value =" . $row['ForSale'] . ">
                        <input class=\"sm-gold\" type = \"submit\" name  =\"changeStatus\" value = \"change status\"/>
                    </form> 
                </td>
                </tr>";
            }            
        
            echo "</table>";
            echo "</div>";
            echo "</body>";
        }
        }
        ?>
    </div>
</body>

<?php 

    if(isset($_POST['changeStatus'])){

    require_once "includes/config.php";

    
    $user = $_SESSION['UserID'];
    $invID = $_POST['invID'];

    $forSaleStatus = $_POST['forSale'];

    if($forSaleStatus == 1){
        $query = "UPDATE INVENTORY SET ForSale = 0 WHERE InventoryID = $invID";
        $result = $conn-> query($query);
    }
    else{
        $query = "UPDATE INVENTORY SET ForSale = 1 WHERE InventoryID = $invID";
        $result = $conn-> query($query);
    }


    echo '<script type = "text/javascript">';
    echo 'alert("For Sale Status Changed!");';
    echo 'window.location.href = "search-inventory.php"';
    echo '</script>';

    }

?>

<?php
    include_once 'footer.php';
?>
