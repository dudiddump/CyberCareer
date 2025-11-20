<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard - CyberCareer' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        /* =========================================
           1. VARIABLE WARNA (BIRU & ORANYE)
           ========================================= */
        :root {
            --color-blue: #1d4ed8;       /* Biru Utama */
            --color-orange: #f97316;     /* Oranye Aksen */
            --color-navy-bg: #0a1a2f;    /* Background Dark Mode (Gelap Banget) */
            --color-navy-card: #112240;  /* Card Dark Mode (Agak Terang dikit) */
            --sidebar-width: 260px;
            --sidebar-collapsed: 80px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f4f6f9; /* Abu-abu soft untuk Light Mode */
            overflow: hidden;
            height: 100vh;
            transition: background-color 0.3s ease;
        }

        #wrapper { display: flex; height: 100vh; width: 100%; overflow: hidden; }

        /* =========================================
           2. SIDEBAR (Collapsible)
           ========================================= */
        .sidebar-wrapper {
            width: var(--sidebar-width);
            flex-shrink: 0;
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e0e0e0;
            display: flex;
            flex-direction: column;
            z-index: 1050;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        /* Logika Mengecil (Collapsed) */
        body.desktop-collapsed .sidebar-wrapper { width: var(--sidebar-collapsed); }
        body.desktop-collapsed .sidebar-brand-text, 
        body.desktop-collapsed .sidebar-text,
        body.desktop-collapsed .btn-text { display: none; }
        body.desktop-collapsed .nav-link { justify-content: center; }
        body.desktop-collapsed .nav-link i { margin-right: 0; font-size: 1.4rem; }
        body.desktop-collapsed .sidebar-footer { padding: 10px; }
        body.desktop-collapsed .btn-theme-toggle { justify-content: center; padding: 10px; }

        /* Style Menu Link */
        .nav-link {
            color: #64748b;
            font-weight: 500;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 5px;
            display: flex; align-items: center;
            transition: all 0.2s;
        }
        .nav-link i {
            color: var(--color-orange); /* Ikon Oranye Tetap */
            font-size: 1.1rem;
            margin-right: 12px;
            min-width: 24px;
        }
        .nav-link:hover {
            background-color: #eff6ff; /* Hover Biru Muda */
            color: var(--color-blue);
        }
        .nav-link.active {
            background-color: var(--color-blue);
            color: #fff;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(29, 78, 216, 0.3);
        }
        .nav-link.active i { color: #fff; }

        .sidebar-footer { margin-top: auto; padding: 20px; border-top: 1px solid #e0e0e0; }

        /* =========================================
           3. KONTEN UTAMA
           ========================================= */
        .main-content {
            flex-grow: 1;
            height: 100vh;
            overflow-y: auto;
            padding: 30px;
            padding-bottom: 100px;
        }

        /* =========================================
           4. DARK MODE (ANTI-NGEJRENG) 🌙
           ========================================= */
        body.dark {
            background-color: var(--color-navy-bg); /* Background Gelap */
            color: #e2e8f0; /* Teks jadi Putih Gading (Gak putih banget biar mata ga sakit) */
        }

        /* Sidebar Dark */
        body.dark .sidebar-wrapper {
            background-color: var(--color-navy-card);
            border-right: 1px solid #233554;
        }

        /* --- INI KUNCINYA: CARD JADI GELAP --- */
        body.dark .card, 
        body.dark .bg-white {
            background-color: var(--color-navy-card) !important; /* Card jadi Navy */
            color: #e2e8f0;
            border-color: #233554;
            box-shadow: none !important; /* Shadow hilang di dark mode biar flat */
        }

        /* Text Adjustments di Dark Mode */
        body.dark .text-dark { color: #f8fafc !important; }
        body.dark .text-muted { color: #94a3b8 !important; }
        body.dark .text-secondary { color: #94a3b8 !important; }
        
        /* Table Dark */
        body.dark .table { color: #e2e8f0; border-color: #233554; }
        body.dark .table thead th {
            background-color: #0f172a; /* Header tabel lebih gelap dikit */
            color: var(--color-orange);
            border-color: #233554;
        }
        body.dark .table-hover tbody tr:hover { background-color: #1e293b; }
        
        /* Form Input Dark (Supaya kotak input ga putih) */
        body.dark .form-control, 
        body.dark .form-select {
            background-color: var(--color-navy-bg);
            border: 1px solid #233554;
            color: #fff;
        }
        body.dark .form-control:focus { border-color: var(--color-orange); }

        /* Sidebar Elements Dark */
        body.dark .sidebar-footer { border-top: 1px solid #233554; }
        body.dark .btn-theme-toggle {
            background-color: #0f172a;
            border-color: #233554;
            color: #e2e8f0;
        }
        body.dark .btn-theme-toggle:hover { border-color: var(--color-orange); }
        
        /* Link Alert Fix */
        body.dark .alert-warning a { color: #3f3000 !important; }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar-wrapper { position: fixed; left: -100%; top: 0; width: 260px; }
            body.mobile-show .sidebar-wrapper { left: 0; }
            .mobile-overlay {
                display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
                background: rgba(0,0,0,0.5); z-index: 1040;
            }
            body.mobile-show .mobile-overlay { display: block; }
        }
    </style>
</head>

<body class="<?= ($this->session->userdata('theme') == 'dark') ? 'dark' : '' ?>">

<div id="wrapper">

    <div class="mobile-overlay" id="mobileOverlay"></div>

    <div class="sidebar-wrapper shadow-sm">
        <div class="px-4 py-4 sidebar-header d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="<?= base_url('assets/logo-CU.png') ?>" alt="Logo" height="35">
                <div class="ms-2 sidebar-brand-text">
                    <h5 class="fw-bold mb-0" style="font-size: 1.1rem;">
                        <span class="text-primary">Cyber</span><span style="color: var(--color-orange);">Career</span>
                    </h5>
                </div>
            </div>
            <button id="desktopToggle" class="btn btn-sm btn-light border-0 text-secondary rounded-circle d-none d-md-block">
                <i class="bi bi-list fs-5"></i>
            </button>
            <button id="mobileClose" class="btn btn-sm btn-light border-0 text-secondary rounded-circle d-md-none">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        
        <div class="nav flex-column px-3 mt-2">
            <a href="<?= base_url('mahasiswa/dashboard') ?>" class="nav-link <?= ($this->uri->segment(2) == 'dashboard') ? 'active' : '' ?>" title="Dashboard">
                <i class="bi bi-grid-fill"></i> <span class="sidebar-text">Dashboard</span>
            </a>
            <a href="<?= base_url('mahasiswa/mitra') ?>" class="nav-link <?= ($this->uri->segment(2) == 'mitra') ? 'active' : '' ?>" title="Daftar Mitra">
                <i class="bi bi-buildings"></i> <span class="sidebar-text">Daftar Mitra</span>
            </a>
            <a href="<?= base_url('mahasiswa/riwayat') ?>" class="nav-link <?= ($this->uri->segment(2) == 'riwayat') ? 'active' : '' ?>" title="Riwayat Karier">
                <i class="bi bi-clock-history"></i> <span class="sidebar-text">Riwayat Karier</span>
            </a>
            <a href="<?= base_url('mahasiswa/logbook') ?>" class="nav-link <?= ($this->uri->segment(2) == 'logbook') ? 'active' : '' ?>" title="Logbook">
                <i class="bi bi-journal-bookmark-fill"></i> <span class="sidebar-text">Logbook</span>
            </a>
            <a href="<?= base_url('user/profil') ?>" class="nav-link <?= ($this->uri->segment(2) == 'profil' || $this->uri->segment(1) == 'user') ? 'active' : '' ?>" title="Profil Saya">
                <i class="bi bi-person-circle"></i> <span class="sidebar-text">Profil Saya</span>
            </a>
        </div>

        <div class="sidebar-footer mt-auto">
            <a href="<?= base_url('theme/toggle') ?>" class="btn btn-theme-toggle w-100 mb-2 d-flex align-items-center text-decoration-none border rounded bg-light text-secondary" style="padding: 8px 12px;">
                <?php if($this->session->userdata('theme') == 'dark'): ?>
                    <i class="bi bi-sun-fill text-warning"></i> <span class="ms-2 small fw-bold btn-text">Light Mode</span>
                <?php else: ?>
                    <i class="bi bi-moon-stars-fill"></i> <span class="ms-2 small fw-bold btn-text">Dark Mode</span>
                <?php endif; ?>
            </a>

            <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger w-100 d-flex align-items-center justify-content-center py-2" onclick="return confirm('Yakin ingin keluar?');">
                <i class="bi bi-box-arrow-right"></i> <span class="ms-2 fw-bold btn-text">Logout</span>
            </a>
        </div>
    </div>

    <div class="main-content">
        
        <nav class="navbar navbar-light bg-white shadow-sm mb-4 d-md-none rounded px-3">
            <div class="d-flex align-items-center justify-content-between w-100">
                <span class="navbar-brand mb-0 h1 fw-bold">
                    <span class="text-primary">Cyber</span><span style="color: var(--color-orange);">Career</span>
                </span>
                <button class="btn btn-outline-primary" id="mobileBurger"><i class="bi bi-list fs-4"></i></button>
            </div>
        </nav>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const body = document.body;
        const desktopToggle = document.getElementById('desktopToggle');
        const mobileBurger = document.getElementById('mobileBurger');
        const mobileClose = document.getElementById('mobileClose');
        const mobileOverlay = document.getElementById('mobileOverlay');

        // Desktop Collapse
        if(localStorage.getItem('desktop-collapsed') === 'true') body.classList.add('desktop-collapsed');
        if(desktopToggle) {
            desktopToggle.addEventListener('click', function() {
                body.classList.toggle('desktop-collapsed');
                localStorage.setItem('desktop-collapsed', body.classList.contains('desktop-collapsed'));
            });
        }

        // Mobile Open/Close
        function toggleMobile() { body.classList.toggle('mobile-show'); }
        if(mobileBurger) mobileBurger.addEventListener('click', toggleMobile);
        if(mobileClose) mobileClose.addEventListener('click', toggleMobile);
        if(mobileOverlay) mobileOverlay.addEventListener('click', toggleMobile);
    });
</script>