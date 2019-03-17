<?php

require_once ('Person.php'); 
require_once ('Employee.php'); 
require_once ('Customer.php');

    ##Testing Person
     use Person\Person;

        $testperson=new person('David', '','Beckham','11 Beckingham Palace','davidbeckham@gmail.com','goldenballs7','champsleague99');
        echo $testperson->getFirstName().' '.$testperson->getSurname().' is married to Victoria Beckham. They live at '.$testperson->getAddress().'.'.PHP_EOL;

        #or

        echo $testperson->getFullName().PHP_EOL;

        
    ##Testing Employee
     use Employee\Employee;

        $testemployee=new employee(2384958, 'librarian', 'Frida', '','Kahlo','4 Feet Under','','','');
        echo $testemployee->getFullName().'(ID='.$testemployee->getEmployeeID().')'.' is a '.$testemployee->getJobTitle().'.'.PHP_EOL;#this is pulling a method from the Person class and from the Eemployee class

        $testemployee->setJobTitle('library manager');
        echo $testemployee->getFullName().' has been promoted. Her new job title is '.$testemployee->getJobTitle().'.'.PHP_EOL;
        
        print_r($testemployee);
         
        
    ##Testing Customer
        #NB - Currently employees/customers are assumed to be separate entities (ignoring issue that employees can be library card holders)
     use Customer\Customer;
     
        $testcustomer=new customer(12345, 'Matilda', 'Honey', 'Wormwood','9 Youngwood Drive','matildahoney@gmail.com','bookworm23','Password123');
           echo $testcustomer->getFullName().' has library card number: '.$testcustomer->getCustomerID().PHP_EOL;
