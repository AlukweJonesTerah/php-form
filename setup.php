<?php
    // db configuration
    $servername = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'student';

    try{
        // connect to the db
        $conn = new PDO("mysql:host=$servername", $dbUsername, $dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create database if it doesn't exist
        $conn->exec("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        echo "Database `$dbName` created successfully or already exists.<br>";

        // Connect to the database
        $conn->exec("USE `$dbName`");

        // SQL sttement to create the 'student' table
        $sql = "CREATE TABLE IF NOT EXISTS `student` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `first_name` VARCHAR(50) NOT NULL,
            `last_name` VARCHAR(50) NOT NULL,
            `gender` VARCHAR(10) NOT NULL,
            `reg_number` VARCHAR(20) NOT NULL,
            `phone_number` VARCHAR(15) NOT NULL,
            `email_address` VARCHAR(100) NOT NULL,
            `hostel_status` VARCHAR(20) NOT NULL,
            `student_address` VARCHAR(255) NOT NULL,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
        )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

        // Execute the SQL statement
        $conn->exec($sql);
        echo "Table `student` created successfully or already exists.<br>";

        echo "Database and table created successfully.";
    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
        die("Connection failed: " . $e->getMessage());
    }
?>