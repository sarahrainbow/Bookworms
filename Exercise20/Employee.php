<?php

namespace Employee{

include 'Person.php';   
use Person\Person;

class Employee extends Person{
    private $employeeID; 
    private $jobtitle;
        
        public function __construct(int $employeeID, string $jobtitle, string $firstname, string $surname){
                $this->employeeID = $employeeID;
                $this->jobtitle = $jobtitle;
                parent::__construct($firstname, $surname);
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
 $employee=new employee(2384958, 'Librarian', 'Harry', 'Potter');
    echo $employee->getJobTitle();   
    
    
    
    
    
    
}