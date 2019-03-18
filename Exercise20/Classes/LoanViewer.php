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
    
//    $myBook = new Book(1, 'Harry Potter', ['J K Rowling'], 135, 1989, 'Children');
//    $myLoan = new Loan(98765, '13-01-19', 1, 2);
//    $myLoan->setIsLoanOverdue(true);
//    $myLoanController = new LoanController();
//    $myLoanController->loanBook($myLoan, $myBook);
//    $myLoanController->returnBook(98765, "13-12-13", $myBook);
//    $myLoanViewer = new LoanViewer();
//    
//    $myLoanViewer->listLoan($myLoan);
}

