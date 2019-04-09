<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign up | The Bookworms</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <center>
            <h1>Bookworm Libraries</h1>
                <?php include 'NavBar.html'; include 'NavBarCollapsed.html';?>
                  <?php

//    spl_autoload_register(function($Name) { #detects full pathname of class and then searches in equivalent file structure to include file
//        $filePath = "$Name.php";
//        $macFilePath = str_replace('\\', '/', $filePath);
//        require_once '../' . $macFilePath;   
//    });
//
//    use Models\ {Book};
//const DB_DSN="mysql:host=localhost:dbname=libraryapp";
//const DB_USER='root';
//const DB_PASS=' ';

//$host = 'localhost'; // stands for database host i.e. my computer
//$db   = 'libraryapp'; //name of the database in SQL
//$user = 'root'; //database user [root=admin]
//$pass = ''; //password 
//$charset = 'utf8mb4'; //character set for SQL i.e. encoding language to send and retrieve data
//
//$options = [
//    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //standard error mode that must used - ERR Exception tells code to run an error after each time a query fails 
//    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //fetch queries
//    PDO::ATTR_EMULATE_PREPARES   => false, //dictates whether to use an emulation mode
//];
//
//$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
////$options = [
////    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
////    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
////    PDO::ATTR_EMULATE_PREPARES   => false,
////];
//try {
//     $pdo = new PDO($dsn, $user, $pass, $options);
//} catch (\PDOException $e) {
//     throw new \PDOException($e->getMessage(), (int)$e->getCode());
//}
 
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

        ?>  
        </center>
         <div class="paddedBlock"><h2>Add book to library</h2>
            <form action="AddBook.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="FirstName">Author Forename</label>
                    <input class="form-control" type="text" name="FirstName" required/>
                </div>
                <div class="form-group">
                    <label for="LastName">Author Surname</label>
                    <input class="form-control" type="text" name="LastName" required/>
                </div>
                <div class="form-group">
                    <label for="BookISBN">Book ISBN</label>
                    <input class="form-control" type="number" name="BookISBN" pattern="^((?!(0))[0-9]{13})$"required/>
                </div>
                <div class="form-group">
                    <label for="Title">Title</label>
                    <input class="form-control" type="text" name="Title" required/>
                </div>
                <div class="form-group">
                    <label for="YearPublished">Year Published</label>
                    <input class="form-control" type="number" name ="YearPublished" required/>
                </div>
                <div class="form-group">
                    <label for="GenreID">Genre ID</label>
                    <input class="form-control" type="number" name ="GenreID" pattern="^((?!(0))[0-9]{4})$" required/>
                </div>
                <div class="form-group">
                    <label for="AgeID">Age ID</label>
                    <input class="form-control" type="number" name ="AgeID" pattern="^((?!(0))[0-9]{4})$" required/>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        
    </div>
    <?php
    if(!empty($_POST)){
        $_SESSION["BookISBN"] = filter_input(INPUT_POST,'BookISBN');
        $_SESSION["Title"] = filter_input(INPUT_POST,'Title');
        $_SESSION["YearPublished"] = filter_input(INPUT_POST,'YearPublished');
        $_SESSION["GenreID"] = filter_input(INPUT_POST,'GenreID');
        $_SESSION["AgeID"] = filter_input(INPUT_POST,'AgeID');
        $_SESSION["FirstName"] = filter_input(INPUT_POST,'FirstName');
        $_SESSION["LastName"] = filter_input(INPUT_POST,'LastName');
        }
        ?>
        <?php include 'Footer.html';?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    </body>
</html>
