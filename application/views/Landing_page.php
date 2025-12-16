<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?? 'CyberCareer - Platform Karier Digital' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;500;700;900&family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <style>
        :root {
            --primary: #2563eb;
            --accent: #f97316;
            --dark-bg: #0f172a;
            --light-bg: #f8fafc;
        }

        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--light-bg); overflow-x: hidden; transition: 0.3s; }
        h1, h2, h3, .brand-font { font-family: 'Outfit', sans-serif; }

        /* Navbar */
        .navbar-glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255,255,255,0.3);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
            transition: 0.3s;
        }

        /* Hero */
        .hero-section {
            background: radial-gradient(circle at 10% 20%, rgb(239, 246, 255) 0%, rgb(255, 255, 255) 90%);
            min-height: 100vh; position: relative; overflow: hidden; transition: 0.3s;
        }
        .hero-blob {
            position: absolute; width: 600px; height: 600px;
            background: linear-gradient(180deg, rgba(37,99,235,0.15) 0%, rgba(249,115,22,0.15) 100%);
            filter: blur(80px); border-radius: 50%; z-index: 0;
            animation: float 10s infinite ease-in-out;
        }
        @keyframes float {
            0% { transform: translate(0, 0); }
            50% { transform: translate(20px, 40px); }
            100% { transform: translate(0, 0); }
        }

        /* Cards */
        .feature-card {
            background: white; border: 1px solid #e2e8f0; border-radius: 24px;
            padding: 2.5rem; transition: 0.4s;
        }
        .feature-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px -15px rgba(37,99,235,0.1); border-color: var(--primary); }
        
        .icon-box {
            width: 70px; height: 70px; border-radius: 20px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.8rem; margin-bottom: 1.5rem; transition: 0.3s;
        }
        .feature-card:hover .icon-box { transform: scale(1.1) rotate(5deg); }

        /* Mitra Grid */
        .mitra-wrapper {
            display: grid; grid-template-columns: repeat(auto-fill, minmax(130px, 1fr)); gap: 1.5rem;
        }
        .mitra-item {
            background: white; border-radius: 16px; padding: 1rem;
            display: flex; align-items: center; justify-content: center;
            aspect-ratio: 3/2; border: 1px solid #f1f5f9;
            transition: 0.3s; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
        .mitra-item:hover { transform: translateY(-5px); border-color: var(--accent); box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); }
        .mitra-item img { max-width: 80%; max-height: 60%; filter: grayscale(100%); opacity: 0.5; transition: 0.3s; }
        .mitra-item:hover img { filter: grayscale(0%); opacity: 1; }

        .text-gradient {
            background: linear-gradient(to right, #2563eb, #f97316);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: 800;
        }

        /* --- DARK MODE --- */
        body.dark { background: var(--dark-bg); color: #cbd5e1; }
        body.dark .navbar-glass { background: rgba(15, 23, 42, 0.85); border-color: rgba(255,255,255,0.05); }
        body.dark .hero-section { background: radial-gradient(circle at 50% 50%, #1e293b 0%, #0f172a 100%); }
        body.dark .feature-card, body.dark .mitra-item { background: #1e293b; border-color: #334155; }
        body.dark .bg-light { background: #0f172a !important; }
        body.dark h1, body.dark h2, body.dark h3, body.dark h4, body.dark .text-dark { color: #fff !important; }
        body.dark .text-muted { color: #94a3b8 !important; }
        
        /* Nav Link Color in Dark Mode */
        body.dark .nav-link { color: #e2e8f0; }
        body.dark .nav-link:hover { color: var(--primary); }
    </style>
</head>

<body class="<?= ($this->session->userdata('theme') == 'dark') ? 'dark' : '' ?>">

    <nav class="navbar navbar-expand-lg navbar-glass fixed-top py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <img src="<?= base_url('assets/logo-CU.png') ?>" width="40" alt="Logo" class="d-inline-block align-text-top">
                <span class="brand-font fw-bold fs-4 text-primary">CyberCareer</span>
            </a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="bi bi-list fs-2 text-primary"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-lg-4 align-items-center mt-3 mt-lg-0">
                    <li class="nav-item"><a class="nav-link fw-medium" href="#features">Fitur</a></li>
                    <li class="nav-item"><a class="nav-link fw-medium" href="#mitra">Mitra</a></li>
                                        
                    <li class="nav-item">
                        <button class="btn nav-link fs-5 py-0" id="theme-toggle" title="Ganti Tema">
                            <i class="bi bi-moon-stars-fill" id="theme-icon"></i>
                        </button>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <a href="<?= base_url('auth/login') ?>" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm w-100">
                            Masuk Portal <i class="bi bi-box-arrow-in-right ms-1"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section d-flex align-items-center pt-5">
        <div class="hero-blob" style="top: -10%; right: -10%;"></div>
        <div class="hero-blob" style="bottom: -10%; left: -10%; background: rgba(249,115,22,0.1); width: 500px; height: 500px;"></div>

        <div class="container position-relative z-1 mt-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right">
                    <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill bg-white border shadow-sm mb-4">
                        <span class="badge bg-primary rounded-pill">Baru</span>
                        <span class="small fw-semibold text-secondary">Sistem Logbook Digital v2.0</span>
                    </div>
                    
                    <h1 class="display-3 fw-black mb-4 lh-tight">
                        Karier Masa Depan <br>
                        Dimulai dari <span class="text-gradient" id="typed-text"></span>
                    </h1>
                    
                    <p class="lead text-muted mb-5" style="max-width: 550px;">
                        Platform resmi Cyber University untuk menghubungkan mahasiswa dengan dunia industri. Magang, kerja praktik, dan karier impian dalam satu pintu.
                    </p>
                    
                    <div class="d-flex gap-3 flex-column flex-sm-row">
                        <a href="<?= base_url('auth/login') ?>" class="btn btn-primary btn-lg rounded-pill px-5 py-3 shadow-lg fw-bold transition-all">
                            Mulai Sekarang
                        </a>
                    </div>

                    <div class="row mt-5 pt-4 border-top g-4">
                        <div class="col-4">
                            <h3 class="fw-bold mb-0 text-dark">15+</h3>
                            <small class="text-muted">Mitra Perusahaan</small>
                        </div>
                        <div class="col-4 border-start">
                            <h3 class="fw-bold mb-0 text-dark">500+</h3>
                            <small class="text-muted">Mahasiswa Aktif</small>
                        </div>
                        <div class="col-4 border-start">
                            <h3 class="fw-bold mb-0 text-dark">100%</h3>
                            <small class="text-muted">Digital Process</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 order-1 order-lg-2 text-center position-relative" data-aos="fade-left">
                    <div class="position-relative z-2">
                        <img src="https://cdni.iconscout.com/illustration/premium/thumb/job-search-illustration-download-in-svg-png-gif-file-formats--online-hiring-recruitment-finding-employee-business-pack-illustrations-3428328.png" 
                             class="img-fluid" alt="Hero Illustration" style="filter: drop-shadow(0 20px 40px rgba(37, 99, 235, 0.15));">
                        
                        <div class="card position-absolute top-50 start-0 translate-middle-y p-3 shadow-lg border-0 rounded-4" 
                             style="width: 220px; z-index: 3; animation: float 6s infinite ease-in-out;">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-success bg-opacity-10 p-2 rounded-circle text-success fs-4">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div class="text-start">
                                    <small class="d-block text-muted" style="font-size: 11px;">Status Lamaran</small>
                                    <span class="fw-bold text-dark fs-6">Diterima Magang! 🎉</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="py-5">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="text-accent fw-bold text-uppercase letter-spacing-2 small">Fitur Utama</span>
                <h2 class="fw-bold display-6 mt-2 text-dark">Mendukung Program 3+1</h2>
                <p class="text-muted">Platform yang dirancang khusus untuk memfasilitasi 1 tahun magang industri.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card h-100">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary">
                            <i class="bi bi-search"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Pencarian Magang</h4>
                        <p class="text-muted mb-0">Temukan lowongan magang yang valid dari mitra resmi kampus. Filter berdasarkan posisi dan perusahaan impianmu.</p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card h-100">
                        <div class="icon-box bg-success bg-opacity-10 text-success">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Riwayat Magang</h4>
                        <p class="text-muted mb-0">Rekam jejak karier tersimpan rapi. Data pengalaman magang semester 6 & 7 tercatat otomatis sebagai portofolio.</p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card h-100">
                        <div class="icon-box bg-warning bg-opacity-10 text-warning">
                            <i class="bi bi-journal-text"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Logbook Digital</h4>
                        <p class="text-muted mb-0">Isi laporan kegiatan harian secara online. Memudahkan dosen pembimbing memantau aktivitas & konversi nilai SKS.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="mitra" class="py-5 bg-light">
        <div class="container py-5">
            <div class="d-flex justify-content-between align-items-end mb-5">
                <div>
                    <h2 class="fw-bold mb-2 text-dark">Mitra Industri</h2>
                    <p class="text-muted mb-0">Bekerja sama dengan perusahaan teknologi top Indonesia.</p>
                </div>
                <a href="#" class="btn btn-outline-primary rounded-pill px-4 fw-bold">Gabung Mitra</a>
            </div>

            <div class="mitra-wrapper">
                <?php 
                $logos = ['BRI.svg','IBM.webp','Allobank.png','Traveloka.webp','Gojek.png','Shopee.png','Tokopedia.png','Telkom.jpg', 'BCA.png', 'BSSN.png'];
                foreach($logos as $logo): ?>
                <div class="mitra-item" data-aos="zoom-in">
                    <img src="<?= base_url('assets/img/'.$logo) ?>" alt="Mitra" onerror="this.src='https://via.placeholder.com/150?text=LOGO'">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white pt-5 pb-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-5">
                    <h4 class="brand-font fw-bold text-primary mb-3">CyberCareer</h4>
                    <p class="text-white-50">Menjembatani dunia akademik dan industri untuk masa depan talenta digital Indonesia.</p>
                </div>
                <div class="col-md-2 ms-auto">
                    <h6 class="fw-bold mb-3 text-white">Menu</h6>
                    <ul class="list-unstyled text-white-50 d-flex flex-column gap-2">
                        <li><a href="#" class="text-reset text-decoration-none">Beranda</a></li>
                        <li><a href="#features" class="text-reset text-decoration-none">Fitur</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6 class="fw-bold mb-3 text-white">Kontak</h6>
                    <ul class="list-unstyled text-white-50 d-flex flex-column gap-2">
                        <li><i class="bi bi-envelope me-2"></i> career@cyber-univ.ac.id</li>
                        <li><i class="bi bi-geo-alt me-2"></i> Jl. TB Simatupang No. 6</li>
                    </ul>
                </div>
            </div>
            <hr class="border-secondary my-4 opacity-25">
            <div class="text-center text-white-50 small">
                &copy; 2025 Cyber University. Developed by <b>Talitha Khansa</b>.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    
    <script>
        AOS.init({ duration: 800, once: true });

        new Typed('#typed-text', {
            strings: ['Sini.', 'Magang.', 'Kerja.', 'Sukses.'],
            typeSpeed: 60,
            backSpeed: 40,
            backDelay: 2000,
            loop: true
        });
        
        // --- LOGIKA DARK MODE ---
        const toggleBtn = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');
        const body = document.body;

        // 1. Cek LocalStorage saat halaman dimuat
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            body.classList.add('dark');
            themeIcon.classList.replace('bi-moon-stars-fill', 'bi-sun-fill');
        }

        // 2. Event Listener Tombol
        toggleBtn.addEventListener('click', () => {
            body.classList.toggle('dark');
            
            if (body.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
                themeIcon.classList.replace('bi-moon-stars-fill', 'bi-sun-fill');
            } else {
                localStorage.setItem('theme', 'light');
                themeIcon.classList.replace('bi-sun-fill', 'bi-moon-stars-fill');
            }
        });
    </script>
</body>
</html>