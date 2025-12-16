<div id="sidebar-overlay"></div>

<div id="sidebar-wrapper" class="d-flex flex-column">
    
    <div class="p-4 mb-2">
        <div class="d-md-none position-absolute top-0 end-0 p-3">
            <button class="btn-close" id="sidebarClose" aria-label="Close"></button>
        </div>

        <div class="d-flex align-items-center gap-2">
            <img src="<?= base_url('assets/logo-CU.png') ?>" class="rounded-3 shadow-sm object-fit-cover" style="width: 40px; height: 40px;" alt="Logo">
            <div>
                <h5 class="fw-bold text-dark mb-0">CyberCareer</h5>
                <small class="text-muted" style="font-size: 11px;">Mahasiswa Panel</small>
            </div>
        </div>
    </div>

    <ul class="nav nav-pills flex-column px-3 mb-auto" style="overflow-y: auto;">
        
        <li class="nav-item">
            <a href="<?= base_url('mahasiswa/dashboard') ?>" class="nav-link <?= ($this->uri->segment(2) == 'dashboard') ? 'active' : '' ?> d-flex align-items-center gap-3">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        
        <li class="nav-label text-uppercase text-muted small fw-bold mt-4 mb-2 px-3" style="font-size: 11px; letter-spacing: 1px;">Magang</li>
        
        <li class="nav-item">
            <a href="<?= base_url('mahasiswa/mitra') ?>" class="nav-link <?= ($this->uri->segment(2) == 'mitra' || $this->uri->segment(2) == 'detail_mitra') ? 'active' : '' ?> d-flex align-items-center gap-3">
                <i class="bi bi-buildings-fill"></i>
                <span>Lowongan & Mitra</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= base_url('mahasiswa/logbook') ?>" class="nav-link <?= ($this->uri->segment(2) == 'logbook') ? 'active' : '' ?> d-flex align-items-center gap-3">
                <i class="bi bi-journal-text"></i>
                <span>Logbook</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= base_url('mahasiswa/riwayat') ?>" class="nav-link <?= ($this->uri->segment(2) == 'riwayat') ? 'active' : '' ?> d-flex align-items-center gap-3">
                <i class="bi bi-clock-history"></i>
                <span>Riwayat</span>
            </a>
        </li>

        <li class="nav-label text-uppercase text-muted small fw-bold mt-4 mb-2 px-3" style="font-size: 11px; letter-spacing: 1px;">Akun</li>

        <li class="nav-item">
            <a href="<?= base_url('mahasiswa/profil') ?>" class="nav-link <?= ($this->uri->segment(2) == 'profil') ? 'active' : '' ?> d-flex align-items-center gap-3">
                <i class="bi bi-person-circle"></i>
                <span>Profil Saya</span>
            </a>
        </li>
    </ul>

    <div class="p-3 mt-auto border-top">
        <div class="card-modern p-2 px-3 bg-light border-0 d-flex align-items-center justify-content-between mb-3">
            <div class="d-flex align-items-center gap-2 text-muted">
                <i id="themeIcon" class="bi <?= ($this->session->userdata('theme') == 'dark') ? 'bi-moon-stars-fill' : 'bi-sun-fill' ?>"></i>
                <small class="fw-bold"><?= ($this->session->userdata('theme') == 'dark') ? 'Dark' : 'Light' ?></small>
            </div>
            <div class="form-check form-switch mb-0">
                <input class="form-check-input" type="checkbox" role="switch" id="themeToggle" style="cursor: pointer;" <?= ($this->session->userdata('theme') == 'dark') ? 'checked' : '' ?>>
            </div>
        </div>

        <div class="d-flex align-items-center gap-3 mb-3 px-1">
            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center text-primary fw-bold border border-primary" style="width: 35px; height: 35px;">
                <?= substr($this->session->userdata('nama') ?? 'M', 0, 1) ?>
            </div>
            <div style="line-height: 1.2; overflow: hidden;">
                <div class="fw-bold text-dark text-truncate" style="max-width: 110px; font-size: 0.9rem;">
                    <?= $this->session->userdata('nama') ?? 'Mahasiswa' ?>
                </div>
            </div>
        </div>
        
        <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger w-100 btn-sm rounded-pill fw-bold">
            <i class="bi bi-box-arrow-right me-2"></i>Logout
        </a>
    </div>

</div> 
<div id="page-content-wrapper">

    <nav class="navbar navbar-light bg-white border-bottom shadow-sm d-md-none sticky-top px-3 py-2 mb-4">
        <div class="d-flex align-items-center gap-2">
            <img src="<?= base_url('assets/logo-CU.png') ?>" width="32" height="32" class="rounded" alt="Logo">
            <span class="fw-bold text-dark">CyberCareer</span>
        </div>
        <button class="btn btn-light border text-primary" id="sidebarToggle">
            <i class="bi bi-list fs-4"></i>
        </button>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('sidebarToggle');
            const closeBtn = document.getElementById('sidebarClose');
            const overlay = document.getElementById('sidebarOverlay');
            const body = document.body;

            function toggleMenu() {
                body.classList.toggle('sb-sidenav-toggled');
            }

            if(toggleBtn) toggleBtn.addEventListener('click', function(e){
                e.preventDefault();
                toggleMenu();
            });
            if(closeBtn) closeBtn.addEventListener('click', toggleMenu);
            if(overlay) overlay.addEventListener('click', toggleMenu);
            
            const themeToggle = document.getElementById('themeToggle');
            if(themeToggle) {
                themeToggle.addEventListener('change', function() {
                    window.location.href = "<?= base_url('theme/toggle') ?>";
                });
            }
        });
    </script>