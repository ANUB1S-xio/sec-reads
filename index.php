<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$addedMessage = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book = $_POST['book'] ?? null;
    if ($book) {
        $_SESSION['cart'][] = $book;
        header("Location: index.php?added=" . urlencode($book));
        exit;
    }
}

if (isset($_GET['added'])) {
    $addedMessage = htmlspecialchars($_GET['added']) . ' added to cart.';
}

$apiKey = 'AIzaSyBX1edPcWsv8ed-x4gpmcLXlQ-0l4EDqNE';

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

function fetchBooks($subject, $apiKey) {
    $query = urlencode($subject);
    $url = "https://www.googleapis.com/books/v1/volumes?q=subject:$query&maxResults=3&key=$apiKey";
    $response = @file_get_contents($url);
    if (!$response) return [];
    $data = json_decode($response, true);
    return $data['items'] ?? [];
}
?>
<!DOCTYPE html>
<html>
<head>
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
        <a href="#">About</a>
        <a href="#">Contact</a>
    </div>
</nav>

<main>
    <?php if ($addedMessage): ?>
        <div class="added-message"><?= $addedMessage ?></div>
    <?php endif; ?>

    <h1>Explore Cybersecurity Books</h1>

    <form method="POST" class="book-card">
        <h3>The Cyber Dummy Guide</h3>
        <input type="hidden" name="book" value="The Cyber Dummy Guide">
        <p>Used to test cart functionality with $0.01 purchase.</p>
        <button type="submit">Add to Cart - $0.01</button>
    </form>

    <?php foreach ($categories as $category): ?>
        <h2><?= htmlspecialchars($category) ?></h2>
        <div class="book-grid">
            <?php foreach (fetchBooks($category, $apiKey) as $bookItem):
                $info = $bookItem['volumeInfo'];
                $title = $info['title'] ?? 'Untitled';
                $desc = $info['description'] ?? '';
                $img = $info['imageLinks']['thumbnail'] ?? 'https://via.placeholder.com/128x195?text=No+Image';
                $link = $info['infoLink'] ?? '#';
                $rating = $info['averageRating'] ?? 'N/A';
            ?>
                <div class="book-card">
                    <img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($title) ?>">
                    <h3><?= htmlspecialchars($title) ?></h3>
                    <p>Rating: <?= $rating ?></p>
                    <p><?= htmlspecialchars(substr($desc, 0, 100)) ?>...</p>
                    <a href="<?= htmlspecialchars($link) ?>" target="_blank">
                        <button type="button">View Book</button>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</main>
</body>
</html>

