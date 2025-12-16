<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour - CyberCareer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --dark-bg: #0f172a;
            --card-bg: #1e293b;
            --primary: #3b82f6;
            --text-muted: #94a3b8;
        }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--dark-bg); color: #e2e8f0; }
        
        /* Navbar */
        .navbar-custom {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        /* Mockup Window */
        .browser-mockup {
            border-radius: 16px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            background: var(--card-bg);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.3s;
        }
        .browser-mockup:hover { transform: translateY(-5px); border-color: rgba(59, 130, 246, 0.5); }
        
        .browser-header {
            background: rgba(0, 0, 0, 0.3);
            padding: 12px 20px;
            display: flex; gap: 8px; align-items: center;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        .dot { width: 10px; height: 10px; border-radius: 50%; }
        .dot-red { background: #ef4444; } .dot-yellow { background: #f59e0b; } .dot-green { background: #22c55e; }
        
        /* Step Indicators */
        .step-badge {
            width: 50px; height: 50px;
            background: linear-gradient(135deg, var(--primary), #2563eb); 
            color: white;
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        }
        
        .line-connector {
            border-left: 2px dashed rgba(255,255,255,0.1);
            height: 80px; margin-left: 24px; margin-bottom: 1rem;
        }

        /* Mockup Content Styling (Mini Dashboard) */
        .mock-sidebar { width: 60px; background: rgba(0,0,0,0.2); border-right: 1px solid rgba(255,255,255,0.05); }
        .mock-card { background: rgba(255,255,255,0.05); border-radius: 12px; padding: 15px; border: 1px solid rgba(255,255,255,0.05); }
        .text-accent { color: #38bdf8; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-custom fixed-top py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="<?= base_url() ?>">
                <i class="bi bi-arrow-left me-2 text-primary"></i> Kembali
            </a>
            <span class="navbar-text fw-bold text-white d-none d-md-block">✨ Simulasi Alur Sistem</span>
            <a href="<?= base_url('home/landing') ?>" class="btn btn-sm btn-primary rounded-pill px-4 fw-bold">
                Buka Website Asli <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </nav>

    <div class="container" style="margin-top: 120px; margin-bottom: 100px;">
        <div class="text-center mb-5 pb-4" data-aos="fade-up">
            <span class="text-primary text-uppercase letter-spacing-2 small fw-bold">Demo Flow</span>
            <h1 class="fw-bold mb-3 display-5 text-white">Cara Kerja Sistem</h1>
            <p class="text-muted lead mx-auto" style="max-width: 600px;">
                Simulasi interaksi mahasiswa dari dashboard hingga pelaporan logbook.
            </p>
        </div>

        <div class="row align-items-center mb-2">
            <div class="col-lg-5 order-lg-1" data-aos="fade-right">
                <div class="step-badge">1</div>
                <h3 class="fw-bold text-white">Dashboard Pintar</h3>
                <p class="text-muted">Tampilan utama memberikan ringkasan status magang secara real-time. Progress bar menunjukkan sisa masa magang agar mahasiswa tetap on-track.</p>
                <div class="p-3 rounded-3 border border-primary border-opacity-25 bg-primary bg-opacity-10 mt-3">
                    <i class="bi bi-check-circle-fill text-primary me-2"></i> Status SKS terhitung otomatis.
                </div>
            </div>
            <div class="col-lg-7 order-lg-2" data-aos="fade-left">
                <div class="browser-mockup">
                    <div class="browser-header">
                        <div class="dot dot-red"></div><div class="dot dot-yellow"></div><div class="dot dot-green"></div>
                        <div class="ms-auto small text-muted font-monospace">dashboard.php</div>
                    </div>
                    <div class="d-flex" style="height: 300px;">
                        <div class="mock-sidebar d-flex flex-column align-items-center py-3 gap-3">
                            <div class="bg-primary rounded-circle" style="width: 30px; height: 30px;"></div>
                            <div class="bg-white bg-opacity-10 rounded" style="width: 30px; height: 30px;"></div>
                            <div class="bg-white bg-opacity-10 rounded" style="width: 30px; height: 30px;"></div>
                        </div>
                        <div class="p-4 flex-grow-1">
                            <div class="d-flex justify-content-between mb-4">
                                <div><h5 class="fw-bold mb-0 text-white">Halo, Martina!</h5><small class="text-muted">Sistem Informasi</small></div>
                                <div class="badge bg-primary bg-opacity-20 text-primary pt-2">Aktif Magang</div>
                            </div>
                            <div class="row g-3">
                                <div class="col-8">
                                    <div class="mock-card h-100">
                                        <small class="text-muted text-uppercase" style="font-size: 10px;">Posisi Saat Ini</small>
                                        <h6 class="text-white my-2">Web Developer Intern</h6>
                                        <div class="progress bg-dark mt-3" style="height: 6px;"><div class="progress-bar bg-success" style="width: 60%"></div></div>
                                        <small class="text-end d-block text-muted mt-1" style="font-size: 10px;">Bulan ke-6</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mock-card h-100 text-center d-flex flex-column justify-content-center bg-primary bg-opacity-10 border-primary border-opacity-25">
                                        <h2 class="fw-bold mb-0 text-white">20</h2>
                                        <small class="text-accent" style="font-size: 10px;">SKS</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="line-connector d-none d-lg-block"></div>

        <div class="row align-items-center mb-2">
            <div class="col-lg-7" data-aos="fade-right">
                <div class="browser-mockup">
                    <div class="browser-header">
                        <div class="dot dot-red"></div><div class="dot dot-yellow"></div><div class="dot dot-green"></div>
                        <div class="ms-auto small text-muted font-monospace">logbook.php</div>
                    </div>
                    <div class="p-4">
                        <div class="mock-card p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <h6 class="fw-bold text-white"><i class="bi bi-pencil-fill text-accent me-2"></i>Laporan Harian</h6>
                                <small class="text-muted"><?= date('d M Y') ?></small>
                            </div>
                            <div class="mb-3">
                                <div class="p-3 rounded bg-dark border border-secondary border-opacity-25 text-muted small">
                                    Melakukan slicing design UI dashboard menggunakan Bootstrap 5 dan memperbaiki bug pada menu responsive...
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <div class="btn btn-sm btn-outline-secondary rounded-pill px-3" style="border-color: rgba(255,255,255,0.1); color: #ccc;">
                                    <i class="bi bi-image me-1"></i> Bukti.jpg
                                </div>
                                <div class="btn btn-sm btn-primary ms-auto rounded-pill px-4">Submit</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 ps-lg-5" data-aos="fade-left">
                <div class="step-badge">2</div>
                <h3 class="fw-bold text-white">Logbook Digital</h3>
                <p class="text-muted">Mahasiswa wajib mengisi logbook harian. Sistem memungkinkan upload bukti foto kegiatan. Dosen pembimbing dapat memantau dan memberikan <i>approval</i> secara online tanpa tatap muka.</p>
            </div>
        </div>

        <div class="line-connector d-none d-lg-block"></div>

        <div class="row align-items-center">
            <div class="col-lg-5 order-lg-1" data-aos="fade-right">
                <div class="step-badge">3</div>
                <h3 class="fw-bold text-white">Riwayat & CV</h3>
                <p class="text-muted">Semua data magang yang telah selesai akan tersimpan abadi di database kampus. Mahasiswa dapat mencetak Riwayat Magang sebagai lampiran SKPI atau CV resmi.</p>
            </div>
            <div class="col-lg-7 order-lg-2" data-aos="fade-left">
                <div class="browser-mockup">
                    <div class="browser-header">
                        <div class="dot dot-red"></div><div class="dot dot-yellow"></div><div class="dot dot-green"></div>
                        <div class="ms-auto small text-muted font-monospace">riwayat.php</div>
                    </div>
                    <div class="p-4">
                        <div class="mock-card mb-3 d-flex align-items-center gap-3">
                            <div class="bg-white p-2 rounded d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                <img src="<?= base_url('assets/img/BRI.svg') ?>" class="img-fluid">
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold text-white">Mobile App Intern</h6>
                                <small class="text-muted">Bank Rakyat Indonesia</small>
                            </div>
                            <span class="badge bg-success bg-opacity-20 text-success ms-auto rounded-pill">Aktif</span>
                        </div>
                        
                        <div class="mock-card d-flex align-items-center gap-3 opacity-50">
                            <div class="bg-white p-2 rounded d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                <img src="<?= base_url('assets/img/Tokopedia.png') ?>" class="img-fluid">
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold text-white">UI/UX Designer</h6>
                                <small class="text-muted">Tokopedia</small>
                            </div>
                            <span class="badge bg-secondary bg-opacity-20 text-secondary ms-auto rounded-pill">Selesai</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5 pt-5" data-aos="zoom-in">
            <h2 class="fw-bold text-white mb-4">Siap untuk Demo Langsung?</h2>
            <a href="<?= base_url('home/landing') ?>" class="btn btn-primary btn-lg rounded-pill px-5 py-3 fw-bold shadow-lg glow-effect">
                Masuk ke Landing Page
            </a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
</body>
</html>