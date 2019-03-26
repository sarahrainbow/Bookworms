
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
    <?php
     
    ?>
    </head>
    <body>
        <center>
            <h1>The Bookworms</h1>
                <nav role="navigation">
                    <div class = row>
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
                        <button class="btn" type="button" id="option1" data-toggle="dropdown">Account Login
                            <span class="caret"></span></button>
                    </div>
                </nav>
                    
                    
                    
                    
                  
            
            <div class="container-fluid">
                 <div class="row">
                    <div class="col-sm-4">
                        <img src="Images/JoinLibrary.jpeg" alt="Join the Library" style="float: right; text-align: center; width:100%; height:50%"/>Join the Library
                    </div>
                    <div class="col-sm-4">
                        <img src="Images/Searchbooks.jpeg" alt="Search, Renew, Reserve" style="float: right; text-align: center; width:100%; height:50%"/>Search, Renew and Reserve Books
                    </div>
                    <div class="col-sm-4">
                        <img src="Images/recommendedread.jpeg" alt="Recommended Reads" style="float: right; text-align: center; width:100%; height:50%"/>Recommended Reads
                    </div>
                </div> 
            </div>
            <div class="container-fluid">
                 <div class="row">
                    <div class="col-sm-4">
                      <img src="Images/Audioebooks.jpeg" alt="Audio and Ebooks" style="text-align: right; width:100%; height:50%"/>Audio and E-books
                    </div>
                    <div class="col-sm-4">
                        <img src="Images/events.jpeg" alt="Events and Activities" style="text-align: right; width:100%; height:50%"/>Events and Activities
                    </div>
                    <div class="col-sm-4">
                        <img src="Images/onlineservices.jpeg" alt="Online Services" style="text-align: right; width:100%; height:50%"/>Online Services
                    </div>
                </div> 
            </div>
            
        </center>
        <?php
        // put your code here
        ?>
<?php include 'footer.php';?>
