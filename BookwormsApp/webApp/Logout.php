<!DOCTYPE html>

<html>
    <head>
    
        <meta charset="UTF-8">
        <title>Log out | The Bookworms</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
        <?php
            session_start();
            unset($_SESSION['username']);
            unset($_SESSION['password']);
            session_destroy();
        ?>
    </head>
    <body>
                <center>
            <h1>Bookworm Libraries</h1>
                <?php include 'NavBar.html'; include 'NavBarCollapsed.html';?>
            
            <p> You are now logged out. If you wish to log back in, please click <a href="LoginPage.php">here</a></p>
        <?php
        // put your code here
        ?>
<?php include 'Footer.html';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</body>
</html>
