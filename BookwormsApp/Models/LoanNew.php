<?php

namespace Models {
    use PDO;

    class LoanNew  {
        
        private $LoanID;
        private $LibraryCardID;
        private $BookID;
        private $DateReturned;
        private $DateOut;
      

        public function __construct() {
            $this->setLoanDueBackDate();
        }
        
        public function getLoanID() {
            return $this->LoanID;
        }
        
        public function setLoanID(int $LoanID) {
            $this->LoanID = $LoanID;
        }
        
        public function getDateOut() {
            return $this->DateOut;
        }
        
        public function setDateOut($DateOut) {
            $this->DateOut = $DateOut;
        }

        public function getDateReturned() {
            return $this->DateReturned;
        }
        
        public function setDateReturned($DateReturned) {
            $this->DateReturned = $DateReturned;
        }
        
        public function getBookID() {
            return $this->BookID;
        }
        
        public function setBookID(int $BookID) {
            $this->$BookID = $BookID;
        }
        
        public function getLibraryCardID() {
            return $this->LibraryCardID;
        }
        
        public function setLibraryCardID(int $LibraryCardID) {
            $this->LibraryCardID = $LibraryCardID;
        }  
        
        public function getLoanDueBackDate() {
            return $this->DateOut;
        }
        
        public function setLoanDueBackDate() {
            return date('Y-m-d', strtotime('+1 month', strtotime($this->DateOut)));
        }
    
    }   
    
}



