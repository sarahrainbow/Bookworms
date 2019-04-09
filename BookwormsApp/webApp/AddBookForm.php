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
