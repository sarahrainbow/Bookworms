<?php

namespace Viewers {
    
    spl_autoload_register(function($Name) {
        $filePath = "$Name.php";
        $macFilePath = str_replace('\\', '/', $filePath);
        require_once '../' . $macFilePath;   
    });
 
    use Models\Loan;
    use Interfaces\Viewable;
    
    class LoanViewer implements Viewable {
        
        public function listItem($loan) {
            echo "<br>LoanID: " . $loan->getID();
            echo "<br>Date book loaned out: " . $loan->getLoanOutDate();
            echo "<br>Date loan due: " . $loan->getLoanDueBackDate();
            echo "<br>Date book returned: " . $loan->getLoanReturnDate();
            echo $loan->getIsLoanOverdue() ? "<br>This loan is OVERDUE!" : "";
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

