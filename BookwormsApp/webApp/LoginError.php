<html>
    <head>
        <meta charset="UTF-8">
        <title>Login error Page</title>
        
        <?php include 'header.php';?> 
                    
        
        <?php    
            echo ($_SESSION['errorMessage']);
            unset($_SESSION['errorMessage']);
        ?>
        
        <button type="button" onclick="window.location.href = 'LoginPage.php';">Log in again</button>
    
            
    <?php include 'footer.php';?>
