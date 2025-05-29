<?php
include 'includes/db.php';

$stmt = $pdo->query("SELECT * FROM budget");
$budget = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total = 0;
$spent = 0;
foreach ($budget as $item) {
  $total += $item['total'];
  $spent += $item['spent'];
}

$percentage = $total > 0 ? round(min(100, ($spent / $total) * 100)) : 0;

function getBarColor($percentage) {
  if ($percentage <= 85) return 'bg-[#00a651]';
  if ($percentage < 100) return 'bg-yellow-400';
  return 'bg-red-500';
}

$barColor = getBarColor($percentage);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OV De Spil - Budgetoverzicht</title>
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
    <h1 class="text-3xl font-bold mb-6 text-[#00477e]">Budgetoverzicht</h1>

    <div class="mb-12">
      <div class="flex justify-between text-sm mb-1">
        <span>Totaal besteed budget</span>
        <span><?= $percentage ?>%</span>
      </div>
      <div class="w-full bg-gray-200 h-5 rounded">
        <div id="budget-bar" class="h-5 <?= $barColor ?> rounded bar-fill"></div>
      </div>
      <div class="flex justify-between text-sm mt-2">
        <span>Beschikbaar: €<?= number_format($total - $spent, 2, ',', '.') ?></span>
        <span>Besteed: €<?= number_format($spent, 2, ',', '.') ?></span>
      </div>
    </div>

    <div class="space-y-6">
      <?php foreach ($budget as $index => $item):
        $itemPercentage = $item['total'] > 0 ? round(min(100, ($item['spent'] / $item['total']) * 100)) : 0;
        $itemBarColor = getBarColor($itemPercentage);
      ?>
      <div>
        <div class="mb-1 font-semibold text-sm text-[#00477e] flex justify-between">
          <span><?= htmlspecialchars($item['category']) ?></span>
          <span><?= $itemPercentage ?>%</span>
        </div>
        <div class="w-full bg-gray-200 h-4 rounded">
          <div class="h-4 <?= $itemBarColor ?> rounded bar-fill" id="bar-<?= $index ?>"></div>
        </div>
        <div class="flex justify-between text-sm mt-1">
          <span>Beschikbaar: €<?= number_format($item['total'] - $item['spent'], 2, ',', '.') ?></span>
          <span>Besteed: €<?= number_format($item['spent'], 2, ',', '.') ?></span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </main>
  <?php include 'includes/footer.php'; ?>
  <script>
    window.addEventListener('DOMContentLoaded', () => {
      const totalBar = document.getElementById('budget-bar');
      if (totalBar) {
        setTimeout(() => {
          totalBar.style.width = '<?= $percentage ?>%';
        }, 100);
      }

      <?php foreach ($budget as $index => $item):
        $itemPercentage = $item['total'] > 0 ? round(min(100, ($item['spent'] / $item['total']) * 100)) : 0;
      ?>
      const bar<?= $index ?> = document.getElementById('bar-<?= $index ?>');
      if (bar<?= $index ?>) {
        setTimeout(() => {
          bar<?= $index ?>.style.width = '<?= $itemPercentage ?>%';
        }, 100);
      }
      <?php endforeach; ?>
    });
  </script>
</body>
</html>
