<?php 
    include_once 'header.php';
    require_once 'includes/config.php'; 
    session_start();
?> 

<body class="library-background">
    <div class="center">
        <img class="open-book-img" src="./images/open-book.png">
        <img class="banner-img" src="./images/banner.png">

        <div id="loginArea">
            <div id="searchForm">
                <h4>
                Book Archive Search
                </h4>
                <form id="search-form" action="search-archive.php" method="POST">
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
        
        $query = "SELECT b.BookID, b.Title, b.Author, b.PubYear, b.Genre, b.CoverArt
        FROM BOOKS AS b
        WHERE b.Title LIKE '$title%' AND b.author LIKE '$author%' AND b.genre LIKE '$genre%'";

        $result = $conn->query($query);
        
        if($result-> num_rows === 0){
            echo "<div class=\"search-results\">";
            echo "Can't find what you're looking for? Add a book to our archives!"; 
            echo "</div>";
            echo "<div class=\"button-left\">";
            echo "<button id=\"addArchive\" type=\"submit\" class=\"lg-blue\" name=\"submit\" onclick=\"window.location.href='add-archive.php'\" style=\"display:inline; width:10em; height:3em; margin-top: 1.5em;\">add to archive</button>";      
            echo "</div>";
        }
        else{
        $headers = Array('','Title', 'Author', 'Published', 'Genre');
        echo "<div class=\"search-results\">";
        echo "<table>";
            echo "<tr>";
                // fetch attribute names
                foreach($headers as $header) {
                echo "<th style=\"text-align:center\">".$header."</th>"; 
            }
            echo "</tr>";
                
            while($row = $result-> fetch_assoc()){

                echo "<tr>
                <td class=\"user-entry\"> <img src='" . $row["CoverArt"] . "'class=\"cover-preview\"></img></td>
                <td class=\"user-entry\">" . $row["Title"] . "</td>
                <td class=\"user-entry\">" . $row['Author'] . "</td>
                <td class=\"user-entry\">" . $row['PubYear'] . "</td>
                <td class=\"user-entry\">" . $row['Genre'] . "</td>  
                <td>
                <form action =\"add-inventory.php\" method =\"POST\">
                                  <input type = 'hidden' name ='id' value =" . $row['BookID'] . ">
                                  <input class=\"sm-gold\" type = \"submit\" name  =\"submit\" value = \"add to inventory\"/>
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
    include_once 'footer.php';
?>
