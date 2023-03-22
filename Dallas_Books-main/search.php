<?php 
    include_once 'header.php'; 
    require_once 'includes/config.php';   
?>

<body class="white-background">
<div id="loginArea">
  <div id="searchForm">
    <h4>
     Book Search
    </h4>
    <form id="search-form" action="search.php" method="POST">
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
  }else{
      $title = '';
  }
  if(!empty($_POST["author"])){
      $author=$_POST["author"];
  }else{
      $author='';
  }
  if(!empty($_POST["genre"])){
      $genre = $_POST["genre"];
  }else{
      $genre = '';
  }

  $userID = $_SESSION["UserID"];
  
  $query = "SELECT b.Title, b.Author, b.PubYear, b.Genre, b.CoverArt, i.Quality, i.Price, i.InventoryID 
  FROM BOOKS AS b, INVENTORY AS i 
  WHERE i.ForSale = true AND i.UserID <> '$userID' AND i.BookID = b.BookID AND b.Title LIKE '$title%' AND b.author LIKE '$author%' AND b.genre LIKE '$genre%' ";
 


  $result = $conn->query($query);
  
  if($result-> num_rows === 0){
    echo "No books match your search...";
  }
 else{
  $headers = Array('','Title', 'Author', 'Published', 'Genre', 'Condition', 'Price');
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
          <td class=\"user-entry\">" . $row['Quality'] . "</td>
          <td class=\"user-entry\">$" . $row['Price'] . "</td> 
          <td>

          <form action ='includes/search-inc.php' method =\"POST\">
                            <input type = 'hidden' name ='id' value =" . $row['InventoryID'] . ">
                            <input class=\"sm-gold\" type = \"submit\" name  =\"purchase\" value = \"purchase\"/>
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

<?php 
    include_once 'footer.php';
?>    