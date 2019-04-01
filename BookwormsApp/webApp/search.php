<?php 

//function with exception
//
//$conn = mysqli_connect ('localhost', 'root') or die("could not connect");
//mysqli_select_db($conn, "libraryapp") or die ("could not connect");


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

 try { 

$conn = mysqli_connect ('localhost', 'root');//connect to database

if (mysqli_connect_error()) {
throw new Exception(mysqli_connect_error());
}
  
mysqli_select_db($conn, "libraryapp");

$output = ''; //output of results

//function with exception
function checkSearchIsSet($searchq) {
  if(!isset($searchq)) {
    throw new Exception("A search term must be entered");
  }
  return true;
}

if(isset($_GET['search'])) { //is something is entered in search box
    $searchq = $_GET['search']; //get the data entered in search box
    $searchq = preg_replace("#[^0-9a-z.-]#i","", $searchq);//sanitise user data. Replaces anything that is not first argument with second argument on search term entered by user. Allows letters and numbers and -.#i allows caps and lowercase
 

 $query = mysqli_query($conn, "SELECT * FROM book WHERE BookISBN LIKE '%$searchq%' OR Title LIKE '%$searchq%'") or die("could not search");
 $count = mysqli_num_rows($query);//count number of rows of results
 if($count == 0) {
 $output = "There were no results\n";}
 else {
     while($row = mysqli_fetch_array($query)) {
         $bookisbn = $row['BookISBN'];
         $title = $row['Title'];
         $output = "<div>$bookisbn $title</div>"; //show book ISBN and title
     }
 }
}
}

catch (Exception $e) {
    echo 'The database connection failed';
}

?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Search</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
 
    </head>
   <body>
                <center>
            <h1>The Bookworms</h1>
                  <?php include 'NavBar.html';?>
            </center>            

 
        <br>
        <br>
        <br>
        <h2>Search books</h2>
          
<form action="search.php" method="get" class="form-inline mt-5">
  
  <input type="search" name="search" placeholder="Search" autofocus="true"  maxlength="100" title="Book title or ISBN" required class="form-control mb-3  ml-3 mr-3" > 
   <button type="submit" value="Search" class="btn btn-primary mb-3  ml-3">Search</button> 
 
</form>
        
        <h3 class="mb-4">Search results</h3>   
        
      <?php echo ("$output");?>  
        
        <div class="mt-3">
        <div>Useful links</div>
        <ul>
            <li>Library branches</li>
            <li>Opening times</li> 
        </ul>
        </div>   
<?php include 'Footer.html';?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
</body>
</html>  