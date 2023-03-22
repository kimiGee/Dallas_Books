<?php 
    include_once 'header.php';
?>

<body class="library-background"> 
<div class="center">
        <img class="open-book-img" src="./images/open-book.png">
        <img class="banner-img" src="./images/banner.png">
    <div class="bookContainer">
            <form class="reg-form" action="includes/addArchive-inc.php" method="post">
                <div class="row">
                    <div class="col-25">        
                        <label for="title">title</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="title" name="title" required/>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-25">          
                        <label for="author">author</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="author" name="author" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">    
                        <label for="pubyear">publication year</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="pubyear" name="pubyear" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">    
                        <label for="genre">genre</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="genre" name="genre" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">                 
                        <label for="coverart">cover art</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="coverart" name="coverart" required/>
                    </div>
                </div>

                <?php 
                    if(isset($_GET["error"])){                              
                        if($_GET["error"] == "none"){
                            echo "<p class='success'>Thank you! Book was successfully added to the archive.</p>";
                        }     
                                                
                    } 
                ?>

                <div class="button-center">
                    <button id="submitBook" type="submit" class="lg-blue" name="submit" style="display:inline; width:10em; height:3em; margin-top: 1.5em;">add to archive</button>   
                    <button id="submitBook" type="reset" class="lg-red" name="submit" style="display:inline; width:10em; height:3em;">clear form</button>    
                    <div class="button-center">
                        <button id="back" type="back" class="lg-orange" name="back" onclick="window.location.href='search-archive.php'" style="display:inline; width:10em; height:3em;">back</button>       
                    </div>   
                </div>      
            </form>                    
    </div>
</div>
</body>

<?php 
include_once 'footer.php';
?> 
