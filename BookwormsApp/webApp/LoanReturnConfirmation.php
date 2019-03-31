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
        <br><h2>Book returned successfully!</h2>
        
        <h3>Loan details:</h3>
        
    <?php
require_once(__DIR__ . '/../Models/Loan.php');
require_once(__DIR__ . '/../Viewers/LoanViewer.php');
require_once(__DIR__ . '/../Controllers/LoanController.php');
use Models\ Loan;
use Viewers\LoanViewer;
use Controllers\LoanController;

session_start();
function filterInput($inputItem) {
    return filter_input(INPUT_POST,$inputItem,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
}

$loanDetails = filter_input_array(INPUT_POST);

if(!empty($loanDetails)) {
    foreach($loanDetails as $loanDetail => $loanValue) {
        ${$loanDetail} = filterInput($loanDetail);
    }
    $loanID= rand(000, 1000);  
    $newLoan = new Loan($loanID, '2019-01-25', $loanDetails['bookID'], $loanDetails['customerID']);
    $newLoan->setLoanReturnDate($loanDetails['loanReturnDate']);
    $newLoanController = new LoanController();
    $newLoanController->flagLoanOverdue($newLoan);
    $newLoanViewer = new LoanViewer();
    
    if($newLoan->getIsLoanOverdue()){
        echo '<h3 style="color:red">LOAN OVERDUE!</h3>';
    }
    
    $newLoanViewer->listLoan($newLoan);
    //else navigate to error page
}
 ?>   
        
        
<?php include 'footer.php';?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
</body>
</html>

