<?php

namespace traits{
    
    trait countable {
        public function ascount(){
            $count=0;
            $count++;
            echo $count;                
        }
            
    }   
}