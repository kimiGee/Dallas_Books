<?php 
    include_once 'header.php';
?> 


<body class="book-background">
    <div class="center">
        <img class="open-book-img" src="./images/open-book.png">
        <img class="banner-img" src="./images/banner.png">

        <div class="grid-container">
            <div class="grid-child">
                <p class="reg-text">
                    Our mission at the Dallas Book Depository Company is to help individuals connect and enrich their lives through a shared 
                    love of all things books and literature. We are working to bring the book industry to the passionate people who are tired
                    of having big-name online stores use predictive algorithms and manipulative advertising dictate what books they can find.
                     <br><br>
                    With our website, you can easily find the book you're looking for and purchase it from another like-minded enthusiast, 
                    retaining the convenience of book shopping online and benefitting the seller directly. Together, we can keep the community
                    of book lovers alive and thriving!</p>
            </div>
            <?php

            if (isset($_SESSION["FirstName"]) === false){
                echo " <div class=\"grid-child\" style=\"justify-content: center; padding-top: 10%;\">
                        <button class=\"lg-blue\" onclick=\"window.location.href='login.php'\">log in</button>
                        <button class=\"lg-blue\" onclick=\"window.location.href='register.php'\">register</button>
                        </div>";
            }
            else{
                echo " <div class=\"grid-child\" style=\"justify-content: center; padding-top: 10%;\">
                        <button class=\"lg-blue\" onclick=\"window.location.href='search.php'\">find a book</button>
                        <button class=\"lg-blue\" onclick=\"window.location.href='includes/logout-inc.php'\">logout</button>
                        </div>";
            }
            
            ?>
           
           
    </div>
</body>




<?php 
    include_once 'footer.php';
?>    