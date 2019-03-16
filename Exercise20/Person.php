<?php

namespace Person{

    class Person {
        private $firstname; 
        private $surname;
        
        public function __construct(string $firstname, string $surname){
                $this->firstname = $firstname;
                $this->surname = $surname;    
        }

        public function getFirstName(){
            return $this->firstname;
        }
        
        public function setFirstName($newFirstName){
            $this->firstname=$newFirstName;
        }
        
        public function getSurname(){
            return $this->surname;
        }
        
        public function setSurname($newSurname){
            $this->surname=$newSurname;
        }
    }
    
    //$person=new person('Harry', 'Potter');
    //echo $person->getFirstName();
}
        

