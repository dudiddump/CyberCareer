<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-dark mb-0">Profil Saya</h2>
        <p class="text-muted mb-0 small">Kelola informasi profil dan dokumen akademik Anda.</p>
    </div>
    <button class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalEditProfil">
        <i class="bi bi-pencil-square me-2"></i>Edit Profil
    </button>
</div>

<div class="row g-4">
    
    <div class="col-lg-4">
        <div class="card card-modern text-center p-4 h-100 position-relative overflow-hidden">
            <div class="position-absolute top-0 start-0 w-100" style="height: 110px; background: linear-gradient(135deg, rgba(29,78,216,0.8), rgba(249,115,22,0.8));">
                <div style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png'); opacity: 0.3; height: 100%;"></div>
            </div>
            
            <div class="position-relative mt-4">
                <div class="d-inline-block p-1 bg-white rounded-circle shadow-sm">
                    <img src="<?= $user->foto ? base_url('uploads/foto/'.$user->foto) : base_url('assets/img/default-avatar.png') ?>" 
                         class="rounded-circle border border-3 border-white object-fit-cover" 
                         width="130" height="130">
                </div>
                
                <h4 class="fw-bold text-dark mt-3 mb-1"><?= $user->nama_lengkap ?></h4>
                <div class="text-muted small mb-2"><?= $user->id ?></div>
                
                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1 border border-success border-opacity-25">
                    Mahasiswa Aktif
                </span>
            </div>

            <div class="row g-2 mt-4 bg-secondary bg-opacity-10 rounded-4 p-3 mx-2 border border-secondary border-opacity-10">
                <div class="col-4 border-end border-secondary border-opacity-25">
                    <h3 class="fw-bolder text-primary mb-0"><?= $user->ipk_terakhir ?? '0.00' ?></h3>
                    <small class="text-muted fw-bold" style="font-size: 10px;">IPK</small>
                </div>
                <div class="col-4 border-end border-secondary border-opacity-25">
                    <h3 class="fw-bolder text-primary mb-0"><?= $semester ?></h3>
                    <small class="text-muted fw-bold" style="font-size: 10px;">SEMESTER</small>
                </div>
                <div class="col-4">
                    <h3 class="fw-bolder text-primary mb-0"><?= substr($user->tahun_masuk, -2) ?></h3> 
                    <small class="text-muted fw-bold" style="font-size: 10px;">ANGKATAN</small>
                </div>
            </div>

            <div class="d-flex justify-content-center gap-3 mt-4 pt-2">
                
                <a href="<?= $user->website ? $user->website : '#' ?>" target="_blank" 
                   class="btn-social <?= $user->website ? 'btn-web' : 'bg-light text-muted opacity-25 pe-none border' ?>" 
                   title="Website">
                   <i class="bi bi-globe"></i>
                </a>

                <a href="<?= $user->github ? $user->github : '#' ?>" target="_blank" 
                   class="btn-social <?= $user->github ? 'btn-github' : 'bg-light text-muted opacity-25 pe-none border' ?>" 
                   title="GitHub">
                   <i class="bi bi-github"></i>
                </a>

                <a href="<?= $user->linkedin ? $user->linkedin : '#' ?>" target="_blank" 
                   class="btn-social <?= $user->linkedin ? 'btn-linkedin' : 'bg-light text-muted opacity-25 pe-none border' ?>" 
                   title="LinkedIn">
                   <i class="bi bi-linkedin"></i>
                </a>

            </div>
        </div>
    </div>

    <div class="col-lg-8">
        
        <div class="card card-modern p-4 mb-4">
            <div class="d-flex align-items-center mb-3">
                <div class="bg-primary bg-opacity-10 p-2 rounded me-3 text-primary"><i class="bi bi-person-vcard fs-5"></i></div>
                <h6 class="fw-bold text-dark mb-0">Tentang Saya</h6>
            </div>
            <p class="text-muted small mb-0" style="line-height: 1.7;">
                <?= $user->tentang_saya ? nl2br($user->tentang_saya) : '<span class="fst-italic opacity-50">Belum ada deskripsi diri.</span>' ?>
            </p>
        </div>

        <div class="card card-modern p-4 mb-4">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-warning bg-opacity-10 p-2 rounded me-3 text-warning"><i class="bi bi-mortarboard fs-5"></i></div>
                <h6 class="fw-bold text-dark mb-0">Informasi Akademik & Kontak</h6>
            </div>
            
            <div class="row g-4">
                <div class="col-md-6">
                    <small class="text-muted d-block mb-1 fw-bold" style="font-size: 11px;">PROGRAM STUDI</small>
                    <div class="fw-bold text-dark"><?= $user->prodi ?></div>
                </div>
                
                <div class="col-md-6">
                    <small class="text-muted d-block mb-1 fw-bold" style="font-size: 11px;">DOSEN PEMBIMBING</small>
                    <div class="fw-bold text-dark d-flex align-items-center">
                        <i class="bi bi-person-check me-2 text-success"></i> <?= $nama_dosen ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block mb-1 fw-bold" style="font-size: 11px;">EMAIL INSTITUSI</small>
                    <div class="fw-bold text-primary"><?= $user->id ?>@cyber-univ.ac.id</div>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block mb-1 fw-bold" style="font-size: 11px;">NOMOR TELEPON</small>
                    <div class="fw-bold text-dark"><?= $user->telepon ? $user->telepon : '-' ?></div>
                </div>
            </div>
        </div>

        <div class="card card-modern p-4">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-danger bg-opacity-10 p-2 rounded me-3 text-danger"><i class="bi bi-folder2-open fs-5"></i></div>
                <h6 class="fw-bold text-dark mb-0">Dokumen Kelengkapan</h6>
            </div>
            
            <div class="doc-item d-flex align-items-center justify-content-between p-3 border rounded mb-3 bg-white shadow-sm transition-all hover-shadow">
                <div class="d-flex align-items-center">
                    <div class="bg-danger bg-opacity-10 p-3 rounded me-3 text-danger">
                        <i class="bi bi-file-earmark-pdf fs-4"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">Curriculum Vitae</div>
                        <?php if($user->file_cv): ?>
                            <small class="text-success d-flex align-items-center gap-1" style="font-size: 10px;">
                                <i class="bi bi-check-circle-fill"></i> Terupload
                            </small>
                        <?php else: ?>
                            <small class="text-danger" style="font-size: 10px;">*Wajib diupload</small>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <?php if($user->file_cv): ?>
                        <a href="<?= base_url('uploads/cv/'.$user->file_cv) ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-4 fw-bold">Lihat</a>
                    <?php else: ?>
                        <button class="btn btn-sm btn-outline-primary rounded-pill px-4 fw-bold" onclick="document.getElementById('btnEditModalTrigger').click()">Upload</button>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="doc-item d-flex align-items-center justify-content-between p-3 border rounded bg-white shadow-sm transition-all hover-shadow">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 p-3 rounded me-3 text-primary">
                        <i class="bi bi-file-earmark-spreadsheet fs-4"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">Transkrip Nilai</div>
                        <small class="text-muted" style="font-size: 10px;">Sinkronisasi SIAKAD</small>
                    </div>
                </div>
                <div>
                    <a href="https://students.cyber-univ.ac.id/login.aspx" target="_blank" class="btn btn-sm btn-primary rounded-pill px-4 fw-bold">
                        Lihat <i class="bi bi-box-arrow-up-right ms-1 small"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modalEditProfil" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg card-modern">
            <div class="modal-header border-bottom pb-3">
                <h5 class="modal-title fw-bold text-dark">Edit Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="btnEditModalTrigger"></button>
            </div>
            <div class="modal-body p-4">
                <?= form_open_multipart('user/update_profil') ?>
                    
                    <div class="row g-3">
                        <div class="col-12 text-center mb-3">
                             <img src="<?= $user->foto ? base_url('uploads/foto/'.$user->foto) : base_url('assets/img/default-avatar.png') ?>" 
                                  class="rounded-circle mb-2 object-fit-cover shadow-sm" width="100" height="100">
                             <br>
                             <label class="btn btn-sm btn-outline-primary rounded-pill cursor-pointer px-3 mt-2">
                                 <i class="bi bi-camera me-1"></i> Ganti Foto
                                 <input type="file" name="foto" class="d-none" onchange="this.form.submit()">
                             </label>
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
                             <label class="form-label small fw-bold text-muted">Update CV (PDF)</label>
                             <input type="file" name="file_cv" class="form-control input-modern" accept=".pdf,.doc,.docx">
                        </div>
                        
                        <div class="col-12 border-top pt-3 mt-2">
                             <button type="button" class="btn btn-sm btn-outline-danger w-100 text-start d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#collapsePass">
                                 <span><i class="bi bi-key me-2"></i>Ganti Password</span>
                                 <i class="bi bi-chevron-down"></i>
                             </button>
                        </div>

                        <div class="collapse col-12" id="collapsePass">
                            <div class="card card-modern p-3 bg-light border">
                                <div class="mb-2">
                                    <input type="password" name="old_password" class="form-control input-modern" placeholder="Password Lama">
                                </div>
                                <div class="mb-2">
                                    <input type="password" name="new_password" class="form-control input-modern" placeholder="Password Baru">
                                </div>
                                <div class="mb-2">
                                    <input type="password" name="confirm_password" class="form-control input-modern" placeholder="Ulangi Password Baru">
                                </div>
                                <div class="text-end">
                                    <button type="submit" formaction="<?= base_url('user/process_change_password') ?>" class="btn btn-sm btn-dark rounded-pill px-4">Update Password</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 text-end mt-4 pt-3 border-top">
                             <button type="button" class="btn btn-light border rounded-pill me-2" data-bs-dismiss="modal">Batal</button>
                             <button type="submit" class="btn btn-primary px-4 rounded-pill fw-bold">Simpan Profil</button>
                        </div>
                    </div>

                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-shadow:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(0,0,0,0.05) !important; }
    .transition-all { transition: all 0.3s ease; }
</style>