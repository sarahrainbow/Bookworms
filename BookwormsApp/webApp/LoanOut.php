<html>
    <head>
        <meta charset="UTF-8">
        <title>Loan out | Bookworm Libraries</title>
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
 
    </head>
    <body>
                <center>
            <h1>Bookworm Libraries</h1>
                <?php include 'NavBar.html'; include 'NavBarCollapsed.html';?>
                    
        </center>
        <div class="paddedBlock"><h2>Loan out a book</h2>
            <form action="LoanOutConfirmation.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="bookID">Book ID</label>
                    <input class="form-control" type="number" name="bookID" autofocus/>
                </div>
                <div class="form-group">
                    <label for="customerID">Customer ID</label>
                    <input class="form-control" type="number" name="customerID"/>
                </div>
                <div class="form-group">
                    <label for="date">Loan out date</label>
                    <input class="form-control" type="date" name ="loanOutDate" required/>
                </div>
                <button type="submit" class="btn btn-primary">Loan book</button>
            </form>
        </div>
            <br>
<?php include 'Footer.html';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</body>
</html>

