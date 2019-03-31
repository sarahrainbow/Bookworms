<?php
class customException extends Exception {
  public function errorMessage() {
    //error message
    $errorMessage = 'Error on line '.$this->getLine().' and '.$this->getMessage().'</b> is not a valid E-Mail address';
    return $errorMessage;
  }
}

$email = "someone@example.com";

try {
  //check if
  if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
    //throw exception if email is not valid
    throw new customException($email);
  } else {
        echo "This email address is valid<br>";
  }

if(strpos($email, "example") !== FALSE) { //checks string position to see if 'hotmail' exists in email address
    throw new Exception("$email is a valid e-mail provider");
  } else {
        echo'<br>This email provider is not accepted.<br>Please provide alternative.';
  }
}

catch (customException $e) {
  echo $e->errorMessage();
}

catch(Exception $e) {
  echo $e->getMessage();
}












//class checkDOBFormat extends Exception{
//     public function errorMessage() {
//    //error message
//    $errorMessage = 'Error on line '.$this->getLine().' and '.$this->getMessage().'</b> is not a valid date format';
//    return $errorMessage;
//  }
//}
//$date = 2000-01-01;
//
//try {
//  if ($date = new DateTime() ===TRUE){
//      throw new Exception($date);
//  }
//catch (Exception $e) {
//  echo $e->getMessage();
//}
//}
// Validate Regex??? Postcode ([Gg][Ii][Rr] 0[Aa]{2})|((([A-Za-z][0-9]{1,2})|(([A-Za-z][A-Ha-hJ-Yj-y][0-9]{1,2})|(([A-Za-z][0-9][A-Za-z])|([A-Za-z][A-Ha-hJ-Yj-y][0-9][A-Za-z]?))))\s?[0-9][A-Za-z]{2})