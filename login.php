<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$_POST['email']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: index.php');
        exit;
    } else {
        echo "Invalid login";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
    <a href="index.php">Home</a>
    <a href="cart.php">Cart</a>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
</nav>
<main>
<form method="POST">
    <h2>Login</h2>
    <input name="email" type="email" required placeholder="Email"><br>
    <input name="password" type="password" required placeholder="Password"><br>
    <button type="submit">Login</button>
</form>
</main>
</body>
</html>
