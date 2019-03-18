<?php

namespace LoanViewer {
    
    require_once 'Loan.php';
    use Loan\Loan;
    require_once 'LoanController.php';
    use LoanController\LoanController;
    
    class LoanViewer {
        
        public function listLoan(Loan $loan) {
            echo "LoanID: " . $loan->getLoanID();
            echo "\nDate book loaned out: " . $loan->getLoanOutDate();
            echo "\nDate book returned: " . $loan->getLoanReturnDate();
            echo $loan->getIsLoanOverdue() ? "\nThis loan is OVERDUE!" : "\nThis loan is NOT overdue";
            echo "\nCustomerID: " . $loan->getLoanCustomerID();
            echo "\nBookID: " . $loan->getLoanedBookID();
        }
        
    }
    
    //Calling all GET function to return info
//    $myBook = new Book(1, 'Harry Potter', ['J K Rowling'], 135, 1989, 'Children'); //Creatin a book object
//    $myLoan = new Loan(98765, '13-01-19', 1, 2); //Creating new loan object
//    $myLoan->setIsLoanOverdue(true); //Setting the overdue date 
//    $myLoanController = new LoanController(); //Calling loancontroller 
//    $myLoanController->loanBook($myLoan, $myBook); //Two argument from line25, object (line 24)
//    $myLoanController->returnBook(98765, "13-12-13", $myBook); //Testing return book function - changs mybook loan date to new return date
//    $myLoanViewer = new LoanViewer(); //Creates viewer object
//    
//    $myLoanViewer->listLoan($myLoan); //Calling object
}

