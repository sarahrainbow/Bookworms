<?php

namespace Models{

require_once ('Person.php');   
use Models\Person;

    class Customer extends Person{
        private $customerID;
        private $avatarFilePath;

            public function __construct(string $firstname,  string $secondname,string $surname, string $addressNumber, string $addressRoad, string $addressCity, string $addressPostcode, $phone, string $email, string $username, string $password, string $privileges, string $datejoined){
                    #$this->customerID = $customerID;
                    parent::__construct($firstname, $secondname,$surname, $addressNumber, $addressRoad, $addressCity, $addressPostcode, $phone, $email, $username, $password, $privileges, $datejoined);
            }

            public function getCustomerID(){
                return $this->customerID;
            }

            public function setCustomerID($newCustomerID){
                $this->customerID=$newCustomerID;
            }
            
            public function getAvatarFilePath(){
                return $this->avatarFilePath;
            }

            public function setAvatarFilePath($newAvatarFilePath){
                $this->avatarFilePath=$newAvatarFilePath;
            }

          


    }   
     

            
    
    
    
    
    
    
}
