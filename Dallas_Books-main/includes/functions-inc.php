<?php 

    

function passwordMatch($password, $passwordConfirm){
    if($password !== $passwordConfirm){
        return true;
    }
    return false;
}

function createUser($conn, $firstName, $lastName, $email, $password, $phoneNum, $address, $status, $isAdmin){

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO USER VALUES(NULL, '$firstName', '$lastName', '$email', '$password', $phoneNum, '$address', '$status', FALSE)";
    $result = $conn->query($query)
      or die( "ERROR: Query is wrong");

    header("location: ../register.php?error=none");
    exit();       
}

function authenticateUser($conn, $email){
    $sql = "SELECT * from USER WHERE Email = ?;";
    $stmt = mysqli_stmt_init($conn); //initialize a prepared statment, prevents code injection
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailedemail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email); //1 s for 1 string being passed
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        return false;
    }

    mysqli_stmt_close($stmt);
}


function userLogin($conn, $email, $password){    

        $userExists = authenticateUser($conn, $email);
      
        if($userExists['Status'] === 'pending') {
         header("location: ../login.php?error=usernotapproved");
         exit();  
        }   
        else {          
             if($userExists["Password"] === $password){
                 session_start(); 
                 $_SESSION["UserID"] = $userExists["UserID"];
                 $_SESSION["FirstName"] = $userExists["FirstName"];
                 $_SESSION["LastName"] = $userExists["LastName"];
                 $_SESSION["Email"] = $userExists["Email"];
                 $_SESSION["Phone"] = $userExists["Phone"];
                 $_SESSION["Address"] = $userExists["Address"];
                 $_SESSION["Status"] = $userExists["Status"];
                 $_SESSION["IsAdmin"] = $userExists["IsAdmin"];
                 
                 header("location: ../index.php");
                 exit();                 
               
             }
             else {
                header("location: ../login.php?error=wronglogininfo");
                exit();
             }
         }        
}

function createBook($conn, $title, $author, $pubyear, $genre, $instock, $coverart){

    $query = "INSERT INTO BOOKS VALUES(NULL, '$title', '$author', $pubyear, '$genre', FALSE, '$coverart')";
    $result = $conn->query($query)
      or die( "ERROR: Query is wrong");

    header("location: ../add-archive.php?error=none");
    exit();       
}

function addInventory($conn, $quality, $price, $forsale, $userid, $bookid){
    $query = "INSERT INTO INVENTORY VALUES(NULL, '$quality', '$price', FALSE, '$userid', '$bookid')";
    $result = $conn->query($query)
      or die( "ERROR: Query is wrong");

    header("location: ../add-inventory.php?error=none");
    exit();  
}

function createTransaction($conn, $userID, $invID){
    $query = "INSERT INTO TRANSACTION(BuyerID, SellerID, InventoryID)
    VALUES($userID, (SELECT UserID from INVENTORY where InventoryID = $invID), $invID)";

    $result = $conn->query($query)
    or die( "ERROR: Transaction query is wrong");
        
    if(!$result){
        return FALSE;
    }else{
        return TRUE;
    }
}

function transferOwnership($conn, $userID, $invID){
    $query = "UPDATE INVENTORY SET UserID = $userID, ForSale = 0 WHERE InventoryID = $invID";

    $result = $conn-> query($query)
    or die( "ERROR: Transfer query is wrong");
    
    if(!$result){
        return FALSE;
    }else{
        return TRUE;
    }
}

function viewInvoice($conn, $userID, $invID){
    $query = "SELECT t.TransactionID, b.Title, b.Author, b.PubYear, b.Genre, b.CoverArt, i.Price, i.Quality
    FROM TRANSACTION as t, BOOKS as b, INVENTORY as i
    WHERE t.BuyerID = '$userID' AND t.InventoryID = i.InventoryID AND i.BookID = b.BookID";
    
    $result = $conn->query($query)
      or die( "ERROR: Invoice query is wrong");

    header("location: ../invoice.php?item=". $invID ."");
    exit();  
}
    
?>