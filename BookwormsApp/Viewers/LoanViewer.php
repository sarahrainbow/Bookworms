<?php

namespace Viewers {
    
    #For Cynthujaa  
//    require_once '/Users/getintotech/Applications/XAMPP/xamppfiles/htdocs/BookwormsApp/Interfaces/ViewerInterface.php';
    
    #For Windows
//    require_once 'C:\xampp\htdocs\Exercise20\Models\Loan.php';
//    require_once(__DIR__ . '\..\Models\Loan.php');
    
    require_once(__DIR__ . '/../Models/Loan.php');
    require_once (__DIR__ . '/../Interfaces/Viewable.php');
 
    use Models\Loan;
    use Interfaces\Viewable;
    
    class LoanViewer implements Viewable {
        
        public function listItem($loan) {
            echo "<br>LoanID: " . $loan->getID();
            echo "<br>Date book loaned out: " . $loan->getLoanOutDate();
            echo "<br>Date loan due: " . $loan->getLoanDueBackDate();
            echo "<br>Date book returned: " . $loan->getLoanReturnDate();
            echo $loan->getIsLoanOverdue() ? "<br>This loan is OVERDUE!" : "<br>This loan is NOT overdue";
            echo "<br>CustomerID: " . $loan->getLoanCustomerID();
            echo "<br>BookID: " . $loan->getLoanedBookID();
            echo "<br>At branch: " . $loan->getBranchName();
        }
        
        public function listItems(array $loans) {
            $i=1;
            foreach ($loans as $loan => $loanDetails){
                echo "<br>Loan " . $i . ":";
                var_dump($loanDetails);
                $i++;
            }
        }
        
        
    }
    
}

