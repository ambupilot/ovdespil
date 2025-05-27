<?php // public/budget.php ?>
<?php $budget = include 'data/budget.php'; ?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OV De Spil - Budgetoverzicht</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex flex-col min-h-screen font-sans bg-[#f4f4f4] text-gray-800">
  <header class="bg-[#00477e] text-white shadow p-4 flex items-center justify-between">
    <img src="logo.png" alt="Logo" class="h-12" />
    <nav class="space-x-4">
      <a href="/ouderbijdrage" class="hover:underline">Ouderbijdrage</a>
      <a href="/budget" class="hover:underline">Budgetoverzicht</a>
    </nav>
  </header>

  <main class="p-6 flex-grow max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-[#00477e]">Budgetoverzicht</h1>
    <table class="w-full table-auto border border-gray-300 bg-white shadow-sm">
      <thead class="bg-[#e6f0fa]">
        <tr>
          <th class="p-3 border text-left">Categorie</th>
          <th class="p-3 border text-left">Bedrag</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($budget as $item): ?>
          <tr class="hover:bg-gray-100">
            <td class="p-3 border"><?= $item['category'] ?></td>
            <td class="p-3 border">€<?= $item['amount'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </main>

  <footer class="bg-[#00477e] text-white p-4 text-sm text-center">
    <p>Oudervereniging Basisschool De Spil</p>
    <p><a href="mailto:hallo@ovdespil.nl" class="underline">hallo@ovdespil.nl</a> · www.ovdespil.nl</p>
    <p>Rekeningnummer: NL00BANK0123456789</p>
  </footer>
</body>
</html>
