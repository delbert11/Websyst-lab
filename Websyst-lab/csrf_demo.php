<?php

session_start();

if(empty($_SESSION['csrf_token'])){

    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

}

$token = $_SESSION['csrf_token'];

$result = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')){

        die("CSRF validation failed. Request rejected.");

    }

    $result = "Action completed securely.";

}

?>

<!DOCTYPE html>

<html>

<head>

<title>CSRF Demo</title>

</head>

<body>

<h2>Transfer Funds</h2>

<form method="POST">

<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">

<button type="submit">Transfer Funds</button>

</form>

<p><?php echo htmlspecialchars($result); ?></p>

</body>

</html>