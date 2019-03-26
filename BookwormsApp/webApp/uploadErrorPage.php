<!DOCTYPE html>
<?php
    session_start();
 ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Upload error</title>
        
        
        <?php include 'header.php';?> 
        
        
        </center>
        <br>
        <br>
        <br>
        <h2>Looks like something went a little wrong here...</h2>
        <p>
            <?php
            
             echo ($_SESSION['uploadError']['errorMessage']);
             unset($_SESSION['uploadError']['errorMessage']);
            ?>
        </p>
        <button type="button" onclick="window.location.href = 'customerSignUp.php';">I want to try again</button>
<?php include 'footer.php';?>
