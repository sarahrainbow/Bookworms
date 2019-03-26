<html>
    <head>
        <meta charset="UTF-8">
        <title>Loan return</title>
        
        <?php include 'header.php';?> 
                    
        <br>
        <br>
        <br>
        </center>
        <h2>Return a book</h2>
        <form action="loanReturnConfirmation.php" method="post" enctype="multipart/form-data">
            
            Book ID: <input type="number" name="bookID" autofocus required pattern="{4}"/>
            <br>
            Customer ID: <input type="number" name="customerID" required pattern="{4}"/>
            <br>
            Return date: <input type="date" name ="loanReturnDate" required/>
            <br>
            <button type="submit">Return book</button>
        </form>
            <br>
            
<?php include 'footer.php';?>

