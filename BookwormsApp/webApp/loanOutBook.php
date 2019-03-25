
<html>
    <head>
        <meta charset="UTF-8">
        <title>Loan a book</title>
    </head>
    <body>
        <ul>
            <li>Home</li>
            <li>About</li>
            <li>Search our Books</li>
            <li>Loan a Book</li>
            <li>Contact Us</li>
            <li>My Account</li>
        </ul>
        <br><h2>Loan out a book</h2>
        <form action="loanConfirmation.php" method="post" enctype="multipart/form-data">
            
            Book ID: <input type="number" name="bookID" autofocus required pattern="{4}"/>
            <br>
            Customer ID: <input type="number" name="customerID" required pattern="{4}"/>
            <br>
            Loan out date: <input type="date" name ="loanOutDate" required/>
            <button type="submit">Loan book</button>
        </form>
            <br>
    <script>
        
    </script>
    </body>
</html>

<?php


?>

