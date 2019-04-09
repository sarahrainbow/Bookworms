<?php 

$dsn = 'mysql:host=localhost;dbname=libraryapp';//database source name
$username = 'root';
$password = '';

if(isset($_GET['search'])) { //if something is entered in search box    

    //Establish DB connection by instantiating PDO object and passing in variables
    try {
    $conn = new PDO($dsn, $username, $password);
    $conn-> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//using setAttribute method to set PDO's object error method so can raise exceptions
    }
    catch ( PDOException $e ) {
    echo "Connection failed: ". $e-> getMessage();
    }

//    $stmt = $conn->prepare('SELECT * FROM book WHERE Title LIKE :Title') or die("could not search");
    //A prepared statement is a feature used to execute the same (or similar) SQL statements repeatedly
    $stmt = $conn->prepare('CALL FindBookByTitle(:Title)');

    try {
        // $stmt->execute(['BookISBN' => $_GET['search']]);
        $search = $_GET['search'];
 //       $searchThis = $search;
//        $stmt->bindValue(':Title', '%' . $searchThis . '%');
        $stmt->bindValue(':Title', $search);
        $stmt->execute();
        $booksMatched = $stmt->fetchAll();
        }

    catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
    die();
}


}
$conn = null; //close connection by destroying PDO object

?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Search | Bookworm Libraries</title>
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
 
    </head>
   <body>
                <center>
            <h1>Bookworm Libraries</h1>
                  <?php include 'NavBar.html'; include 'NavBarCollapsed.html';?>
            </center>            

 
        <br>
        <br>
        <br>
        <div class="paddedBlock"><h2>Search books</h2> 
          
<form action="search.php" method="get" class="form-inline mt-5">
  
  <input type="search" name="search" placeholder="Search" autofocus="true"  maxlength="100" title="Book title or ISBN" required class="form-control mb-3  mr-3" > 
   <button type="submit" value="Search" class="btn btn-primary mb-3  ml-3">Search</button> 
 
</form>
        
        <h3 class="mb-4">Search results</h3>   
        
   
 <?php 
 if(!empty($booksMatched)) {
     echo "Searched for: " . "<i>'" . $_GET['search'] . "'</i><br><br>";
//     var_dump($booksMatched);
     
     foreach($booksMatched as $book) {
         echo 'Title: ' . $book['Title'] . '<br>';
         echo 'Author: ' . $book['Author'] . '<br>';
         echo 'Book ISBN: ' . $book['BookISBN'] . '<br>';
         echo 'Year published: ' . $book['YearPublished'] . '<br>';
         echo 'Available at ' . $book['LibraryBranch'] . ' branch<br><br>';
     }
 }
 ;?>  </div>

 
<?php include 'Footer.html';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>  