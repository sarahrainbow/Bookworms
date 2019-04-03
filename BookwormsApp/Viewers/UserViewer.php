<?php
namespace Viewers {
    
    #For Cynthujaa  
//    require_once '/Users/getintotech/Applications/XAMPP/xamppfiles/htdocs/BookwormsApp/Models/Customer.php';
//    require_once '/Users/getintotech/Applications/XAMPP/xamppfiles/htdocs/BookwormsApp/Models/Employee.php';

    
    spl_autoload_register(function($Name) {
        $filePath = "$Name.php";
        $macFilePath = str_replace('\\', '/', $filePath);
        require_once '../' . $macFilePath;   
    });
    
    use Models\ {Customer, Employee};
    
    class UserViewer {
        
        public function listAccountDetails (Customer $customer) {//taking customer object type and variable is argument
            echo "Customer ID: " . $customer->getCustomerID() . "\n";
            echo "First name: " . $customer->getFirstName() . "\n";
            echo "Middle name: " . $customer->getSecondName() . "\n";
            echo "Last name: " . $customer->getSurname() . "\n";
            echo "Address: " . $customer->getAddress() . "\n";
            echo "Email: " . $customer->getEmail() . "\n";
            echo "User name: " . $customer->getUsername() . "\n";
            echo "Password: " . $customer->getPassword() . "\n";
            echo "Date joined: " . $customer->getDateJoined() . "\n";
            echo "Privileges: " . $customer->getPrivileges() . "\n";
          
        }
        
        #Added by Faith
        public function listEmployeeDetails (Employee $employee) {//taking customer object type and variable is argument
            echo "Customer ID: " . $employee->getEmployeeID() . "\n";
            echo "Name: " . $employee->getFullName() . "\n";
            echo "Address: " . $employee->getAddress() . "\n";
            echo "Email: " . $employee->getEmail() . "\n";
            echo "Date joined: " . $employee->getDateJoined() . "\n";
            echo "Privileges: " . $employee->getPrivileges() . "\n";
   }
   
               
    }           
    //$myUserDetails = new UserViewer;
    //$myUserDetails->listAccountDetails(new Customer (4569, 'Ted', 'James', 'Baker', 'The Heights', 'ted@test.com', 'Ted40', 'fsdfsd', 'User', '2019-03-01'));
    

 
}
