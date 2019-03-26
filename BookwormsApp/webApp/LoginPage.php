<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
    </head>
    <?php
       session_start();
//     unset($_SESSION['Username']);
//     unset($_SESSION['Password']);
//    session_destroy();

    ?>
    <body>
        <form action ="LoginPage.php" method="post">
            <div class ="container">
                Please login into your account
                <br>
                Username: <input type ="text" placeholder="Enter username" name="Username" required><br>
                Password: <input type ="password" placeholder="Enter password" name="Password" required><br>
                <button type="submit">Login</button>
                <input type="checkbox" checked="checked" name="remember"> Remember me
                <br>
                <a href="ForgotUsername.php">Forgot password?</a>
                <a href="ForgotUsername.php">Forgot username?</a>
            </div>
        </form>
    
            <?php
    if(!empty($_POST)){
        $_SESSION["Username"] = filter_input(INPUT_POST,'Username');
        }
    if(!empty($_SESSION)){
            echo "Welcome ".$_SESSION['Username'] . '<br>';
    }
//    if(isset($_POST['submit'])){
//      $username=$_POST['Username'];
//      $password=$_POST['Password'];
//      if (($username=="admin") && ($password="password"));
//      echo 'You are logged in';
//      }
//      else{
//      echo header('Location:LoginError.php');
//      die;
//      }
//        
    
    ?>
   

  <?php include 'footer.php';?>
