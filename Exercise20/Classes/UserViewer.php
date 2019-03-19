<?php
namespace UserViewer {
    
    require_once 'Customer.php';
    use Customer\Customer;
    
    class UserViewer {
        
        public function listAccountDetails (Customer $customerID) {//taking customer object type and variable is argument
            echo "Customer ID:" . $customer->customerID;
            echo "First name:" . $customer->firstname;
            echo "First name:" . $customer->secondname;
            echo "Last name:" . $customer->surname;
            echo "Address:" . $customer->address;
           echo "Email:" . $customer->email;
           echo "User name" . $customer->username;
            echo "Password" . $customer->password;
            echo "Loan limit" . $customer->loanlimit;
            echo "Date joined" . $customer->datejoined;
            echo "Privileges" . $customer->privileges;
          
        }
  
   }
    
    $myUserDetails = new UserViewer();
    $myUserDetails->listAccountDetails(4569, 'Ted', 'James', 'Baker', 'The Heights', 'ted@test.com', 'Ted40', 'fsdfsd', 5,  '2019-03-01', 'User');
    
}

//$myCustomer = new Customer(34343, 'Mel', 'lea', 'Leather', 'the heights', 'melanie_leather@hotmail.com', 'Mel', 'dfssf', 'user', '23.04.19');
//var_dump($myCustomer);

//, $firstname, $secondname, $surname, $address, $email, $username, $password, $loanlimit, $datejoined, $privileges



//(int $customerID, string $firstname,  string $secondname,string $surname, string $address, string $email, string $username, string $password, string $privileges, string $datejoined){
//                    $this->customerID = $customerID;

//, 'ted', 'James', 'Baker', 'The Heights', 'ted@test.com,', 'Ted40', 'fsdfsd', 'User', '2019-03-01'

 
