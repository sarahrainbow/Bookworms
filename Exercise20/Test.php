<?php

namespace Tests {
    
    #Could try using autoload function for loading of class files

    // WINDOWS TEST (with back slash delimiters)
//    require_once ('Models\Person.php'); 
//    require_once ('Models\Employee.php'); 
//    require_once ('Controllers\CustomerController.php');
//    require_once ('Models\Customer.php');
//    require_once ('Models\Loan.php');
//    require_once 'Controllers\LoanController.php';
//    require_once 'Models\Book.php';
//    require_once 'Viewers\LoanViewer.php';
//    require_once 'Viewers\UserViewer.php';

    // MAC TEST (with forward slash delimiters)
//    require_once ('Models/Person.php'); 
//    require_once ('Models/Employee.php');
//    require_once ('Models/Customer.php');
//    require_once 'Models/Loan.php';
//    require_once 'Models/Book.php';
//    require_once ('Controllers/CustomerController.php');
//    require_once 'Controllers/LoanController.php';
//    require_once 'Viewers/LoanViewer.php';
//    require_once 'Viewers/UserViewer.php';
    
    spl_autoload_register(function($Name) { #detects full pathname of class and then searches in equivalent file structure to include file
    require_once $Name . '.php';
    });
    
    use Models\ {Person, Employee, Customer, Loan, Book};
    use Controllers\ {CustomerController, LoanController};
    use Viewers\ {LoanViewer, UserViewer};
    

    
    Class Tests {
        
        private $testBook;
        private $testPerson;
        private $testEmployee;
        private $testCustomer;
        private $testCustomerController;
        private $testLoan;
        private $testLoanController;
        private $testLoanViewer;
        private $testUserViewer;
        
        public function __construct() {
            $this->testBook = new Book(000001, 'Harry Potter', ['J K Rowling'], 135, 1989, 'Children');
            #$this->testPerson = new Person('David', '','Beckham','11 Beckingham Palace','davidbeckham@gmail.com','goldenballs7','champsleague99','','');
            #above no longer works as Person is an abstract class and can't be instantiated from
            $this->testEmployee= new Employee(2384958, 'librarian', 'Frida', '','Kahlo','4 Feet Under','','','','','');
            $this->testCustomer = new Customer(12345, 'Matilda', 'Honey', 'Wormwood','9 Youngwood Drive','matildahoney@gmail.com','bookworm23','Password123','','');
            $this->testCustomerController = new CustomerController();
            $this->testLoan = new Loan(98765, '13-01-19', 1, 2);
            $this->testLoanController = new LoanController();
            $this->testLoanViewer = new LoanViewer();
            $this->testUserViewer = new UserViewer(4569, 'Ted', 'James', 'Baker', 'The Heights', 'ted@test.com', 'Ted40', 'fsdfsd', 'User', '2019-03-01');
        }
        
        public function testBook() {
            
            echo 'The title is '.$this->testBook->getTitle().' and is written by '.$this->testBook->getAuthors().' was published in '.$this->testBook->getPublishDate().'.'.PHP_EOL;
        }
        
//        public function testPerson() {
//            
//            echo $this->testPerson->getFirstName().' '.$this->testPerson->getSurname().' is married to Victoria Beckham. They live at '.$this->testPerson->getAddress().'.'.PHP_EOL;
//
//            #or
//
//            echo $this->testPerson->getFullName().PHP_EOL;
//        }
        
        
        public function testEmployee() {
           
            echo $this->testEmployee->getFullName().'(ID='.$this->testEmployee->getEmployeeID().')'.' is a '.$this->testEmployee->getJobTitle().'.'.PHP_EOL;#this is pulling a method from the Person class and from the Eemployee class

            $this->testEmployee->setJobTitle('library manager');
            echo $this->testEmployee->getFullName().' has been promoted. Her new job title is '.$this->testEmployee->getJobTitle().'.'.PHP_EOL;

            print_r($this->testEmployee);#demonstrates that employees have greater loanlimit, overwritten in child class
        }
        
        public function testCustomer() {
            
        #NB - Currently employees/customers are assumed to be separate entities (ignoring issue that employees can be library card holders)
            echo $this->testCustomer->getFullName().' has library card number: '.$this->testCustomer->getCustomerID().PHP_EOL;

            $this->testCustomer->setPassword('WordPass321');   
            echo $this->testCustomer->getFullName()."'s password has been updated to ".$this->testCustomer->getPassword().PHP_EOL;
        }
        
        public function testCustomerController() {
            
            $this->testCustomerController->addCustomer($this->testCustomer);
            $this->testCustomerController->addCustomer(new Customer(12346, 'Charlie', '', 'Bucket','1 Willy Wonka Lane','igotchoc@gmail.com','charliebuck','goldenticket1','',''));

            print_r($this->testCustomerController->customers);#to make the test work the array has been set to public

//            $this->testCustomerController->removeCustomer(12345);
//            print_r($this->testCustomerController->customers);
        }
        
        public function testLoan() {
            
            
            var_dump($this->testLoan);

            $this->testLoan->setLoanID(12345);
            echo "\nloanID: " . $this->testLoan->getLoanID();

            $this->testLoan->setLoanOutDate('15-01-19');
            echo "\nloanOutDate: " . $this->testLoan->getLoanOutDate();

            $this->testLoan->setLoanReturnDate('14-01-19');
            echo "\nloanReturnDate: " . $this->testLoan->getLoanReturnDate();

            $this->testLoan->setIsLoanOverdue(false);
            echo "\nloanOverdue: ";
            var_dump($this->testLoan->getIsLoanOverdue());
        }
        
        public function testLoanController() {

            $testLoan2 = new Loan(2, '2012-02-02', 4, 2);
            $testBook2 = new Book(2, 'A Clockwork Orange', ['Anthony Burgess'], 23, 1984, 'Horror');
            
            $this->testLoanController->loanBook((new Loan(1, '11-1-01', 3, 1)), $this->testBook);
            $this->testLoanController->loanBook((new Loan(2, '12-2-02', 4, 2)), $testBook2);

            var_dump($this->testLoanController->getLoans());

            $this->testLoanController->returnBook(1, '2012-12-12', $this->testBook);

            $this->testLoanController->deleteLoan($testLoan2);
            var_dump($this->testLoanController->getLoans());
            
            $this->testLoanController->flagLoanOverdue($this->testLoan);
            
        }
        
        public function testLoanViewer() {
            
            $this->testLoan->setIsLoanOverdue(true);
            $this->testLoanController->loanBook($this->testLoan, $this->testBook); 
            $this->testLoanController->returnBook($this->testLoan->getLoanID(), "2013-12-13", $this->testBook);
            $this->testLoanViewer->listLoan($this->testLoan);
        }
        
    }
    
    $myTest = new Tests();
    
    
$myTest->testEmployee();
$myTest->testCustomer();
$myTest->testCustomerController();
$myTest->testLoan();
$myTest->testLoanController();
$myTest->testLoanViewer();
#$myTest->testUserViewer(); #not been added by Mel yet
    
    
}

