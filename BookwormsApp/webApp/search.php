<?php 


//$conn = mysqli_connect ('localhost', 'root') or die("could not connect");
//mysqli_select_db($conn, "libraryapp") or die ("could not connect");

//function with exception
//function checkSearchIsSet($searchq) {
//  if(!isset($searchq)) {
//    throw new Exception("A search term must be entered");
//  }
//  return true;
//}

//function checkSearchIsSet(search) {
//  if(!isset(search)) {
//    throw new Exception("A search term must be entered");
//  }
//  return true;
//}
//
//try {
//  checkSearchIsSet('$searchq');
//  //If the exception is thrown, this text will not be shown
//  echo 'If you see this, the search term is set';
//}
//
////catch exception
//catch(Exception $e) {
//  echo 'Message: ' .$e->getMessage();
//}
//SEARCH - OLD MYSQLI WAY
// try { 
//
//$conn = mysqli_connect ('localhost', 'root');//connect to database
//
//if (mysqli_connect_error()) {
//throw new Exception(mysqli_connect_error());
//}
//  
//mysqli_select_db($conn, "libraryapp");
//
//$output = ''; //output of results
//
//
//
//if(isset($_GET['search'])) { //is something is entered in search box
//    $searchq = $_GET['search']; //get the data entered in search box
//    $searchq = preg_replace("#[^0-9a-z.-]#i","", $searchq);//sanitise user data. Replaces anything that is not first argument with second argument on search term entered by user. Allows letters and numbers and -.#i allows caps and lowercase
// 
//
// $query = mysqli_query($conn, "SELECT * FROM book WHERE BookISBN LIKE '%$searchq%' OR Title LIKE '%$searchq%'") or die("could not search");
// $count = mysqli_num_rows($query);//count number of rows of results
// if($count == 0) {
// $output = "There were no results\n";}
// else {
//     while($row = mysqli_fetch_array($query)) {
//         $bookisbn = $row['BookISBN'];
//         $title = $row['Title'];
//         $output = "<div>$bookisbn $title</div>"; //show book ISBN and title
//     }
// }
//}
//}
//
//catch (Exception $e) {
//    echo 'The database connection failed';
//}
//
//END OF OLD SEARCH


$dsn = 'mysql:host=localhost;dbname=libraryapp';//database source name
$username = 'root';
$password = '';

if(isset($_GET['search'])) { //if something is entered in search box    

//Establish DB connection by instantiating PDO object and passing in variables
try {
$conn = new PDO($dsn, $username, $password);
}
catch ( PDOException $e ) {
echo "Connection failed: ". $e-> getMessage();
}

$conn-> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//using setAttribute method to set PDO's object error method so can raise exceptions

$stmt = $pdo->prepare("SELECT * FROM book WHERE BookISBN LIKE '%:BookISBN%' OR Title LIKE '%:Title%'") or die("could not search");
//A prepared statement is a feature used to execute the same (or similar) SQL statements repeatedly

try {
    $stmt->execute($_GET['search']);
    }
catch (PDOException $e) {
echo "Query failed: " . $e->getMessage();
die();
}
$output = $stmt->fetch();
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
        
      <?php echo ("$output");?>  </div>
        
 
<?php include 'Footer.html';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>  