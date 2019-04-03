<html>
    <head>
        <meta charset="UTF-8">
        <title>Loan return | The Bookworms</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
 
    </head>
    <body>

            <h1>Bookworm Libraries</h1>
                <?php include 'NavBar.html'; include 'NavBarCollapsed.html';?>
        <div class="paddedBlock">
            <h2>Return a book</h2>
                <form action="loanReturnConfirmation.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="bookID">Book ID</label>
                        <input class="form-control" type="number" name="bookID" autofocus/>
                    </div>
                    <div class="form-group">
                        <label for="customerID">Customer ID</label>
                        <input class="form-control" type="number" name="customerID"/>
                    </div>
                    <div class="form-group">
                        <label for="date">Return date</label>
                        <input class="form-control" type="date" name ="loanReturnDate" required/>
                    </div>
                    <button type="submit" class="btn btn-primary">Return book</button>
                </form>
        </div>
            <br>
            
<?php include 'Footer.html';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

