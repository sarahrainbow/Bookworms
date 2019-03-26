<html>
    <head>
        <meta charset="UTF-8">
        <title>Loan return confirmation</title>
        
        <?php include 'header.php';?> 
        
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
    $newLoan = new Loan($loanID, '2019-01-25', $loanDetails['bookID'], $loanDetails['customerID'], "Kennington", 5);
    $newLoan->setLoanReturnDate($loanDetails['loanReturnDate']);
    $newLoanController = new LoanController();
    $newLoanController->flagLoanOverdue($newLoan);
    $newLoanViewer = new LoanViewer();
    
    if($newLoan->getIsLoanOverdue()){
        echo '<h3 style="color:red">LOAN OVERDUE!</h3>';
    }
    
    $newLoanViewer->listItem($newLoan);
    //else navigate to error page
}
 ?>   
        
        
<?php include 'footer.php';?>

