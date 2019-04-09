<?php

//Defining constants so code is clearer
#namespace ? {
    const DB_DSN = 'mysql:host=localhost;dbname=libraryapp';
    const DB_USER = 'root';
    const DB_PASS = '';
    const UploadKey = 'avatar';
    const AllowedTypes = ['image/jpeg','image/jpg','image/bmp','image/png'];
         
    #use const ?\UploadKey;
    #use const ?\AllowedTypes;
    
    spl_autoload_register(function($Name) { #detects full pathname of class and then searches in equivalent file structure to include file
        $filePath = "$Name.php";
        $macFilePath = str_replace('\\', '/', $filePath);
        require_once '../' . $macFilePath;   
    });

    use Models\ {Customer};

#Session started for storing user details and detabase connected to
    session_start();
    
    try{
        $conn=new PDO(DB_DSN,DB_USER,DB_PASS,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        echo "Connected successfully";
    } catch(PDOException $e){
    die("Connection failed: ".$e->getMessage());# Ideally would not die but redirect to another page/part of script
    }



##PROCESSING FORM

#Take user text input, sanitize, and store in an object
    $customerDetails = filter_input_array(INPUT_POST);
    function filterInput($inputItem) {
                return filter_input(INPUT_POST,$inputItem,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
            }
            
    if(!empty($customerDetails)){
                    
        #First sanitize
        foreach($customerDetails as $customerDetail => $customerValue) {
            ${$customerDetail} = filterInput($customerDetail);
        }
        $email=filter_var($email, FILTER_SANITIZE_EMAIL);#additional filter for email
          
                
        #Then create a new customer object - this works okay, have printed - constructor and setcustomerId work, username if statement doesn't
        $newCustomer= new Customer($firstname, $secondname, $lastname, $addressnumber, $addressroad,$city,$postcode
                , $phone, $email, $username, $password, 'libraryuser', date("Y/m/d"));
        
        
        #Add to database
        
            //  SQL statements to use below
        $searchUsersql="SELECT * FROM librarycardholder where Username = :username;";#didn't work when I had ':username'
        $searchPostcodesql="SELECT * FROM postcode where Postcode = :postcode;";
        $addPostcodesql="INSERT INTO postcode(Postcode) VALUES (:postcode);";
        $searchCitysql="SELECT * FROM city where CityName = :city;";
        $addCitysql="INSERT INTO city (CityName) VALUES (:city);";
        $searchRoadsql="SELECT * FROM road where RoadName = :road;";
        $addRoadsql="INSERT INTO road (RoadName) VALUES (:road);";
        $addAddresssql="INSERT INTO address (AddressNumber, RoadID, CityID, PostcodeID) VALUES (:addressnumber, :roadid, :cityid, :postcodeid);";
        $addCustomersql="INSERT INTO librarycardholder (FirstName, LastName, ContactNumber, AddressID, DateJoined, Email, Username, Password)"
                . " VALUES (:firstname, :lastname, :phone, :addressid, :datejoined, :email, :username, :password);";
        
        try {
            $stmt=$conn->prepare($searchUsersql); //Search to see if username already exists
            $stmt->execute(['username' => $newCustomer->getUsername()]) ;
            
            
            If( $user = $stmt->fetch()){//true if username already exists, must be unique, so sends to error page (does work but when testing remember to refresh page)
                header("Location: uploadErrorPage.php"); 
                $_SESSION['uploadError']['errorMessage']="Username already exists, please try another";#change to an exeption?
                die();
            }
            else {//if user doesn't already exist, we want to add them - need to add data across various tables
                #die('hi');
                $stmtSearchPC=$conn->prepare($searchPostcodesql); //check if postcode exists, if does - fetch ID, if not add to database and fetch ID
                $stmtSearchPC->execute(['postcode' => $newCustomer->getAddressPostcode()]) ;  

                if($rowPC = ($stmtSearchPC->fetch())){
                    $postcodeID=$rowPC['PostcodeID'];
                }
                else{
                    $stmtAddPC=$conn->prepare($addPostcodesql);
                    if ($stmtAddPC->execute(['postcode' => $newCustomer->getAddressPostcode()]))
                        {
                         $postcodeID = $conn->lastInsertId();
                        } 
                    
                }
                
                $stmtSearchCity=$conn->prepare($searchCitysql); //check if city exists, if does - fetch ID, if not add to database and fetch ID
                $stmtSearchCity->execute(['city' => $newCustomer->getAddressCity()]) ;  

                if($rowCity = ($stmtSearchCity->fetch())){
                    $cityID=$rowCity['CityID'];
                }
                else{
                    $stmtAddCity=$conn->prepare($addCitysql);
                    if ($stmtAddCity->execute(['city' => $newCustomer->getAddressCity()]))
                        {
                         $cityID = $conn->lastInsertId();
                        } 
                    
                }
                
                $stmtSearchRoad=$conn->prepare($searchRoadsql); //check if road exists, if does - fetch ID, if not add to database and fetch ID
                $stmtSearchRoad->execute(['road' => $newCustomer->getAddressRoad()]) ;  

                if($rowRoad = ($stmtSearchRoad->fetch())){
                    $roadID=$rowRoad['RoadID'];
                }
                else{
                    $stmtAddRoad=$conn->prepare($addRoadsql);
                    if ($stmtAddRoad->execute(['road' => $newCustomer->getAddressRoad()]))
                        {
                         $roadID = $conn->lastInsertId();
                        } 
                    
                }
                
                $stmtAddAddress=$conn->prepare($addAddresssql);//Now add in all acquired IDs to the Address table and fetch AddressID
                    if ($stmtAddAddress->execute([
                            'addressnumber' => $newCustomer->getAddressNumber(),
                            'roadid' => $roadID,
                            'cityid' => $cityID,
                            'postcodeid' => $postcodeID
                                                 ]))
                        {
                         $addressID = $conn->lastInsertId();
                        }
                
                $stmtAddCustomer=$conn->prepare($addCustomersql);//Now add in all customer fields and fetch CustomerID and set in object
                    if ($stmtAddCustomer->execute([
                            'firstname' => $newCustomer->getFirstName(),
                            'lastname' => $newCustomer->getSurname(),
                            'phone' => $newCustomer->getPhone(),
                            'addressid' => $addressID,
                            'datejoined' => $newCustomer->getDateJoined(),
                            'email' => $newCustomer->getEmail(),
                            'username' => $newCustomer->getUsername(),
                            'password' => $newCustomer->getPassword()
                                                 ]))
                        {
                         $customerID = $conn->lastInsertId();
                         $newCustomer->setCustomerID($customerID);//set in object
                        }
            }
        }
        catch (PDOException $e){
            echo "Error: ".$e->getMessage();#placeholder for now, better error handling required
            die();
        }
            
        $_SESSION['userDetails']['username'] = $newCustomer->getUsername(); #Will want to store this in database in future iterations, not cookie
        $_SESSION['userDetails']['customerID'] = $newCustomer->getCustomerID(); #Will want to store this in database in future iterations, not cookie
    }
        

##Now HANDLE UPLOADED AVATAR - checks no errors and stores in AvatarUploads folder
    
#Error checking

    if (empty($_FILES[UploadKey]['name'])){
        header("Location: uploadErrorPage.php"); 
        $_SESSION['uploadError']['errorMessage']="You forgot to add your file!";//stored error message in a storage file so that available to other php pages
        die();
    }

    if ($_FILES[UploadKey]['error'] == (1||2)) {     
        header("Location: uploadErrorPage.php"); 
        $_SESSION['uploadError']['errorMessage']="Your file is too big for us to handle, awkward! Please choose a file under 10MB.";//stored error message in a storage file so that available to other php pages
        die();
    }
    
    if (!in_array($_FILES[UploadKey]['type'],AllowedTypes)){
        header("Location: uploadErrorPage.php"); 
        $_SESSION['uploadError']['errorMessage']="We only accept .JPEG .PNG and .BMP files I'm afraid";//stored error message in a storage file so that available to other php pages
        die();
    }
        
    if ($_FILES[UploadKey]['error']>0){
        header("Location: uploadErrorPage.php"); 
        $_SESSION['uploadError']['errorMessage']="Unfortunately there's been an error with the uploading process";//stored error message in a storage file so that available to other php pages
        die();
    }
    

#Moving the file and ensuring deleted from temporary location
    
    $tempFileLoc = $_FILES[UploadKey]['tmp_name']; //Temporary file path if file passes above checks
    $destFileLoc = 'avatarUploads/'.$customerID.'_'.$_FILES[UploadKey]['name']; // Create file path for uploaded image
    
    
    if(!move_uploaded_file($tempFileLoc, $destFileLoc)){//trys to move, if successful returns true therefore if failed, ! would make true and get error statement
        header("Location: uploadErrorPage.php"); 
        $_SESSION['uploadError']['errorMessage']= "There's been an error with the uploading process";
        die();
    }
    else {
        unset($_SESSION['uploadError']['errorMessage']);
        $newCustomer->setAvatarFilePath($destFileLoc);
        $_SESSION['userDetails']['avatarLocation']=$newCustomer->getAvatarFilePath();//File path stored in cookie (will need changing to db) for use in profile page
        header("Location: profilePage.php");
        
        
    }

    if (file_exists($tempFileLoc)){
        unlink($tempFileLoc);
    }

    #}//closure of namespace

    
    
    
    
    
//Try and catch exceptions
        
//  class customException extends Exception {
//  public function errorMessage() {
//    //error message
//    $errorMessage = 'Error on line '.$this->getLine().' and '.$this->getMessage().'</b> is not a valid E-Mail address';
//    return $errorMessage;
//  }
//}
//    
//    try {
//    if(empty($_FILES[UploadKey]['name'])){//trys to move, if successful returns true therefore if failed, ! would make true and get error statement
//            throw new Exception("You have not added a file");
//        }
//    if(!in_array($_FILES[UploadKey]['type'],AllowedTypes)){//trys to move, if successful returns true therefore if failed, ! would make true and get error statement
//            throw new Exception("There's been an error with the type of file");
//        }
//    }
//         
//
//    catch (Exception $e) {
//            echo $e->getMessage();
//        }
//    catch (customException $e) {
//    echo $e->errorMessage();
//    }
        
        
        
        #OLD CODE
//        Replaced by for eachloop
//        $firstname = filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);//Remove all HTML tags from a string plus ASCI>127
//        $secondname = filter_input(INPUT_POST,'secondname',FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
//        $lastname   = filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
//        $addresslineone   = filter_input(INPUT_POST,'addresslineone',FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
//        $addresslinetwo   = filter_input(INPUT_POST,'addresslinetwo',FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
//        $city   = filter_input(INPUT_POST,'city',FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
//        $postcode = filter_input(INPUT_POST,'postcode',FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
//        $username= filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
//        $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
        