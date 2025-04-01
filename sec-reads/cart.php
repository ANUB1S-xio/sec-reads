<?php
session_start();
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book = $_POST['book'] ?? null;
    if ($book) $_SESSION['cart'][] = $book;
}

$cart = $_SESSION['cart'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Cart - Sec-Reads</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
    <div class="logo">📚 Sec-Reads</div>
    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="checkout.php">Checkout</a>
    </div>
</nav>
<main>
    <h2>Your Cart</h2>
    <?php if (empty($cart)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($cart as $item): ?>
                <li><?= htmlspecialchars($item) ?></li>
            <?php endforeach; ?>
        </ul>
        <form action="checkout.php" method="get">
            <button type="submit">Proceed to Checkout</button>
        </form>
    <?php endif; ?>
</main>
</body>
</html>
