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
            <h1>The Bookworms</h1>
                <nav role="navigation">
                    <div class = row>
                    <div class="btn">
                        <a href="HomePage.php"<button class="btn" type="button" id="option1" data-toggle="dropdown" href="HomePage.php">Homepage</a>
                            <span class="caret"></span></button>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="option1" data-toggle="dropdown">Search, Loan and Return Books
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="search.php">Search</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="LoanOut.php">Loan</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="LoanReturn.php">Return</a></li>
                            </ul>                    
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="option1" data-toggle="dropdown">Join a Library
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="customerSignUp.php">Online Application form</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Library Branches</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Opening times</a></li>
                            </ul>
                            
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="option1" data-toggle="dropdown">Recommended Reads
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="https://www.amazon.co.uk/">Bestsellers</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Reader's Digest</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Greatest Books of All Time</a></li>
                            </ul>
                            
                    </div>
                    <div class="btn">
                        <a href="LoginPage.php"<button class="btn" type="button" id="option1" data-toggle="dropdown">Account Login</a>
                            <span class="caret"></span></button>
                    </div>
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
</body>
</html>
   
