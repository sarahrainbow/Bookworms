<?php

namespace Customer{

require_once ('Person.php');   
use Person\Person;

    class Customer extends Person{
        private $customerID;

            public function __construct(int $customerID, string $firstname,  string $secondname,string $surname, string $address, string $email, string $username, string $password, string $privileges, string $datejoined){
                    $this->customerID = $customerID;
                    parent::__construct($firstname, $secondname,$surname, $address, $email, $username, $password, $privileges, $datejoined);
            }

            public function getCustomerID(){
                return $this->customerID;
            }

            public function setCustomerID($newCustomerID){
                $this->customerID=$newCustomerID;
            }

          


    }   
     

            
    
    
    
    
    
    
}
