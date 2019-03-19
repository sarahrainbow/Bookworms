<?php

namespace Employee{

require_once ('Person.php');   
use Person\Person;

    class Employee extends Person{ //inherits attributes (name, address etc.) from Person Class allowing additional ones (Job Title, ID) to be added
        private $employeeID; 
        private $jobtitle;
        protected $loanlimit=10;#this overwrites general limit of 5

            public function __construct(int $employeeID, string $jobtitle, string $firstname,  string $secondname,string $surname, string $address, string $email, string $username, string $password, string $privileges, string $datejoined){
                    $this->employeeID = $employeeID;
                    $this->jobtitle = $jobtitle;
                    parent::__construct($firstname, $secondname,$surname, $address, $email, $username, $password,$privileges, $datejoined);

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
