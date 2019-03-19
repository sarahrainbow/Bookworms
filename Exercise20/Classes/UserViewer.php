<?php
namespace UserViewer {
    
    require_once 'Customer.php';
    use Customer\Customer;
    
    class UserViewer {
        
        public function listAccountDetails (Customer $customer) {//taking customer object type and variable is argument
            echo "Customer ID:" . $customer->customerID;
//            echo "First name:" . $customer->firstname;
//            echo "Last name:" . $customer->surname;
//            echo "Address:" . $customer->address;
//            echo "Email:" . $customer->email;
//            echo "User name" . $customer->username;
//            echo "Password" . $customer->password;
//            Echo "Loan limit" . $customer->loanlimit;
//            echo "Date joined" . $customer->datejoined;
//            echo "Privileges" . $customer->privileges;
          
        }
  
   }
    
    $myUserDetails = new UserViewer();
    $myUserDetails->listAccountDetails(new Customer(4234));
    
}

//(int $customerID, string $firstname,  string $secondname,string $surname, string $address, string $email, string $username, string $password, string $privileges, string $datejoined){
//                    $this->customerID = $customerID;

//, 'ted', 'James', 'Baker', 'The Heights', 'ted@test.com,', 'Ted40', 'fsdfsd', 'User', '2019-03-01'

 
