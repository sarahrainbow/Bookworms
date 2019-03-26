<!DOCTYPE html>
<?php
    session_start();
 ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Loan limit reached</title>
        
        <?php include 'header.php';?> 
                    
        </center>
        <br>
        <br>
        <br>
        <h2>Loan limit reached!</h2>
        <p>
            <?php
            
             echo ($_SESSION['limitError']['errorMessage']);
             unset($_SESSION['limitError']['errorMessage']);
            ?>
        </p>
        <button type="button" onclick="window.location.href = 'LoanReturn.php';">Return a book</button>
<?php include 'footer.php';?>
