<?php 
//$budget = include 'data/budget.php'; 
include 'includes/db.php';

$stmt = $pdo->query("SELECT * FROM budget");
$budget = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OV De Spil - Budgetoverzicht</title>
<script src="https://cdn.tailwindcss.com"></script></head>
</head>
<body class="flex flex-col min-h-screen font-sans bg-[#f4f4f4] text-gray-800">
  <?php include 'includes/header.php'; ?>
  <main class="p-6 flex-grow max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-[#00477e]">Budgetoverzicht</h1>
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
            <td class="p-3 border"><?= $item['category'] ?></td>
            <td class="p-3 border">€<?= $item['total'] ?></td>
            <td class="p-3 border">€<?= $item['spent'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </main>
  <?php include 'includes/footer.php'; ?>
</body>
</html>