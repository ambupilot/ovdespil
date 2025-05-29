<?php // public/includes/footer.php
?>
<footer class="bg-[#00477e] text-white p-4 text-sm text-center">
  <p>Oudervereniging Basisschool De Spil</p>
  <p><a href="mailto:hallo@ovdespil.nl" class="underline">hallo@ovdespil.nl</a> · www.ovdespil.nl</p>
  <p>Rekeningnummer: NL00BANK0123456789</p>
</footer>

</div> <!-- sluit #page-content -->

<script>
  window.addEventListener('DOMContentLoaded', () => {
    const loader = document.getElementById('loader');
    const content = document.getElementById('page-content');
    if (loader && content) {
      loader.classList.add('hidden');
      content.classList.remove('hidden');
    }
  });
</script>

