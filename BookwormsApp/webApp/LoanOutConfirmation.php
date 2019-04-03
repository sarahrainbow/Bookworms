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

            use Models\ {Loan, Customer};

            function filterInput($inputItem) {
                return filter_input(INPUT_POST,$inputItem,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
            }

            $loanDetails = filter_input_array(INPUT_POST);


            //testing sunny and rainy day scenarios by changing loancount to loan limit 
            $newCustomer = new Customer(12345, 'Matilda', 'Honey', 'Wormwood','9 Youngwood Drive','matildahoney@gmail.com','bookworm23','Password123','','');
            $newCustomer->setLoanCount(4);

            if($newCustomer->getLoanCount() >= $newCustomer->getLoanLimit()){ 
                header("Location: LoanLimitReached.php");
                $_SESSION['limitError']['errorMessage']="You have reached your loan limit. Please return a book to take out more loans.";
                die();
            }

            else if(!empty($loanDetails)) {
                    include_once 'NavBar.html'; 
                    include_once 'NavBarCollapsed.html';
                    echo '<br><div class="paddedBlock"><h2>Book Loaned successfully!</h2>';

                    foreach($loanDetails as $loanDetail => $loanValue) {
                        ${$loanDetail} = filterInput($loanDetail);
                        echo $loanDetail . ": " . $loanValue . "<br>";
                    }
                    
                    


                    $loanID= rand(000, 1000);
                    echo "loanID: " . $loanID . "<br>";
                    $newLoan = new Loan($loanID, $loanDetails['loanOutDate'], $loanDetails['bookID'], $loanDetails['customerID'], "Kennington");
                    echo "Date loan due back: " . $newLoan->getLoanDueBackDate();
                    

                    try {
                        $pdo = new PDO(DB_DSN, DB_USER);
                    }
                    catch (PDOException $e) {
                        die("Something went wrong :'( \n" . $e->getMessage() . " on line " . $e->getLine());
                    }

                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                    $statement = $pdo->prepare("INSERT INTO `loan`(`LibraryCardID`, `BookID`, `DateOut`) VALUES ((SELECT LibraryCardID from librarycardholder WHERE librarycardholder.LibraryCardID = :LibraryCardID), (SELECT BookID from copy WHERE copy.BookID = :BookID), :DateOut)");

                    try {
                        $statement->execute(['LibraryCardID' => $loanDetails['customerID'], 'BookID' => $loanDetails['bookID'], 'DateOut' => $loanDetails['loanOutDate']]);                   
                    } catch (PDOException $e) {
                        echo $e->getMessage() . ' on line ' . $e->getLine();
                        $error = $e->errorInfo;
                        die();
                    }
                    
            }
        ?>
    </div>

        <?php include 'Footer.html';?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</body>
</html>
    
