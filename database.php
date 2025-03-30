<?php

$host = 'localhost'; // Change if using a different server
$dbname = 'frontendfortress'; // Your database name
$username = 'root'; // Default username for MySQL
$password = ''; // Default password for MySQL (usually empty on local servers)

try {
    // Establish a connection using PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection failure
    die("Database connection failed: " . $e->getMessage());
}

?>