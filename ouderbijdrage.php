<?php 
include 'includes/db.php';

$linkStmt = $pdo->prepare("SELECT url FROM links WHERE type = ?");
$linkStmt->execute(['ouderbijdrage']);
$link = $linkStmt->fetchColumn();

//$link = include 'data/link.php'; ?>
 
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OV De Spil - Ouderbijdrage</title>
<script src="https://cdn.tailwindcss.com"></script></head>
<body class="flex flex-col min-h-screen font-sans bg-[#f4f4f4] text-gray-800">
  <?php include 'includes/header.php'; ?>
  <main class="p-6 flex-grow max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-[#00477e]">Betaal de ouderbijdrage</h1>
    <p class="mb-4">Scan de QR-code of klik op de knop hieronder om te betalen:</p>
    <img src="qr/qr.JPG" alt="Betaal QR code" class="w-48 mb-4" />
    <a href="<?= $link ?>" target="_blank" class="mt-4 inline-block bg-[#00a651] hover:bg-green-600 text-white px-4 py-2 rounded">Betaal nu</a>
  </main>
  <?php include 'includes/footer.php'; ?>
</body>
</html>
