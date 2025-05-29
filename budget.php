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

$percentage = $total > 0 ? round(($spent / $total) * 100) : 0;

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
      transition: width 1.2s ease-in-out;
    }
  </style>
</head>
<body class="flex flex-col min-h-screen font-sans bg-[#f4f4f4] text-gray-800">
  <?php include 'includes/header.php'; ?>
  <main class="p-6 flex-grow max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-[#00477e]">Budgetoverzicht</h1>

    <div class="mb-8">
      <div class="flex justify-between text-sm mb-1">
        <span>Totaal besteed budget</span>
        <span><?= $percentage ?>%</span>
      </div>
      <div class="w-full bg-gray-200 h-5 rounded">
        <div id="budget-bar" class="h-5 <?= $barColor ?> rounded bar-fill" style="width: 0%"></div>
      </div>
      <div class="flex justify-between text-sm mt-2">
        <span>Beschikbaar: €<?= number_format($total - $spent, 2, ',', '.') ?></span>
        <span>Besteed: €<?= number_format($spent, 2, ',', '.') ?></span>
      </div>
    </div>

    <table class="w-full table-auto border border-gray-300 bg-white shadow-sm">
      <thead class="bg-[#e6f0fa]">
        <tr>
          <th class="p-3 border text-left">Categorie</th>
          <th class="p-3 border text-left">Totaalbudget</th>
          <th class="p-3 border text-left">Besteed</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($budget as $item): ?>
          <tr class="hover:bg-gray-100">
            <td class="p-3 border"><?= htmlspecialchars($item['category']) ?></td>
            <td class="p-3 border">€<?= number_format($item['total'], 2, ',', '.') ?></td>
            <td class="p-3 border">€<?= number_format($item['spent'], 2, ',', '.') ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </main>
  <?php include 'includes/footer.php'; ?>
  <script>
    window.addEventListener('DOMContentLoaded', () => {
      const bar = document.getElementById('budget-bar');
      if (bar) {
        bar.style.width = '<?= $percentage ?>%';
      }
    });
  </script>
</body>
</html>
