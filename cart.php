<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear'])) {
    $_SESSION['cart'] = [];
    header("Location: cart.php");
    exit;
}

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
    <div class="logo">Sec-Reads</div>
    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="cart.php">Cart</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
    </div>
</nav>
<main>
    <div class="content-box">
        <h1>Your Cart</h1>
        <?php if (empty($cart)): ?>
            <p>No items in cart.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($cart as $item): ?>
                    <li><?= htmlspecialchars($item) ?> — $0.01</li>
                <?php endforeach; ?>
            </ul>
            <form action="checkout.php" method="POST" style="margin-top: 20px;">
                <button type="submit">Proceed to Checkout</button>
            </form>
            <form action="cart.php" method="POST" style="margin-top: 10px;">
                <input type="hidden" name="clear" value="1">
                <button type="submit" style="background: #ff5e5e; color: white;">Clear Cart</button>
            </form>
        <?php endif; ?>
    </div>
</main>
</body>
</html>
