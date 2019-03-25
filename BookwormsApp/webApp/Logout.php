<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href="CSS.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <title></title>
        <?php
            session_start();
            unset($_SESSION['username']);
            unset($_SESSION['password']);
            session_destroy();
        ?>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
