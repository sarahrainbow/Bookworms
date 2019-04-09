<?php 

$dsn = 'mysql:host=localhost;dbname=libraryapp';//database source name
$username = 'root';
$password = '';

 

//Establish DB connection by instantiating PDO object and passing in variables
try {
$conn = new PDO($dsn, $username, $password);
}
catch ( PDOException $e ) {
echo "Connection failed: ". $e-> getMessage();
}

$conn-> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//using setAttribute method to set PDO's object error method so can raise exceptions

//$stmt = $conn->prepare("SELECT * FROM book WHERE BookISBN LIKE '%:BookISBN%' OR Title LIKE '%:Title%'") or die("could not search");

$stmt = $conn->query("SELECT * FROM book");

$count = $stmt->rowCount();

if($count == 0) {
 $output = "There were no results\n";}
 else {
while ($row = $stmt->fetch()) {
    $output = $row['Title']."<br />\n";
}
}

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
          
<form action="testsearch.php" method="get" class="form-inline mt-5">
  
  <input type="search" name="search" placeholder="Search" autofocus="true"  maxlength="100" title="Book title or ISBN" required class="form-control mb-3  mr-3" > 
   <button type="submit" value="Search" class="btn btn-primary mb-3  ml-3">Search</button> 
 
</form>
        
        <h3 class="mb-4">Search results</h3>   
        
    <?php echo ("$output");?> </div>
        
 
<?php include 'Footer.html';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>  