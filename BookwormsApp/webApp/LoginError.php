<html>
    <head>
        <meta charset="UTF-8">
        <title>Error Page | The Bookworms</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
                <center>
            <h1>The Bookworms</h1>         
            
    <?php include 'NavBar.html'; include 'NavBarCollapsed.html';?>
    </center                
        
        <?php    
            echo ($_SESSION['errorMessage']);
            unset($_SESSION['errorMessage']);
        ?>
        
        <button type="button" onclick="window.location.href = 'LoginPage.php';">Log in again</button>
    
            
    <?php include 'footer.html';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</body>
</html>
