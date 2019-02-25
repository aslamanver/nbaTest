<?php
    $dsn = 'mysql:host=localhost;dbname=nba';
    $username = 'renwid';
    $password = 'PassWord#123';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('/database_error.php');
        exit();
    }
?>
