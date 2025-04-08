<?php session_start(); $_SESSION['cart'] = []; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Successful</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
    <div class="logo">Sec-Reads</div>
    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="cart.php">Cart</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
    </div>
</nav>
<main>
    <h1>Thank You</h1>
    <p>Your payment was successful.</p>
    <a href="index.php">
        <button type="button">Return to Home</button>
    </a>
</main>
</body>
</html>
