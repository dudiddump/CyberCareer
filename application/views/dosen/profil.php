<div class="p-4">
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-dark mb-0">Profil Dosen</h2>
        <p class="text-muted mb-0 small">Kelola informasi pribadi dan kontak.</p>
    </div>
    <button class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalEditProfil">
        <i class="bi bi-pencil-square me-2"></i>Edit Profil
    </button>
</div>

<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i><?= $this->session->flashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>
<?php if($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
        <i class="bi bi-exclamation-circle-fill me-2"></i><?= $this->session->flashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>
<?php if($this->session->flashdata('error_pass')): ?>
    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
        <i class="bi bi-key-fill me-2"></i><?= $this->session->flashdata('error_pass') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="card card-modern text-center p-4 h-100 position-relative overflow-hidden">
            <div class="position-absolute top-0 start-0 w-100" style="height: 110px; background: linear-gradient(135deg, #0f172a, #334155);">
                <div style="opacity: 0.3; height: 100%;"></div>
            </div>
            
            <div class="position-relative mt-4">
                <div class="d-inline-block p-1 bg-white rounded-circle shadow-sm">
                    <img src="<?= $user->foto ? base_url('uploads/foto/'.$user->foto) : base_url('assets/img/default-avatar.png') ?>" 
                         class="rounded-circle border border-3 border-white object-fit-cover" 
                         width="130" height="130">
                </div>
                
                <h4 class="fw-bold text-dark mt-3 mb-1"><?= $user->nama_lengkap ?></h4>
                <div class="text-muted small mb-2">NIDN: <?= $user->id ?></div>
                
                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1 border border-primary border-opacity-25">
                    Dosen Tetap
                </span>
            </div>
            
            <div class="mt-4 pt-3 border-top">
                <div class="small text-muted mb-1">PROGRAM STUDI</div>
                <div class="fw-bold text-dark"><?= $user->prodi ?></div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card card-modern p-4 h-100">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-info bg-opacity-10 p-2 rounded me-3 text-info"><i class="bi bi-person-lines-fill fs-5"></i></div>
                <h6 class="fw-bold text-dark mb-0">Informasi Kontak & Alamat</h6>
            </div>
            
            <div class="row g-4">
                <div class="col-md-6">
                    <small class="text-muted d-block mb-1 fw-bold" style="font-size: 11px;">EMAIL</small>
                    <div class="fw-bold text-primary"><?= $user->email ? $user->email : '-' ?></div>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block mb-1 fw-bold" style="font-size: 11px;">NO. TELEPON</small>
                    <div class="fw-bold text-dark"><?= $user->telepon ? $user->telepon : '-' ?></div>
                </div>
                <div class="col-12">
                    <small class="text-muted d-block mb-1 fw-bold" style="font-size: 11px;">WEBSITE / PORTFOLIO</small>
                    <div class="fw-bold text-dark">
                        <?php if($user->website): ?>
                            <a href="<?= $user->website ?>" target="_blank" class="text-decoration-none"><?= $user->website ?> <i class="bi bi-box-arrow-up-right ms-1 small"></i></a>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-12">
                    <small class="text-muted d-block mb-1 fw-bold" style="font-size: 11px;">ALAMAT LENGKAP</small>
                    <div class="p-3 bg-light rounded border text-muted small">
                        <?= $user->alamat ? nl2br($user->alamat) : 'Belum dilengkapi.' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditProfil" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg card-modern">
            <div class="modal-header border-bottom pb-3">
                <h5 class="modal-title fw-bold text-dark">Edit Profil Dosen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
    
    <?= form_open_multipart('dosen/update_profil', ['id' => 'formProfil']) ?>
        <div class="row g-3">
            <div class="col-12 text-center mb-3">
                 <img id="previewFoto" src="<?= $user->foto ? base_url('uploads/foto/'.$user->foto) : base_url('assets/img/default-avatar.png') ?>" 
                      class="rounded-circle mb-2 object-fit-cover shadow-sm" width="100" height="100">
                 <br>
                 
                 <label class="btn btn-sm btn-outline-primary rounded-pill cursor-pointer px-3 mt-2 position-relative">
                     <i class="bi bi-camera me-1"></i> Ganti Foto
                     <input type="file" name="foto" class="d-none" accept="image/jpeg, image/png" onchange="previewImage(this)">
                 </label>
                 <div class="small text-muted mt-1" style="font-size: 10px;">Maks. 2MB (JPG/PNG)</div>
            </div>

            <div class="col-md-6">
                <label class="form-label small fw-bold text-muted">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control input-modern" value="<?= $user->nama_lengkap ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label small fw-bold text-muted">NIDN (Read-only)</label>
                <input type="text" class="form-control input-modern bg-light" value="<?= $user->id ?>" readonly>
            </div>

            <div class="col-md-6">
                <label class="form-label small fw-bold text-muted">No. Telepon</label>
                <input type="text" name="telepon" class="form-control input-modern" value="<?= $user->telepon ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label small fw-bold text-muted">Website</label>
                <input type="text" name="website" class="form-control input-modern" value="<?= $user->website ?>">
            </div>

            <div class="col-12">
                <label class="form-label small fw-bold text-muted">Alamat</label>
                <textarea name="alamat" class="form-control input-modern" rows="3"><?= $user->alamat ?></textarea>
            </div>
            
            <div class="col-12 text-end mt-4 pt-3 border-top">
                 <button type="button" class="btn btn-light border rounded-pill me-2" data-bs-dismiss="modal">Batal</button>
                 <button type="submit" class="btn btn-primary px-4 rounded-pill fw-bold">Simpan Profil</button>
            </div>
        </div>
    <?= form_close() ?>
    <div class="mt-4 pt-3 border-top">
          <button type="button" class="btn btn-sm btn-outline-danger w-100 text-start d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#collapsePass">
              <span><i class="bi bi-key me-2"></i>Ganti Password</span> <i class="bi bi-chevron-down"></i>
          </button>
          
          <div class="collapse mt-3" id="collapsePass">
             <div class="card card-modern p-3 bg-light border">
                <?= form_open('user/process_change_password') ?>
                    <div class="mb-2">
                        <input type="password" name="old_password" class="form-control input-modern" placeholder="Password Lama" required>
                    </div>
                    <div class="mb-2">
                        <input type="password" name="new_password" class="form-control input-modern" placeholder="Password Baru" required>
                    </div>
                    <div class="mb-2">
                        <input type="password" name="confirm_password" class="form-control input-modern" placeholder="Ulangi Password" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-sm btn-dark rounded-pill px-4">Update Password</button>
                    </div>
                <?= form_close() ?>
             </div>
          </div>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewFoto').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>