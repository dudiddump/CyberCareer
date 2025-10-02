<div class="theme-toggle">
  <button id="toggle-dark"
    class="p-2 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-300 
           hover:scale-110 hover:rotate-180 transition-all duration-500 shadow-md">
    🌙
  </button>
</div>

<script>
  const btn = document.getElementById('toggle-dark');

  // Set awal
  if (localStorage.getItem('theme') === 'dark') {
    document.body.classList.add('dark-mode');
    btn.innerHTML = '☀️';
  } else {
    btn.innerHTML = '🌙';
  }

  // Event toggle
  btn.addEventListener('click', function () {
    btn.classList.add('scale-125'); // efek zoom pas ditekan
    setTimeout(() => btn.classList.remove('scale-125'), 200);

    if (document.body.classList.contains('dark-mode')) {
      document.body.classList.remove('dark-mode');
      localStorage.setItem('theme', 'light');
      btn.innerHTML = '🌙';
    } else {
      document.body.classList.add('dark-mode');
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

  body.dark-mode {
    background-color: #121212;
    color: #fdfdfc;
    transition: background 0.4s, color 0.4s;
  }

  body.dark-mode a {
    color: #e38319;
  }

  body.dark-mode header,
  body.dark-mode footer,
  body.dark-mode .card {
    background-color: #1e1e1e;
    border-color: #2a1473;
  }
</style>
