<div class="theme-toggle">
  <button id="toggle-dark"
    class="p-2 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-300 
           hover:scale-110 hover:rotate-180 transition-all duration-500 shadow-md">
    🌙
  </button>
</div>

<script>
  const btn = document.getElementById('toggle-dark');
  const html = document.documentElement;

  // Set awal (cek localStorage)
  if (localStorage.getItem('theme') === 'dark') {
    html.classList.add('dark');
    btn.innerHTML = '☀️';
  } else {
    btn.innerHTML = '🌙';
  }

  // Event toggle
  btn.addEventListener('click', function () {
    btn.classList.add('scale-125'); // efek zoom pas ditekan
    setTimeout(() => btn.classList.remove('scale-125'), 200);

    if (html.classList.contains('dark')) {
      html.classList.remove('dark');
      localStorage.setItem('theme', 'light');
      btn.innerHTML = '🌙';
    } else {
      html.classList.add('dark');
      localStorage.setItem('theme', 'dark');
      btn.innerHTML = '☀️';
    }
  });
</script>

<style>
  .theme-toggle {
    position: fixed;
    top: 1rem;
    right: 1rem;
    z-index: 1000;
  }
</style>
