<?php 

$conn = mysqli_connect ('localhost', 'root') or die("could not connect");
mysqli_select_db($conn, "libraryapp") or die ("could not connect");

$output = ''; //output of results

if(isset($_GET['search'])) {
    $searchq = $_GET['search'];
    $searchq = preg_replace("#[^0-9a-z.-]#i","", $searchq);//replaces anything that is not first argument with second argument on variable. Allows letters and numbers and -.#i allows caps and lowercase
    
 $query = mysqli_query($conn, "SELECT * FROM book WHERE BookISBN LIKE '%$searchq%' OR Title LIKE '%$searchq%'") or die("could not search");
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
 
    </head>
   <body>
        <center>
            <h1>The Bookkeepers</h1>
                <nav role="navigation">
                    <ul>
                        <li><a href="#">Search, Renew and Reserve books</a>
                            <ul>
                                <li><a href="">Search by author</a></li>
                                <li><a href="">Search by title</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Join a Library</a>
                            <ul>
                                <li><a href="#">Online application form</a></li>
                                <li><a href="#">Local Branches</a></li>
                            </ul>
                        </li>
                        <li><a href="">Recommended Reads</a>
                            <ul>
                                <li><a href="https://www.amazon.co.uk/Best-Sellers-Books/zgbs/books">Bestsellers</a></li>
                                <li><a href="#">Reader's Digest</a></li>
                            </ul>
                        </li>
                    </ul>
            </nav>
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
    
