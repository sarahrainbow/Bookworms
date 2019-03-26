<?php

echo
 "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <link href='CSS.css' rel='stylesheet' type='text/css'/>

    </head>
    <body>
        <center>
            <h1>The Bookworms</h1>
                <nav role='navigation'>
                    <div class = row>
                    <div class='dropdown'>
                        <button class='btn btn-default dropdown-toggle' type='button' id='option1' data-toggle='dropdown'>Search, Loan and Return Books
                            <span class='caret'></span></button>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='menu1'>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='search.php'>Search</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='LoanOut.php'>Loan</a></li>
                              <li role='presentation'><a role='menuitem' tabindex='-1' href='LoanReturn.php'>Return</a></li>
                            </ul>                    
                    </div>
                    <div class='dropdown'>
                        <button class='btn btn-default dropdown-toggle' type='button' id='option1' data-toggle='dropdown'>Join a Library
                            <span class='caret'></span></button>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='menu1'>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='customerSignUp.php'>Online Application form</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='#'>Library Branches</a></li>
                              <li role='presentation'><a role='menuitem' tabindex='-1' href='#'>Opening times</a></li>
                            </ul>
                            
                    </div>
                    <div class='dropdown'>
                        <button class='btn btn-default dropdown-toggle' type='button' id='option1' data-toggle='dropdown'>Recommended Reads
                            <span class='caret'></span></button>
                            <ul class='dropdown-menu' role='menu' aria-labelledby='menu1'>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='https://www.amazon.co.uk/'>Bestsellers</a></li>
                                <li role='presentation'><a role='menuitem' tabindex='-1' href='#'>Reader's Digest</a></li>
                              <li role='presentation'><a role='menuitem' tabindex='-1' href='#'>Greatest Books of All Time</a></li>
                            </ul>
                            
                    </div>
                    <div class='btn'>
                        <button class='btn' type='button' id='option1' data-toggle='dropdown'>Account Login
                            <span class='caret'></span></button>
                    </div>
                </nav>";

