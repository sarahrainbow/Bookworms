
<!DOCTYPE html>

<?php
    session_start();
 ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile page | The Bookworms</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
 
    </head>
    <body>
          <center>
            <h1>Bookworm Libraries</h1>
            <?php include 'NavBar.html'; include 'NavBarCollapsed.html';?>
          </center>     
    
            <div class="paddedBlock"><h2>Profile Page</h2>
                <p id="avatar">
                   <?php
                    echo '<img id="avatar" src="'.$_SESSION['userDetails']['avatarLocation'].'" alt="Your avatar" style="width:200px;height:200px;"><br><br>';
                    $userWelcome1 = 'Hello ' . $_SESSION['userDetails']['username']; 
                    $userWelcome2 = 'Your new library card ID is ' . $_SESSION['userDetails']['customerID'];
                    echo htmlentities($userWelcome1).'<br>'.htmlentities($userWelcome2).'<br>';
                   ?>
                </p>
            </div>
            
<?php include 'Footer.html';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
