<?php

namespace Traits {
    
    trait Controller {
        
        public function addItem(array $array, $item) {
            array_push($array, $item); 
            echo "Item successfully added!<br>"; 
            return $array;
        }
        
        public function deleteItem(array $array, $itemToDelete ){
            foreach($array as $key => $item) { //use of associative array - iterate through array with item as the value
                if($item->getID() === $itemToDelete->getID()){
                    echo "<br>" . $key;
                    unset($array[$key]); //remove array with this key
                    echo "<br>Successfully deleted item with ID: " . $itemToDelete->getID();
                    return $array;
                }
            }
        }
    }  
}

