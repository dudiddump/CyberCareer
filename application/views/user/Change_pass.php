<div class="modal-body p-4">
    
    <?= form_open_multipart('user/update_profil') ?>
        
        <div class="row g-3">
            <div class="col-12 text-center mb-3">
                 <img src="<?= $user->foto ? base_url('uploads/foto/'.$user->foto) : base_url('assets/img/default-avatar.png') ?>" 
                      class="rounded-circle mb-2 object-fit-cover shadow-sm" width="100" height="100">
                 <br>
                 <label class="btn btn-sm btn-outline-primary rounded-pill cursor-pointer px-3 mt-2">
                     <i class="bi bi-camera me-1"></i> Ganti Foto
                     <input type="file" name="foto" class="d-none" accept="image/png, image/jpeg, image/jpg">
                 </label>
                 <div class="form-text small">Maks 2MB (JPG/PNG). Biarkan kosong jika tidak diganti.</div>
            </div>

            <div class="col-md-6">
                <label class="form-label small fw-bold text-muted">Nama Lengkap</label>
                <input type="text" class="form-control input-modern bg-light" value="<?= $user->nama_lengkap ?>" readonly>
            </div>
            
            <div class="col-md-6">
                <label class="form-label small fw-bold text-muted">NIM</label>
                <input type="text" class="form-control input-modern bg-light" value="<?= $user->id ?>" readonly>
            </div>

            <div class="col-md-6">
                <label class="form-label small fw-bold text-muted">IPK Terakhir</label>
                <input type="number" step="0.01" name="ipk_terakhir" class="form-control input-modern" value="<?= $user->ipk_terakhir ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label small fw-bold text-muted">Nomor Telepon / WA</label>
                <input type="text" name="telepon" class="form-control input-modern" value="<?= $user->telepon ?>" placeholder="0812...">
            </div>

            <div class="col-12">
                <label class="form-label small fw-bold text-muted">Tentang Saya</label>
                <textarea name="tentang_saya" class="form-control input-modern" rows="3" placeholder="Deskripsi singkat diri Anda..."><?= $user->tentang_saya ?></textarea>
            </div>

            <div class="col-12 border-top pt-3 mt-2">
                <label class="form-label small fw-bold text-primary mb-2">Tautan Profil</label>
                <div class="row g-2">
                    <div class="col-md-4">
                        <input type="text" name="website" class="form-control input-modern" placeholder="Web Personal" value="<?= $user->website ?>">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="linkedin" class="form-control input-modern" placeholder="Link LinkedIn" value="<?= $user->linkedin ?>">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="github" class="form-control input-modern" placeholder="Link GitHub" value="<?= $user->github ?>">
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">
                 <label class="form-label small fw-bold text-muted">Update CV (PDF/DOC)</label>
                 <input type="file" name="file_cv" class="form-control input-modern" accept=".pdf,.doc,.docx">
                 <div class="form-text small">Maks 5MB. Biarkan kosong jika tidak diganti.</div>
            </div>
            
            <div class="col-12 text-end mt-4 pt-3 border-top">
                 <button type="button" class="btn btn-light border rounded-pill me-2" data-bs-dismiss="modal">Batal</button>
                 <button type="submit" class="btn btn-primary px-4 rounded-pill fw-bold">Simpan Profil</button>
            </div>
        </div>
    <?= form_close() ?>

    <div class="mt-4 pt-3 border-top">
         <button type="button" class="btn btn-sm btn-outline-danger w-100 text-start d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#collapsePass">
             <span><i class="bi bi-key me-2"></i>Ganti Password</span>
             <i class="bi bi-chevron-down"></i>
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
                        <input type="password" name="confirm_password" class="form-control input-modern" placeholder="Ulangi Password Baru" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-sm btn-dark rounded-pill px-4">Update Password</button>
                    </div>
                <?= form_close() ?>
            </div>
         </div>
    </div>

</div>