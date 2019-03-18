<?php

 

//want to show account details, list privileges, list fine

namespace UserViewer {
    
   include 'Customer.php';
    use Customer\Customer;
    
    class UserViewer extends Customer {
        
public function __construct(int $customerID, string $firstname, string $secondname, string $surname, string $address, string $email, string $username, string $password, string $datejoined){ 
       parent::__construct($firstname, $secondname, $surname, $address, $email, $username, $password, $privileges, $datejoined);
}
 
public function ListAccountDetails(){
                return $this->$customerID;
                return $this->$firstname;
                return $this->$secondname;
                return $this->$surname;
                return $this->$address;
                return $this->$email;
                return $this->$username;
                return $this->$password;
                return $this->privileges;
                return $this->$datejoined;
                }
                
            public function getAccountDetails(){
                 return $this->$customerID;
                return $this->$firstname;
                return $this->$secondname;
                return $this->$surname;
                return $this->$address;
                return $this->$email;
                return $this->$username;
                return $this->$password;
                return $this->privileges;
                return $this->$datejoined;
            }
            
            public function setAccountDetails($AccountDetails){
                $this->$customerID;
                $this->$firstname;
                $this->$secondname;
                $this->$surname;
                $this->$address;
                $this->$email;
                $this->$username;
                $this->$password;
                return $this->privileges;
                $this->$datejoined;
    }
}
$UserAccountDetails = new UserViewer(34234,'Ted', 'Smith', 'The High Street', 'ted@test.com', 'Ted40', 'dfsdfsdf', '240216', 'ted', 'ted');

var_dump($UserAccountDetails);
}
