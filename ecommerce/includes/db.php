<?php
$host = 'localhost';
$port = '3307'; // More likely than 3307
$dbname = 'ecommerce';  // Your database name
$user = 'root';          // MySQL username
$password = '';          // MySQL password (empty by default in XAMPP)

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname";
    $conn = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
