h<?php 
    include_once 'header.php';
    require_once 'includes/config.php';

    $email = $_SESSION["Email"];
    $userid = $_SESSION["UserID"];
    $first = $_SESSION["FirstName"];
    $last = $_SESSION["LastName"];
    $phone = $_SESSION["Phone"];
    $address = $_SESSION["Address"];
    $status = $_SESSION["Status"];
    $admin = $_SESSION["IsAdmin"];	    
?>

<body class="red-background">    
        <?php  
            #A search to pull the current logged-in user's info
            $user_query = "SELECT * FROM USER WHERE UserID = '$userid';";        
            $result = $conn-> query($user_query);

            #A search to pull the current logged-in user's inventory
            $user_inv_query = 
                "SELECT b.Title, b.Author, b.PubYear, b.Genre, b.CoverArt, i.Quality, i.Price, i.UserID 
				FROM BOOKS AS b, INVENTORY AS i 
				WHERE i.UserID = '$userid' AND i.BookID = b.BookID;";
	    $result2 = $conn-> query($user_inv_query);
	    
	    #A search to pull the current logged-in user's past purchases
	    $user_buy_query = "SELECT u.FirstName, u.LastName, b.Title, b.Author, b.PubYear, b.CoverArt, i.Price, i.Quality 
				FROM TRANSACTION AS t, BOOKS AS b, INVENTORY AS i, USER AS u
				WHERE t.BuyerID = '$userid' AND t.InventoryID = i.InventoryID AND i.BookID = b.BookID AND t.SellerID=u.UserID;";

	    $result3 = $conn-> query($user_buy_query);	  
	    
	    #A search to pull all the current logged-in user's past sales
	    $user_sell_query = "SELECT b.Title, b.Author, b.PubYear, b.CoverArt, i.Price, i.Quality, t.BuyerID, t.SellerID, u.FirstName, u.LastName 
			       FROM BOOKS AS b, INVENTORY AS i, TRANSACTION AS t, USER AS u
			       WHERE t.BuyerID = u.UserID AND t.SellerID = '$userid' AND i.BookID = b.BookID AND t.InventoryID=i.InventoryID;";   
	    $result4 = $conn-> query($user_sell_query);
            
            #Welcome sign and current personal info
            echo "<br>";
            echo "<div <div class=\"search-results\" style=\"margin: 5% 0 2% 0;\">
                <h2> Welcome <b>" . $first . " " . $last . "!</b></h2>
                Your contact email: <b>$email</b><br>
                Your contact phone number: <b>$phone</b><br>
                Your shipping address: <b>$address</b><br><br>
                </div>";
             
            
            #Displaying the current logged-in user's inventory
            
           
            echo "<div class=\"search-results\">";
           
            #Displaying the current logged-in user's past purchases
            echo "<h2 style='padding-top: 2%;'> Your past purchases: </h2>";

            $headers = Array('','Title', 'Author', 'Published', 'Genre', 'Condition', 'Price');
                             
            if($result3-> num_rows > 0) { 
                echo "<table>";
                echo "<tr>";
                // fetch attribute names
                    foreach($headers as $header) {
                    echo "<th style=\"text-align:center\">".$header."</th>"; 
                     }
                 echo "</tr>";          
                    while($row = $result3-> fetch_assoc()){
                        echo "<tr>
                        <td class=\"user-entry\"><img src='" . $row["CoverArt"] . "'class=\"cover-preview\"></img></td>
                        <td class=\"user-entry\">" . $row['Title'] . "</td>
                        <td class=\"user-entry\">" . $row['Author'] . "</td>
                        <td class=\"user-entry\">" . $row['PubYear'] . "</td>
                        <td class=\"user-entry\">" . $row['Genre'] . "</td>
                        <td class=\"user-entry\">" . $row['Quality'] . "</td>
                        <td class=\"user-entry\">" . $row['Price'] . "</td>            
                        </tr>";
                    }
             }
             else{
                    echo "0 results"; 
            }
            echo "</table>";
            echo "<hr></hr>";


            echo "<h2 style='padding-top: 5%;'> Your past sales: </h2>";
            #Displaying the current logged-in user's past sales
           
            
                   
       if($result4-> num_rows > 0) { 
            echo "<table>";
            echo "<tr>";
            // fetch attribute names
                foreach($headers as $header) {
                echo "<th style=\"text-align:center\">".$header."</th>"; 
                }
            echo "</tr>";          
               while($row = $result4-> fetch_assoc()){
                   echo "<tr>
                   <td class=\"user-entry\"><img src='" . $row["CoverArt"] . "'class=\"cover-preview\"></img></td>
                   <td class=\"user-entry\">" . $row['Title'] . "</td>
                   <td class=\"user-entry\">" . $row['Author'] . "</td>
                   <td class=\"user-entry\">" . $row['PubYear'] . "</td>
                   <td class=\"user-entry\">" . $row['Genre'] . "</td>
                   <td class=\"user-entry\">" . $row['Quality'] . "</td>
                   <td class=\"user-entry\">" . $row['Price'] . "</td>            
                   </tr>";
               }
        }
        else{
               echo "0 results"; 
       }
       echo "</table>";
            ?>
   </div>
</body>


<?php 
    include_once 'footer.php';
?>    
