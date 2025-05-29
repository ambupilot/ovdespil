<?php 
// public/includes/header.php
?>
<div id="loader" class="text-center my-10 text-[#00477e]">Laden...</div>
<div id="page-content" class="hidden">


<script>
  window.addEventListener('DOMContentLoaded', () => {
    document.getElementById('loader').classList.add('hidden');
    document.getElementById('content').classList.remove('hidden');
  });
</script>


<header class="bg-[#00477e] text-white shadow p-4 flex items-center justify-between">
  <img src="../logo_de_spil.jpeg" alt="Logo" class="h-12" />
  <nav class="space-x-4">
    <a href="/" class="hover:underline">Start</a>
    <a href="/ouderbijdrage" class="hover:underline">Ouderbijdrage</a>
    <a href="/budget" class="hover:underline">Budgetoverzicht</a>
  </nav>
</header>
<?php