<div class="sidebar-wrapper p-4">
    <div class="d-flex align-items-center gap-2 mb-5 px-2">
        <img src="<?= base_url('assets/logo-CU.png') ?>" class="rounded-3 shadow-sm object-fit-cover" style="width: 40px; height: 40px;" alt="Logo">
        
        <div>
            <h5 class="fw-bold text-dark mb-0">CyberCareer</h5>
            <small class="text-muted" style="font-size: 11px;">Administrator Panel</small>
        </div>
    </div>

    <ul class="nav nav-pills flex-column mb-auto">
        
        <li class="nav-item">
            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= ($this->uri->segment(2) == 'dashboard') ? 'active' : '' ?> d-flex align-items-center gap-3">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        
        <li class="nav-label text-uppercase text-muted small fw-bold mt-4 mb-2 px-3" style="font-size: 11px; letter-spacing: 1px;">Akademik</li>
        
        <li class="nav-item">
            <a href="<?= base_url('admin/mahasiswa') ?>" class="nav-link <?= ($this->uri->segment(2) == 'mahasiswa' || $this->uri->segment(2) == 'detail_mahasiswa') ? 'active' : '' ?> d-flex align-items-center gap-3">
                <i class="bi bi-people-fill"></i>
                <span>Data Mahasiswa</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= base_url('admin/dosen') ?>" class="nav-link <?= ($this->uri->segment(2) == 'dosen') ? 'active' : '' ?> d-flex align-items-center gap-3">
                <i class="bi bi-person-video3"></i>
                <span>Data Dosen</span>
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

    <div class="px-4 mb-3">
        <div class="card-modern p-3 bg-light border-0 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2 text-muted">
                <i id="themeIcon" class="bi <?= ($this->session->userdata('theme') == 'dark') ? 'bi-moon-stars-fill' : 'bi-sun-fill' ?>"></i>
                
                <small class="fw-bold" id="themeLabel">
                    <?= ($this->session->userdata('theme') == 'dark') ? 'Dark Mode' : 'Light Mode' ?>
                </small>
            </div>

            <div class="form-check form-switch mb-0">
                <input class="form-check-input" type="checkbox" role="switch" id="themeToggle" 
                    style="cursor: pointer;"
                    <?= ($this->session->userdata('theme') == 'dark') ? 'checked' : '' ?>>
            </div>
        </div>
    </div>

    <div class="mt-auto pt-4 border-top">
        <div class="d-flex align-items-center gap-3 mb-3 px-2">
            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center text-primary fw-bold border border-primary" style="width: 40px; height: 40px;">
                <?= substr($this->session->userdata('nama_lengkap') ?? 'A', 0, 1) ?>
            </div>
            
            <div style="line-height: 1.2; overflow: hidden;">
                <div class="fw-bold text-dark text-truncate" style="max-width: 120px;">
                    <?= $this->session->userdata('nama_lengkap') ?? 'Administrator' ?>
                </div>
                <small class="text-muted">Super Admin</small>
            </div>
        </div>
        
        <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger w-100 rounded-pill fw-bold shadow-sm">
            <i class="bi bi-box-arrow-right me-2"></i>Logout
        </a>
    </div>
</div>

<div class="main-content w-100">