<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Dashboard Admin' ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

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
            background-color: #fff7ed;
            color: var(--color-orange);
        }
        .nav-pills .nav-link.active {
            background-color: var(--color-blue);
            color: white;
            font-weight: 600;
            box-shadow: 0 4px 6px rgba(13, 110, 253, 0.2);
        }
        .nav-link i { font-size: 1.1rem; }

        /* Card Modern Style (Global) */
        .card-modern {
            border: none;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            background: white;
            transition: transform 0.2s;
        }
        
        /* Table Styling */
        .table thead th {
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            color: #64748b;
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .input-modern {
            background-color: #f8f9fa;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 10px 15px;
        }
        .input-modern:focus {
            background-color: #fff;
            border-color: var(--color-orange);
            box-shadow: 0 0 0 4px rgba(253, 126, 20, 0.1);
        }

        @media (max-width: 768px) {
            .sidebar-wrapper { transform: translateX(-100%); transition: transform 0.3s ease-in-out; }
            .sidebar-wrapper.show { transform: translateX(0); }
            .main-content { margin-left: 0; padding: 1.5rem; }
        }
    </style>
</head>
<body>

<!-- Mobile Menu Button (Visible on Small Screens) -->
<div class="d-md-none p-3 bg-white border-bottom d-flex justify-content-between align-items-center sticky-top">
    <span class="fw-bold text-primary"><i class="bi bi-mortarboard-fill me-2"></i>CyberCampus</span>
    <button class="btn btn-light" onclick="$('.sidebar-wrapper').toggleClass('show')">
        <i class="bi bi-list fs-4"></i>
    </button>
</div>

<div class="d-flex">
    
    <!-- SIDEBAR -->
    <div class="sidebar-wrapper p-4">
        <div class="d-flex align-items-center gap-2 mb-5 px-2">
            <div class="bg-warning bg-gradient text-white rounded-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px; background-color: var(--color-orange) !important;">
                <i class="bi bi-mortarboard-fill fs-5"></i>
            </div>
            <div>
                <h5 class="fw-bold text-dark mb-0">CyberCampus</h5>
                <small class="text-muted" style="font-size: 11px;">Administrator Panel</small>
            </div>
        </div>

        <!-- Menu Items -->
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= ($this->uri->segment(2) == 'dashboard') ? 'active' : '' ?> d-flex align-items-center gap-3">
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li class="nav-label text-uppercase text-muted small fw-bold mt-4 mb-2 px-3" style="font-size: 11px; letter-spacing: 1px;">Akademik</li>
            
            <li class="nav-item">
                <a href="<?= base_url('admin/mahasiswa') ?>" class="nav-link <?= ($this->uri->segment(2) == 'mahasiswa' || $this->uri->segment(2) == 'riwayat_mahasiswa') ? 'active' : '' ?> d-flex align-items-center gap-3">
                    <i class="bi bi-people-fill"></i>
                    <span>Mahasiswa</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/dosen') ?>" class="nav-link <?= ($this->uri->segment(2) == 'dosen') ? 'active' : '' ?> d-flex align-items-center gap-3">
                    <i class="bi bi-person-video3"></i>
                    <span>Dosen</span>
                </a>
            </li>

            <li class="nav-label text-uppercase text-muted small fw-bold mt-4 mb-2 px-3" style="font-size: 11px; letter-spacing: 1px;">Industri</li>

            <li class="nav-item">
                <a href="<?= base_url('admin/mitra') ?>" class="nav-link <?= ($this->uri->segment(2) == 'mitra' || $this->uri->segment(2) == 'detail_mitra') ? 'active' : '' ?> d-flex align-items-center gap-3">
                    <i class="bi bi-buildings-fill"></i>
                    <span>Mitra & Lowongan</span>
                </a>
            </li>
        </ul>

        <!-- User Profile Bottom -->
        <div class="mt-auto pt-4 border-top">
            <div class="d-flex align-items-center gap-3 mb-3 px-2">
                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center text-warning fw-bold border border-warning" style="width: 40px; height: 40px;">
                    <?= substr($this->session->userdata('nama_lengkap') ?? 'A', 0, 1) ?>
                </div>
                <div style="line-height: 1.2;">
                    <div class="fw-bold text-dark text-truncate" style="max-width: 120px;">
                        <?= $this->session->userdata('nama_lengkap') ?? 'Admin' ?>
                    </div>
                    <small class="text-muted">Administrator</small>
                </div>
            </div>
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-light text-danger w-100 rounded-pill fw-bold hover-shadow">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
            </a>
        </div>
    </div>

    <div class="main-content w-100">