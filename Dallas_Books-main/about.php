<?php 
    include_once 'header.php';
?>

<body class="pink-background">
    <div class="center">
        <div class="top-grid-container">
            <div class="grid-child team-heading">
                <h3 style="font-weight: bold; padding-bottom: 2%">About Our Project</h3>
                <p>This project aims to simulate a bookstore website in which a user can upload and sell their own personal book inventory, as well as purchase books from other users’ inventories.</p>

                <p>The users (or clients) will be individuals who wish to buy or sell books on the Dallas Book Depository Co. website. Each client will be able to create an account, create their own 
                personal inventories, search the available inventory of other users, and purchase available inventory items. Purchases (or transactions) can only include one inventory item at a time.
                 When adding an item to their personal inventory, a client must first search the books that have previously been archived into the system. If the book they would like to add exists 
                 in the archives, they simply note the BookID when creating their inventory item. If the book they would like to add does not exist in the book archive, they must first add it there, 
                 along with its corresponding information, in order to create the necessary BookID that they will then include when creating their inventory item.</p>

                <p>Administrators have the ability to do anything a normal user can do, with the addition of deleting users accounts, deleting inventory related to a user account, and giving other 
                users administrative access.</p> 

                <p>The included functions implement the various operations required to run an e-commerce site in which the users act as both retailer and consumer.  Along with account creation, logging in/out,
                    and facilitating transactions, the functions allow for searches based on multiple parameters, uploading inventory information, and display of purchase history</p>
            </div>
        </div>
    </div>
</body>


<?php 
    include_once 'footer.php';
?>    