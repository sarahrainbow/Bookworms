<?php

namespace Interfaces {
    
    interface Viewable{
        public function listItem($item);
        public function listItems(array $items);
    }

//$filename='./Loanables.php';
//try {
//      $document = fopen($filename, "r");
//      if (!file_exists($filename)){
//          throw new exception("file does not exist");
//      } else
//      { echo 'file exists!';
//      }
//  }
//    catch (Exception $e) {
//        echo 'Error'.$e->getMessage();
//    }

}

