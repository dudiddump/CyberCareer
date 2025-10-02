<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CyberCareer - Gerbang Karier Masa Depan Anda</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>

<body class="bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-300">

  <div id="progress-bar"></div>
  <?php $this->load->view('partials/switch_theme'); ?>
  
  <!-- NAVBAR -->
  <header id="navbar" class="bg-white/90 dark:bg-gray-900/80 backdrop-blur-sm shadow-sm sticky top-0 z-50 transition-all duration-300 h-[72px] flex items-center">
    <div class="container mx-auto px-6 flex justify-between items-center">
      <a href="#" class="text-2xl font-poppins font-bold text-[var(--color-blue)]">CyberCareer</a>
      <div class="flex items-center gap-6">
        <nav class="hidden md:flex gap-6 font-medium text-gray-600 dark:text-gray-300">
          <a href="#why" class="hover:text-[var(--color-blue)]">Tentang</a>
          <a href="#mitra" class="hover:text-[var(--color-orange)]">Mitra</a>
          <a href="#testimoni" class="hover:text-[var(--color-blue)]">Testimoni</a>
        </nav>
        <button id="toggle-dark" class="p-2 rounded-full text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-800 hover:rotate-180 transition-transform duration-500">
          🌙
        </button>
        <a href="<?= base_url('auth/login') ?>" class="bg-[var(--color-orange)] text-white font-semibold px-5 py-2 rounded-lg shadow-md hover:scale-105 hover:shadow-lg transition-all duration-300">
          Masuk
        </a>
      </div>
    </div>
  </header>

  <!-- HERO -->
  <section class="hero-section relative text-white" style="background-image: url('<?= base_url('assets/Cyber-University.jpg') ?>');">
    <div class="absolute inset-0 bg-black/60"></div>
    <div class="container mx-auto px-6 flex flex-col justify-center items-center relative z-10 text-center">
      <img src="<?= base_url('assets/logo-CU.png') ?>" alt="Logo Cyber University" class="mx-auto mb-8 h-28 w-28" data-aos="zoom-in">
      <h1 class="text-4xl md:text-5xl lg:text-6xl font-poppins font-extrabold mb-6 leading-tight" data-aos="fade-up">
        Gerbang Menuju <br> <span class="text-[var(--color-blue)]">Karier Impianmu</span>
      </h1>
      <p class="text-lg max-w-2xl mx-auto px-6 mb-10 text-gray-200" data-aos="fade-up" data-aos-delay="200">
        Platform karier terintegrasi untuk mahasiswa, dosen, dan alumni Cyber University.
      </p>
      <div data-aos="fade-up" data-aos-delay="400">
        <a href="<?= base_url('auth/login') ?>" class="bg-[var(--color-orange)] text-white font-bold px-10 py-4 rounded-lg hover:scale-105 hover:shadow-xl transition-all duration-300 text-lg shadow-lg">
          Login Mahasiswa / Dosen
        </a>
      </div>
    </div>
  </section>

  <!-- WHY -->
  <section id="why" class="py-20 bg-[var(--color-gray-light)] dark:bg-gray-800">
  <div class="container mx-auto px-6 text-center">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-12">
      Kenapa <span class="text-[var(--color-orange)]">CyberCareer</span> Dibuat?
    </h2>
    <div class="grid md:grid-cols-3 gap-8">
      <div class="p-6 bg-white dark:bg-gray-900 rounded-2xl shadow-lg hover:-translate-y-2 transition-transform">
        <h3 class="text-xl font-semibold text-[var(--color-blue)] mb-3">Transparansi</h3>
        <p class="text-gray-600 dark:text-gray-400">Laporan digital bisa dipantau dosen & mahasiswa secara real-time.</p>
      </div>
        <div class="p-6 bg-white dark:bg-gray-900 rounded-2xl shadow-lg hover:-translate-y-2 transition-transform" data-aos="flip-up" data-aos-delay="200">
          <h3 class="text-xl font-semibold text-[var(--color-orange)] mb-3">Efisiensi</h3>
          <p class="text-gray-600 dark:text-gray-400">Bimbingan tanpa ribet, cukup lewat dashboard online.</p>
        </div>
        <div class="p-6 bg-white dark:bg-gray-900 rounded-2xl shadow-lg hover:-translate-y-2 transition-transform" data-aos="flip-right" data-aos-delay="400">
          <h3 class="text-xl font-semibold text-[var(--color-blue)] mb-3">Koneksi Karier</h3>
          <p class="text-gray-600 dark:text-gray-400">Jelajahi rekam jejak alumni & dapatkan inspirasi karier.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- MITRA -->
  <section id="mitra" class="py-20 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-3xl md:text-4xl font-bold mb-12 text-gray-900 dark:text-white">Mitra Kami</h2>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center justify-center">
        <img src="https://placehold.co/150x80?text=Logo+1" class="mx-auto grayscale hover:grayscale-0 transition" alt="Mitra 1">
        <img src="https://placehold.co/150x80?text=Logo+2" class="mx-auto grayscale hover:grayscale-0 transition" alt="Mitra 2">
        <img src="https://placehold.co/150x80?text=Logo+3" class="mx-auto grayscale hover:grayscale-0 transition" alt="Mitra 3">
        <img src="https://placehold.co/150x80?text=Logo+4" class="mx-auto grayscale hover:grayscale-0 transition" alt="Mitra 4">
      </div>
    </div>
  </section>

  <!-- TESTIMONIALS -->
  <section id="testimoni" class="py-20 bg-gray-50 dark:bg-gray-800">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-12">Apa Kata Alumni?</h2>
      <div class="flex gap-6 overflow-x-auto snap-x snap-mandatory pb-4">
        <div class="min-w-[250px] max-w-sm bg-white dark:bg-gray-900 rounded-2xl shadow-lg p-6 snap-center" data-aos="fade-up">
          <p class="text-gray-700 dark:text-gray-300 mb-4">“CyberCareer bikin jalur karier lebih jelas setelah lulus. Fitur alumni trackernya sangat membantu!”</p>
          <span class="text-sm font-semibold text-[var(--color-blue)]">Andi, Alumni 2023</span>
        </div>
        <div class="min-w-[250px] max-w-sm bg-white dark:bg-gray-900 rounded-2xl shadow-lg p-6 snap-center" data-aos="fade-up" data-aos-delay="200">
          <p class="text-gray-700 dark:text-gray-300 mb-4">“Proses bimbingan jadi lebih cepat & efisien. Semua terdokumentasi digital.”</p>
          <span class="text-sm font-semibold text-[var(--color-orange)]">Siti, Alumni 2024</span>
        </div>
        <div class="min-w-[250px] max-w-sm bg-white dark:bg-gray-900 rounded-2xl shadow-lg p-6 snap-center" data-aos="fade-up" data-aos-delay="400">
          <p class="text-gray-700 dark:text-gray-300 mb-4">“Integrasi logbook & feedback dosen memudahkan monitoring karier.”</p>
          <span class="text-sm font-semibold text-[var(--color-gold)]">Budi, Alumni 2022</span>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="bg-gray-900 text-white mt-20">
    <div class="container mx-auto px-6 py-10 text-center space-y-4">
      <p class="font-semibold text-lg">CyberCareer - Cyber University</p>
      <p class="text-gray-400 text-sm">&copy; 2025 Cyber University. All rights reserved.</p>
      <p class="text-gray-400 text-sm">Dikembangkan oleh <b>Talitha Khansa</b></p>
    </div>
  </footer>

  <!-- SCROLL BTN -->
  <button id="scrollTop" class="hidden fixed bottom-6 right-6 bg-[var(--color-blue)] text-white p-3 rounded-full shadow-lg hover:scale-110 transition-transform">
    ⬆
  </button>

  <script>
    AOS.init({ duration: 800, once: true, offset: 50 });

    const progressBar = document.getElementById('progress-bar');
    window.addEventListener('scroll', () => {
      const progress = (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;
      progressBar.style.width = `${progress}%`;
    });

    const scrollBtn = document.getElementById('scrollTop');
    window.addEventListener('scroll', () => {
      scrollBtn.classList.toggle('hidden', window.scrollY <= 400);
    });
    scrollBtn.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  </script>
</body>
</html>
