
<!DOCTYPE html>
<html>
<head>
    <title>Register - Sec-Reads</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">


</head>
<body>
<nav>
    <div class="logo">Sec-Reads</div>
    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
    </div>
</nav>
<main>
    <h2>Create an Account</h2>
    <form method="post" class="auth-form">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
</main>
</body>
</html>
