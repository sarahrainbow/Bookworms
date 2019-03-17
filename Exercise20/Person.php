<?php

namespace Person{

    class Person {
        protected $firstname; 
        protected $secondname;
        protected $surname;
        protected $address; 
        protected $email;
        protected $username;
        protected $password;
        #protected $isstaff; is this necessary if employees will have employee IDs?
        protected $loanlimit=5;
        
        public function __construct(string $firstname, string $secondname, string $surname, string $address, string $email, string $username, string $password){
                $this->firstname = $firstname;
                $this->secondname = $secondname;
                $this->surname = $surname;
                $this->address = $address; 
                $this->email = $email;
                $this->username = $username;
                $this->password = $password;
        
        }

        public function getFirstName(){
            return $this->firstname;
        }
        
        public function setFirstName($newFirstName){
            $this->firstname=$newFirstName;
        }
        
        public function getSecondName(){
            return $this->secondname;
        }
        
        public function setSecondName($newSecondName){
            $this->secondname=$newSecondName;
        }
        
        public function getSurname(){
            return $this->surname;
        }
        
        public function setSurname($newSurname){
            $this->surname=$newSurname;
        }
        
        public function getFullName(){ 
            if (empty($this->secondname)){
                return $this->firstname.' '.$this->surname;
            }
            else{
                return $this->firstname.' '.$this->secondname.' '.$this->surname;
            }
            }
            
        public function getAddress(){
            return $this->address;
        }
        
        public function setAddress($newAddress){
            $this->address=$newAddress;
        }
        
        public function getEmail(){
            return $this->email;
        }
        
        public function setEmail($newEmail){
            $this->email=$newEmail;
        }
        
        public function getUsername(){
            return $this->username;
        }
        
        public function setUsername($newUsername){
            $this->username=$newUsername;
        }
        
        public function getPassword(){
            return $this->password;
        }
        
        public function setPassword($newPassword){
            $this->password=$newPassword;
        }
    
    
}
}
        

