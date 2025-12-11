<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Dashboard Mahasiswa' ?></title>
    
    <!-- 1. Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- 2. Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- 3. Google Fonts (Plus Jakarta Sans) -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- 4. jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Custom CSS -->
    <style>
        :root {
            --color-blue: #0d6efd;
            --color-orange: #fd7e14;
            --sidebar-width: 260px;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8f9fa;
        }
        
        /* Sidebar Styling */
        .sidebar-wrapper {
            width: var(--sidebar-width);
            min-height: 100vh;
            background: #ffffff;
            border-right: 1px solid #eaeaea;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1030;
            display: flex;
            flex-direction: column;
        }
        
        /* Main Content Styling */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2rem;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Nav Links */
        .nav-pills .nav-link {
            color: #64748b;
            font-weight: 500;
            padding: 12px 20px;
            margin-bottom: 4px;
            border-radius: 12px;
            transition: all 0.2s ease;
        }
        .nav-pills .nav-link:hover {
            background-color: #eff6ff; /* Biru muda saat hover */
            color: var(--color-blue);
        }
        .nav-pills .nav-link.active {
            background-color: var(--color-blue); /* Kembali ke Biru */
            color: white;
            font-weight: 600;
            box-shadow: 0 4px 6px rgba(13, 110, 253, 0.25);
        }
        .nav-link i { font-size: 1.1rem; }

        /* Card Modern Style */
        .card-modern {
            border: none;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            background: white;
            transition: transform 0.2s;
        }
        
        .btn-orange {
            background-color: var(--color-orange);
            color: white;
            border: none;
        }
        .btn-orange:hover {
            background-color: #e86300;
            color: white;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .sidebar-wrapper { transform: translateX(-100%); transition: transform 0.3s ease-in-out; }
            .sidebar-wrapper.show { transform: translateX(0); }
            .main-content { margin-left: 0; padding: 1.5rem; }
        }
    </style>
</head>
<body>

<!-- Mobile Menu Button -->
<div class="d-md-none p-3 bg-white border-bottom d-flex justify-content-between align-items-center sticky-top">
    <span class="fw-bold text-dark"><i class="bi bi-mortarboard-fill me-2 text-primary"></i>CyberCareer</span>
    <button class="btn btn-light" onclick="$('.sidebar-wrapper').toggleClass('show')">
        <i class="bi bi-list fs-4"></i>
    </button>
</div>

<div class="d-flex">
    
    <!-- SIDEBAR -->
    <div class="sidebar-wrapper p-4">
        <!-- Logo -->
        <div class="d-flex align-items-center gap-2 mb-5 px-2">
            <!-- Logo Gambar -->
            <img src="<?= base_url('assets/logo-CU.png') ?>" class="rounded-3 shadow-sm object-fit-cover" style="width: 40px; height: 40px;" alt="Logo">
            
            <div>
                <h5 class="fw-bold text-dark mb-0">CyberCareer</h5>
                <small class="text-muted" style="font-size: 11px;">Student Portal</small>
            </div>
        </div>

        <!-- Menu Items -->
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="<?= base_url('mahasiswa/dashboard') ?>" class="nav-link <?= ($this->uri->segment(2) == 'dashboard') ? 'active' : '' ?> d-flex align-items-center gap-3">
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li class="nav-label text-uppercase text-muted small fw-bold mt-4 mb-2 px-3" style="font-size: 11px; letter-spacing: 1px;">Akademik</li>
            
            <li class="nav-item">
                <a href="<?= base_url('mahasiswa/logbook') ?>" class="nav-link <?= ($this->uri->segment(2) == 'logbook') ? 'active' : '' ?> d-flex align-items-center gap-3">
                    <i class="bi bi-journal-text"></i>
                    <span>Logbook Harian</span>
                </a>
            </li>

            <li class="nav-label text-uppercase text-muted small fw-bold mt-4 mb-2 px-3" style="font-size: 11px; letter-spacing: 1px;">Karier & Industri</li>

            <li class="nav-item">
                <a href="<?= base_url('mahasiswa/mitra') ?>" class="nav-link <?= ($this->uri->segment(2) == 'mitra' || $this->uri->segment(2) == 'detail_mitra') ? 'active' : '' ?> d-flex align-items-center gap-3">
                    <i class="bi bi-buildings"></i>
                    <span>Mitra & Lowongan</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('mahasiswa/riwayat') ?>" class="nav-link <?= ($this->uri->segment(2) == 'riwayat') ? 'active' : '' ?> d-flex align-items-center gap-3">
                    <i class="bi bi-clock-history"></i>
                    <span>Riwayat Karier</span>
                </a>
            </li>
        </ul>

        <!-- User Profile Bottom -->
        <div class="mt-auto pt-4 border-top">
            <div class="d-flex align-items-center gap-3 mb-3 px-2">
                <!-- Foto Profil Kecil -->
                <div class="rounded-circle overflow-hidden border border-primary" style="width: 40px; height: 40px;">
                    <?php 
                        $foto = $this->session->userdata('foto'); 
                        $img_src = $foto ? base_url('uploads/foto/'.$foto) : base_url('assets/img/default-avatar.png');
                    ?>
                    <img src="<?= $img_src ?>" class="w-100 h-100 object-fit-cover">
                </div>
                <div style="line-height: 1.2; overflow: hidden;">
                    <div class="fw-bold text-dark text-truncate">
                        <?= $this->session->userdata('nama_lengkap') ?>
                    </div>
                    <small class="text-muted text-truncate d-block" style="font-size: 11px;">
                        <?= $this->session->userdata('id') ?> <!-- Menampilkan NIM -->
                    </small>
                </div>
            </div>
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-light text-danger w-100 rounded-pill fw-bold hover-shadow">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
            </a>
        </div>
    </div>

    <!-- MAIN CONTENT WRAPPER -->
    <div class="main-content w-100">