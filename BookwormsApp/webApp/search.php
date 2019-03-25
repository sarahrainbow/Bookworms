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
        <title>Search books</title>
    </head>
    <body>
</head>
    <body>
        <center>
                <nav role="navigation">
                    <ul>
                        <li><a href="">Search, Renew and Reserve books</a>
                            <ul>
                                <li><a href="">Search by author</a></li>
                                <li><a href="">Search by title</a></li>
                            </ul>
                        </li>
                        <li><a href="">Join a Library</a>
                            <ul>
                                <li><a href="">Online application form</a></li>
                                <li><a href="">Local Branches</a></li>
                            </ul>
                        </li>
                        <li><a href="">Recommended Reads</a>
                            <ul>
                                <li><a href="https://www.amazon.co.uk/Best-Sellers-Books/zgbs/books">Bestsellers</a></li>
                                <li><a href="">Reader's Digest</a></li>
                            </ul>
                        </li>
                    </ul>
            </nav>           
        </center>
        <br>
        <br>
        <br>
        <h1>Search books</h1>
          
<form action="search.php" method="get">
  
  <input type="search" name="search" placeholder="Search" autofocus="true"  maxlength="100" title="Book title or ISBN" required> 
  <input type="submit" value="Search">
</form>
        
        <h2>Search results</h2>   
        
      <?php echo ("$output");?>  
        
        <div>
        <div>Useful links</div>
        <ul>
            <li>Library branches</li>
            <li>Opening times</li> 
        </ul>
        </div>        
        
        <footer>
            <ul>
                <li>Terms of use</li>
                <li>Contact us</li>
                <li>Accessibility</li>
            </ul>
        </footer>
    <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>   
    </body>
</html>
