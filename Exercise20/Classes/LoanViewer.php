<?php

namespace LoanViewer {
    
    require_once 'Loan.php';
    use Loan\Loan;
    
    class LoanViewer {
        
        public function listLoan(Loan $loan) {
            echo "LoanID: " . $loan->getLoanID();
            echo "\nDate book loaned out: " . $loan->getLoanOutDate();
            echo "\nDate loan due: " . $loan->getLoanDueBackDate();
            echo "\nDate book returned: " . $loan->getLoanReturnDate();
            echo $loan->getIsLoanOverdue() ? "\nThis loan is OVERDUE!" : "\nThis loan is NOT overdue";
            echo "\nCustomerID: " . $loan->getLoanCustomerID();
            echo "\nBookID: " . $loan->getLoanedBookID();
        }
        
    }
    
}

