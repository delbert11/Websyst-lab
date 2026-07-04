<?php

require 'db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");

    $stmt->execute([$username]);

    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password_hash'])) {

        $message = "Login successful. Welcome, " . htmlspecialchars($user['username']) . "!";

    } else {

        $message = "Invalid username or password.";

    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure Login</title>
</head>
<body>

<h2>Secure Login</h2>

<form method="POST">

<input type="text" name="username" placeholder="Username"><br><br>

<input type="password" name="password" placeholder="Password"><br><br>

<button type="submit">Login</button>

</form>

<p><?php echo htmlspecialchars($message); ?></p>

</body>
</html>