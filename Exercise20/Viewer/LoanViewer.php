<?php

namespace LoanViewer {
    
    require_once '/Users/getintotech/Applications/XAMPP/xamppfiles/htdocs/Exercise20/Model/Loan.php';
    use Model\Loan;
    
    class LoanViewer {
        
        public function listLoan(Loan $loan) {
            echo "\n\nLOAN DETAILS: ";
            echo "\n\tLoanID: " . $loan->getLoanID();
            echo "\n\tDate book loaned out: " . $loan->getLoanOutDate();
            echo "\n\tDate loan due: " . $loan->getLoanDueBackDate();
            echo "\n\tDate book returned: " . $loan->getLoanReturnDate();
            echo $loan->getIsLoanOverdue() ? "\n\tThis loan is OVERDUE!" : "\n\tThis loan is NOT overdue";
            echo "\n\tCustomerID: " . $loan->getLoanCustomerID();
            echo "\n\tBookID: " . $loan->getLoanedBookID();
        }
        
    }
    
}

