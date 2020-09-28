<?php
$host = "mysql";
$db_name = "goldenShop";
$username = "root";
$password = "root";
try{
    $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
}catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
    $conn = null;
}



