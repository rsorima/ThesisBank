<?php
    $dsn = 'mysql:host=localhost;dbname=thesisbank;';
    $user = 'root';
    $pass = '';

    try {
        $conn = new PDO ($dsn, $user, $pass);
    }
    catch (PDOException $e) {
        echo "Connection failed" .$e->getMesssage();
    }

    $con = mysqli_connect("localhost","root","","thesisbank");
?>
