<?php

$server = "127.0.0.1";
$database_name = "mydb";
$user = "user";
$pass = "password";


try {
    $conn = new PDO("mysql:host=$server;port=3306;dbname=$database_name", $user, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<br>" . $e->getMessage();
}
