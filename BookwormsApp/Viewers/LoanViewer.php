<?php

namespace Viewers {
    
    #For Cynthuja  
    #require_once '/Users/getintotech/Applications/XAMPP/xamppfiles/htdocs/Exercise20/Model/Loan.php';
    
    #For Windows
//    require_once 'C:\xampp\htdocs\Exercise20\Models\Loan.php';
//    require_once(__DIR__ . '\..\Models\Loan.php');
    
    require_once(__DIR__ . '/../Models/Loan.php');
    
    
    use Models\Loan;
    
    class LoanViewer {
        
        public function listLoan(Loan $loan) {
            echo "<br>LoanID: " . $loan->getLoanID();
            echo "<br>Date book loaned out: " . $loan->getLoanOutDate();
            echo "<br>Date loan due: " . $loan->getLoanDueBackDate();
            echo "<br>Date book returned: " . $loan->getLoanReturnDate();
            echo $loan->getIsLoanOverdue() ? "<br>This loan is OVERDUE!" : "<br>This loan is NOT overdue";
            echo "<br>CustomerID: " . $loan->getLoanCustomerID();
            echo "<br>BookID: " . $loan->getLoanedBookID();
        }
        
    }
    
}

