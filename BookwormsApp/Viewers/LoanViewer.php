<?php

namespace Viewers {
            const DB_DSN = 'mysql:host=localhost;dbname=libraryapp';
            const DB_USER = 'root';
    
    spl_autoload_register(function($Name) {
        $filePath = "$Name.php";
        $macFilePath = str_replace('\\', '/', $filePath);
        require_once '../' . $macFilePath;   
    });
 
    use Models\LoanNew;
    use Interfaces\Viewable;
    use PDO;
    
    class LoanViewer {
        
        public function listItem($loan, $loanDetails) {
            
//            connect with db
            try {
                $conn = new PDO(DB_DSN, DB_USER);
            } catch (PDOException $e) {
                header("Location: ErrorPage.php");
            }
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
//            set variables from inputted data
            foreach($loanDetails as $loanDetail => $loanValue) {
                ${$loanDetail} = filterInput($loanDetail);
            }
            
//            prepare statement
//            $statement = $conn->prepare("SELECT * FROM `loan` WHERE `LibraryCardID` = :LibraryCardID AND `BookID` = :BookID AND `DateReturned` = :DateReturned");
            $statement = $conn->prepare("SELECT * FROM `loan` WHERE `LibraryCardID` = :LibraryCardID AND `BookID` = :BookID AND `DateOut` = :DateOut");
            $statement->bindParam('LibraryCardID', $customerID);
            $statement->bindParam('BookID', $bookID);
            $statement->bindParam('DateOut', $loanOutDate);
//            $statement->bindParam('DateReturned', $loanReturnDate);

            
            $statement->setFetchMode(PDO::FETCH_CLASS, get_class($loan));
            $statement->execute();
            $loans = $statement->fetchAll();
            
            foreach($loans as $loanItem) {  
                echo "<br>LoanID: " . $loanItem->getLoanID();
                echo "<br>Date book loaned out: " . $loanItem->getDateOut();
                echo "<br>Date book returned: " . $loanItem->getDateReturned();
                echo "<br>CustomerID: " . $loanItem->getLibraryCardID();
                echo "<br>BookID: " . $loanItem->getBookID();
//                echo "<br>Date loan due: " . $loanItem->getLoanDueBackDate();
                echo "<br>Date loan due: " . date('Y-m-d', strtotime('+1 month', strtotime($loanItem->getDateOut())));
//                echo $loan->getIsLoanOverdue() ? "<br>This loan is OVERDUE!" : "";

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

