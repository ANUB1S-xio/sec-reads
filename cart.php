<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
    <a href="index.php">Home</a>
    <a href="cart.php">Cart</a>
</nav>
<main>
    <h1>Your Cart</h1>
    <?php if (empty($cart)): ?>
        <p>No items in cart.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($cart as $item): ?>
                <li><?= htmlspecialchars($item) ?> — $0.01</li>
            <?php endforeach; ?>
        </ul>
        <form action="checkout.php" method="POST">
            <button type="submit">Proceed to Checkout</button>
        </form>
    <?php endif; ?>
</main>
</body>
</html>
