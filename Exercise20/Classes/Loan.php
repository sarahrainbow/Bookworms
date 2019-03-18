<?php

namespace Loan {
    
//    include_once 'Library.php';
//    use Library\Library;
    
    
    class Loan {
        
        private $loanID;
        private $loanOutDate;
        private $loanReturnDate;
        private $isLoanOverdue;
        private $loanedBookID;
        private $loanCustomerID;
        

        
        public function __construct(int $loanID, $loanOutDate, $loanedBookID, $loanCustomerID) {
            $this->setLoanID($loanID);
            $this->setLoanOutDate($loanOutDate);
            $this->setLoanedBookID($loanedBookID);
            $this->setLoanCustomerID($loanCustomerID);
//            parent::__construct('Bookworms', 6780);
        }
        
        public function getLoanID() {
            return $this->loanID;
        }
        
        public function setLoanID(int $loanID) {
            $this->loanID = $loanID;
        }
        
        public function getLoanOutDate() {
            return $this->loanOutDate;
        }
        
        public function setLoanOutDate($loanOutDate) {
            $this->loanOutDate = $loanOutDate;
        }

        public function getLoanReturnDate() {
            return $this->loanReturnDate;
        }
        
        public function setLoanReturnDate($loanReturnDate) {
            $this->loanReturnDate = $loanReturnDate;
        }

        public function getIsLoanOverdue() {
            return $this->isLoanOverdue;
        }
        
        public function setIsLoanOverdue(bool $isLoanOverdue) {
            $this->isLoanOverdue = $isLoanOverdue;
        }  
        
        public function getLoanedBookID() {
            return $this->loanedBookID;
        }
        
        public function setLoanedBookID(int $loanedBookID) {
            $this->loanedBookID = $loanedBookID;
        }
        
        public function getLoanCustomerID() {
            return $this->loanCustomerID;
        }
        
        public function setLoanCustomerID(int $loanCustomerID) {
            $this->loanCustomerID = $loanCustomerID;
        }
    
    }
    
}

