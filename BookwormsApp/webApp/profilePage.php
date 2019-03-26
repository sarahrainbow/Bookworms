
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
 ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile</title>
        
        <?php include 'header.php';?> 
        
                </center>            
        <br>
        <br>
        <br><h2>Profile Page</h2>
        <p>
            <br>
            <?php
            echo '<img src="'.$_SESSION['userDetails']['avatarLocation'].'" alt="Your avatar" style="width:200px;height:200px;"><br>';
            echo "Hello " . $_SESSION['userDetails']['username'] . '<br>';
            echo "Your new library card ID is " . $_SESSION['userDetails']['customerID'] .'<br>';
            ?>
        </p>
<?php include 'footer.php';?>
