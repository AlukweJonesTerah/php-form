<?php

// Db config
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "student";

try {
    //create a new PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$dbName;charset=utf8", $dbUsername, $dbPassword);
    // Set error mode to exceptions
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; // For debugging
    echo "Connected successfully";
} catch (PDOException $e) {
    die("Connection failed" .$e->getMessage());
    throw $e;
}
?>