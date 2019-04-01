<?php 

$conn = mysqli_connect ('localhost', 'root') or die("could not connect");//connecting to database
mysqli_select_db($conn, "libraryapp") or die ("could not connect");//selecting our database

$output = ''; //output of results

//function with exception
function checkSearchIsSet($searchq) {
  if(!isset($searchq)) {
    throw new Exception("A search term must be entered");
  }
  return true;
}

try {
  checkSearchIsSet('');
  //If the exception is thrown, this text will not be shown
  echo 'If you see this, the search term is set';
}

//catch exception
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}

if(isset($_GET['search'])) { //is something is entered in search box
    $searchq = $_GET['search']; //get the data entered in search box
    $searchq = preg_replace("#[^0-9a-z.-]#i","", $searchq);//sanitise user data. Replaces anything that is not first argument with second argument on search term entered by user. Allows letters and numbers and -.#i allows caps and lowercase
    
 $query = mysqli_query($conn, "SELECT * FROM book WHERE BookISBN LIKE '%$searchq%' OR Title LIKE '%$searchq%'") or die("could not search");//search book table for book title or isbn that is like search query, or return error
 $count = mysqli_num_rows($query);//count number of rows of results
 if($count == 0) {
 $output = "There were no results\n";}
 else {
     while($row = mysqli_fetch_array($query)) {
         $bookisbn = $row['BookISBN'];
         $title = $row['Title'];
         $output = "<div>$bookisbn $title</div>"; //
     }
 }
}

?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Search</title>
        <?php include 'header.php';?> 
        
            </center>            

 
        <br>
        <br>
        <br>
        <h1>Search books</h1>
          
<form action="search.php" method="get" class="form-inline mt-5">
  
  <input type="search" name="search" placeholder="Search" autofocus="true"  maxlength="100" title="Book title or ISBN" required class="form-control mb-3  ml-3 mr-3" > 
   <button type="submit" value="Search" class="btn btn-primary mb-3  ml-3">Search</button> 
 
</form>
        
        <h2 class="mb-4">Search results</h2>   
        
      <?php echo ("$output");?>  
        
        <div class="mt-3">
        <div>Useful links</div>
        <ul>
            <li>Library branches</li>
            <li>Opening times</li> 
        </ul>
        </div>        
        
<?php include 'footer.php';?>
    
