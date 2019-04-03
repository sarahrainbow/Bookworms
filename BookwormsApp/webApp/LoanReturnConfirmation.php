<html>
    <head>
        <meta charset="UTF-8">
        <title>Loan return confirmation | The Bookworms</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
 
    </head>
    <body>
        <h1>Bookworm Libraries</h1>
        <?php include 'NavBar.html'; include 'NavBarCollapsed.html';?>    
        
        <div class="paddedBlock">
            <h2>Book returned successfully!</h2>
               
                <?php
            require_once(__DIR__ . '/../Models/Loan.php');
            require_once(__DIR__ . '/../Viewers/LoanViewer.php');
            require_once(__DIR__ . '/../Controllers/LoanController.php');
            use Models\ Loan;
            use Viewers\LoanViewer;
            use Controllers\LoanController;
            
            function filterInput($inputItem) {
                return filter_input(INPUT_POST,$inputItem,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
            }

            $loanDetails = filter_input_array(INPUT_POST);
            echo "<h3>Loan details:</h3>";
            if(!empty($loanDetails)) {
                foreach($loanDetails as $loanDetail => $loanValue) {
                    ${$loanDetail} = filterInput($loanDetail);
                }
                $loanID= rand(000, 1000);  
                $newLoan = new Loan($loanID, '2019-01-25', $loanDetails['bookID'], $loanDetails['customerID'], "Kings Cross");
                $newLoan->setLoanReturnDate($loanDetails['loanReturnDate']);
                $newLoanController = new LoanController();
                $newLoanController->flagLoanOverdue($newLoan);
                $newLoanViewer = new LoanViewer();

                if($newLoan->getIsLoanOverdue()){
                    echo '<p style="color:red">LOAN OVERDUE!</p>';
                }

                $newLoanViewer->listItem($newLoan);
                //else navigate to error page
            }
             ?>   
        </div>
        
<?php include 'Footer.html';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

