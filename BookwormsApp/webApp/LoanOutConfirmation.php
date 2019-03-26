<html>
    <head>
        <meta charset="UTF-8">
        <title>Loan out confirmation</title>
        
        <?php include 'header.php';?> 
                    
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
    