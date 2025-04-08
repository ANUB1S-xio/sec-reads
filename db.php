<?php
$host = 'tcp:YOUR_SQL_SERVER_NAME.database.windows.net,1433';
$db = 'secreadsdb';
$user = 'test';
$pass = 'test';

try {
    $pdo = new PDO("sqlsrv:server=$host;Database=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Connection Failed: " . $e->getMessage());
}
?>
