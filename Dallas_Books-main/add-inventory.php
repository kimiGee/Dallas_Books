<?php 
    include_once 'header.php';
?>

<body class="library-background"> 
<div class="center">
        <img class="open-book-img" src="./images/open-book.png">
        <img class="banner-img" src="./images/banner.png">
    <div class="bookContainer">
            
        <form class="reg-form" action="includes/addInventory-inc.php" method="post">
            <div class="row">
                <div class="col-25">        
                    <label for="quality">quality</label>
                </div>
                <div class="col-75">
                    <input type="text" id="quality" placeholder="New / Used - Great / Used - Fair" name="quality">
                </div>
            </div> 
            <div class="row">
                <div class="col-25">          
                    <label for="price">price</label>
                </div>
                <div class="col-75">
                    <input type="number" step="0.5" add min = "0.00" placeholder = "0.00" id="price" name="price">
                </div>
            </div> 
           
            <?php
                $bookholder = $_POST['id'];
                echo "<input type = 'hidden' name ='bookID' value =" . $bookholder . ">";
            ?>

            <?php 
                if(isset($_GET["error"])){                              
                    if($_GET["error"] == "none"){
                        echo "<p class='success'>Thank you! Book was successfully added to your inventory.</p>";
                    }                           
                } 
            ?>

                <div class="button-center">
                    <button id="submitBook" type="submit" class="lg-blue" name="submit" style="display:inline; width:10em; height:3em; margin-top: 1.5em;">add to inventory</button>   
                    <button id="submitBook" type="reset" class="lg-red" name="submit" style="display:inline; width:10em; height:3em;">clear form</button>       
                </div>      
        </form>                    
    </div>
</div>
</body>


<?php 
include_once 'footer.php';
?> 
