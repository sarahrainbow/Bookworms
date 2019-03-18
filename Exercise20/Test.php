<?php

#Could try using autoload function for loading of class files

// WINDOWS TEST (with back slash delimiters)
//require_once ('Classes\Person.php'); 
//require_once ('Classes\Employee.php'); 
//require_once ('Classes\CustomerController.php');
//require_once ('Classes\Customer.php');
//require_once ('Classes\Loan.php');
//require_once 'Classes\LoanController.php';
//require_once 'Classes\Book.php';
//require_once 'Classes\LoanViewer.php';

// MAC TEST (with forward slash delimiters)

require_once ('Classes/Person.php'); 
require_once ('Classes/Employee.php'); 
require_once ('Classes/CustomerController.php');
require_once ('Classes/Customer.php');
require_once 'Classes/Loan.php';
require_once 'Classes/LoanController.php';
require_once 'Classes/Book.php';
require_once 'Classes/LoanViewer.php';

    ##Testing Person
     use Person\Person;

        $testperson=new Person('David', '','Beckham','11 Beckingham Palace','davidbeckham@gmail.com','goldenballs7','champsleague99','','');
        echo $testperson->getFirstName().' '.$testperson->getSurname().' is married to Victoria Beckham. They live at '.$testperson->getAddress().'.'.PHP_EOL;

        #or

        echo $testperson->getFullName().PHP_EOL;

        
    ##Testing Employee
     use Employee\Employee;

        $testemployee=new Employee(2384958, 'librarian', 'Frida', '','Kahlo','4 Feet Under','','','','','');
        echo $testemployee->getFullName().'(ID='.$testemployee->getEmployeeID().')'.' is a '.$testemployee->getJobTitle().'.'.PHP_EOL;#this is pulling a method from the Person class and from the Eemployee class

        $testemployee->setJobTitle('library manager');
        echo $testemployee->getFullName().' has been promoted. Her new job title is '.$testemployee->getJobTitle().'.'.PHP_EOL;
        
        print_r($testemployee);#demonstrates that employees have greater loanlimit, overwritten in child class
         
        
    ##Testing Customer
        #NB - Currently employees/customers are assumed to be separate entities (ignoring issue that employees can be library card holders)
     use Customer\Customer;
     
        $testcustomer=new Customer(12345, 'Matilda', 'Honey', 'Wormwood','9 Youngwood Drive','matildahoney@gmail.com','bookworm23','Password123','','');
        echo $testcustomer->getFullName().' has library card number: '.$testcustomer->getCustomerID().PHP_EOL;
           
        $testcustomer->setPassword('WordPass321');   
        echo $testcustomer->getFullName()."'s password has been updated to ".$testcustomer->getPassword().PHP_EOL;

           
    #Testing Customer Controller
     use CustomerController\CustomerController;
     
        $mycustomercontroller=new CustomerController();
        $mycustomercontroller->addCustomer($testcustomer);
        $mycustomercontroller->addCustomer(new Customer(12346, 'Charlie', '', 'Bucket','1 Willy Wonka Lane','igotchoc@gmail.com','charliebuck','goldenticket1','',''));
        
        print_r($mycustomercontroller->customers);#to make the test work the array has been set to public
        
        #$mycustomercontroller->removeCustomer(12345);
        #print_r($mycustomercontroller->customers);
        
    #Testing Loan
    use Loan\Loan;
        
    $myLoan = new Loan(98765, '13-01-19', 1, 2);
    var_dump($myLoan);
    
    $myLoan->setLoanID(12345);
    echo "\nloanID: " . $myLoan->getLoanID();
    
    $myLoan->setLoanOutDate('15-01-19');
    echo "\nloanOutDate: " . $myLoan->getLoanOutDate();
    
    $myLoan->setLoanReturnDate('14-01-19');
    echo "\nloanReturnDate: " . $myLoan->getLoanReturnDate();
    
    $myLoan->setIsLoanOverdue(false);
    echo "\nloanOverdue: ";
    var_dump($myLoan->getIsLoanOverdue());
    
    
    # Testing LoanController
    use LoanController\LoanController;
    use Book\Book;
    
    $myBook = new Book(1, 'Harry Potter', ['J K Rowling'], 135, 1989, 'Children');
    $myLoanController = new LoanController();
    $myLoanController->loanBook((new Loan(1, '11-1-01', 3, 1)), $myBook);
    $myLoanController->loanBook((new Loan(2, '12-2-02', 4, 2)), $myBook);
    
    var_dump($myLoanController->getLoans());
    
    $myLoanController->returnBook(1, '12-12-12', $myBook);
    
    var_dump($myLoanController->getLoans());
    
    
    # Testing LoanViewer
    use LoanViewer\LoanViewer;
    $myLoan = new Loan(98765, '13-01-19', 1, 2);
    $myLoan->setIsLoanOverdue(true);
    $myLoanController = new LoanController();
    $myLoanController->loanBook($myLoan, $myBook);
    $myLoanController->returnBook(98765, "13-12-13", $myBook);
    $myLoanViewer = new LoanViewer();
    
    $myLoanViewer->listLoan($myLoan);