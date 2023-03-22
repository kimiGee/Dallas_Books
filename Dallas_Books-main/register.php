<?php 
    include_once 'header.php';
?> 

<body class="book-background">    
    <div class="registrationContainer">
        <form class="reg-form" action="includes/register-inc.php" method="post">
            <div class="row">
                <div class="col-25">        
                    <label for="firstName">first name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="firstName" name="firstName" required/>
                </div>
            </div> 
            <div class="row">
                <div class="col-25">          
                    <label for="lastName">last name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="lastName" name="lastName" required/>
                </div>
            </div>
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
                    <label for="phoneNum">phone number</label>
                </div>
                <div class="col-75">
                    <input type="text" id="phone" name="phoneNum" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">    
                    <label for="address">address</label>
                </div>
                <div class="col-75">
                    <input type="text" id="address" name="address" required/>
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
            <div class="row">
                <div class="col-25">
                    <label for="passwordConfirm">re-enter password</label>
                </div>
                <div class="col-75">
                    <input type="text" id="passwordConfirm" name="passwordConfirm" required/>
                </div>
            </div>            
            <?php 
                if(isset($_GET["error"])){                              
                    if($_GET["error"] == "passwordsdontmatch"){
                        echo "<p class='errorMessage'>* Passwords do not match</p>";
                    }
                    if($_GET["error"] == "none"){
                        echo "<p class='success'>Registration successful, an administrator will complete your request shortly.</p>";
                    }     
                                            
                }
                
            ?>
            <div class="button-center">
            <button id="submitRegistration" type="submit" class="lg-blue" name="submit" style="display:inline; width:10em; height:3em; margin-top: 1.5em;">submit</button>   
            <button id="submitRegistration" type="reset" class="lg-red" name="submit" style="display:inline; width:10em; height:3em;">clear form</button>        
            </div>            
            
        </form>                    
    </div>
</body>


<?php 
    include_once 'footer.php';
?>    