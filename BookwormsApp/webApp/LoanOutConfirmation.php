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
        </center>
        <br>
        <br>
        <br>
        <div>
            <h2>Book Loaned successfully!</h2>
            <br>
            <?php

            require_once(__DIR__ . '/../Models/Loan.php');
            require_once(__DIR__ . '/../Models/Customer.php');

            use Models\ {Loan, Customer};
            session_start();

            function filterInput($inputItem) {
                return filter_input(INPUT_POST,$inputItem,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
            }

            $loanDetails = filter_input_array(INPUT_POST);

            if(!empty($loanDetails)) {

                foreach($loanDetails as $loanDetail => $loanValue) {
                    ${$loanDetail} = filterInput($loanDetail);
                    echo $loanDetail . ": " . $loanValue . "<br>";
                }

                $loanID= rand(000, 1000);
                echo "loanID: " . $loanID . "<br>";
                $newLoan = new Loan($loanID, $loanDetails['loanOutDate'], $loanDetails['bookID'], $loanDetails['customerID']);
                echo "Date loan due back: " . $newLoan->getLoanDueBackDate();
                
                //testing sunny and rainy day scenarios
                $newCustomer = new Customer(12345, 'Matilda', 'Honey', 'Wormwood','9 Youngwood Drive','matildahoney@gmail.com','bookworm23','Password123','','');
                $newCustomer->setLoanCount(4);

                if($newCustomer->getLoanCount() >= $newCustomer->getLoanLimit()){
                    header("Location: LoanLimitReached.php");
                    $_SESSION['errorMessage']="You have reached your loan limit. Please return a book to take out more loans.";
                    die();
                }
            }

            ?>

        </div>
    </body>
</html>
    