<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['cart'][] = 'The Cyber Dummy Guide';
    header('Location: cart.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sec-Reads - Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
    <a href="index.php">Home</a>
    <a href="cart.php">Cart</a>
</nav>
<main>
    <h1>Welcome to Sec-Reads</h1>
    <form method="POST">
        <div class="book-card">
            <h3>The Cyber Dummy Guide - $0.01</h3>
            <button type="submit">Add to Cart</button>
        </div>
    </form>
</main>
</body>
</html>
