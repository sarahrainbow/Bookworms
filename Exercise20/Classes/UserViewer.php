<?php
namespace UserViewer {
    
    require_once 'Customer.php';
    use Customer\Customer;
    
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
   }
    
    //$myUserDetails = new UserViewer;
    //$myUserDetails->listAccountDetails(new Customer (4569, 'Ted', 'James', 'Baker', 'The Heights', 'ted@test.com', 'Ted40', 'fsdfsd', 'User', '2019-03-01'));
    
}
 
