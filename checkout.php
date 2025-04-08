<?php
session_start();
if (empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
    <a href="index.php">Home</a>
    <a href="cart.php">Cart</a>
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
