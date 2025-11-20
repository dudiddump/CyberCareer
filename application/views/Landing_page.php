<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?? 'CyberCareer - Gerbang Karier Masa Depan' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <style>
        :root {
            --color-blue: #1d4ed8;
            --color-orange: #f97316;
            --color-soft-white: #f7f9fc;
            --color-navy-dark: #0a1a2f;
            --color-card-dark: #102a4c;
        }

        body {
            font-family: "Poppins", sans-serif;
            background: var(--color-soft-white);
            color: #222;
            transition: background 0.3s, color 0.3s;
        }

        .font-grotesk { font-family: "Manrope", sans-serif; }

        .navbar-custom {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            transition: background 0.3s;
        }

        #progress-bar {
            position: fixed; top: 0; left: 0; height: 4px; width: 0%;
            background: linear-gradient(to right, var(--color-blue), var(--color-orange));
            z-index: 2000;
        }

        body.dark {
            background: var(--color-navy-dark);
            color: #d6d6d6;
        }
        body.dark .navbar-custom { background: rgba(10, 26, 47, 0.85); }
        body.dark .card { background: var(--color-card-dark); color: #fff; border: none; }
        body.dark .text-primary { color: #60A5FA !important; }
        body.dark section.bg-light { background-color: #0d213a !important; }

        .btn-orange { background: var(--color-orange); color: white; border: none; }
        .btn-orange:hover { background: #ea580c; color: white; }
        footer { background: #050e1a; color: #fff; }
        #scrollTop { display: none; z-index: 999; }
    </style>
</head>

<body class="<?= ($this->session->userdata('theme') == 'dark') ? 'dark' : '' ?>">

    <div id="progress-bar"></div>

    <?php $this->load->view('partials/switch_theme'); ?>

    <nav class="navbar navbar-expand-lg navbar-custom shadow-sm fixed-top py-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3 font-grotesk text-primary" href="#">CyberCareer</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav mx-auto gap-3 fw-semibold">
                    <li class="nav-item"><a class="nav-link" href="#why">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#mitra">Mitra</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimoni">Testimoni</a></li>
                </ul>
                <a href="<?= base_url('auth/login') ?>" class="btn btn-orange px-4 py-2 rounded-pill fw-bold shadow-sm">
                    Masuk
                </a>
            </div>
        </div>
    </nav>

    <section class="position-relative text-white d-flex align-items-center justify-content-center"
        style="background: url('<?= base_url('assets/Cyber-University.jpg') ?>') center/cover no-repeat; min-height: 100vh;">
        
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0, 0, 0, 0.6);"></div>

        <div class="container position-relative text-center pt-5">
            <img src="<?= base_url('assets/logo-CU.png') ?>" height="100" class="mb-4" data-aos="zoom-in" alt="Cyber University">

            <h1 class="fw-bold display-4 mb-3 font-grotesk" data-aos="fade-up">
                Gerbang Menuju <br />
                <span class="text-primary">Karier Impianmu</span>
            </h1>

            <p class="mx-auto mb-5 fs-5 text-white-50" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="100">
                Platform karier terintegrasi untuk mahasiswa, dosen, dan alumni Cyber University.
            </p>

            <a href="<?= base_url('auth/login') ?>" class="btn btn-orange btn-lg px-5 py-3 rounded-pill fw-bold" data-aos="fade-up" data-aos-delay="200">
                Login Mahasiswa / Dosen
            </a>
        </div>
    </section>

    <section id="why" class="py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5" data-aos="fade-right">
                    <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?q=80&w=1887" class="img-fluid rounded-4 shadow-lg" alt="Teamwork">
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <h2 class="fw-bold mb-4 font-grotesk">Apa itu <span class="text-primary">CyberCareer?</span></h2>
                    <p class="lead mb-4">Platform resmi yang menjembatani mahasiswa Cyber University dengan dunia industri secara profesional.</p>

                    <?php 
                    $features = [
                        ['icon' => '🔍', 'title' => 'Pencarian Terpusat', 'desc' => 'Lowongan magang terverifikasi & aman.'],
                        ['icon' => '📝', 'title' => 'Digital Logbook', 'desc' => 'Pelaporan kegiatan magang yang transparan.'],
                        ['icon' => '🎓', 'title' => 'Karier Lulusan', 'desc' => 'Jalur cepat kerja bagi fresh graduate.']
                    ];
                    foreach($features as $f): 
                    ?>
                    <div class="d-flex gap-3 mb-4">
                        <div class="d-flex align-items-center justify-content-center fs-4 rounded bg-primary bg-opacity-10 text-primary" style="width: 60px; height: 60px;">
                            <?= $f['icon'] ?>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1"><?= $f['title'] ?></h5>
                            <p class="text-muted mb-0"><?= $f['desc'] ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="mitra" class="py-5 bg-light">
        <div class="container text-center py-5">
            <h2 class="fw-bold mb-5 font-grotesk">Mitra Industri Kami</h2>
            <div class="row g-4 justify-content-center">
                <?php 
                $logos = ['BRI.svg','IBM.webp','DQS.png','Fintech_Indonesia.webp','Meta4sec.png','Allobank.png','BSSN.png']; 
                foreach ($logos as $img): ?>
                    <div class="col-6 col-md-3 col-lg-2">
                        <div class="card p-3 shadow-sm h-100 d-flex align-items-center justify-content-center border-0 hover-up">
                            <img src="<?= base_url('assets/'.$img) ?>" class="img-fluid" style="max-height: 50px; object-fit: contain;" alt="Mitra">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <p class="mt-5 fw-semibold text-primary">Dan masih banyak lagi 🚀</p>
        </div>
    </section>

    <section id="testimoni" class="py-5">
        <div class="container py-5 text-center">
            <h2 class="fw-bold mb-5 font-grotesk">Apa Kata Mereka?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card p-4 shadow-sm h-100 border-0">
                        <p class="fst-italic">“CyberCareer mempermudah jalur karier setelah lulus. Sangat membantu!”</p>
                        <h6 class="fw-bold text-primary mt-3">Andi — Alumni 2023</h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 shadow-sm h-100 border-0">
                        <p class="fst-italic">“Bimbingan dosen jadi lebih cepat dan efisien karena sistem logbook digital.”</p>
                        <h6 class="fw-bold text-warning mt-3">Siti — Mahasiswa 2024</h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 shadow-sm h-100 border-0">
                        <p class="fst-italic">“Integrasi datanya rapi, monitoring mahasiswa magang jadi mudah.”</p>
                        <h6 class="fw-bold text-info mt-3">Budi — Dosen Pembimbing</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-5 text-center border-top border-secondary">
        <div class="container">
            <h4 class="fw-bold mb-3 font-grotesk">CyberCareer</h4>
            <p class="text-secondary mb-4">&copy; 2025 Cyber University. All rights reserved.</p>
            <small class="text-secondary">Dikembangkan oleh <b>Talitha Khansa</b></small>
        </div>
    </footer>

    <button id="scrollTop" class="btn btn-primary rounded-circle position-fixed bottom-0 end-0 m-4 p-3 shadow">
        ⬆
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });

        // Progress Bar
        window.addEventListener("scroll", () => {
            let scrollTop = document.documentElement.scrollTop;
            let scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            let progress = (scrollTop / scrollHeight) * 100;
            document.getElementById("progress-bar").style.width = progress + "%";
            
            document.getElementById("scrollTop").style.display = scrollTop > 300 ? "block" : "none";
        });

        document.getElementById("scrollTop").addEventListener("click", () => {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    </script>
</body>
</html>