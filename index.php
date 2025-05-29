<?php
include 'includes/db.php';

$stmt = $pdo->query("SELECT * FROM contributions");
$contributions = $stmt->fetchAll(PDO::FETCH_ASSOC);

function getContributionColor($percentage) {
  return $percentage <= 75 ? 'bg-yellow-400' : 'bg-[#00a651]';
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>OV De Spil - Ouderbijdrage Overzicht</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .bar-fill {
      width: 0%;
      transition: width 1.2s ease-in-out;
    }
  </style>
</head>
<body class="flex flex-col min-h-screen font-sans bg-[#f4f4f4] text-gray-800">
  <?php include 'includes/header.php'; ?>

  <main class="p-6 flex-grow max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-[#00477e]">Overzicht Ouderbijdrage</h1>

    <div class="space-y-6">
      <?php foreach ($contributions as $index => $item):
        $percentage = $item['total'] > 0 ? round(min(100, ($item['current'] / $item['total']) * 100)) : 0;
        $barColor = getContributionColor($percentage);
      ?>
      <div>
        <div class="flex justify-between text-sm mb-1 font-semibold">
          <span><?= htmlspecialchars($item['name']) ?></span>
          <span><?= $percentage ?>%</span>
        </div>
        <div class="w-full bg-gray-200 h-4 rounded">
          <div id="bar-<?= $index ?>" class="h-4 <?= $barColor ?> rounded bar-fill"></div>
        </div>
        <div class="flex justify-between text-sm mt-1">
          <span>€<?= number_format($item['current'], 2, ',', '.') ?></span>
          <span>/ €<?= number_format($item['total'], 2, ',', '.') ?></span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </main>

  <?php include 'includes/footer.php'; ?>

  <script>
    window.addEventListener('DOMContentLoaded', () => {
      <?php foreach ($contributions as $index => $item):
        $percentage = $item['total'] > 0 ? round(min(100, ($item['current'] / $item['total']) * 100)) : 0;
      ?>
      const bar<?= $index ?> = document.getElementById('bar-<?= $index ?>');
      if (bar<?= $index ?>) {
        setTimeout(() => {
          bar<?= $index ?>.style.width = '<?= $percentage ?>%';
        }, 100);
      }
      <?php endforeach; ?>
    });
  </script>
</body>
</html>
