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
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
 
//Select titles from books
//$stmt = $pdo->query('SELECT title FROM book');
//while ($row = $stmt->fetch())
//{
//    echo $row['title'] . "\n";
//}


//Add new author
//$name='John';
//$surname='Doe';
//        
//$sql = "INSERT INTO author(FirstName, LastName) VALUES (?,?)";
//$stmt= $pdo->prepare($sql);
//$stmt->execute([$name, $surname]);

//Add new book
//$ISBN=1233287438892;
//$title='Test Doe';
//$publish=1990;
//$age=3;
//$genre=5;
//      
//$sql = "INSERT INTO book(BookISBN, Title, YearPublished, AgeID, GenreID) VALUES (?,?,?,?,?)";
//$stmt= $pdo->prepare($sql);
//$stmt->execute([$ISBN,$title,$publish,$age,$genre]);

$sql = "INSERT INTO book(BookISBN, Title, YearPublished, AgeID, GenreID) VALUES (?,?,?,?,?)";
$stmt= $pdo->prepare($sql);
$stmt->bindparam(':BookISBN',$ISBN, PDO::PARAM_INT);
$stmt->bindparam(':Title',$title, PDO::PARAM_STR);
$stmt->bindparam(':YearPublished',$publish, PDO::PARAM_STR);
$stmt->bindparam(':AgeID',$age, PDO::PARAM_INT);
$stmt->bindparam(':GenreID',$genre, PDO::PARAM_INT);
$stmt->execute([$ISBN,$title,$publish,$age,$genre]);

$ISBN = $_POST["BookISBN"];
$title = $_POST["Title"];
$publish = $_POST["YearPublished"];
$age=$_POST["AgeID"];
$genre=$_POST["GenreID"];
$stmt->execute();


//Add new books
//$ISBN=12345678923;
//$Title='Test1';
//$Publish=1999;
//$Genre=1;
//$Age=3;

//$ISBN=$_GET['BookISBN'];
//$Title=$_GET['Title'];
//$Publish=$_GET['YearPublished'];
//$Genre=$_GET['GenreID'];
//$Age=$_GET['AgeID'];
//
//$sql = "INSERT INTO book(BookISBN, Title, YearPublished, AgeID, GenreID) VALUES (?,?,?,?,?)";
//$stmt= $pdo->prepare($sql);
//$stmt->execute([$ISBN, $Title,$Publish,$Age,$Genre]);


//$sql = "INSERT INTO book(BookISBN, Title, YearPublished, AgeID, GenreID) VALUES (?,?,?,?,?)";
//$stmt= $pdo->prepare($sql);
//$stmt->bindValue(':BookISBN',$ISBN, PDO::PARAM_INT);
//$stmt->bindValue(':Title',$title, PDO::PARAM_STR);
//$stmt->bindValue(':YearPublished',$publish, PDO::PARAM_STR);
//$stmt->bindValue(':AgeID',$age, PDO::PARAM_INT);
//$stmt->bindValue(':GenreID',$genre, PDO::PARAM_INT);
//$stmt->execute([$ISBN, $Title,$Publish,$Age,$Genre]);

//$sql="INSERT INTO book () VALUES (:BookISBN, :Title, )";

//$stmt = $pdo->prepare("INSERT INTO book(BookISBN, Title, YearPublished, AgeID, GenreID) VALUES (:BookISBN, :Title, :YearPublished, :AgeID, :GenreID)");
//$stmt->bindValue(':BookISBN',$ISBN, PDO::PARAM_INT);
//$stmt->bindValue(':Title',$title, PDO::PARAM_STR);
//$stmt->bindValue(':YearPublished',$publish, PDO::PARAM_STR);
//$stmt->bindValue(':AgeID',$age, PDO::PARAM_INT);
//$stmt->bindValue(':GenreID',$genre, PDO::PARAM_INT);
//$stmt->execute();

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
