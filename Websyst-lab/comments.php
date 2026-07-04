<?php

session_start();

$comments = $_SESSION['comments'] ?? [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $comments[] = $_POST['comment'];

    $_SESSION['comments'] = $comments;

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Comments</title>

</head>

<body>

<h2>Comment Page</h2>

<form method="POST">

<input type="text" name="comment" placeholder="Write a comment">

<button>Post</button>

</form>

<h3>Comments</h3>

<?php foreach($comments as $c): ?>

<p><?php echo htmlspecialchars($c, ENT_QUOTES, 'UTF-8'); ?></p>

<?php endforeach; ?>

</body>

</html>