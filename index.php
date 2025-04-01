<?php
session_start();
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book = $_POST['book'] ?? null;
    if ($book) $_SESSION['cart'][] = $book;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sec-Reads Cyber Bookstore</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
    <div class="logo">Sec-Reads</div>
    <div class="nav-links">
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <a href="cart.php">Cart</a>
    </div>
</nav>
<main>
    <h1>Welcome to Sec-Reads</h1>
    <p>Digital cybersecurity book collection</p>
    <div class="book-grid">
        <form method="POST" class="book-card">
            <h3>Web Application Hacker’s Handbook</h3>
            <input type="hidden" name="book" value="Web Application Hacker’s Handbook">
            <button type="submit">Add to Cart</button>
        </form>
        <form method="POST" class="book-card">
            <h3>Black Hat Python</h3>
            <input type="hidden" name="book" value="Black Hat Python">
            <button type="submit">Add to Cart</button>
        </form>
        <form method="POST" class="book-card">
            <h3>Practical Malware Analysis</h3>
            <input type="hidden" name="book" value="Practical Malware Analysis">
            <button type="submit">Add to Cart</button>
        </form>
    </div>
</main>
</body>
</html>
