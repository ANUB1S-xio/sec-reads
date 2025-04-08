<?php
session_start();
$_SESSION['cart'] = [];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<main>
    <h1>Thank you!</h1>
    <p>Your payment was successful.</p>
    <a href="index.php">Back to Home</a>
</main>
</body>
</html>
