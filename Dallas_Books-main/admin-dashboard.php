<?php 
    include_once 'header.php';
    require_once 'includes/config.php'; 
?> 

<body class="stack-background">
    <div class="user-container">
        <?php   
            echo "<table>
            <tr>
                <th class=\"user-heading\">first name</th>
                <th class=\"user-heading\">last name</th>
                <th class=\"user-heading\">email</th>
                <th class=\"user-heading\">phone</th>
                <th class=\"user-heading\">address</th>
            </tr>";   
                
                $query = "SELECT * FROM USER WHERE status = 'pending';";        
                $result = $conn-> query($query);           

                if($result-> num_rows > 0) {           
                    while($row = $result-> fetch_assoc()){
                        echo "<tr>
                        <td class=\"user-entry\">" . $row["FirstName"] . "</td>
                        <td class=\"user-entry\">" . $row['LastName'] . "</td>
                        <td class=\"user-entry\">" . $row['Email'] . "</td>
                        <td class=\"user-entry\">" . $row['Phone'] . "</td>
                        <td class=\"user-entry\">" . $row['Address'] . "</td>
                        <td>
                        <form action =\"admin-dashboard.php\" method =\"POST\">
                            <input type = 'hidden' name ='id' value =" . $row['UserID'] . ">
                            <input class=\"sm-green\" type = \"submit\" name  =\"approve\" value = \"approve\"/>
                            <input class=\"sm-red\" padding-left: 5px;' type = \"submit\" name  =\"deny\" value = \"deny\"/>
                        </form>
                    </td>
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
    if(isset($_POST['approve'])){

    require_once "includes/config.php";

    $id = $_POST['id'];

    $query = "UPDATE USER SET Status = 'active' WHERE UserID = '$id' ";
    $result = $conn-> query($query);

    echo '<script type = "text/javascript">';
    echo 'alert("User Approved!");';
    echo 'window.location.href = "admin-dashboard.php"';
    echo '</script>';

    }

    if(isset($_POST['deny'])){
    $id = $_POST['UserID'];

    $select = "DELETE FROM USER WHERE UserID = '$id'";
    $result = mysqli_query($conn, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("User Denied!");';
    echo 'window.location.href = "admin-dashboard.php"';
    echo '</script>';
    }
?>

<?php 
    include_once 'footer.php';
?>    