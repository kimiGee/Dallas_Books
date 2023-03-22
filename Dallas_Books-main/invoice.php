<?php
    include_once "header.php";
?>

<body class="pink-background">
    <div class="center">
        <div class="top-grid-container">
            <div class="grid-child team-heading">
                <h3 style="font-weight: bold; padding-bottom: 2%;">Thank you for your purchase!</h3>
                <h5 style="font-weight: bold; padding-bottom: 5px;">Ship To:</h5>
                <?php

                    echo "<p>". $_SESSION["FirstName"]." ". $_SESSION["LastName"]."</p>";
                    echo "<p>". $_SESSION["Address"]."</p>";

                ?>              
            </div>
        </div>
        <div class="top-grid-container">
            <div class="grid-child team-heading">                
                <h5 style="text-align: center; font-weight: bold;">Purchase Summary</h5> 
                <hr></hr>
                <?php
                    if(isset($_GET["item"])){

                       include_once "includes/config.php";

                       $invID = $_GET["item"]; 
                       $userID =  $_SESSION['UserID'];

                       
                        $query = "SELECT t.TransactionID, b.Title, b.Author, b.PubYear, b.Genre, b.CoverArt, i.Price, i.Quality
                        FROM TRANSACTION as t, BOOKS as b, INVENTORY as i
                        WHERE $invID = t.InventoryID AND t.BuyerID = $userID AND t.InventoryID = i.InventoryID AND i.BookID = b.BookID"; 
                        
                      
                        $result = $conn-> query($query);
                       

                        $headers = Array('','Title', 'Author', 'Published', 'Genre', 'Condition', 'Total');

                        
                        echo "<table>";
                            echo "<tr>";                            
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
                                <td class=\"user-entry\">" . $row['Quality'] . "</td>
                                <td class=\"user-entry\">$" . $row['Price'] . "</td> 
                                <td>
                    
                                </td>         
                                </tr>";
                            }             
                            echo "</table>";
                    }
                ?>                
            </div>           
        </div>
    </div>
</body>


<?php
    include_once "footer.php";
?>
