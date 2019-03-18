<?php

namespace LoanController {
    
    include_once 'Loan.php';
    use Loan\Loan;

    
    class LoanController {
        private $loans = [];

        public function getLoans() {
            return $this->loans;
        }
       
        public function loanBook(Loan $loan) {
            array_push($this->loans, $loan);    
        }
        
        public function returnBook(int $loanID, $loanReturnDate) {
            foreach($this->loans as $loan) {
                if($loan->getLoanID() === $loanID) {
                    $loan->setLoanReturnDate($loanReturnDate);
                }
            }
        }
        
        
    }
    

            
}

