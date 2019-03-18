<?php

namespace LoanController {
    
    include_once 'Loan.php';
    use Loan\Loan;
    include_once 'Book.php';
    use Book\Book;

    
    class LoanController {
        private $loans = [];

        public function getLoans() {
            return $this->loans;
        }
       
        public function loanBook(Loan $loan, \Book\Book $book) {
            array_push($this->loans, $loan); 
            $book->setIsAvailable(false);
        }
        
        public function returnBook(int $loanID, $loanReturnDate, Book $book) {
            foreach($this->loans as $loan) {
                if($loan->getLoanID() === $loanID) {
                    $loan->setLoanReturnDate($loanReturnDate);
                    $book->setIsAvailable(true);
                }
            }
        }
        
        
        
    }
    

            
}

