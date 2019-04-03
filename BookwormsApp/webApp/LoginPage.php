<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Log in page | The Bookworms</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
    </head>
    
    <?php
       session_start();
       
    ?>
    <body>       
        <center>
            <h1>Bookworm Libraries</h1>
                <?php include 'NavBar.html'; include 'NavBarCollapsed.html';?>
        <div>                
        <form action ="LoginPage.php" method="post" name="hide">
            <div class ="container">
                Please login into your account
                <br>
                Username: <input type ="text" placeholder="Enter username" name="Username" required pattern=^[a-zA-Z]{1}[a-zA-Z0-9-_\.]{5,19}$ ><br>
                Password: <input type ="password" placeholder="Enter password" name="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"><br>
                <button type="submit">Login</button>
                <input type="checkbox" checked="checked" name="remember"> Remember me
                <br>
                <a href="ForgotUsername.php">Forgot password?</a>
                <a href="ForgotUsername.php">Forgot username?</a>
            </div>
       </form>
       </div>
    </center>
            <?php

    if(!empty($_POST)){
        $_SESSION["Username"] = filter_input(INPUT_POST,'Username');
        }
    if(!empty($_SESSION)){
            echo "Welcome ".$_SESSION['Username'] . '<br>';
    }

//    if(!empty($_SESSION)){
//        $("#formButton").click(function(){
//        $("#form1").toggle();
//    })
//    });
   
//    if(isset($_POST['submit'])){
//      $username=$_POST['Username'];
//      $password=$_POST['Password'];
//      if (($username=="administrator") && ($password="Password123!"));
//      echo 'You are logged in';
//      }
//      else{
//      header('Location:LoginError.php');
//      die;
//      }
//        
    
    ?>


<?php include 'Footer.html';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</body>
</html>
