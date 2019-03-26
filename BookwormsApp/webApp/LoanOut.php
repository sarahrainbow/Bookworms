<html>
    <head>
        <meta charset="UTF-8">
        <title>Loan out</title>
        
        <?php include 'header.php';?> 
                    
        </center>
        <br>
        <br>
        <br><h2>Loan out a book</h2>
        <form action="LoanOutConfirmation.php" method="post" enctype="multipart/form-data">
            
            Book ID: <input type="number" name="bookID" autofocus required pattern="{4}"/>
            <br>
            Customer ID: <input type="number" name="customerID" required pattern="{4}"/>
            <br>
            Loan out date: <input type="date" name ="loanOutDate" required/>
            <button type="submit">Loan book</button>
        </form>
            <br>
<?php include 'footer.php';?>

