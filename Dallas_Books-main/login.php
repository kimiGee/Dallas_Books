<?php 
    include_once 'header.php';
?> 

<body class="book-background">    
    <div class="registrationContainer">
        <form class="reg-form" action="includes/login-inc.php" method="post">
            <div class="row">
                <div class="col-25">        
                    <label for="email">email</label>
                </div>
                <div class="col-75">
                    <input type="text" id="email" name="email" required/>
                </div>
            </div> 
            <div class="row">
                <div class="col-25">          
                    <label for="password">password</label>
                </div>
                <div class="col-75">
                    <input type="text" id="password" name="password" required/>
                </div>
            </div>
            
            <?php 
                if(isset($_GET["error"])){
                    if(($_GET["error"] == "wronglogininfo")){
                        echo "<p class='errorMessage'>Login information is incorrect</p>";
                    }                                           
                }
                if(isset($_GET["error"])){
                    if(($_GET["error"] == "usernotapproved")){
                        echo "<p class='errorMessage'>Awaiting admin approval</p>";
                    }                                           
                }
                
            ?>
            <div class="button-center">
            <button id="submitLogin" type="submit" class="lg-blue" name="submitLogin" style="display:inline; width:10em; height:3em; margin-top: 1.5em;">submit</button>   
            <button id="submitLogin" type="reset" class="lg-red" name="submitLogin" style="display:inline; width:10em; height:3em;">clear form</button>        
            </div>            
            
        </form>                    
    </div>
</body>


<?php 
    include_once 'footer.php';
?>    