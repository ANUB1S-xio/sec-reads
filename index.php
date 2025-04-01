<?php
session_start();
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book = $_POST['book'] ?? null;
    if ($book) $_SESSION['cart'][] = $book;
}

$categories = [
    'Cryptography',
    'Ethical Hacking',
    'Cloud Security',
    'Malware Analysis',
    'Red Teaming',
    'Cyber Laws',
    'Computer Forensics',
    'Software Engineering'
];

// ✅ Your actual Google Books API key
$apiKey = 'AIzaSyBX1edPcWsv8ed-x4gpmcLXlQ-0l4EDqNE';

function fetchBooks($subject, $apiKey = '') {
    $encoded = urlencode($subject);
    $url = "https://www.googleapis.com/books/v1/volumes?q=subject:$encoded&maxResults=6&key=$apiKey";

    $response = @file_get_contents($url);
    if (!$response) return [];

    $json = json_decode($response, true);
    return $json['items'] ?? [];
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
        <a href="index.php">Home</a>
        <a href="cart.php">Cart</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>
</nav>

<main>
    <h1>Explore Cybersecurity Books by Category</h1>

    <?php foreach ($categories as $category): ?>
        <h2><?= htmlspecialchars($category) ?></h2>
        <div class="book-grid">
            <?php
            $books = fetchBooks($category, $apiKey);
            foreach ($books as $book):
                $info = $book['volumeInfo'];
                $title = $info['title'] ?? 'Untitled';
                $desc = $info['description'] ?? 'No description.';
                $img = $info['imageLinks']['thumbnail'] ?? 'https://via.placeholder.com/128x195?text=No+Image';
                $rating = $info['averageRating'] ?? 'N/A';
                $price = $book['saleInfo']['listPrice']['amount'] ?? null;
                $currency = $book['saleInfo']['listPrice']['currencyCode'] ?? '';
                $link = $info['infoLink'] ?? '#';
            ?>
                <div class="book-card">
                    <img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($title) ?>" style="width:100%; border-radius:6px;">
                    <h3><?= htmlspecialchars($title) ?></h3>
                    <p>⭐ Rating: <?= $rating ?></p>
                    <?php if ($price): ?>
                        <p><strong>Price:</strong> <?= $currency ?><?= $price ?></p>
                    <?php endif; ?>
                    <p><?= htmlspecialchars(substr($desc, 0, 120)) ?>...</p>
                    <a href="<?= htmlspecialchars($link) ?>" target="_blank">
                        <button>View Book</button>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</main>
</body>
</html>
