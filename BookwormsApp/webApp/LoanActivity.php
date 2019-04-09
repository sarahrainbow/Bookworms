<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
 
    </head>
    <body>
        <h1>Bookworm Libraries</h1>
        <?php
        session_start();   
        const DB_DSN = 'mysql:host=localhost;dbname=libraryapp';
        const DB_USER = 'root';
        //const DB_PASS = 'pwd';
 
        spl_autoload_register(function($Name) {
            $filePath = "$Name.php";
            $macFilePath = str_replace('\\', '/', $filePath);
            require_once '../' . $macFilePath;   
        });
        
        include_once 'NavBar.html'; 
        include_once 'NavBarCollapsed.html';
        
        try {
                    $conn = new PDO(DB_DSN, DB_USER);
                }
                catch (PDOException $e) {
                    header("Location: ErrorPage.php");
                }
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $statement = $conn->prepare("CALL FindLoansByLibraryCardID(:LibraryCardID)");
        $libraryCardID = $_SESSION['LibraryCardID'];
        $statement->bindParam('LibraryCardID', $libraryCardID, PDO::PARAM_INT);
        $statement->execute();
        
        $loans = $statement->fetchAll();
        
        echo '<div class="PaddedBlock"><h4>Customer name: ' . $loans[0][0] . "</h4><br>";
        $i = 1;
        
        foreach($loans as $loan) {
            echo "<p class='font-weight-bold'>Loan " . $i . '</p>';
            $i++;
            echo 'Title: ' . $loan['Title'] . "<br>";
            echo 'Author: ' . $loan['Author'] . "<br>";
            echo 'Date loaned: ' . $loan['DateOut'] . "<br>";
            echo 'Date returned: ' . $loan['DateReturned'] . "<br>";
            echo 'Loan due: ' . $loan['Due back'] . "<br><br>";
        }
        
        echo "</div>";
        
        session_destroy();
        
      ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</body>
</html>  

