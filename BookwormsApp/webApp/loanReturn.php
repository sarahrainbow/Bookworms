<html>
    <head>
        <meta charset="UTF-8">
        <title>Become a member</title>
    </head>
    <body>
        <h1>Sign up to the Bookworms library</h1>
        <ul>
            <li>Home</li>
            <li>About</li>
            <li>Search our Books</li>
            <li>Loan a Book</li>
            <li>Contact Us</li>
            <li>My Account</li>
        </ul>
        <br>
        
        <h2>Return a book</h2>
        <form action="loanReturnConfirmation.php" method="post" enctype="multipart/form-data">
            
            Book ID: <input type="number" name="bookID" autofocus required pattern="{4}"/>
            <br>
            Customer ID: <input type="number" name="customerID" required pattern="{4}"/>
            <br>
            Return date: <input type="date" name ="loanReturnDate" required/>
            <button type="submit">Return book</button>
        </form>
            <br>

