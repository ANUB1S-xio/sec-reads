<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (email, password_hash) VALUES (?, ?)");
    $stmt->execute([$email, $pass]);
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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
    <h2>Register</h2>
    <input name="email" type="email" required placeholder="Email"><br>
    <input name="password" type="password" required placeholder="Password"><br>
    <button type="submit">Sign Up</button>
</form>
</main>
</body>
</html>

