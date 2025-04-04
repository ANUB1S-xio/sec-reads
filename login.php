<!DOCTYPE html>
<html>
<head>
    <title>Login - Sec-Reads</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
    <div class="logo">Sec-Reads</div>
    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="cart.php">Cart</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>
</nav>

<main>
    <h2>Login</h2>
    <form method="post" class="auth-form">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</main>
</body>
</html>
