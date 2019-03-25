<?php

namespace Controllers {
    
    #For Cynthuja  
    #include_once '/Users/getintotech/Applications/XAMPP/xamppfiles/htdocs/Exercise20/Model/Loan.php';
    #include_once '/Users/getintotech/Applications/XAMPP/xamppfiles/htdocs/Exercise20/Model/Book.php';
    
    
    require_once(__DIR__ . '/../Models/Loan.php');
    require_once(__DIR__ . '/../Models/Book.php');
    
    use Models\ {Book, Loan};

    
    class LoanController {
        public $loans = []; //created loan array in the loan controller 

        public function getLoans() { // This function returns the array 
            return $this->loans;
        }
        
        public function setLoans(array $loans) {
            $this->loans = $loans;
        }
       
        public function loanBook(Loan $loan, Book $book) {
            if($book->getIsAvailable()){
                array_push($this->loans, $loan); //Put the loan information into the array and pulling books added into book class
                $book->setIsAvailable(false); //Setting the book as unavailable by creating a boolean (false means book is now loaned out)
                echo "\n" . $book->getTitle() . " successfully loaned with bookID: " . $book->getBookID();
            }
            else if (!$book->getIsAvailable()) {
//                die("Book already loaned");
                echo "\nBook already loaned\n";
            }
                
        }
        
        public function returnBook(int $loanID, $loanReturnDate, Book $book) { //uses loadID, retrun date and book object
            foreach($this->loans as $loan) { //iterates through loan array
                if($loan->getLoanID() === $loanID) { //IF loanID matches loanID entered into the function entered
                    $loan->setLoanReturnDate($loanReturnDate);
                    $book->setIsAvailable(true); //Sets availability to true
                    echo "\n" . $book->getTitle() . " succesffully returned with bookID: " . $book->getBookID();
                }
            }
        }
        
        public function deleteLoan(Loan $loanToDelete){
            foreach($this->getLoans() as $key => $loan) {
                if($loan->getLoanID() === $loanToDelete->getLoanID()){
                    unset($this->loans[$key]);
                    echo "\nSuccessfully deleted loan with loanID: " . $loanToDelete->getLoanID();
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
//    $testBook = new Book(1, 'Harry Potter', ['J K Rowling'], 135, 1989, 'Children');
//    $testBook2 = new Book(2, 'A Clockwork Orange', ['Anthony Burgess'], 23, 1984, 'Horror');
//    $testLoanController = new LoanController();
//    $testLoan = new Loan(1, '2019-02-18', 3, 1);
//    $testLoan2 = new Loan(2, '2012-02-02', 4, 2);
//    $testLoanController->loanBook($testLoan, $testBook);
//    $testLoanController->returnBook(1, '2018-12-12', $testBook);
//    $testLoanController->loanBook($testLoan2, $testBook2);
////    
//    $testLoanController->deleteLoan($testLoan2);
//    
//    var_dump($testLoanController->getLoans());
//    echo "\n" . $testLoan->getLoanDueBackDate();
//    echo "\n" . date('Y-m-d');
//    echo "\n";
//    $testLoanController->flagLoanOverdue($testLoan);
            
}

