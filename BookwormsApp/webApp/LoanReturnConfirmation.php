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
                                <li><a href="search.php">Search by author</a></li>
                                <li><a href="search.php">Search by title</a></li>
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
    
    if($newLoan->getIsLoanOverdue()){
        echo '<h3 style="color:red">LOAN OVERDUE!</h3>';
    }
    
    $newLoanViewer->listLoan($newLoan);
    //else navigate to error page
}
 ?>   
        
        
<?php include 'footer.php';?>

