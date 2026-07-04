<?php

require 'db.php';

// Create a test user

$username = 'admin';
$password = 'Secret123';

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)");

$stmt->execute([$username, $hash]);

echo "Test user created.<br>";
echo "Username: admin<br>";
echo "Password: Secret123";
?>