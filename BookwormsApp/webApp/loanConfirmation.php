
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
        <br><h2>Book loaned successfully!</h2>
        <h3>Loan details:</h3>
        
    </body>
</html>

<?php

require_once(__DIR__ . '/../Models/Loan.php');

use Models\ Loan;
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
    

}

$newLoan = new Loan($loanID, $loanDetails['loanOutDate'], $loanDetails['bookID'], $loanDetails['customerID']);

echo "Date loan due back: " . $newLoan->getLoanDueBackDate();
