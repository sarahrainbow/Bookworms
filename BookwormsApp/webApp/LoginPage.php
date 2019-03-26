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
     unset($_SESSION['Username']);
     unset($_SESSION['Password']);
    session_destroy();

    ?>
    <body>       
        <center>
            <h1>The Bookworms</h1>
                <nav role="navigation">
                    <div class = row>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="option1" data-toggle="dropdown">Search, Borrow and Reserve Books
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="search.php">Search</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="loanOutBook.php">Borrow book</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Reserve</a></li>
                            </ul>                    
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="option1" data-toggle="dropdown">Join a Library
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="customerSignUp.php">Online Application form</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Library Branches</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Opening times</a></li>
                            </ul>
                            
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="option1" data-toggle="dropdown">Recommended Reads
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="www.amazon.co.uk">Bestsellers</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Reader's Digest</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Greatest Books of All Time</a></li>
                            </ul>
                            
                    </div>
                    <div class="btn">
                        <button class="btn" type="button" id="option1" href='LoginPage.php'>Account Login
                            <span class="caret"></span></button>
                    </div>
                </nav>
                    
        <form action ="LoginPage.php" method="post">
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
