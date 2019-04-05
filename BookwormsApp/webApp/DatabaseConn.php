<?php

//const DB_DSN = 'mysql:host=localhost;dbname=libraryapp';
//const DB_USER = 'root';

try {
    $conn = new PDO(DB_DSN, DB_USER);
} catch (PDOException $e) {
    header("Location: ErrorPage.php");
}

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

