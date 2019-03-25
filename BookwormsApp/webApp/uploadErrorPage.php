<!DOCTYPE html>
<?php
    session_start();
 ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Error Page</title>
    </head>
    <body>
        <ul>
            <li>Home</li>
            <li>About</li>
            <li>Search our Books</li>
            <li>Loan a Book</li>
            <li>Contact Us</li>
            <li>My Account</li>
        </ul>
        <h2>Looks like something went a little wrong here...</h2>
        <p>
            <?php
            
             echo ($_SESSION['errorMessage']);
             unset($_SESSION['errorMessage']);
            ?>
        </p>
        <button type="button" onclick="window.location.href = 'customerSignUp.php';">I want to try again</button>
    </body>
</html>
