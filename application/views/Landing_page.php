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

  <style>
    :root {
      --color-blue: #1D4ED8;
      --color-orange: #F97316;
      --color-blue-light: #93C5FD;
      --color-gold: #FACC15;
    }

    body {
      font-family: 'Poppins', sans-serif;
    }

    .font-grotesk {
      font-family: 'Space Grotesk', sans-serif;
    }

    #progress-bar {
      position: fixed;
      top: 0;
      left: 0;
      height: 5px;
      background: linear-gradient(to right, var(--color-blue), var(--color-orange));
      width: 0%;
      z-index: 100;
    }
  </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-300">

  <div id="progress-bar"></div>
  <?php $this->load->view('partials/switch_theme'); ?>

  <header id="navbar" class="bg-white/90 dark:bg-gray-900/80 backdrop-blur-sm shadow-sm sticky top-0 z-50 transition-all duration-300 h-[72px] flex items-center">
    <div class="container mx-auto px-6 flex justify-between items-center">
      <a href="#" class="text-2xl font-poppins font-bold text-[var(--color-blue)] dark:text-[var(--color-orange)]">CyberCareer</a>
      <div class="flex items-center gap-6">
        <nav class="hidden md:flex gap-6 font-medium text-gray-600 dark:text-gray-300">
          <a href="#why" class="hover:text-[var(--color-blue)] dark:hover:text-[var(--color-orange)]">Tentang</a>
          <a href="#mitra" class="hover:text-[var(--color-orange)] dark:hover:text-[var(--color-blue)]">Mitra</a>
          <a href="#testimoni" class="hover:text-[var(--color-blue)] dark:hover:text-[var(--color-orange)]">Testimoni</a>
        </nav>
        <a href="<?= base_url('auth/login') ?>" class="bg-[var(--color-orange)] dark:bg-[var(--color-blue)] text-white font-semibold px-5 py-2 rounded-lg shadow-md hover:scale-105 hover:shadow-lg transition-all duration-300">
          Masuk
        </a>
      </div>
    </div>
  </header>

  <section class="hero-section relative text-white" style="background-image: url('<?= base_url('assets/Cyber-University.jpg') ?>'); background-size:cover; background-position:center;">
    <div class="absolute inset-0 bg-black/60"></div>
    <div class="container mx-auto px-6 flex flex-col justify-center items-center relative z-10 text-center py-24">
      <img src="<?= base_url('assets/logo-CU.png') ?>" alt="Logo Cyber University" class="mx-auto mb-8 h-28 w-28" data-aos="zoom-in">
      <h1 class="text-4xl md:text-5xl lg:text-6xl font-poppins font-extrabold mb-6 leading-tight" data-aos="fade-up">
        Gerbang Menuju <br> 
        <span class="text-[var(--color-blue)] dark:text-[var(--color-orange)]">Karier Impianmu</span>
      </h1>
      <p class="text-lg max-w-2xl mx-auto px-6 mb-10 text-gray-200" data-aos="fade-up" data-aos-delay="200">
        Platform karier terintegrasi untuk mahasiswa, dosen, dan alumni Cyber University.
      </p>
      <div data-aos="fade-up" data-aos-delay="400">
        <a href="<?= base_url('auth/login') ?>" class="bg-[var(--color-orange)] dark:bg-[var(--color-blue)] text-white font-bold px-10 py-4 rounded-lg hover:scale-105 hover:shadow-xl transition-all duration-300 text-lg shadow-lg">
          Login Mahasiswa / Dosen
        </a>
      </div>
    </div>
  </section>

  <section id="why" class="py-20 bg-white dark:bg-gray-800">
    <div class="container mx-auto px-6">
      <div class="flex flex-col md:flex-row items-center gap-12">
        <div class="md:w-5/12" data-aos="fade-right">
          <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?q=80&w=1887&auto=format&fit=crop" class="rounded-xl shadow-2xl" alt="Kolaborasi Mahasiswa">
        </div>
        <div class="md:w-7/12 text-left" data-aos="fade-left">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
            Apa itu <span class="text-[var(--color-blue)] dark:text-[var(--color-orange)]">CyberCareer?</span>
          </h2>
          <p class="text-gray-600 dark:text-gray-400 mb-6">
            Di Cyber University, kami memiliki <span class="font-bold">Program 3+1 / Company Learning Program (CLP)</span>, di mana mahasiswa semester 6-7 diwajibkan untuk terjun langsung ke dunia industri melalui magang.
          </p>
          <p class="text-gray-600 dark:text-gray-400 mb-8">
            <span class="font-bold">CyberCareer</span> lahir sebagai solusi digital terintegrasi untuk mendukung program ini. Platform ini kami bangun untuk menjembatani mahasiswa dengan dunia profesional sejak dini.
          </p>
          <div class="space-y-4">
            
            <div class="flex items-start gap-4">
              <div class="flex-shrink-0 w-12 h-12 bg-blue-100 dark:bg-gray-900 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-[var(--color-blue)] dark:text-[var(--color-orange)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
              </div>
              <div>
                <h4 class="font-semibold text-lg text-gray-800 dark:text-white">Pencarian Magang Terpusat</h4>
                <p class="text-gray-600 dark:text-gray-400">Mempermudah mahasiswa menemukan lowongan magang dari perusahaan mitra yang sudah terverifikasi.</p>
              </div>
            </div>
            
            <div class="flex items-start gap-4">
              <div class="flex-shrink-0 w-12 h-12 bg-blue-100 dark:bg-gray-900 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-[var(--color-blue)] dark:text-[var(--color-orange)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
              </div>
              <div>
                <h4 class="font-semibold text-lg text-gray-800 dark:text-white">Digitalisasi Logbook & Bimbingan</h4>
                <p class="text-gray-600 dark:text-gray-400">Proses pelaporan aktivitas magang dan bimbingan dengan dosen menjadi lebih efisien, transparan, dan paperless.</p>
              </div>
            </div>
            
            <div class="flex items-start gap-4">
              <div class="flex-shrink-0 w-12 h-12 bg-blue-100 dark:bg-gray-900 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-[var(--color-blue)] dark:text-[var(--color-orange)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
              </div>
              <div>
                <h4 class="font-semibold text-lg text-gray-800 dark:text-white">Jembatan untuk Fresh Graduate</h4>
                <p class="text-gray-600 dark:text-gray-400">Tidak hanya untuk magang, CyberCareer juga menyediakan informasi lowongan pekerjaan untuk para lulusan baru.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="mitra" class="py-20 bg-gradient-to-b from-[var(--color-blue-light)] to-white dark:from-gray-800 dark:to-gray-900">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-3xl md:text-4xl font-bold mb-12 text-gray-900 dark:text-white">Mitra Kami</h2>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center justify-center">
        <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-2xl transition transform hover:scale-105 hover:border-2 hover:border-[var(--color-blue)]">
          <img src="<?= base_url('assets/BRI.svg') ?>" class="mx-auto h-16 object-contain" alt="BRI">
        </div>
        <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-2xl transition transform hover:scale-105 hover:border-2 hover:border-[var(--color-orange)]">
          <img src="<?= base_url('assets/IBM.webp') ?>" class="mx-auto h-16 object-contain" alt="IBM Quantum">
        </div>
        <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-2xl transition transform hover:scale-105 hover:border-2 hover:border-[var(--color-blue)]">
          <img src="<?= base_url('assets/DQS.png') ?>" class="mx-auto h-16 object-contain" alt="DQS">
        </div>
        <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-2xl transition transform hover:scale-105 hover:border-2 hover:border-[var(--color-orange)]">
          <img src="<?= base_url('assets/Fintech_Indonesia.webp') ?>" class="mx-auto h-16 object-contain" alt="Fintech Indonesia">
        </div>
        <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-2xl transition transform hover:scale-105 hover:border-2 hover:border-[var(--color-blue)]">
          <img src="<?= base_url('assets/Meta4sec.png') ?>" class="mx-auto h-16 object-contain" alt="META 4 SEC">
        </div>
        <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-2xl transition transform hover:scale-105 hover:border-2 hover:border-[var(--color-orange)]">
          <img src="<?= base_url('assets/Allobank.png') ?>" class="mx-auto h-16 object-contain" alt="Allo Bank">
        </div>
        <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-2xl transition transform hover:scale-105 hover:border-2 hover:border-[var(--color-blue)]">
          <img src="<?= base_url('assets/BSSN.png') ?>" class="mx-auto h-16 object-contain" alt="BSSN">
        </div>
      </div>
      <h3 class="text-lg font-semibold text-[var(--color-blue)] dark:text-[var(--color-orange)] mt-10">
        Dan masih banyak lagi 🚀
      </h3>
    </div>
  </section>

  <section id="testimoni" class="py-20 bg-gray-50 dark:bg-gray-800">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-12">Apa Kata Alumni?</h2>
      <div class="flex gap-6 overflow-x-auto snap-x snap-mandatory pb-4">
        <div class="min-w-[250px] max-w-sm bg-white dark:bg-gray-900 rounded-2xl shadow-lg p-6 snap-center" data-aos="fade-up">
          <p class="text-gray-700 dark:text-gray-300 mb-4">“CyberCareer bikin jalur karier lebih jelas setelah lulus. Fitur alumni trackernya sangat membantu!”</p>
          <span class="text-sm font-semibold text-[var(--color-blue)] dark:text-[var(--color-orange)]">Andi, Alumni 2023</span>
        </div>
        <div class="min-w-[250px] max-w-sm bg-white dark:bg-gray-900 rounded-2xl shadow-lg p-6 snap-center" data-aos="fade-up" data-aos-delay="200">
          <p class="text-gray-700 dark:text-gray-300 mb-4">“Proses bimbingan jadi lebih cepat & efisien. Semua terdokumentasi digital.”</p>
          <span class="text-sm font-semibold text-[var(--color-orange)] dark:text-[var(--color-blue)]">Siti, Alumni 2024</span>
        </div>
        <div class="min-w-[250px] max-w-sm bg-white dark:bg-gray-900 rounded-2xl shadow-lg p-6 snap-center" data-aos="fade-up" data-aos-delay="400">
          <p class="text-gray-700 dark:text-gray-300 mb-4">“Integrasi logbook & feedback dosen memudahkan monitoring karier.”</p>
          <span class="text-sm font-semibold text-[var(--color-gold)]">Budi, Alumni 2022</span>
        </div>
      </div>
    </div>
  </section>

  <footer class="bg-gray-900 text-white">
    <div class="container mx-auto px-6 py-10 text-center space-y-2">
      <p class="font-semibold text-lg">CyberCareer - Cyber University</p>
      <p class="text-gray-400 text-sm">&copy; 2025 Cyber University. All rights reserved.</p>
      <p class="text-gray-400 text-sm">Dikembangkan oleh <b>Talitha Khansa</b></p>
    </div>
  </footer>

  <button id="scrollTop" class="hidden fixed bottom-6 right-6 bg-[var(--color-blue)] dark:bg-[var(--color-orange)] text-white p-3 rounded-full shadow-lg hover:scale-110 transition-transform">
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
