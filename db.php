<?php
include 'header.php';
$host = 'localhost';
$db = 'user_management'; // Replace with your database name
$user = 'root'; // Replace with your MySQL username (default is 'root')
$password = ''; // Replace with your MySQL password (default is empty for XAMPP)

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
