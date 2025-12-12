    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - CyberCareer</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <style>
            :root {
                --color-navy-dark: #0a1a2f;
                --color-card-dark: #102a4c;
            }
            body {
                background-color: #f2f4f8;
                font-family: 'Poppins', sans-serif;
                transition: background 0.3s;
            }
            .card { border: none; border-radius: 16px; }
            .btn-back {
                position: absolute;
                top: 20px;
                left: 20px;
                text-decoration: none;
                color: var(--color-navy-dark);
                font-weight: 500;
                display: flex;
                align-items: center;
                gap: 8px;
                transition: all 0.3s ease;
                z-index: 10;
            }
            .btn-back:hover {
                transform: translateX(-5px);
                color: #0d6efd; 
            }
            
            body.dark { background-color: var(--color-navy-dark); color: #fff; }
            body.dark .card { background-color: var(--color-card-dark); color: #fff; }
            body.dark .form-control { background-color: #1d3b5e; border-color: #2d4b73; color: #fff; }
            body.dark .form-control::placeholder { color: #aab4be; }
            body.dark .text-muted { color: #a0aec0 !important; }
            body.dark .btn-back { color: #aab4be; }
            body.dark .btn-back:hover { color: #fff; }
        </style>
    </head>

    <body class="d-flex align-items-center justify-content-center vh-100 <?= ($this->session->userdata('theme') == 'dark') ? 'dark' : '' ?>">

    <a href="<?= base_url() ?>" class="btn-back">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
        <?php $this->load->view('partials/switch_theme'); ?>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 col-lg-4">
                    <div class="card shadow-lg p-4">
                        <div class="text-center mb-4">
                            <img src="<?= base_url('assets/logo-CU.png') ?>" alt="Logo" class="img-fluid mb-3" style="height: 70px;">
                            <h4 class="fw-bold">Selamat Datang</h4>
                            <p class="text-muted small">Silakan masuk menggunakan akun Cyber University.</p>
                        </div>

                        <?php if($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger py-2 text-center small rounded-3">
                                <?= $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('auth/process_login') ?>" method="POST">
                            <div class="mb-3">
                                <label for="id" class="form-label fw-medium small">NIM / NIDN</label>
                                <input type="text" class="form-control py-2" id="id" name="id" placeholder="Nomor Induk" required>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label fw-medium small">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control py-2" id="password" name="password" placeholder="Kata sandi" required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i id="iconEye" class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold rounded-3">Masuk</button>
                            
                            <div class="text-center mt-3">
                                <a href="#" class="text-decoration-none small text-muted">Lupa password?</a>
                            </div>
                        </form>
                    </div>
                    
                    <div class="text-center mt-4 text-muted small">
                        &copy; 2025 Cyber University
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.getElementById("togglePassword").addEventListener("click", function() {
                const passInput = document.getElementById("password");
                const icon = document.getElementById("iconEye");
                
                if (passInput.type === "password") {
                    passInput.type = "text";
                    icon.classList.replace("bi-eye", "bi-eye-slash");
                } else {
                    passInput.type = "password";
                    icon.classList.replace("bi-eye-slash", "bi-eye");
                }
            });
        </script>
    </body>
    </html>