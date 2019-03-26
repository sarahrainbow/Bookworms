<?php

namespace Models {
    
    require_once 'BranchItem.php';
    use Models\BranchItem;
    
    
    class Loan extends BranchItem {
        
        private $ID;
        private $loanOutDate;
        private $loanReturnDate;
        private $loanDueBackDate;
        private $isLoanOverdue;
        private $loanedBookID;
        private $loanCustomerID;
        

        public function __construct(int $ID, $loanOutDate, int $loanedBookID, int $loanCustomerID, string $branchName, int $branchCode) {
            $this->setID($ID);
            $this->setLoanOutDate($loanOutDate);
            $this->setLoanedBookID($loanedBookID);
            $this->setLoanCustomerID($loanCustomerID);
            $this->setLoanDueBackDate();
            parent::__construct($branchName, $branchCode);
        }
        
        public function getID() {
            return $this->ID;
        }
        
        public function setID(int $ID) {
            $this->ID = $ID;
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

