<?php

namespace Traits {
    
    trait Controller {
        
        public function addItem($array, $item) {
            array_push($array, $item); 
            echo "Item successfully added!<br>";
            echo get_class($item) . " successfully added!";    
        }
    }   
}

