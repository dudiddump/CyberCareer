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
        
        <div class="card card-modern text-center p-4 mb-4 position-relative overflow-hidden">
            <div class="position-absolute top-0 start-0 w-100" style="height: 100px; background: linear-gradient(135deg, rgba(29,78,216,0.1), rgba(249,115,22,0.1)); opacity: 0.5;"></div>
            
            <div class="position-relative mt-3">
                <img src="<?= $user->foto ? base_url('uploads/foto/'.$user->foto) : 'https://ui-avatars.com/api/?name='.urlencode($user->nama_lengkap).'&background=random&size=128' ?>" 
                     class="rounded-circle border border-4 border-white shadow-sm object-fit-cover" 
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
                    <span class="text-truncate"><?= strtolower(str_replace(' ', '.', $user->nama_lengkap)) ?>@student.cyber.ac.id</span>
                </div>
                <div class="d-flex align-items-center mb-3 text-muted small">
                    <i class="bi bi-telephone me-3 fs-5 opacity-50"></i>
                    <span>+62 812-xxxx-xxxx</span>
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
                <a href="#" class="btn-icon-soft"><i class="bi bi-globe"></i></a>
                <a href="#" class="btn-icon-soft"><i class="bi bi-github"></i></a>
                <a href="#" class="btn-icon-soft"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>

        <div class="card card-modern p-4">
            <h6 class="section-title"><i class="bi bi-trophy"></i> Pencapaian</h6>
            
            <div class="d-flex gap-3 mb-3">
                <div class="bg-warning bg-opacity-10 p-2 rounded text-warning h-100">
                    <i class="bi bi-award fs-4"></i>
                </div>
                <div>
                    <div class="fw-bold text-dark small">Juara 1 Hackathon Nasional</div>
                    <small class="text-muted" style="font-size: 11px;">Des 2024</small>
                </div>
            </div>
            
            <div class="d-flex gap-3 mb-3">
                <div class="bg-warning bg-opacity-10 p-2 rounded text-warning h-100">
                    <i class="bi bi-star fs-4"></i>
                </div>
                <div>
                    <div class="fw-bold text-dark small">Best Final Project 2024</div>
                    <small class="text-muted" style="font-size: 11px;">Nov 2024</small>
                </div>
            </div>
            
            <div class="d-flex gap-3">
                <div class="bg-warning bg-opacity-10 p-2 rounded text-warning h-100">
                    <i class="bi bi-patch-check fs-4"></i>
                </div>
                <div>
                    <div class="fw-bold text-dark small">Sertifikasi AWS Cloud</div>
                    <small class="text-muted" style="font-size: 11px;">Okt 2024</small>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-8">
        
        <div class="card card-modern p-4 mb-4">
            <h6 class="section-title"><i class="bi bi-person"></i> Tentang Saya</h6>
            <p class="text-muted small mb-0" style="line-height: 1.6;">
                Mahasiswa Sistem dan Teknologi Informasi yang passionate dalam pengembangan web full-stack dan data science. Aktif dalam organisasi kampus dan memiliki pengalaman dalam memimpin proyek pengembangan perangkat lunak skala kecil hingga menengah.
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
                    <div class="fw-bold text-dark"><?= strtolower(str_replace(' ', '', $user->nama_lengkap)) ?>@student.cyber.ac.id</div>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block mb-1">Nomor Telepon</small>
                    <div class="fw-bold text-dark">+62 812-3456-7890</div>
                </div>
            </div>
        </div>

        <div class="card card-modern p-4 mb-4">
            <h6 class="section-title"><i class="bi bi-bookmark-star"></i> Keahlian</h6>
            <div class="d-flex flex-wrap gap-2">
                <span class="badge badge-soft bg-success bg-opacity-10 text-success border border-success border-opacity-25">Web Development</span>
                <span class="badge badge-soft bg-info bg-opacity-10 text-info border border-info border-opacity-25">UI/UX Design</span>
                <span class="badge badge-soft bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25">Data Analysis</span>
                <span class="badge badge-soft bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25">Project Management</span>
                <span class="badge badge-soft bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25">Public Speaking</span>
            </div>
        </div>

        <div class="card card-modern p-4">
            <h6 class="section-title"><i class="bi bi-file-earmark-text"></i> Dokumen</h6>
            
            <div class="doc-item">
                <div class="d-flex align-items-center">
                    <div class="bg-light p-2 rounded me-3 text-danger">
                        <i class="bi bi-file-earmark-pdf fs-4"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">Curriculum Vitae</div>
                        <?php if($user->file_cv): ?>
                            <small class="text-success d-flex align-items-center gap-1" style="font-size: 10px;">
                                <i class="bi bi-check-circle-fill"></i> Uploaded
                            </small>
                        <?php else: ?>
                            <small class="text-muted" style="font-size: 10px;">Belum diupload</small>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($user->file_cv): ?>
                    <a href="<?= base_url('uploads/cv/'.$user->file_cv) ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3">Lihat</a>
                <?php else: ?>
                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalEditProfil">Upload</button>
                <?php endif; ?>
            </div>

            <div class="doc-item">
                <div class="d-flex align-items-center">
                    <div class="bg-light p-2 rounded me-3 text-primary">
                        <i class="bi bi-file-earmark-spreadsheet fs-4"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">Transkrip Nilai</div>
                        <small class="text-muted" style="font-size: 10px;">Sinkronisasi SIAKAD</small>
                    </div>
                </div>
                <button class="btn btn-sm btn-outline-dark rounded-pill px-3">Lihat</button>
            </div>

            <div class="doc-item">
                <div class="d-flex align-items-center">
                    <div class="bg-light p-2 rounded me-3 text-warning">
                        <i class="bi bi-folder fs-4"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-dark small">Portofolio</div>
                        <small class="text-muted" style="font-size: 10px;">Belum diupload</small>
                    </div>
                </div>
                <button class="btn btn-sm btn-outline-dark rounded-pill px-3">Upload</button>
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
                             <img src="<?= $user->foto ? base_url('uploads/foto/'.$user->foto) : base_url('assets/img/default-avatar.png') ?>" 
                                  class="rounded-circle mb-2 object-fit-cover shadow-sm" width="100" height="100">
                             <br>
                             <label class="btn btn-sm btn-outline-primary rounded-pill cursor-pointer">
                                 <i class="bi bi-camera me-1"></i> Ganti Foto
                                 <input type="file" name="foto" class="d-none" onchange="this.form.submit()">
                             </label>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" value="<?= $user->nama_lengkap ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">Upload CV (PDF)</label>
                            <input type="file" name="file_cv" class="form-control">
                        </div>
                        
                        <div class="col-12 border-top pt-3 mt-3">
                            <h6 class="fw-bold text-dark mb-3">Ganti Password</h6>
                        </div>
                        <div class="col-12 text-end">
                             <a href="<?= base_url('user/change_password_page') ?>" class="btn btn-sm btn-warning">Ke Menu Ganti Password</a>
                             <button type="submit" class="btn btn-primary px-4 rounded-pill fw-bold">Simpan Perubahan</button>
                         </div>
                    </div>

                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>