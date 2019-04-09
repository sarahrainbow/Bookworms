<?php

namespace Viewers {
    
    spl_autoload_register(function($Name) {
        $filePath = "$Name.php";
        $macFilePath = str_replace('\\', '/', $filePath);
        require_once '../' . $macFilePath;   
    });
 
    use Models\LoanNew;
    use Interfaces\Viewable;
    use PDO;
    
    class LoanViewer {
        
        public function listItem($conn, $loan, $loanDetails) {
       
//            set variables from inputted data
            foreach($loanDetails as $loanDetail => $loanValue) {
                ${$loanDetail} = filterInput($loanDetail);
            }
            
//            prepare statement
            if(!empty($loanReturnDate)) {
                $statement = $conn->prepare("SELECT * FROM `loan` WHERE `LibraryCardID` = :LibraryCardID AND `BookID` = :BookID AND `DateReturned` = :DateReturned");
                $statement->bindParam('DateReturned', $loanReturnDate);
            }
            
            else if (!empty($loanOutDate)) {
                $statement = $conn->prepare("SELECT * FROM `loan` WHERE `LibraryCardID` = :LibraryCardID AND `BookID` = :BookID AND `DateOut` = :DateOut");
                $statement->bindParam('DateOut', $loanOutDate);
                
            }
            $statement->bindParam('LibraryCardID', $customerID);
            $statement->bindParam('BookID', $bookID);
            
            $statement->setFetchMode(PDO::FETCH_CLASS, get_class($loan));
            $statement->execute();
            $loans = $statement->fetchAll();
            
            foreach($loans as $loanItem) {  
                echo "<br>LoanID: " . $loanItem->getLoanID();
                echo "<br>Date book loaned out: " . $loanItem->getDateOut();
                echo "<br>Date book returned: " . $loanItem->getDateReturned();
                echo "<br>LibraryCard ID: " . $loanItem->getLibraryCardID();
                echo "<br>BookID: " . $loanItem->getBookID();
                echo "<br>Date loan due: " . $loanItem->getLoanDueBackDate();             
                echo $loanItem->getLoanDueBackDate() < $loanItem->getDateReturned() ? "<br><p style='color:red'>Loan overdue!" : '';
            }
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
    
//    $myViewer = new LoanViewer();
//    
//    $myViewer->listItem();
    
}

