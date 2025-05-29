<?php
$config = include __DIR__ . '/../../secure/db_config.php';

try {
  $pdo = new PDO(
    "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4",
    $config['username'],
    $config['password'],
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );
} catch (PDOException $e) {
  die("Databaseverbinding mislukt: " . $e->getMessage());
}
