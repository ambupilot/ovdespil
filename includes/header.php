<?php
// includes/header.php
?>
<header class="bg-[#00477e] text-white shadow p-4 flex items-center justify-between relative">
  <img src="/logo.png" alt="Logo" class="h-12" />

  <!-- Hamburger icon -->
  <button id="menu-toggle" class="md:hidden focus:outline-none">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>
  </button>

  <!-- Nav links -->
  <nav id="mobile-menu" class="absolute right-4 top-16 bg-white text-[#00477e] w-48 rounded shadow-lg hidden md:hidden">
    <ul class="flex flex-col">
      <li><a href="/" class="block px-4 py-2 hover:bg-gray-100">Start</a></li>
      <li><a href="/ouderbijdrage" class="block px-4 py-2 hover:bg-gray-100">Ouderbijdrage</a></li>
      <li><a href="/budget" class="block px-4 py-2 hover:bg-gray-100">Budgetoverzicht</a></li>
    </ul>
  </nav>

  <!-- Desktop nav -->
  <nav class="hidden md:flex space-x-4">
    <a href="/" class="hover:underline">Start</a>
    <a href="/ouderbijdrage" class="hover:underline">Ouderbijdrage</a>
    <a href="/budget" class="hover:underline">Budgetoverzicht</a>
  </nav>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const toggle = document.getElementById('menu-toggle');
      const menu = document.getElementById('mobile-menu');
      toggle.addEventListener('click', () => {
        menu.classList.toggle('hidden');
      });
    });
  </script>
</header>
