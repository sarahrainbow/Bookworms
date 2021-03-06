<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
//Accessing Database using constants
//    const DB_DSN = 'mysql:host=localhost;dbname=libraryapp';
//    const DB_USER = 'root';
//    const DB_PASS = '';
//    
//    spl_autoload_register(function($Name) { 
//        $filePath = "$Name.php";
//        $macFilePath = str_replace('\\', '/', $filePath);
//        require_once '../' . $macFilePath;   
//    });
//
//    use Models\ {Book};
//   
//    try{
//        $conn=new PDO(DB_DSN,DB_USER,DB_PASS,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
//        echo "Connected successfully to LibraryApp";
//    } catch(PDOException $e){
//    die("Connection failed: ".$e->getMessage());
//    }

$host = 'localhost'; // stands for database host i.e. my computer
$db   = 'libraryapp'; //name of the database in SQL
$user = 'root'; //database user [root=admin]
$pass = ''; //password 
$charset = 'utf8mb4'; //character set for SQL i.e. encoding language to send and retrieve data

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //standard error mode that must used - ERR Exception tells code to run an error after each time a query fails 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //fetch queries
    PDO::ATTR_EMULATE_PREPARES   => false, //dictates whether to use an emulation mode
];


$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
if(isset($_POST["submit"]))  
      {  
           if(empty($_POST["Username"]) || empty($_POST["Password"]))  
           {  
                $message = 'Please check username and password';  
           }  
           else  
           {  
               $username=$_POST["Username"];
                $password=$_POST["Password"];      
                $stmt = $pdo->prepare("SELECT * FROM librarycardholder WHERE Username = :Username AND Password = :Password");  
                $stmt->bindParam('Username',$username, PDO::PARAM_STR);
                $stmt->bindParam('Password',$password, PDO::PARAM_str);
                $stmt->execute();  
                $count = $stmt->rowCount();
                $row   = $stmt->fetch(PDO::FETCH_ASSOC);
                if($count == 1 && !empty($row))
                {  
                     $_SESSION["Username"] = $row["Username"];
                     $_SESSION["Password"] = $row["Password"];
                     header("location:AddBookForm.php");  
                }  
                else  
                {  
                     $message = '<label>Wrong information</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();
 }
//Select titles from books
//$stmt = $pdo->query('SELECT title FROM book');
//while ($row = $stmt->fetch())
//{
//    echo $row['title'] . "\n";
//}


//$data = [
//    'BookISBN' => $ISBN,
//    'Title' => $title,
//    'YearPublished' => $publish,
//    'AgeID' => $age,
//    'GenreID' => $genre,
//];
//$sql = "INSERT INTO book (BookISBN, Title, YearPublished, AgeID, GenreID) VALUES (:BookISBN, :Title, :YearPublished, :AgeID, :GenreID)";
//$stmt= $pdo->prepare($sql);
//$stmt->execute($data);
//
//////$stmt = $pdo->prepare("INSERT INTO book(BookISBN, Title, YearPublished, AgeID, GenreID) VALUES (?, ?, ?, ?, ?)");
//////$stmt=bindparam("addbook", $ISBN, $Title, $Publish, $Age, $Genre);
//////
//$ISBN = 12345678901;
//$title = "This is a test book";
//$publish = 2019;
//$age=3;
//$genre=3;       
//$stmt->execute();


//
//$statement = $pdo->prepare("INSERT INTO `book`(`BookISBN`, `Title`, `YearPublished`, 'AgeID', 'GenreID') VALUES (:BookISBN, :Title, :YearPublished, :AgeID, :GenreID)");


?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       
    </body>
</html>
