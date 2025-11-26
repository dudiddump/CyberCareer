<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-dark mb-0">Profil Saya</h2>
        <p class="text-muted mb-0 small">Kelola informasi profil dan dokumen akademik Anda.</p>
    </div>
    <button class="btn btn-primary rounded-pill px-4 py-2 fw-bold" data-bs-toggle="modal" data-bs-target="#modalEditProfil">
        <i class="bi bi-pencil-square me-2"></i>Edit Profil
    </button>
</div>

<div class="row g-4">
    
    <div class="col-lg-4">
        <div class="card card-modern text-center p-4 h-100 position-relative overflow-hidden">
            <div class="position-absolute top-0 start-0 w-100" style="height: 100px; background: linear-gradient(135deg, rgba(29,78,216,0.1), rgba(249,115,22,0.1)); opacity: 0.5;"></div>
            
            <div class="position-relative mt-3">
                <img src="<?= $user->foto ? base_url('uploads/foto/'.$user->foto) : 'https://ui-avatars.com/api/?name='.urlencode($user->nama_lengkap).'&background=random&size=128' ?>" 
                     class="rounded-circle border border-4 border-white shadow-sm object-fit-cover bg-white" 
                     width="120" height="120">
                
                <h4 class="fw-bold text-dark mt-3 mb-1"><?= $user->nama_lengkap ?></h4>
                <div class="text-muted small mb-2">NIM: <?= $user->nim ?></div>
                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1 border border-primary border-opacity-10">
                    <?= $user->prodi ?>
                </span>
            </div>

            <div class="text-start mt-4 pt-3 border-top border-light">
                <div class="d-flex align-items-center mb-3 text-muted small">
                    <i class="bi bi-envelope me-3 fs-5 opacity-50"></i>
                    <span class="text-truncate text-dark fw-medium"><?= $user->nim ?>@cyber-univ.ac.id</span>
                </div>
                <div class="d-flex align-items-center mb-3 text-muted small">
                    <i class="bi bi-telephone me-3 fs-5 opacity-50"></i>
                    <span><?= $user->telepon ? $user->telepon : '-' ?></span>
                </div>
                <div class="d-flex align-items-center mb-3 text-muted small">
                    <i class="bi bi-geo-alt me-3 fs-5 opacity-50"></i>
                    <span>Jakarta, Indonesia</span>
                </div>
            </div>

            <div class="row g-2 mt-2 bg-light rounded-4 p-3 mx-0">
                <div class="col-4 border-end border-secondary border-opacity-10">
                    <h5 class="fw-bold text-dark mb-0"><?= $user->ipk_terakhir ?? '0.00' ?></h5>
                    <small class="text-muted" style="font-size: 10px;">IPK</small>
                </div>
                <div class="col-4 border-end border-secondary border-opacity-10">
                    <h5 class="fw-bold text-dark mb-0">6</h5>
                    <small class="text-muted" style="font-size: 10px;">Semester</small>
                </div>
                <div class="col-4">
                    <h5 class="fw-bold text-dark mb-0"><?= $user->tahun_masuk ?? '2023' ?></h5>
                    <small class="text-muted" style="font-size: 10px;">Angkatan</small>
                </div>
            </div>

            <div class="d-flex justify-content-center gap-2 mt-4">
                <?php if($user->website): ?>
                    <a href="<?= $user->website ?>" target="_blank" class="btn-icon-soft"><i class="bi bi-globe"></i></a>
                <?php else: ?>
                    <a href="#" class="btn-icon-soft disabled"><i class="bi bi-globe"></i></a>
                <?php endif; ?>

                <?php if($user->github): ?>
                    <a href="<?= $user->github ?>" target="_blank" class="btn-icon-soft"><i class="bi bi-github"></i></a>
                <?php else: ?>
                    <a href="#" class="btn-icon-soft disabled"><i class="bi bi-github"></i></a>
                <?php endif; ?>

                <?php if($user->linkedin): ?>
                    <a href="<?= $user->linkedin ?>" target="_blank" class="btn-icon-soft"><i class="bi bi-linkedin"></i></a>
                <?php else: ?>
                    <a href="#" class="btn-icon-soft disabled"><i class="bi bi-linkedin"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        
        <div class="card card-modern p-4 mb-4">
            <h6 class="section-title"><i class="bi bi-person"></i> Tentang Saya</h6>
            <p class="text-muted small mb-0" style="line-height: 1.6;">
                <?= $user->tentang_saya ? nl2br($user->tentang_saya) : 'Belum ada deskripsi diri. Silakan edit profil untuk menambahkan.' ?>
            </p>
        </div>

        <div class="card card-modern p-4 mb-4">
            <h6 class="section-title"><i class="bi bi-book"></i> Informasi Akademik</h6>
            <div class="row g-4">
                <div class="col-md-6">
                    <small class="text-muted d-block mb-1">Nama Lengkap</small>
                    <div class="fw-bold text-dark"><?= $user->nama_lengkap ?></div>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block mb-1">NIM</small>
                    <div class="fw-bold text-dark"><?= $user->nim ?></div>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block mb-1">Program Studi</small>
                    <div class="fw-bold text-dark"><?= $user->prodi ?></div>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block mb-1">Tahun Angkatan</small>
                    <div class="fw-bold text-dark"><?= $user->tahun_masuk ?? '2023' ?></div>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block mb-1">Email Institusi</small>
                    <div class="fw-bold text-primary"><?= $user->nim ?>@cyber-univ.ac.id</div>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block mb-1">Nomor Telepon</small>
                    <div class="fw-bold text-dark"><?= $user->telepon ? $user->telepon : '-' ?></div>
                </div>
            </div>
        </div>

        <div class="card card-modern p-4">
            <h6 class="section-title"><i class="bi bi-file-earmark-text"></i> Dokumen</h6>
            
            <div class="doc-item d-flex align-items-center justify-content-between p-3 border rounded mb-3">
                <div class="d-flex align-items-center">
                    <div class="bg-danger bg-opacity-10 p-2 rounded me-3 text-danger">
                        <i class="bi bi-file-earmark-pdf fs-4"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">Curriculum Vitae</div>
                        <?php if($user->file_cv): ?>
                            <small class="text-success d-flex align-items-center gap-1" style="font-size: 10px;">
                                <i class="bi bi-check-circle-fill"></i> Sudah Diupload
                            </small>
                        <?php else: ?>
                            <small class="text-muted" style="font-size: 10px;">Belum ada file</small>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div>
                    <?php if($user->file_cv): ?>
                        <a href="<?= base_url('uploads/cv/'.$user->file_cv) ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-4">Lihat</a>
                    <?php else: ?>
                        <button class="btn btn-sm btn-outline-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalEditProfil">Upload</button>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="doc-item d-flex align-items-center justify-content-between p-3 border rounded">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 p-2 rounded me-3 text-primary">
                        <i class="bi bi-file-earmark-spreadsheet fs-4"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">Transkrip Nilai</div>
                        <small class="text-muted" style="font-size: 10px;">Sinkronisasi SIAKAD</small>
                    </div>
                </div>
                <div>
                    <button class="btn btn-sm btn-outline-secondary rounded-pill px-4" disabled>Lihat</button>
                </div>
            </div>

        </div>

    </div>
</div>

<div class="modal fade" id="modalEditProfil" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg card-modern">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-dark">Edit Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <?= form_open_multipart('user/update_profil') ?>
                    
                    <div class="row g-3">
                        <div class="col-12 text-center mb-3">
                             <img src="<?= $user->foto ? base_url('uploads/foto/'.$user->foto) : 'https://ui-avatars.com/api/?name='.urlencode($user->nama_lengkap).'&background=random' ?>" 
                                  class="rounded-circle mb-2 object-fit-cover shadow-sm" width="90" height="90">
                             <br>
                             <label class="btn btn-sm btn-outline-primary rounded-pill cursor-pointer px-3">
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
                            <input type="text" class="form-control input-modern bg-light" value="<?= $user->nim ?>" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">IPK Terakhir (Sementara)</label>
                            <input type="number" step="0.01" name="ipk_terakhir" class="form-control input-modern" value="<?= $user->ipk_terakhir ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">Nomor Telepon / WA</label>
                            <input type="text" name="telepon" class="form-control input-modern" value="<?= $user->telepon ?>" placeholder="+62...">
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">Tentang Saya</label>
                            <textarea name="tentang_saya" class="form-control input-modern" rows="3" placeholder="Ceritakan singkat tentang diri Anda..."><?= $user->tentang_saya ?></textarea>
                        </div>

                        <div class="col-12 border-top pt-2 mt-2">
                            <label class="form-label small fw-bold text-primary mb-3">Tautan Profil</label>
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-globe"></i></span>
                                        <input type="text" name="website" class="form-control input-modern border-start-0" placeholder="Web Personal" value="<?= $user->website ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-linkedin"></i></span>
                                        <input type="text" name="linkedin" class="form-control input-modern border-start-0" placeholder="Link LinkedIn" value="<?= $user->linkedin ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-github"></i></span>
                                        <input type="text" name="github" class="form-control input-modern border-start-0" placeholder="Link GitHub" value="<?= $user->github ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                             <label class="form-label small fw-bold text-muted">Update CV (PDF/DOCX)</label>
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
                                    <input type="password" name="new_password" class="form-control input-modern" placeholder="Password Baru (Min 6 karakter)">
                                </div>
                                <div class="mb-2">
                                    <input type="password" name="confirm_password" class="form-control input-modern" placeholder="Ulangi Password Baru">
                                </div>
                                <div class="text-end">
                                    <button type="submit" formaction="<?= base_url('user/process_change_password') ?>" class="btn btn-sm btn-dark">Update Password</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 text-end mt-3 border-top pt-3">
                             <button type="button" class="btn btn-light border rounded-pill me-2" data-bs-dismiss="modal">Batal</button>
                             <button type="submit" class="btn btn-primary px-4 rounded-pill fw-bold">Simpan Profil</button>
                        </div>
                    </div>

                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>