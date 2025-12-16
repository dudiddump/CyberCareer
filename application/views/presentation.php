<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidang Skripsi - CyberCareer</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;500;700;800&family=Space+Grotesk:wght@300;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-dark: #0f172a;
            --primary: #3b82f6;
            --accent: #06b6d4;
            --card-bg: #1e293b;
            --border: rgba(255, 255, 255, 0.1);
            --text-main: #f8fafc;
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

        .slides-wrapper {
            height: 100vh; width: 100vw;
            overflow-y: scroll; scroll-snap-type: y mandatory; scroll-behavior: smooth;
        }
        .slides-wrapper::-webkit-scrollbar { display: none; }

        .ppt-slide {
            height: 100vh; width: 100vw;
            scroll-snap-align: start;
            display: flex; flex-direction: column; justify-content: center;
            padding: 0 8%; position: relative;
            opacity: 0; transition: opacity 0.6s ease-out;
        }
        .ppt-slide.visible { opacity: 1; }

        h1, h2, h3 { font-family: 'Outfit', sans-serif; font-weight: 700; letter-spacing: -0.5px; }
        h1 { font-size: 3.5rem; background: linear-gradient(to right, #fff, #94a3b8); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        h2 { font-size: 2.5rem; margin-bottom: 1.5rem; color: white; border-left: 5px solid var(--primary); padding-left: 20px; }
        p, small, li { color: #cbd5e1; } 
        
        .browser-mockup {
            border-radius: 12px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            background: var(--card-bg);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.3s;
        }
        .browser-mockup:hover { transform: translateY(-5px); border-color: rgba(59, 130, 246, 0.5); }
        
        .browser-header {
            background: rgba(0, 0, 0, 0.3);
            padding: 10px 15px;
            display: flex; gap: 6px; align-items: center;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        .dot { width: 8px; height: 8px; border-radius: 50%; }
        .dot-red { background: #ef4444; } .dot-yellow { background: #f59e0b; } .dot-green { background: #22c55e; }
        
        .mock-sidebar { width: 50px; background: rgba(0,0,0,0.2); border-right: 1px solid rgba(255,255,255,0.05); }
        .mock-card { background: rgba(255,255,255,0.05); border-radius: 8px; padding: 12px; border: 1px solid rgba(255,255,255,0.05); }
        .step-badge {
            width: 40px; height: 40px;
            background: linear-gradient(135deg, var(--primary), #2563eb); 
            color: white; border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 1.2rem; margin-bottom: 1rem;
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        }

        .ppt-footer {
            position: fixed; bottom: 0; left: 0; width: 100%; padding: 15px 40px;
            display: flex; justify-content: space-between; align-items: center;
            background: rgba(15, 23, 42, 0.9); border-top: 1px solid var(--border); z-index: 100;
        }
        .nav-btn {
            background: transparent; border: 1px solid var(--border); color: white;
            width: 35px; height: 35px; border-radius: 50%; transition: 0.2s;
        }
        .nav-btn:hover { background: var(--primary); border-color: var(--primary); }

        .fade-in-up { animation: fadeInUp 0.8s forwards; opacity: 0; }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .d-1 { animation-delay: 0.1s; } .d-2 { animation-delay: 0.2s; } .d-3 { animation-delay: 0.3s; }
        
        .glass-card-simple {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border);
            border-radius: 16px; padding: 1.5rem;
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body>

    <div class="bg-mesh"></div>

    <div class="slides-wrapper" id="slider">

        <section class="ppt-slide visible" id="slide-1">
            <div class="row align-items-center">
                <div class="col-lg-10">
                    <div class="fade-in-up">
                        <span class="badge border border-primary text-primary px-3 py-2 mb-4 rounded-pill">SIDANG SKRIPSI</span>
                    </div>
                    <h1 class="fade-in-up d-1 mb-3 lh-sm">
                        CyberCareer : <br>
                        <span class="text-primary">Sistem Pengelolaan Magang Berbasis Web</span>
                    </h1>
                    <p class="fs-4 text-white-50 mb-5 fade-in-up d-2 fw-dark">
                        Studi Kasus: Optimalisasi Program CLP (3+1) di Cyber University
                    </p>
                    <div class="d-flex gap-5 fade-in-up d-3">
                        <div>
                            <small class="text-white text-uppercase d-block mb-1">Disusun Oleh</small>
                            <h5 class="text-white mb-0">Talitha Khansa Fahira</h5>
                            <span class="font-monospace text-accent">NIM: 12230004</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ppt-slide" id="slide-2">
            <h2 class="fade-in-up">Latar Belakang Masalah</h2>
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 fade-in-up d-1">
                    <div class="p-4 border border-secondary rounded-4 bg-white bg-opacity-5">
                        <h4 class="text-white mb-3">Program 3+1 (CLP)</h4>
                        <p class="mb-0 text-white-50">
                            Kewajiban magang industri selama <b>1 tahun (Semester 6 & 7)</b> membutuhkan sistem monitoring yang handal.
                        </p>
                    </div>
                </div>
                <div class="col-lg-7 fade-in-up d-2">
                    <ul class="list-unstyled d-grid gap-3">
                        <li class="d-flex gap-3 align-items-center text-white-50">
                            <i class="bi bi-x-circle-fill text-danger fs-4"></i> Informasi lowongan dan mitra tidak terpusat.
                        </li>
                        <li class="d-flex gap-3 align-items-center text-white-50">
                            <i class="bi bi-x-circle-fill text-danger fs-4"></i> Monitoring logbook manual tidak efisien.
                        </li>
                        <li class="d-flex gap-3 align-items-center text-white-50">
                            <i class="bi bi-x-circle-fill text-danger fs-4"></i> Data riwayat alumni sulit diakses.
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="ppt-slide" id="slide-3">
            <div class="row align-items-center">
                <div class="col-lg-5 fade-in-up d-1">
                    <div class="step-badge">1</div>
                    <h3 class="fw-bold text-white mb-3">Dashboard Pintar</h3>
                    <p class="text-white-50">Mahasiswa dapat memantau status magang secara <i>real-time</i>. Sistem secara otomatis menghitung konversi SKS berdasarkan progres magang.</p>
                </div>
                <div class="col-lg-7 fade-in-up d-2">
                    <div class="browser-mockup">
                        <div class="browser-header">
                            <div class="dot dot-red"></div><div class="dot dot-yellow"></div><div class="dot dot-green"></div>
                            <div class="ms-auto small text-white-50 font-monospace">dashboard.php</div>
                        </div>
                        <div class="d-flex" style="height: 280px;">
                            <div class="mock-sidebar d-flex flex-column align-items-center py-3 gap-2">
                                <div class="bg-primary rounded-circle" style="width: 20px; height: 20px;"></div>
                                <div class="bg-white bg-opacity-10 rounded" style="width: 20px; height: 20px;"></div>
                            </div>
                            <div class="p-3 flex-grow-1">
                                <div class="d-flex justify-content-between mb-3">
                                    <div><h6 class="fw-bold mb-0 text-white">Halo, Mahasiswa!</h6><small class="text-white-50" style="font-size:10px">Sistem Informasi</small></div>
                                    <div class="badge bg-primary bg-opacity-20 text-primary pt-2" style="height:fit-content">Aktif</div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-8">
                                        <div class="mock-card h-100">
                                            <small class="text-white-50" style="font-size: 9px;">POSISI</small>
                                            <h6 class="text-white my-1" style="font-size:14px">Web Developer Intern</h6>
                                            <div class="progress bg-dark mt-2" style="height: 4px;"><div class="progress-bar bg-success" style="width: 60%"></div></div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mock-card h-100 text-center bg-primary bg-opacity-10 border-primary border-opacity-25">
                                            <h4 class="fw-bold mb-0 text-white">20</h4>
                                            <small class="text-info" style="font-size: 9px;">SKS</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ppt-slide" id="slide-4">
            <div class="row align-items-center">
                <div class="col-lg-7 order-2 order-lg-1 fade-in-up d-2">
                    <div class="browser-mockup">
                        <div class="browser-header">
                            <div class="dot dot-red"></div><div class="dot dot-yellow"></div><div class="dot dot-green"></div>
                            <div class="ms-auto small text-white-50 font-monospace">logbook.php</div>
                        </div>
                        <div class="p-4">
                            <div class="mock-card p-3">
                                <div class="d-flex justify-content-between mb-3">
                                    <h6 class="fw-bold text-white mb-0"><i class="bi bi-pencil-fill text-warning me-2"></i>Input Kegiatan</h6>
                                    <small class="text-white-50"><?= date('d M') ?></small>
                                </div>
                                <div class="p-2 rounded bg-dark border border-secondary border-opacity-25 text-white-50 small mb-3">
                                    "Melakukan deployment aplikasi ke server production dan testing API..."
                                </div>
                                <div class="d-flex gap-2">
                                    <div class="btn btn-sm btn-outline-secondary text-light rounded-pill px-3" style="font-size:10px; border-color:rgba(255,255,255,0.2)"><i class="bi bi-paperclip"></i> Bukti.jpg</div>
                                    <div class="btn btn-sm btn-primary ms-auto rounded-pill px-3" style="font-size:10px">Simpan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 ps-lg-5 fade-in-up d-1">
                    <div class="step-badge">2</div>
                    <h3 class="fw-bold text-white mb-3">Logbook Digital</h3>
                    <p class="text-white-50">Pengganti laporan kertas. Mahasiswa mengisi kegiatan harian & bukti foto. Dosen pembimbing dapat melakukan <b>Approval</b> dan memberi feedback secara online.</p>
                </div>
            </div>
        </section>

        <section class="ppt-slide" id="slide-5">
            <div class="row align-items-center">
                <div class="col-lg-5 fade-in-up d-1">
                    <div class="step-badge">3</div>
                    <h3 class="fw-bold text-white mb-3">Riwayat & Portofolio</h3>
                    <p class="text-white-50">Seluruh jejak rekam magang tersimpan abadi. Data ini menjadi portofolio mahasiswa dan dapat diakses dosen sebagai referensi <b>Curriculum Vitae (CV)</b>.</p>
                </div>
                <div class="col-lg-7 fade-in-up d-2">
                    <div class="browser-mockup">
                        <div class="browser-header">
                            <div class="dot dot-red"></div><div class="dot dot-yellow"></div><div class="dot dot-green"></div>
                            <div class="ms-auto small text-white-50 font-monospace">profil.php</div>
                        </div>
                        <div class="p-4">
                            <div class="mock-card mb-2 d-flex align-items-center gap-3">
                                <div class="bg-white p-1 rounded d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                    <img src="<?= base_url('assets/img/BRI.svg') ?>" class="img-fluid">
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold text-white" style="font-size:14px">Mobile App Intern</h6>
                                    <small class="text-white-50" style="font-size:10px">Bank Rakyat Indonesia</small>
                                </div>
                                <span class="badge bg-success bg-opacity-20 text-success ms-auto rounded-pill" style="font-size:9px">Selesai</span>
                            </div>
                            
                            <div class="mock-card d-flex align-items-center gap-3 opacity-50">
                                <div class="bg-white p-1 rounded d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                    <img src="<?= base_url('assets/img/Tokopedia.png') ?>" class="img-fluid">
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold text-white" style="font-size:14px">UI/UX Designer</h6>
                                    <small class="text-white-50" style="font-size:10px">Tokopedia</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ppt-slide" id="slide-6">
            <h2 class="fade-in-up">Kesimpulan & Peran Admin</h2>
            <div class="row g-4 mt-2">
                <div class="col-lg-6 fade-in-up d-1">
                    <div class="glass-card-simple h-100">
                        <h5 class="text-white mb-3"><i class="bi bi-shield-lock text-danger me-2"></i>Admin Dashboard</h5>
                        <ul class="list-unstyled text-white-50 small mb-0 d-grid gap-2">
                            <li><i class="bi bi-check2 text-success me-2"></i> Validasi Mitra Baru.</li>
                            <li><i class="bi bi-check2 text-success me-2"></i> Monitoring Statistik Global (Grafik).</li>
                            <li><i class="bi bi-check2 text-success me-2"></i> Manajemen User (Dosen/Mhs).</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 fade-in-up d-2">
                    <div class="glass-card-simple h-100" style="background: rgba(59, 130, 246, 0.1); border-color: rgba(59,130,246,0.3);">
                        <h5 class="text-white mb-3">Dampak Sistem</h5>
                        <p class="text-white-50 small">
                            "CyberCareer berhasil mendigitalisasi proses CLP, meningkatkan efisiensi monitoring dosen, dan menyediakan data terpusat yang valid bagi universitas."
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="ppt-slide" id="slide-7">
            <div class="text-center w-100">
                <div class="fade-in-up d-1">
                    <div class="d-inline-block p-5 rounded-circle bg-white bg-opacity-5 border border-white border-opacity-10 mb-5 shadow-lg">
                        <i class="bi bi-laptop display-1 text-white"></i>
                    </div>
                </div>
                <h2 class="display-3 mb-4 fade-in-up d-2 fw-bold text-white">Live Demo</h2>
                <p class="mb-5 fade-in-up d-3 text-white-50">Simulasi langsung aplikasi CyberCareer.</p>
                
                <a href="<?= base_url('home/landing') ?>" class="btn btn-primary btn-lg rounded-pill px-5 py-3 fw-bold shadow-lg fade-in-up d-3 hover-scale">
                    <i class="bi bi-play-circle me-2"></i> Mulai Demo
                </a>
            </div>
        </section>

    </div>

    <div class="ppt-footer">
        <div class="text-white fw-bold font-monospace small">
            SLIDE <span id="currentSlide">1</span> / <span id="totalSlides">7</span>
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
        document.getElementById('totalSlides').innerText = slides.length;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const index = Array.from(slides).indexOf(entry.target) + 1;
                    document.getElementById('currentSlide').innerText = index;
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

        function nextSlide() { slider.scrollBy({ top: window.innerHeight, behavior: 'smooth' }); }
        function prevSlide() { slider.scrollBy({ top: -window.innerHeight, behavior: 'smooth' }); }

        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowDown' || e.key === 'ArrowRight' || e.key === ' ') nextSlide();
            else if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') prevSlide();
        });
    </script>
</body>
</html>