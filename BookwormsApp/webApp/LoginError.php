<html>
    <head>
        <meta charset="UTF-8">
        <title>Error Page</title>
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <nav role="navigation">
            <ul>
                <li><a href="">Search, Renew and Reserve books</a>
                    <ul>
                        <li><a href="">Search by author</a></li>
                        <li><a href="">Search by title</a></li>
                    </ul>
                </li>
                <li><a href="">Join a Library</a>
                    <ul>
                        <li><a href="">Online application form</a></li>
                        <li><a href="">Local Branches</a></li>
                    </ul>
                </li>
                <li><a href="">Recommended Reads</a>
                    <ul>
                        <li><a href="">Bestsellers</a></li>
                        <li><a href="">Reader's Digest</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <h2>Invalid Username or Password, please try again</h2>
        <p></p>
        
        <?php    
            echo ($_SESSION['errorMessage']);
            unset($_SESSION['errorMessage']);
        ?>
        
        <button type="button" onclick="window.location.href = 'LoginPage.php';">Log in again</button>
    
            
    <?php include 'footer.php';?>
