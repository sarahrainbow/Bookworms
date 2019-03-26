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
            <h1>The Bookworms</h1>
                <nav role="navigation">
                    <div class = row>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="option1" data-toggle="dropdown">Search, Loan and Return Books
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="search.php">Search</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="LoanOut.php">Loan</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="LoanReturn.php">Return</a></li>
                            </ul>                    
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="option1" data-toggle="dropdown">Join a Library
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="customerSignUp.php">Online Application form</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Library Branches</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Opening times</a></li>
                            </ul>
                            
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="option1" data-toggle="dropdown">Recommended Reads
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="https://www.amazon.co.uk/">Bestsellers</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Reader's Digest</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Greatest Books of All Time</a></li>
                            </ul>
                            
                    </div>
                    <div class="btn">
                        <button class="btn" type="button" id="option1" data-toggle="dropdown">Account Login
                            <span class="caret"></span></button>
                    </div>
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
                $newLoan = new Loan($loanID, $loanDetails['loanOutDate'], $loanDetails['bookID'], $loanDetails['customerID'], "Kennington", 5);
                echo "Date loan due back: " . $newLoan->getLoanDueBackDate();
                
                //testing sunny and rainy day scenarios
                $newCustomer = new Customer(12345, 'Matilda', 'Honey', 'Wormwood','9 Youngwood Drive','matildahoney@gmail.com','bookworm23','Password123','','');
                $newCustomer->setLoanCount(5);

                if($newCustomer->getLoanCount() >= $newCustomer->getLoanLimit()){
                    header("Location: LoanLimitReached.php");
                    $_SESSION['limitError']['errorMessage']="You have reached your loan limit. Please return a book to take out more loans.";
                    die();
                }
            }

            ?>

        </div>
<?php include 'footer.php';?>
    
