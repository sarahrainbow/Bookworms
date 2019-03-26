<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
 
    </head>
    <body>
        <center>
                <nav role="navigation">
                    <ul>
                        <li><a href="search.php">Search, Renew and Reserve books</a>
                            <ul>
                                <li><a href="">Search by author</a></li>
                                <li><a href="">Search by title</a></li>
                                <li><a href="LoanOut.php">Borrow a book</a></li>
                                <li><a href="LoanReturn.php">Return a book</a></li>
                            </ul>
                        </li>
                        <li><a href="">Join a Library</a>
                            <ul>
                                <li><a href="customerSignUp.php">Online application form</a></li>
                                <li><a href="">Local Branches</a></li>
                            </ul>
                        </li>
                        <li><a href="">Recommended Reads</a>
                            <ul>
                                <li><a href="https://www.amazon.co.uk/Best-Sellers-Books/zgbs/books">Bestsellers</a></li>
                                <li><a href="">Reader's Digest</a></li>
                            </ul>
                        </li>
                    </ul>
            </nav>
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
            
    </body>
</html>

