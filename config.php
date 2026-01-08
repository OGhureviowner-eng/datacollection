<?php
// Database connection using PDO (secure and modern)
$host = 'localhost';          // Usually 'localhost'
$dbname = 'your_database_name';  // Change to your DB name
$username = 'your_db_username';  // Change
$password = 'your_db_password';  // Change

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed. Check config.php. Error: " . $e->getMessage());
}
?>
