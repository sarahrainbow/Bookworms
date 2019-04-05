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
        
        public function listItemPDO() {
            include '../webApp/DatabaseConn.php';
            $statement = $conn->query("SELECT * FROM `loan` WHERE `LibraryCardID` = 4 AND `BookID` = 9 AND `DateOut` = '2019-02-27'");
            $rows = $statement->fetchAll();
            
            for ($i = 0; $i<5; $i++) {
                foreach ($rows as $row) {
                    echo $row[$i] . '<br>';
                }   
                
            }
        }
        
        
    }
    
}

