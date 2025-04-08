<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
    <a href="index.php">Home</a>
    <a href="cart.php">Cart</a>
    <a href="logout.php">Logout</a>
</nav>
<main>
    <h1>Checkout</h1>
    <p>You will be charged $0.01 for the test item.</p>
    <form action="charge.php" method="POST">
        <button type="submit">Pay with Stripe</button>
    </form>
</main>
</body>
</html>
