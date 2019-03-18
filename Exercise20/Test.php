<?php

#Could try using autoload function for loading of class files
require_once ('Classes\Person.php'); 
require_once ('Classes\Employee.php'); 
require_once ('Classes\CustomerController.php');
require_once ('Classes\Customer.php');

    ##Testing Person
     use Person\Person;

        $testperson=new person('David', '','Beckham','11 Beckingham Palace','davidbeckham@gmail.com','goldenballs7','champsleague99','','');
        echo $testperson->getFirstName().' '.$testperson->getSurname().' is married to Victoria Beckham. They live at '.$testperson->getAddress().'.'.PHP_EOL;

        #or

        echo $testperson->getFullName().PHP_EOL;

        
    ##Testing Employee
     use Employee\Employee;

        $testemployee=new employee(2384958, 'librarian', 'Frida', '','Kahlo','4 Feet Under','','','','','');
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