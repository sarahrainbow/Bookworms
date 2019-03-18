<?php

#Currently generically called user controller but may want to split to customer/employee view/controller.
##below contains methods for accessing customers

namespace CustomerController{
    require_once ('Customer.php');
    use Customer\Customer;
    
    
        class CustomerController{
            public $customers=[]; //Creates an array for all customer objects, set to public for now just for testing purposes. 
                                    #This should be replaced by database in future, and update function - otherwise array would need storing on server permanently eg in session
                   
            public function addCustomer(Customer $customer){
                array_push($this->customers, $customer);
            }

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
}
}