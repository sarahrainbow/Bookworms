<?php

namespace Controllers {
    
    #For Cynthujaa 
//    include_once '/Users/getintotech/Applications/XAMPP/xamppfiles/htdocs/BookwormsApp/Models/Loan.php';
//    include_once '/Users/getintotech/Applications/XAMPP/xamppfiles/htdocs/BookwormsApp/Models/Book.php';
//    include_once '/Users/getintotech/Applications/XAMPP/xamppfiles/htdocs/BookwormsApp/Models/Person.php';
//    include_once '/Users/getintotech/Applications/XAMPP/xamppfiles/htdocs/BookwormsApp/Traits/ControllerTrait.php';
    
    require_once(__DIR__ . '/../Models/Loan.php');
    require_once(__DIR__ . '/../Models/Book.php');
    require_once(__DIR__ . '/../Models/Person.php');
    require_once(__DIR__ . '/../Traits/ControllerTrait.php');
    
    use Models\ {Book, Loan, Person};
    use Traits\ {Controller};

    
    class LoanController {
        use Controller; //What is this for - not working for me?
        
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
                array_push($this->loans, $loan); //Put the loan information into the array and pulling books added into book class
                $book->setIsAvailable(false); //Setting the book as unavailable by creating a boolean (false means book is now loaned out)
                echo "<br>" . $book->getTitle() . " successfully loaned with bookID: " . $book->getBookID();
            }
            else if (!$book->getIsAvailable()) {
//                die("Book already loaned");
                echo "\nBook already loaned\n";
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
//    $testBook = new Book(1, 'Harry Potter', ['J K Rowling'], 135, 1989, 'Children');
//    $testBook2 = new Book(2, 'A Clockwork Orange', ['Anthony Burgess'], 23, 1984, 'Horror');
//    $testLoanController = new LoanController();
//    $testLoan = new Loan(1, '2019-02-18', 3, 1, "Kennington", 2);
//    $testLoan2 = new Loan(2, '2012-02-02', 4, 2, "Brighton", 8);
//    $testLoanController->loanBook($testLoan, $testBook);
//    $testLoanController->returnBook(1, '2018-12-12', $testBook);
//    $testLoanController->loanBook($testLoan2, $testBook2);
////    
//    $testLoanController->deleteLoan($testLoan2);
//    
//    $testLoanController->addItem($testLoanController->getLoans(), $testLoan);
//    var_dump($testLoanController->getLoans());
//    echo "\n" . $testLoan->getLoanDueBackDate();
//    echo "\n" . date('Y-m-d');
//    echo "\n";
//    $testLoanController->flagLoanOverdue($testLoan);
    
            
}

