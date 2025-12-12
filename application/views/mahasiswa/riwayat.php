<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-dark mb-0">Riwayat Karier</h2>
    <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-plus-lg me-1"></i> Tambah Pengalaman
    </button>
</div>

<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i><?= $this->session->flashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if(empty($riwayat_list)): ?>
    <div class="card card-modern border-0 shadow-sm py-5 mt-4">
        <div class="card-body text-center">
            <div class="bg-light rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                <i class="bi bi-briefcase fs-1 text-muted opacity-50"></i>
            </div>
            <h5 class="fw-bold text-dark">Belum Ada Pengalaman</h5>
            <p class="text-muted small mb-4">Tambahkan pengalaman magang, kerja praktik, atau freelance kamu disini.</p>
            <button class="btn btn-outline-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalTambah">
                + Tambah Sekarang
            </button>
        </div>
    </div>
<?php else: ?>
    
    <div class="row g-3">
        <?php foreach($riwayat_list as $r): ?>
        <div class="col-12">
            <div class="card card-modern border-0 shadow-sm hover-card transition-all">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        
                        <div class="col-auto">
                            <a href="<?= base_url('mahasiswa/detail_mitra/'.$r->perusahaan_id) ?>">
                                <div class="logo-container bg-white border rounded p-2 shadow-sm" style="width: 64px; height: 64px; display: flex; align-items: center; justify-content: center;">
                                    <img src="<?= $r->logo ? base_url('assets/img/'.$r->logo) : 'https://ui-avatars.com/api/?name='.urlencode($r->nama_perusahaan).'&background=random&size=128' ?>" 
                                         class="img-fluid object-fit-contain" style="max-height: 40px;">
                                </div>
                            </a>
                        </div>

                        <div class="col">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="fw-bold text-dark mb-1"><?= $r->posisi ?></h5>
                                    <div class="fw-medium text-primary mb-1"><?= $r->nama_perusahaan ?></div>
                                    <div class="text-muted small">
                                        <i class="bi bi-geo-alt me-1"></i> <?= $r->lokasi ? $r->lokasi : 'Lokasi tidak ditentukan' ?>
                                    </div>
                                </div>
                                
                                <a href="<?= base_url('mahasiswa/hapus_riwayat/'.$r->id) ?>" class="btn btn-link text-muted p-0" onclick="return confirm('Hapus riwayat ini?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="my-3 border-light-subtle">

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="text-muted small">
                            <i class="bi bi-calendar-range me-2"></i>
                            <span><?= date('M Y', strtotime($r->tgl_mulai)) ?></span>
                            <span class="mx-2">-</span>
                            <span class="fw-bold text-dark">
                                <?= $r->status == 'Aktif' ? 'Saat Ini (Aktif)' : date('M Y', strtotime($r->tgl_selesai)) ?>
                            </span>
                        </div>

                        <?php if($r->status == 'Aktif'): ?>
                            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-10 rounded-pill px-3">
                                Masih Bekerja
                            </span>
                        <?php else: ?>
                            <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-10 rounded-pill px-3">
                                Selesai
                            </span>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-dark">Tambah Pengalaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('mahasiswa/tambah_riwayat') ?>" method="POST">
                <div class="modal-body">
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">POSISI / JABATAN</label>
                        <input type="text" name="posisi" class="form-control" placeholder="Contoh: Web Developer Intern" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">NAMA PERUSAHAAN</label>
                        <input list="listPerusahaan" name="nama_perusahaan" class="form-control" placeholder="Ketik atau pilih perusahaan..." required autocomplete="off">
                        
                        <datalist id="listPerusahaan">
                            <?php foreach($perusahaan_list as $pt): ?>
                                <option value="<?= $pt->nama_perusahaan ?>">
                            <?php endforeach; ?>
                        </datalist>
                        <div class="form-text small text-muted">Jika perusahaan belum ada, ketik saja namanya.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">LOKASI</label>
                        <input type="text" name="lokasi" class="form-control" placeholder="Contoh: Jakarta Selatan (WFH)" required>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-secondary">TANGGAL MULAI</label>
                                <input type="date" name="tgl_mulai" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-secondary">TANGGAL SELESAI</label>
                                <input type="date" name="tgl_selesai" id="inputSelesai" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-check mb-3">
                        <input type="hidden" name="status" value="Selesai">
                        <input class="form-check-input" type="checkbox" id="cekAktif" name="status" value="Aktif">
                        <label class="form-check-label small fw-bold text-dark" for="cekAktif">
                            Saya masih bekerja di posisi ini
                        </label>
                    </div>

                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light rounded-pill" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .hover-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
        border-color: var(--color-primary) !important;
    }
    .transition-all { transition: all 0.3s ease; }

    /* --- MODAL DARK MODE FIX --- */
    body.dark .modal-content {
        background-color: #1e293b;
        color: #f1f5f9;
    }
    body.dark .modal-title, 
    body.dark .form-label, 
    body.dark .form-check-label {
        color: #f1f5f9 !important;
    }
    body.dark .text-secondary {
        color: #94a3b8 !important;
    }
    body.dark .btn-close {
        filter: invert(1) grayscale(100%) brightness(200%);
    }
    body.dark .form-control {
        background-color: #334155;
        border-color: #475569;
        color: white;
    }
    body.dark .form-control:focus {
        background-color: #334155;
        border-color: var(--color-primary);
        color: white;
    }
    /* Fix date input icon color in Webkit browsers */
    body.dark input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(1);
    }
</style>

<script>
    const cekAktif = document.getElementById('cekAktif');
    const inputSelesai = document.getElementById('inputSelesai');

    cekAktif.addEventListener('change', function() {
        if(this.checked) {
            inputSelesai.disabled = true;
            inputSelesai.value = ''; 
            inputSelesai.removeAttribute('required'); 
        } else {
            inputSelesai.disabled = false;
            inputSelesai.setAttribute('required', true); 
        }
    });
</script>