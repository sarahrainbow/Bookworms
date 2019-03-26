<?php

namespace Models{

    abstract class Person { #no abstract functions defined at the moment, couldn't think of one that would be appropraite for persons
        protected $firstname; 
        protected $secondname;
        protected $surname;
        protected $address; 
        protected $email;
        protected $username;
        protected $password;
        #protected $isstaff; is this necessary if employees will have employee IDs?
        protected $loanLimit=5;
        protected $loanCount;
        protected $datejoined;
        protected $privileges;
        
        public function __construct(string $firstname, string $secondname, string $surname, string $address, string $email, string $username, string $password, string $privileges, string $datejoined){
                $this->firstname = $firstname;
                $this->secondname = $secondname;
                $this->surname = $surname;
                $this->address = $address; 
                $this->email = $email;
                $this->username = $username;
                $this->password = $password;
                $this->datejoined = $datejoined;
                $this->privileges = $privileges;
        
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
            if (empty($this->email)){
                return "no email provided";
            }
            else{
                return $this->email;
            };
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
    
        public function getPrivileges(){
            return $this->privileges;
        }
        
        public function setPrivileges($newPrivileges){
            $this->privileges=$newPrivileges;
        }
        
        public function getDateJoined(){
            return $this->datejoined;
        }
        
        public function setDateJoined($newDateJoined){
            $this->datejoined=$newDateJoined;
        }
        
        public function getLoanCount() {
            return $this->loanCount;
        }
        
        public function setLoanCount(int $newLoanCount) {
            $this->loanCount = $newLoanCount;
        }
        
        public function getLoanLimit() {
            return $this->loanLimit;
        }
}
}
        

