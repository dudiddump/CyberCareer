<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Project - CyberCareer</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;500;700;800&family=Space+Grotesk:wght@300;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-dark: #020617;
            --primary: #3b82f6;
            --accent: #06b6d4;
            --card-bg: #1e293b;
            --glass-border: rgba(255, 255, 255, 0.1);
            --text-main: #f8fafc;
            --text-secondary: #94a3b8;
        }
        
        body {
            margin: 0; padding: 0;
            font-family: 'Space Grotesk', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-main);
            overflow: hidden; 
        }

        .bg-mesh {
            position: fixed; inset: 0; z-index: -1;
            background-image: radial-gradient(at 0% 0%, rgba(59, 130, 246, 0.15) 0px, transparent 50%),
                              radial-gradient(at 100% 100%, rgba(6, 182, 212, 0.1) 0px, transparent 50%);
            background-size: cover;
        }
        .bg-glow, .bg-glow-2 { position: fixed; border-radius: 50%; pointer-events: none; z-index: -1; }
        .bg-glow { width: 600px; height: 600px; background: radial-gradient(circle, rgba(59,130,246,0.1) 0%, rgba(0,0,0,0) 70%); top: -10%; left: -10%; }
        .bg-glow-2 { width: 500px; height: 500px; background: radial-gradient(circle, rgba(6,182,212,0.08) 0%, rgba(0,0,0,0) 70%); bottom: -10%; right: -10%; }

        .ppt-header {
            position: fixed; top: 0; left: 0; width: 100%;
            padding: 15px 40px;
            display: flex; justify-content: space-between; align-items: center;
            z-index: 1000;
            background: rgba(2, 6, 23, 0.85);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid var(--glass-border);
            transform: translateY(-100%);
            transition: transform 0.4s ease;
        }
        .ppt-header.show { transform: translateY(0); }

        .header-brand { 
            font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 1.2rem; 
            color: white; display: flex; align-items: center; gap: 10px; cursor: pointer;
        }
        
        .nav-pills-custom { display: flex; gap: 5px; list-style: none; margin: 0; padding: 0; }
        .nav-item-custom {
            font-size: 0.85rem; color: var(--text-secondary);
            padding: 8px 16px; border-radius: 20px;
            cursor: pointer; transition: all 0.3s;
            font-weight: 500;
        }
        .nav-item-custom:hover { color: white; background: rgba(255,255,255,0.05); }
        .nav-item-custom.active { color: white; background: var(--primary); }

        .slides-wrapper {
            height: 100vh; width: 100vw;
            overflow-y: scroll; scroll-snap-type: y mandatory; scroll-behavior: smooth;
        }
        .slides-wrapper::-webkit-scrollbar { display: none; }

        .ppt-slide {
            height: 100vh; width: 100vw;
            scroll-snap-align: start;
            display: flex; flex-direction: column; justify-content: center;
            padding: 80px 8% 0 8%;
            position: relative;
            opacity: 0; transition: opacity 0.5s ease-out;
        }
        .ppt-slide.visible { opacity: 1; }

        h1, h2, h3 { font-family: 'Outfit', sans-serif; font-weight: 700; letter-spacing: -0.5px; }
        h1 { font-size: 3.8rem; line-height: 1.1; }
        .text-gradient { background: linear-gradient(to right, #60a5fa, #22d3ee); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        
        .box-glass-dark {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--glass-border);
            border-radius: 12px; padding: 1.5rem;
            backdrop-filter: blur(10px);
            transition: 0.3s;
        }
        .box-glass-dark:hover { border-color: rgba(59, 130, 246, 0.4); background: rgba(255, 255, 255, 0.05); }

        .icon-box-lg {
            width: 50px; height: 50px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem; flex-shrink: 0;
        }

        .browser-mockup {
            border-radius: 12px;
            box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.6);
            overflow: hidden;
            background: #0f172a; /* Slate 900 */
            border: 1px solid var(--glass-border);
        }
        .browser-header {
            background: rgba(0, 0, 0, 0.4);
            padding: 10px 15px; display: flex; gap: 6px; align-items: center;
            border-bottom: 1px solid var(--glass-border);
        }
        .dot { width: 8px; height: 8px; border-radius: 50%; }
        
        .ppt-footer {
            position: fixed; bottom: 0; left: 0; width: 100%; padding: 20px 40px;
            display: flex; justify-content: space-between; align-items: center;
            z-index: 100; pointer-events: none; /* Allow click through */
        }
        .nav-btn {
            pointer-events: auto;
            background: rgba(255,255,255,0.05); border: 1px solid var(--glass-border); color: white;
            width: 40px; height: 40px; border-radius: 50%; transition: 0.2s; cursor: pointer;
            backdrop-filter: blur(5px);
        }
        .nav-btn:hover { background: var(--primary); border-color: var(--primary); }

        .text-light-muted { color: #cbd5e1 !important; }
        .text-dark-hard { color: #0f172a !important; }
        .fade-in-up { animation: fadeInUp 0.8s forwards; opacity: 0; }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .d-1 { animation-delay: 0.1s; } .d-2 { animation-delay: 0.2s; } .d-3 { animation-delay: 0.3s; }
    </style>
</head>
<body>

    <div class="bg-mesh"></div>
    <div class="bg-glow"></div>
    <div class="bg-glow-2"></div>

    <nav class="ppt-header" id="mainHeader">
        <div class="header-brand" onclick="scrollToSlide(0)">
            <i class="bi bi-cpu text-primary"></i> CyberCareer
        </div>
        
        <ul class="nav-pills-custom">
            <li class="nav-item-custom" onclick="scrollToSlide(1)">Masalah</li>
            <li class="nav-item-custom" onclick="scrollToSlide(2)">Teknologi</li> <li class="nav-item-custom" onclick="scrollToSlide(3)">Mahasiswa</li>
            <li class="nav-item-custom" onclick="scrollToSlide(4)">Dosen</li>
            <li class="nav-item-custom" onclick="scrollToSlide(5)">Admin</li>
            <li class="nav-item-custom" onclick="scrollToSlide(6)">Demo</li>
        </ul>
    </nav>

    <div class="slides-wrapper" id="slider">

        <section class="ppt-slide visible" id="slide-1" data-index="0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-10">
                        <div class="fade-in-up d-1">
                            <span class="badge bg-white bg-opacity-10 border border-white border-opacity-10 text-white px-3 py-2 rounded-pill mb-4">
                                FINAL PROJECT 2025
                            </span>
                        </div>
                        <h1 class="text-white mb-3 fade-in-up d-2">
                            CyberCareer : <br>
                            <span class="text-gradient">Sistem Informasi Magang Terintegrasi</span>
                        </h1>
                        <p class="fs-4 text-light-muted mb-5 fw-light fade-in-up d-3" style="max-width: 700px;">
                            Optimalisasi administrasi akademik dan monitoring <i>Company Learning Program</i> (CLP) berbasis Web.
                        </p>
                        
                        <div class="d-flex align-items-center gap-4 fade-in-up d-3">
                            <img src="<?php echo base_url('assets/1x1 Photo.jpg'); ?>" class="rounded-circle border border-2 border-primary" width="60" style="object-fit: cover;">
                            <div>
                                <small class="text-white text-uppercase d-block mb-1" style="font-size: 0.7rem;">Disusun Oleh :</small>
                                <h5 class="mb-0 text-white">Talitha Khansa Fahira</h5>
                                <span class="text-light-muted font-monospace">NIM: 12230004</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ppt-slide" id="slide-2" data-index="1">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5 fade-in-up d-1">
                        <h2 class="text-white mb-4">Latar Belakang <br>& Permasalahan</h2>
                        <div class="box-glass-dark border-start border-4 border-primary">
                            <h4 class="text-white mb-2">Program CLP (3+1)</h4>
                            <p class="text-light-muted mb-0">
                                Kewajiban magang industri 1 tahun (Semester 6-7) yang membutuhkan sistem monitoring handal.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-7 fade-in-up d-2">
                        <div class="d-flex flex-column gap-3">
                            <div class="box-glass-dark d-flex gap-3 align-items-center">
                                <div class="icon-box-lg bg-danger bg-opacity-10 text-danger"><i class="bi bi-x-lg"></i></div>
                                <div>
                                    <h5 class="text-white mb-1">Informasi Terpecah</h5>
                                    <p class="small text-light-muted mb-0">Mahasiswa kesulitan mencari mitra valid & data alumni.</p>
                                </div>
                            </div>
                            <div class="box-glass-dark d-flex gap-3 align-items-center">
                                <div class="icon-box-lg bg-danger bg-opacity-10 text-danger"><i class="bi bi-eye-slash"></i></div>
                                <div>
                                    <h5 class="text-white mb-1">Monitoring "Blind Spot"</h5>
                                    <p class="small text-light-muted mb-0">Logbook manual via email/kertas menyulitkan evaluasi.</p>
                                </div>
                            </div>
                            <div class="box-glass-dark d-flex gap-3 align-items-center">
                                <div class="icon-box-lg bg-danger bg-opacity-10 text-danger"><i class="bi bi-file-earmark-x"></i></div>
                                <div>
                                    <h5 class="text-white mb-1">Administrasi Manual</h5>
                                    <p class="small text-light-muted mb-0">Rekapitulasi nilai dan konversi SKS tidak efisien.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ppt-slide" id="slide-tech" data-title="Teknologi Pengembangan" data-header-show="true">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 fade-in-up d-1">
                        <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill border border-secondary mb-3">
                            <span class="rounded-circle bg-success" style="width:10px; height:10px;"></span>
                            <small class="text-white-50 text-uppercase fw-bold" style="letter-spacing:1px;">Development Tools</small>
                        </div>
                        <h2 class="display-5 fw-bold text-white mb-4">Tech Stack <br><span class="text-gradient" style="background: linear-gradient(to right, #facc15, #f59e0b); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Handal & Efisien</span></h2>
                        <p class="text-light-desc fs-5 mb-0">
                            Kombinasi teknologi modern yang dipilih untuk memastikan performa sistem yang ringan, aman, dan responsif.
                        </p>
                    </div>
                    
                    <div class="col-lg-8 fade-in-up d-2">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="p-4 rounded-4 h-100 border border-white border-opacity-10" style="background: linear-gradient(145deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.01) 100%); backdrop-filter: blur(10px);">
                                    <div class="d-flex align-items-center gap-3 mb-3">
                                        <div class="p-3 rounded-3 bg-warning bg-opacity-10 text-warning"><i class="bi bi-fire fs-3"></i></div>
                                        <h4 class="text-white mb-0">CodeIgniter 3</h4>
                                    </div>
                                    <p class="text-white-50 small mb-0">Framework MVC PHP yang ringan (lightweight) dan memiliki performa eksekusi tinggi.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-4 rounded-4 h-100 border border-white border-opacity-10" style="background: linear-gradient(145deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.01) 100%); backdrop-filter: blur(10px);">
                                    <div class="d-flex align-items-center gap-3 mb-3">
                                        <div class="p-3 rounded-3 bg-primary bg-opacity-10 text-primary"><i class="bi bi-bootstrap fs-3"></i></div>
                                        <h4 class="text-white mb-0">Bootstrap 5</h4>
                                    </div>
                                    <p class="text-white-50 small mb-0">Framework UI/UX modern untuk tampilan yang responsif (Mobile-First) dan konsisten.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-4 rounded-4 h-100 border border-white border-opacity-10" style="background: linear-gradient(145deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.01) 100%); backdrop-filter: blur(10px);">
                                    <div class="d-flex align-items-center gap-3 mb-3">
                                        <div class="p-3 rounded-3 bg-info bg-opacity-10 text-info"><i class="bi bi-database fs-3"></i></div>
                                        <h4 class="text-white mb-0">MySQL</h4>
                                    </div>
                                    <p class="text-white-50 small mb-0">Manajemen basis data relasional yang stabil untuk menyimpan ribuan data logbook.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-4 rounded-4 h-100 border border-white border-opacity-10" style="background: linear-gradient(145deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.01) 100%); backdrop-filter: blur(10px);">
                                    <div class="d-flex align-items-center gap-3 mb-3">
                                        <div class="p-3 rounded-3 bg-success bg-opacity-10 text-success"><i class="bi bi-server fs-3"></i></div>
                                        <h4 class="text-white mb-0">XAMPP</h4>
                                    </div>
                                    <p class="text-white-50 small mb-0">Lingkungan pengembangan lokal yang mencakup Apache Web Server dan PHP.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ppt-slide" id="slide-3" data-index="2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 fade-in-up d-1">
                        <div class="badge bg-primary bg-opacity-10 text-primary border border-primary px-3 py-2 rounded-pill mb-3">
                            <i class="bi bi-mortarboard-fill me-1"></i> Role: Mahasiswa
                        </div>
                        <h2 class="text-white mb-4">Manajemen Karir</h2>
                        
                        <ul class="list-unstyled d-grid gap-3">
                            <li class="d-flex gap-3 text-light-muted">
                                <i class="bi bi-check-circle-fill text-primary mt-1"></i>
                                <span><b>Pencarian Mitra Valid</b> & Jejaring Alumni.</span>
                            </li>
                            <li class="d-flex gap-3 text-light-muted">
                                <i class="bi bi-check-circle-fill text-primary mt-1"></i>
                                <span><b>Logbook Digital</b> harian untuk syarat SKS.</span>
                            </li>
                            <li class="d-flex gap-3 text-light-muted">
                                <i class="bi bi-check-circle-fill text-primary mt-1"></i>
                                <span><b>Profil & CV</b> terpusat otomatis.</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="col-lg-7 fade-in-up d-2">
                        <div class="browser-mockup">
                            <div class="browser-header">
                                <div style="display:flex; gap:6px;"><div class="dot" style="background:#ef4444"></div><div class="dot" style="background:#f59e0b"></div><div class="dot" style="background:#22c55e"></div></div>
                                <div class="ms-auto small text-secondary font-monospace">mahasiswa/dashboard</div>
                            </div>
                            <div class="p-4" style="background: #0f172a;">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="d-flex gap-3 align-items-center">
                                        <div class="bg-white bg-opacity-10 p-3 rounded-circle text-white"><i class="bi bi-person fs-4"></i></div>
                                        <div>
                                            <h5 class="mb-0 text-white">Halo, Talitha!</h5>
                                            <small class="text-success">Status: Magang Aktif</small>
                                        </div>
                                    </div>
                                    <button class="btn btn-sm btn-outline-light rounded-pill px-3" style="font-size:11px">Update CV</button>
                                </div>
                                <div class="row g-3">
                                    <div class="col-8">
                                        <div class="p-3 rounded border border-secondary" style="background: rgba(255,255,255,0.05);">
                                            <small class="text-secondary text-uppercase" style="font-size:10px">Mitra Saat Ini</small>
                                            <h6 class="text-white mt-1 mb-0">Bank Rakyat Indonesia</h6>
                                            <div class="mt-2 text-primary small"><i class="bi bi-people me-1"></i>5 Alumni Disini</div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="p-3 rounded border border-primary bg-primary bg-opacity-10 text-center h-100 d-flex flex-column justify-content-center">
                                            <i class="bi bi-journal-plus fs-3 text-primary mb-1"></i>
                                            <small class="text-white fw-bold">Logbook</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ppt-slide" id="slide-4" data-index="3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 order-2 order-lg-1 fade-in-up d-2">
                        <div class="browser-mockup">
                            <div class="browser-header">
                                <div style="display:flex; gap:6px;"><div class="dot" style="background:#ef4444"></div><div class="dot" style="background:#f59e0b"></div><div class="dot" style="background:#22c55e"></div></div>
                                <div class="ms-auto small text-secondary font-monospace">dosen/monitoring</div>
                            </div>
                            <div class="p-4" style="background: #0f172a;">
                                <h6 class="text-white mb-3">Monitoring Bimbingan</h6>
                                <div class="d-flex flex-column gap-3">
                                    <div class="p-3 rounded border border-secondary d-flex justify-content-between align-items-center" style="background: rgba(255,255,255,0.05);">
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="bg-primary rounded-circle" style="width:8px; height:8px;"></div>
                                            <div>
                                                <h6 class="text-white mb-0" style="font-size:14px">Talitha Khansa</h6>
                                                <small class="text-secondary" style="font-size:11px">Web Developer - BRI</small>
                                            </div>
                                        </div>
                                        <button class="btn btn-sm btn-primary py-0 px-3" style="font-size:11px">Review</button>
                                    </div>
                                    <div class="p-3 rounded border border-secondary d-flex justify-content-between align-items-center opacity-50" style="background: rgba(255,255,255,0.05);">
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="bg-success rounded-circle" style="width:8px; height:8px;"></div>
                                            <div>
                                                <h6 class="text-white mb-0" style="font-size:14px">Budi Santoso</h6>
                                                <small class="text-secondary" style="font-size:11px">UI/UX - Tokopedia</small>
                                            </div>
                                        </div>
                                        <small class="text-success" style="font-size:11px"><i class="bi bi-check-all"></i> Oke</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-5 order-1 order-lg-2 ps-lg-5 fade-in-up d-1">
                        <div class="badge bg-warning bg-opacity-10 text-warning border border-warning px-3 py-2 rounded-pill mb-3">
                            <i class="bi bi-person-video3 me-1"></i> Role: Dosen
                        </div>
                        <h2 class="text-white mb-4">Monitoring & Evaluasi</h2>
                        <ul class="list-unstyled d-grid gap-3">
                            <li class="d-flex gap-3 text-light-muted">
                                <i class="bi bi-check-circle-fill text-warning mt-1"></i>
                                <span><b>Dashboard Progres</b> seluruh mahasiswa.</span>
                            </li>
                            <li class="d-flex gap-3 text-light-muted">
                                <i class="bi bi-check-circle-fill text-warning mt-1"></i>
                                <span><b>Approval Logbook</b> realtime.</span>
                            </li>
                            <li class="d-flex gap-3 text-light-muted">
                                <i class="bi bi-check-circle-fill text-warning mt-1"></i>
                                <span>Akses Data & CV Mahasiswa.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="ppt-slide" id="slide-5" data-index="3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 fade-in-up d-1">
                        <div class="badge bg-danger bg-opacity-10 text-danger border border-danger px-3 py-2 rounded-pill mb-3">
                            <i class="bi bi-shield-lock me-1"></i> Role: Admin
                        </div>
                        <h2 class="text-white mb-4">Pusat Kontrol Sistem</h2>
                        
                        <div class="d-grid gap-3">
                            <div class="box-glass-dark d-flex gap-3 align-items-center">
                                <i class="bi bi-graph-up-arrow text-success fs-4"></i>
                                <div>
                                    <h6 class="text-white mb-0">Statistik Progres</h6>
                                    <small class="text-light-muted">Target magang & sebaran prodi.</small>
                                </div>
                            </div>
                            <div class="box-glass-dark d-flex gap-3 align-items-center">
                                <i class="bi bi-database-gear text-info fs-4"></i>
                                <div>
                                    <h6 class="text-white mb-0">Manajemen Data</h6>
                                    <small class="text-light-muted">CRUD User & Mitra.</small>
                                </div>
                            </div>
                            <div class="box-glass-dark d-flex gap-3 align-items-center">
                                <i class="bi bi-patch-check text-warning fs-4"></i>
                                <div>
                                    <h6 class="text-white mb-0">Validasi Mitra</h6>
                                    <small class="text-light-muted">Verifikasi perusahaan baru.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-7 fade-in-up d-2">
                        <div class="browser-mockup">
                            <div class="browser-header">
                                <div style="display:flex; gap:6px;"><div class="dot" style="background:#ef4444"></div><div class="dot" style="background:#f59e0b"></div><div class="dot" style="background:#22c55e"></div></div>
                                <div class="ms-auto small text-secondary font-monospace">admin/dashboard</div>
                            </div>
                            <div class="p-4" style="background: #0f172a;">
                                <div class="row g-3 mb-4">
                                    <div class="col-6">
                                        <div class="p-3 rounded border border-primary bg-primary bg-opacity-10">
                                            <h2 class="text-white fw-bold mb-0">200+</h2>
                                            <small class="text-primary fw-bold text-uppercase" style="font-size: 10px;">Total Mhs</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-3 rounded border border-success bg-success bg-opacity-10">
                                            <h2 class="text-white fw-bold mb-0">15</h2>
                                            <small class="text-success fw-bold text-uppercase" style="font-size: 10px;">Mitra Aktif</small>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="bg-white p-4 rounded-3 shadow-sm">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h6 class="text-dark-hard mb-0 fw-bold">Sebaran Magang</h6>
                                        <i class="bi bi-three-dots text-secondary"></i>
                                    </div>
                                    <div class="d-flex align-items-end gap-2" style="height: 120px;">
                                        <div class="w-100 rounded bg-primary" style="height: 45%;"></div>
                                        <div class="w-100 rounded bg-info" style="height: 60%;"></div>
                                        <div class="w-100 rounded bg-warning" style="height: 30%;"></div>
                                        <div class="w-100 rounded bg-danger" style="height: 75%;"></div>
                                        <div class="w-100 rounded bg-success" style="height: 55%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ppt-slide" id="slide-6" data-index="6">
            <div class="text-center w-100">
                <div class="fade-in-up d-1 mb-5">
                    <div class="d-inline-flex p-5 rounded-circle bg-white shadow-lg align-items-center justify-content-center" style="width: 180px; height: 180px;">
                        <i class="bi bi-laptop text-primary" style="font-size: 5rem;"></i>
                    </div>
                </div>
                <h2 class="display-3 fw-bold text-white mb-4 fade-in-up d-2">Live Demo</h2>
                <p class="fs-5 text-light-muted mb-5 fade-in-up d-3">Simulasi aplikasi <b>CyberCareer</b> secara langsung.</p>
                <a href="<?= base_url('home/landing') ?>" class="btn btn-primary btn-lg rounded-pill px-5 py-3 fw-bold shadow-lg fade-in-up d-3 hover-scale">
                    <i class="bi bi-play-circle-fill me-2"></i> Mulai Demo
                </a>
            </div>
        </section>

    </div>

    <div class="ppt-footer">
        <div class="text-white fw-bold font-monospace small d-flex align-items-center gap-2">
            <span class="text-primary">CYBERCAREER</span>
            <span class="text-secondary">|</span>
            <span>SLIDE <span id="currentSlide">1</span> / <span id="totalSlides">6</span></span>
        </div>
        <div class="d-flex gap-2">
            <button class="nav-btn" onclick="prevSlide()"><i class="bi bi-chevron-left"></i></button>
            <button class="nav-btn" onclick="nextSlide()"><i class="bi bi-chevron-right"></i></button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const slider = document.getElementById('slider');
        const slides = document.querySelectorAll('.ppt-slide');
        const header = document.getElementById('mainHeader');
        const navItems = document.querySelectorAll('.nav-item-custom');
        document.getElementById('totalSlides').innerText = slides.length;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const index = Array.from(slides).indexOf(entry.target);
                    document.getElementById('currentSlide').innerText = index + 1;
                    
                    if (index > 0 && index < 5) {
                        header.classList.add('show');
                    } else {
                        header.classList.remove('show');
                    }

                    navItems.forEach(item => item.classList.remove('active'));
                    if(index > 0 && index <= navItems.length) {
                        if(navItems[index-1]) navItems[index-1].classList.add('active');
                    }

                    entry.target.classList.add('visible');
                    const anims = entry.target.querySelectorAll('.fade-in-up');
                    anims.forEach(el => {
                        el.style.animation = 'none';
                        el.offsetHeight; 
                        el.style.animation = null; 
                    });
                }
            });
        }, { threshold: 0.5 });

        slides.forEach(slide => observer.observe(slide));

        function scrollToSlide(index) {
            slides[index].scrollIntoView({ behavior: 'smooth' });
        }

        function nextSlide() { 
            const current = Math.round(slider.scrollTop / window.innerHeight);
            if (current < slides.length - 1) scrollToSlide(current + 1);
        }
        
        function prevSlide() { 
            const current = Math.round(slider.scrollTop / window.innerHeight);
            if (current > 0) scrollToSlide(current - 1);
        }

        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowDown' || e.key === 'ArrowRight' || e.key === ' ') nextSlide();
            else if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') prevSlide();
        });
    </script>
</body>
</html>