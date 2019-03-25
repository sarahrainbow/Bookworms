


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
        <br><h2>Book returned successfully!</h2>
        <h3>Loan details:</h3>
    <?php

require_once(__DIR__ . '/../Models/Loan.php');
require_once(__DIR__ . '/../Viewers/LoanViewer.php');
require_once(__DIR__ . '/../Controllers/LoanController.php');

use Models\ Loan;
use Viewers\LoanViewer;
use Controllers\LoanController;

session_start();

function filterInput($inputItem) {
    return filter_input(INPUT_POST,$inputItem,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
}

$loanDetails = filter_input_array(INPUT_POST);

if(!empty($loanDetails)) {

    foreach($loanDetails as $loanDetail => $loanValue) {
        ${$loanDetail} = filterInput($loanDetail);
    }

    $loanID= rand(000, 1000);  
    $newLoan = new Loan($loanID, '2019-01-25', $loanDetails['bookID'], $loanDetails['customerID']);
    $newLoan->setLoanReturnDate($loanDetails['loanReturnDate']);
    $newLoanController = new LoanController();
    $newLoanController->flagLoanOverdue($newLoan);
    $newLoanViewer = new LoanViewer();
    $newLoanViewer->listLoan($newLoan);

    //else navigate to error page
}


 ?>    
    </body>
</html>

