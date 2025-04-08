<?php session_start(); if (empty($_SESSION['cart'])) { header("Location: cart.php"); exit; } ?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
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
    <h1>Checkout</h1>
    <p>Total: $0.01</p>
    <form action="charge.php" method="POST">
        <button type="submit">Pay with Stripe</button>
    </form>
</main>
</body>
</html>
