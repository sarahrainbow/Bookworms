<!DOCTYPE html>
<!--Basic sign up form for new library members-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
 
    </head>
    <body>
        <center>
                <nav role="navigation">
                    <ul>
                        <li><a href="search">Search, Renew and Reserve books</a>
                            <ul>
                                <li><a href="">Search by author</a></li>
                                <li><a href="">Search by title</a></li>
                                <li><a href="loanOutBook.php">Borrow a book</a></li>
                                <li><a href="loanReturn.php">Return a book</a></li>
                            </ul>
                        </li>
                        <li><a href="">Join a Library</a>
                            <ul>
                                <li><a href="customerSignUp.php">Online application form</a></li>
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
        <form action="newCustomerUploads.php" method="post" enctype="multipart/form-data">
        

            First Name: <input type="text" name="firstname" autofocus required pattern="[A-Za-z -]{1,50}" title="Alphabetical characters, spaces, and hyphens are accepted"/>
            <br>
            Second Name: <input type="text" name="secondname" pattern="[A-Za-z -]{1,50}" title="Alphabetical characters, spaces, and hyphens are accepted"/>
            <br>
            Last Name:   <input type="text" name="lastname" required pattern="[A-Za-z -]{1,50}" title="Alphabetical characters, spaces, and hyphens are accepted"/>
            <br>
            Address Line One:   <input type="text" name="addresslineone" required pattern="[A-Za-z 0-9]{1,50}"/>
            <br>
            Address Line Two:   <input type="text" name="addresslinetwo" pattern="[A-Za-z 0-9]{1,50}"/>
            <br>
            City:   <input type="text" name="city" required pattern="[A-Za-z ]{1,50}"/>
            <br>
            Post Code:   <input type="text" name="postcode" required pattern="[A-Za-z0-9 ]{3,8}"/>
            <br>
            Username: <input type="text" name="username" required pattern=^[a-zA-Z]{1}[a-zA-Z0-9-_\.]{5,19}$ title="Your username must begin with a letter, and may not contain special characters" placeholder="6-20 Characters"/>
            <br>
            Password: <input type="password" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
            <br><br>
            <input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
            Choose a display picture:
            <br>
            <input type="file" name="avatar"/>
            <input type="submit" value="Upload"/>
            <br>
            
            
        </form>
<?php include 'footer.php';?>
