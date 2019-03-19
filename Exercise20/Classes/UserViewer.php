<?php
namespace UserViewer {
    
    require_once 'Customer.php';
    use Customer\Customer;
    
    class UserViewer {
        
        public function listAccountDetails (Customer $customer) {//taking customer object type and variable is argument
            echo "Customer ID:" . $customer->getCustomerID();
            echo "First name:" . $customer->getFirstName();
            echo "First name:" . $customer->getSecondName();
            echo "Last name:" . $customer->getSurname();
            echo "Address:" . $customer->getAddress();
           echo "Email:" . $customer->getEmail();
           echo "User name" . $customer->getUsername();
            echo "Password" . $customer->getPassword();
//            echo "Loan limit" . $customer->;??
            echo "Date joined" . $customer->getDateJoined();
            echo "Privileges" . $customer->getPrivileges();
          
        }
  
   }
    
    $myUserDetails = new UserViewer();
    $myUserDetails->listAccountDetails(new Customer (4569, 'Ted', 'James', 'Baker', 'The Heights', 'ted@test.com', 'Ted40', 'fsdfsd', 5,  '2019-03-01', 'User'));
    
}
//$myCustomer = new Customer(34343, 'Mel', 'lea', 'Leather', 'the heights', 'melanie_leather@hotmail.com', 'Mel', 'dfssf', 'user', '23.04.19');
//var_dump($myCustomer);
//, $firstname, $secondname, $surname, $address, $email, $username, $password, $loanlimit, $datejoined, $privileges
//(int $customerID, string $firstname,  string $secondname,string $surname, string $address, string $email, string $username, string $password, string $privileges, string $datejoined){
//                    $this->customerID = $customerID;
//, 'ted', 'James', 'Baker', 'The Heights', 'ted@test.com,', 'Ted40', 'fsdfsd', 'User', '2019-03-01' 
 
