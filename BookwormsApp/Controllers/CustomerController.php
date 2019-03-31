<?php

#Currently generically called user controller but may want to split to customer/employee view/controller.
##below contains methods for accessing customers

namespace Controllers{
    
    #For Cynthujaa  
    require_once '/Users/getintotech/Applications/XAMPP/xamppfiles/htdocs/BookwormsApp/Models/Customer.php';
    
    #For Windows
//    require_once 'C:\xampp\htdocs\Exercise20\Models\Customer.php';
    //require_once(__DIR__ . '/../Models/Customer.php');
    
    use Models\Customer;
       
    
        class CustomerController{
            
        public $customers=[]; //Creates an array for all customer objects, set to public for now just for testing purposes. #This should be replaced by database in future, and update function - otherwise array would need storing on server permanently eg in session      
 
        public function getCustomer(){ //Get function - 
            return $this->customers;
        }
            
        public function addCustomer(Customer $customer){
                array_push($this->customers, $customer); //add customer into an array
                echo "New customer added\n";
            }
            
        public function deleteCustomer(Customer $deleteCustomer){
            foreach($this->getCustomer() as $key => $customers){ //use of associative array
                if($customers->getCustomerID() === $deleteCustomer -> getCustomerID()){ //if CustomerID matches the customer you want to delete, delete it
                    unset($this->customers[$key]);
                    echo "Customer ID ". $deleteCustomer->getCustomerID(). " has been removed.";
                }
            }
        }
            
        public function editCustomerPrivileges(Customer $editCustomer, $newPrivileges){
            foreach($this->getCustomer() as $customer){ 
                if($customers->getCustomerID() === $editCustomer -> getCustomerID()){ 
                    $customer->setPrivileges($newPrivileges);
                }
            }
        }  
        
}
        
//    $testCustomer=new Customer(5567, 'Brian', 'James', 'Baker', 'The Cedars', 'brian@test.com', 'Brian40', 'fsdxc', 'User', '2019-02-01');	 
//    
//    $myCustomer=new CustomerController(); //Instantiating object
//    
//    $myCustomer->addCustomer($testCustomer); //add assigned variable to addCustomer method 
//    var_dump($myCustomer->customers); 
// 
//    $myCustomer->deleteCustomer($testCustomer); //deletes customer
        
}      


//       mel's notes 
//        public function editPrivileges(Customer $editPrivilege){
//        foreach($this->getCustomer() as $key => $customers){ 
//        if($customers->getCustomerID() === $editPrivilege -> getCustomerID()
//        
//            
//            //search for privileges key and replace value
//        }
//        
//        }
            
            //faith's notes
            ###########NEEDS WORK, HOW DELETE OBJECT BASED ON A CERTAIN ELEMENT, this will also be true for 
            #public function removeCustomer(int $customerID){
                #if(($key = array_search($customerID, $this->customers, TRUE)) !== FALSE) {
                #unset($array[$key]);
            
#foreach ($this->customers as $customer){
                #if ($customer->getCustomerID() === $customerID){
                    #unset($this->customers[$customer->getCustomerID()]);
                #}
            #}
#search for object want
                #then remove from array
                #array_push($this->customers, $customer); 
            #}
        #}
           #public function setPrivileges(Customer $customer){
                #array_push($this->customers, $customer);
            #} 
