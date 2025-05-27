document.addEventListener("DOMContentLoaded", async () => {
  const barsContainer = document.getElementById("contribution-bars");
  if (!barsContainer) return;

  const response = await fetch("data/contributions.php");
  const text = await response.text();
  const data = eval(text); // Let op: alleen gebruiken in trusted omgevingen

  data.forEach(({ name, total, current }) => {
    const percentage = Math.min(100, (current / total) * 100);
    const bar = document.createElement("div");
    bar.innerHTML = `
      <div class="flex justify-between text-sm mb-1">
        <span>${name}</span>
        <span>€${current} / €${total}</span>
      </div>
      <div class="w-full bg-gray-200 h-4 rounded">
        <div class="h-4 bg-[#00a651] rounded" style="width: ${percentage}%"></div>
      </div>
    `;
    barsContainer.appendChild(bar);
  });
});