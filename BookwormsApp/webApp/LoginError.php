<html>
    <head>
        <meta charset="UTF-8">
        <title>Error Page</title>
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
                    
        
        <?php    
            echo ($_SESSION['errorMessage']);
            unset($_SESSION['errorMessage']);
        ?>
        
        <button type="button" onclick="window.location.href = 'LoginPage.php';">Log in again</button>
    
            
    <?php include 'footer.php';?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
</body>
</html>
