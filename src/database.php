<?php

$host = 'localhost'
$username = 'root'
$password = 'Sakthi@123'
$dbname = 'user_system'

try {
    $conn = new PDO(
        "mysql:
        host=$host;
        dbname=$dbname",
        $username,
        $password);

        $conn->setAttribute(PDO::ATTR_ERRMOD, PDO::ERRMODE_EXCEPTION);

        echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>