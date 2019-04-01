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
            <h1>Bookworm Libraries</h1>
                <?php include 'NavBar.html'; ?>
               </center>            
        
        <div class="paddedBlock"><h2>Sign up to the library</h2>
            <form action="newCustomerUploads.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    First Name: <input class="form-control" type="text" name="firstname" autofocus required pattern="[A-Za-z -]{1,50}" title="Alphabetical characters, spaces, and hyphens are accepted"/>
                </div>
                <div class="form-group">
                    Second Name: <input class="form-control" type="text" name="secondname" pattern="[A-Za-z -]{1,50}" title="Alphabetical characters, spaces, and hyphens are accepted"/>
                </div>
                <div class="form-group">
                    Last Name:   <input class="form-control" type="text" name="lastname" required pattern="[A-Za-z -]{1,50}" title="Alphabetical characters, spaces, and hyphens are accepted"/>
                </div>
                <div class="form-group">
                    Address Line One:   <input class="form-control" type="text" name="addresslineone" required pattern="[A-Za-z 0-9]{1,50}"/>
                </div>
                <div class="form-group">
                    Address Line Two:   <input class="form-control" type="text" name="addresslinetwo" pattern="[A-Za-z 0-9]{1,50}"/>
                </div>
                <div class="form-group">
                    City:   <input class="form-control" type="text" name="city" required pattern="[A-Za-z ]{1,50}"/>
                </div>
                <div class="form-group">
                    Post Code:   <input class="form-control" type="text" name="postcode" required pattern="[A-Za-z0-9 ]{3,8}"/>
                </div>
                <div class="form-group">
                    Username: <input class="form-control" type="text" name="username" required pattern=^[a-zA-Z]{1}[a-zA-Z0-9-_\.]{5,19}$ title="Your username must begin with a letter, and may not contain special characters" placeholder="6-20 Characters"/>
                </div>
                <div class="form-group">
                    Password: <input class="form-control" type="password" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
                </div>
                <input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
                    Choose a display picture:
                <br>
                <input class="form-control" type="file" name="avatar"/>
                <input type="submit" value="Upload"/>
                <br>


            </form>
        </div>
<?php include 'Footer.html';?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
</body>
</html>
