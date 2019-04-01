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
                <?php include 'NavBar.html'; ?>
                    
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
                    $_SESSION['limitError']['errorMessage']="You have reached your loan limit. Please return a book to take out more loans.";
                    die();
                }
            }

            ?>

        </div>
<?php include 'Footer.html';?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
</body>
</html>
    
