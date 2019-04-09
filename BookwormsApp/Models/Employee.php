<?php

namespace Models{

require_once ('Person.php');   
use Models\Person;

    class Employee extends Person{ //inherits attributes (name, address etc.) from Person Class allowing additional ones (Job Title, ID) to be added
        private $employeeID; 
        private $jobtitle;
        protected $loanLimit=10;#this overwrites general limit of 5

            public function __construct(int $employeeID, string $jobtitle, string $firstname,  string $secondname,string $surname, string $addressNumber, string $addressRoad, string $addressCity, string $addressPostcode, $phone, string $email, string $username, string $password, string $privileges, string $datejoined){
                    $this->employeeID = $employeeID;
                    $this->jobtitle = $jobtitle;
                    parent::__construct($firstname, $secondname,$surname, $addressNumber, $addressRoad, $addressCity, $addressPostcode, $phone, $email, $username, $password,$privileges, $datejoined);

            }

            public function getEmployeeID(){
                return $this->employeeID;
            }

            public function setEmployeeID($newEmployeeID){
                $this->employeeID=$newEmployeeID;
            }

            public function getJobTitle(){
                return $this->jobtitle;
            }

            public function setJobTitle($newJobTitle){
                $this->jobtitle=$newJobTitle;
    }


    }   
     

            
    
    
    
    
    
    
}
