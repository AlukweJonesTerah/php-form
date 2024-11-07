<?php
$_SERVERNAME ='localhost';
$_DBUSERNAME ="root";
$_DBPASSWORD="";
$_DBNAME="student";

try {
    // Connection creation
    $conn = new mysqli($_SERVERNAME, $_DBUSERNAME, $_DBPASSWORD, $_DBNAME)
    $conn = new PDO("mysqlhost=$sername;dbname=student", $_DBUSERNAME, $_DBPASSWORD)
    $conn->setAttribute(PDO:ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXCEPTION);

    // connection chaecking
    if ($conn -> connection_error) {
        die("Connection failed: " .$conn->connection_error);
    }
    echo "Connection succefully";
} catch (PDOException $e) {
   echo "Connection failed: " .$e->getMessage();
}

?>