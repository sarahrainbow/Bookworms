<?php

namespace Loan {
    
//    include_once 'Library.php';
//    use Library\Library as Library;
    
    class Loan {
        
        private $loanID;
        private $loanOutDate;
        private $loanReturnDate;
        private $isLoanOverdue;
        
        public function __construct(int $loanID, $loanOutDate, $loanReturnDate, bool $isLoanOverdue) {
            $this->setLoanID($loanID);
            $this->setLoanOutDate($loanOutDate);
            $this->setLoanReturnDate($loanReturnDate);
            $this->setIsLoanOverdue($isLoanOverdue);
//            parent::__construct('Bookworms', 6780);
        }
        
        public function getLoanID() {
            return $this->loanID;
        }
        
        private function setLoanID(int $loanID) {
            $this->loanID = $loanID;
        }
        
        public function getLoanOutDate() {
            return $this->loanOutDate;
        }
        
        private function setLoanOutDate($loanOutDate) {
            $this->loanOutDate = $loanOutDate;
        }

        public function getLoanReturnDate() {
            return $this->loanReturnDate;
        }
        
        private function setLoanReturnDate($loanReturnDate) {
            $this->loanReturnDate = $loanReturnDate;
        }

        public function getIsLoanOverdue() {
            return $this->isLoanOverdue;
        }
        
        private function setIsLoanOverdue(bool $isLoanOverdue) {
            $this->isLoanOverdue = $isLoanOverdue;
        }        
    
    }
    
    $myLoan = new Loan(98765, '13-01-19', '12-02-19', true);
    
    var_dump($myLoan);
}

