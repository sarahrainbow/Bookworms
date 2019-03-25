<?php

namespace Models {
    
//    include_once 'Library.php';
//    use Library\Library;
    
    
    class Loan {
        
        private $loanID;
        private $loanOutDate;
        private $loanReturnDate;
        private $loanDueBackDate;
        private $isLoanOverdue;
        private $loanedBookID;
        private $loanCustomerID;
        
// have only included properties in my construct that will be necessary for creating new Loan instance e.g. return date not set because that should be set later (when the book is returned)
        public function __construct(int $loanID, $loanOutDate, int $loanedBookID, int $loanCustomerID) {
            $this->setLoanID($loanID);
            $this->setLoanOutDate($loanOutDate);
            $this->setLoanedBookID($loanedBookID);
            $this->setLoanCustomerID($loanCustomerID);
            $this->setLoanDueBackDate();
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
        
        public function getLoanDueBackDate() {
            return $this->loanDueBackDate;
        }
        
        //this is set automatically when a new instance of a Loan is called.
        public function setLoanDueBackDate() {
            $this->loanDueBackDate = date('Y-m-d', strtotime('+1 month', strtotime($this->loanOutDate)));
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

