<?php

namespace LoanController {
    
    include_once 'Loan.php';
    use Loan\Loan;
    include_once 'Book.php';
    use Book\Book;

    
    class LoanController {
        private $loans = []; //created loan array in the loan controller 

        public function getLoans() { // This function returns the array 
            return $this->loans;
        }
       
        public function loanBook(Loan $loan, Book $book) {
            if($book->getIsAvailable()){
                array_push($this->loans, $loan); //Put the loan information into the array and pulling books added into book class
                $book->setIsAvailable(false); //Setting the book as unavailable by creating a boolean (false means book is now loaned out)
            }
            else if (!$book->getIsAvailable()) {
//                die("Book already loaned");
                echo "Book already loaned\n";
            }
                
        }
        
        public function returnBook(int $loanID, $loanReturnDate, Book $book) { //uses loadID, retrun date and book object
            foreach($this->loans as $loan) { //iterates through loan array
                if($loan->getLoanID() === $loanID) { //IF loanID matches loanID entered into the function entered
                    $loan->setLoanReturnDate($loanReturnDate);
                    $book->setIsAvailable(true); //Sets availability to true
                }
            }
        }
        
    }
    

            
}

