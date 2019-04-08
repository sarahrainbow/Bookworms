<?php

namespace Controllers {
    
    #For Cynthujaa 
//    include_once '/Users/getintotech/Applications/XAMPP/xamppfiles/htdocs/BookwormsApp/Models/Loan.php';
//    include_once '/Users/getintotech/Applications/XAMPP/xamppfiles/htdocs/BookwormsApp/Models/Book.php';
//    include_once '/Users/getintotech/Applications/XAMPP/xamppfiles/htdocs/BookwormsApp/Models/Person.php';
//    include_once '/Users/getintotech/Applications/XAMPP/xamppfiles/htdocs/BookwormsApp/Traits/ControllerTrait.php';
    
    if(file_exists('/Users/getintotech/Applications/XAMPP/xamppfiles/htdocs/BookwormsApp/Traits/ControllerTrait.php')){
        include '/Users/getintotech/Applications/XAMPP/xamppfiles/htdocs/BookwormsApp/Traits/ControllerTrait.php';
    }
    else {
        require_once(__DIR__ . '/../Traits/ControllerTrait.php');
    }

    spl_autoload_register(function($Name) {
        $filePath = "$Name.php";
        $macFilePath = str_replace('\\', '/', $filePath);
        require_once '../' . $macFilePath;   
    });
    
    use Models\ {Book, Loan, Person};
    use Traits\ {Controller};
    use PDO;

    
    class LoanController {
        use Controller; 
        
        public $loans = []; //created loan array in the loan controller 

        public function getLoans() { // This function returns the array 
            return $this->loans;
        }
        
        public function setLoans(array $loans) {
            $this->loans = $loans;
        }
        
//        public function incrementLoanCount(Person $person) {
//            $person->setLoanCount($person->getLoanCount()++);
//        }
       
        public function loanBook(Loan $loan, Book $book) {
            if($book->getIsAvailable()){
                array_push($this->loans, $loan); 
                $book->setIsAvailable(false); 
                echo "<br>" . $book->getTitle() . " successfully loaned with bookID: " . $book->getBookID();
            }
            else if (!$book->getIsAvailable()) {
                echo "\nBook already loaned\n";
            }
    
        }
        
        public function loanBookPDO($loanDetails) {
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
            
            $statement = $conn->prepare("INSERT INTO `loan`(`LibraryCardID`, `BookID`, `DateOut`) VALUES ((SELECT LibraryCardID from librarycardholder WHERE librarycardholder.LibraryCardID = :LibraryCardID), (SELECT BookID from copy WHERE copy.BookID = :BookID), :DateOut)");

            try {
                $statement->execute(['LibraryCardID' => $customerID, 'BookID' => $bookID, 'DateOut' => $loanOutDate]);                   
            } catch (PDOException $e) {
                echo $e->getMessage() . ' on line ' . $e->getLine();
                $error = $e->errorInfo;
                die();
            }
        }
        
        
        public function returnBook(int $loanID, $loanReturnDate, Book $book) { //uses loadID, return date and book object
            foreach($this->loans as $loan) { //iterates through loan array
                if($loan->getID() === $loanID) { //IF loanID matches loanID entered into the function entered
                    $loan->setLoanReturnDate($loanReturnDate);
                    $book->setIsAvailable(true); //Sets availability to true
                    echo "<br>" . $book->getTitle() . " succesffully returned with bookID: " . $book->getBookID();
                }
            }
        }
        
        public function returnBookPDO($loanDetails) {
            
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
            //            set return date
            $returnDateStatement = $conn->prepare("UPDATE `loan` SET `DateReturned`= :DateReturned WHERE `BookID`= :BookID AND `LibraryCardID` = :CustomerID AND `DateReturned` IS NULL");

            try {
                $returnDateStatement->execute(['DateReturned' => $loanReturnDate, 'BookID' => $bookID, 'CustomerID' => $customerID]);                   
            } catch (PDOException $e) {
                echo $e->getMessage() . ' on line ' . $e->getLine();
                $error = $e->errorInfo;
                die();
            } 
        }
        
        public function deleteLoan(Loan $loanToDelete){
            foreach($this->getLoans() as $key => $loan) {
                if($loan->getID() === $loanToDelete->getID()){
                    unset($this->loans[$key]);
                    echo "<br>Successfully deleted loan with loanID: " . $loanToDelete->getID();
                }
            }
        }
        
        public function flagLoanOverdue(Loan $loan) {
//            $todaysDate = date('Y-m-d');
            if($loan->getLoanDueBackDate() < $loan->getLoanReturnDate()){
                $loan->setIsLoanOverdue(true);
            }
            
        }
        
    }    
            
}

