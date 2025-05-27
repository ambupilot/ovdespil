<?php
// public/index.php
$contributions = include 'data/contributions.php';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>OV De Spil - Start</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex flex-col min-h-screen font-sans bg-[#f4f4f4] text-gray-800">
  <?php include 'includes/header.php'; ?>

  <main class="p-6 flex-grow max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-[#00477e]">Overzicht Ouderbijdrage</h1>
    <div class="space-y-4">
      <?php foreach ($contributions as $item): 
        $percentage = min(100, ($item['current'] / $item['total']) * 100); ?>
        <div>
          <div class="flex justify-between text-sm mb-1">
            <span><?= $item['name'] ?></span>
            <span>€<?= $item['current'] ?> / €<?= $item['total'] ?></span>
          </div>
          <div class="w-full bg-gray-200 h-4 rounded">
            <div class="h-4 bg-[#00a651] rounded" style="width: <?= $percentage ?>%"></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </main>

  <?php include 'includes/footer.php'; ?>
</body>
</html>