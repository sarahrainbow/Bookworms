<!DOCTYPE html>
<?php
    session_start();
 ?>

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
            <h1>The Bookkeepers</h1>
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
                                <li><a href="">Online application form</a></li>
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
        </center>
        <br>
        <br>
        <br>
        <h2>Loan limit reached!</h2>
        <p>
            <?php
            
             echo ($_SESSION['errorMessage']);
             unset($_SESSION['errorMessage']);
            ?>
        </p>
        <button type="button" onclick="window.location.href = 'LoanReturn.php';">Return a book</button>
    </body>
</html>
