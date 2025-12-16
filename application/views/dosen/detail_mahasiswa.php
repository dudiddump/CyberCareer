<div class="p-4">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb small">
            <li class="breadcrumb-item"><a href="<?= base_url('dosen/mahasiswa') ?>" class="text-decoration-none">Mahasiswa</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $mhs->nama_lengkap ?></li>
        </ol>
    </nav>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card card-modern border-0 shadow-sm mb-4 text-center p-4">
                <div class="mb-3 d-flex justify-content-center">
                    <img src="<?= $mhs->foto ? base_url('uploads/foto/'.$mhs->foto) : base_url('assets/img/default-avatar.png') ?>" 
                         class="rounded-circle border border-3 border-light shadow object-fit-cover" width="120" height="120">
                </div>
                <h5 class="fw-bold text-dark mb-1"><?= $mhs->nama_lengkap ?></h5>
                <p class="text-muted small font-monospace mb-2"><?= $mhs->id ?></p>
                <div class="d-flex justify-content-center gap-2 mb-3">
                    <span class="badge bg-primary bg-opacity-10 text-primary"><?= $mhs->prodi ?></span>
                    <span class="badge bg-secondary bg-opacity-10 text-secondary">Angkatan <?= $mhs->angkatan ?? '-' ?></span>
                </div>
                
                <hr class="border-secondary opacity-10 my-3">
                
                <div class="text-start small">
                    <div class="mb-2">
                        <label class="fw-bold text-muted d-block" style="font-size: 11px;">EMAIL</label>
                        <div class="text-dark"><?= $mhs->id ?>@student.univ.ac.id</div>
                    </div>
                    <div class="mb-2">
                        <label class="fw-bold text-muted d-block" style="font-size: 11px;">TELEPON</label>
                        <div class="text-dark"><?= $mhs->telepon ?? '-' ?></div>
                    </div>
                    <div class="mb-2">
                        <label class="fw-bold text-muted d-block" style="font-size: 11px;">ALAMAT</label>
                        <div class="text-dark"><?= $mhs->alamat ?? '-' ?></div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <?php if (!empty($mahasiswa->file_cv)) : ?>
                        <a href="<?= base_url('uploads/cv/' . $mahasiswa->file_cv); ?>" class="btn btn-primary" target="_blank">
                            <i class="fas fa-download"></i> Download CV
                        </a>
                    <?php else : ?>
                        <span class="badge badge-secondary">Belum upload CV</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            
            <div class="card card-modern border-0 shadow-sm mb-4">
                <div class="card-header bg-transparent border-0 pt-4 px-4">
                    <h6 class="fw-bold text-dark mb-0"><i class="bi bi-buildings me-2 text-primary"></i>Riwayat Magang</h6>
                </div>
                <div class="card-body p-0">
                    <?php if(empty($riwayat_magang)): ?>
                        <div class="p-4 text-center text-muted small">Mahasiswa ini belum memiliki riwayat magang.</div>
                    <?php else: ?>
                        <div class="list-group list-group-flush">
                            <?php foreach($riwayat_magang as $history): ?>
                            <div class="list-group-item px-4 py-3 border-0 border-bottom">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1"><?= $history->nama_perusahaan ?></h6>
                                        <div class="text-muted small mb-1"><i class="bi bi-briefcase me-1"></i> <?= $history->posisi ?></div>
                                        <div class="text-muted small" style="font-size: 11px;">
                                            <i class="bi bi-geo-alt me-1"></i> <?= $history->alamat_perusahaan ?>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <?php if($history->status == 'Aktif'): ?>
                                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill mb-1">Sedang Berlangsung</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill mb-1">Selesai</span>
                                        <?php endif; ?>
                                        <div class="small text-muted" style="font-size: 10px;">
                                            <?= date('M Y', strtotime($history->tgl_mulai)) ?> - 
                                            <?= $history->tgl_selesai ? date('M Y', strtotime($history->tgl_selesai)) : 'Sekarang' ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card card-modern border-0 shadow-sm">
                <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                    <h6 class="fw-bold text-dark mb-0"><i class="bi bi-journal-text me-2 text-warning"></i>Logbook Kegiatan</h6>
                    <span class="badge bg-light text-muted border"><?= count($logbooks) ?> Entri</span>
                </div>
                <div class="card-body p-4">
                    <?php if(empty($logbooks)): ?>
                        <div class="text-center text-muted py-3">Belum ada logbook yang diunggah.</div>
                    <?php else: ?>
                        <div class="accordion" id="accordionLogbook">
                            <?php foreach($logbooks as $index => $lb): ?>
                            <div class="accordion-item border rounded mb-2 overflow-hidden">
                                <h2 class="accordion-header" id="heading<?= $lb->id ?>">
                                    <button class="accordion-button collapsed py-3 <?= $lb->status == 'Menunggu Persetujuan' ? 'bg-warning bg-opacity-10' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $lb->id ?>">
                                        <div class="d-flex align-items-center w-100 pe-3">
                                            <div class="me-auto">
                                                <div class="fw-bold text-dark" style="font-size: 0.95rem;">
                                                    <?= date('l, d M Y', strtotime($lb->tanggal)) ?>
                                                </div>
                                                <small class="text-muted text-truncate d-block" style="max-width: 250px;">
                                                    <?= strip_tags(substr($lb->kegiatan, 0, 50)) ?>...
                                                </small>
                                            </div>
                                            <div class="text-end">
                                                <?php if($lb->status == 'Menunggu Persetujuan'): ?>
                                                    <span class="badge bg-warning text-dark">Butuh Review</span>
                                                <?php elseif($lb->status == 'Disetujui'): ?>
                                                    <span class="badge bg-success">Disetujui</span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger">Revisi</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapse<?= $lb->id ?>" class="accordion-collapse collapse" data-bs-parent="#accordionLogbook">
                                    <div class="accordion-body bg-light">
                                        <div class="mb-3 p-3 bg-white rounded border">
                                            <label class="small fw-bold text-muted mb-1">Deskripsi Kegiatan</label>
                                            <div class="text-dark small"><?= nl2br($lb->kegiatan) ?></div>
                                            <?php if($lb->file_dokumentasi): ?>
                                                <div class="mt-2">
                                                    <a href="<?= base_url('uploads/logbook/'.$lb->file_dokumentasi) ?>" target="_blank" class="small text-primary text-decoration-none">
                                                        <i class="bi bi-paperclip"></i> Lihat Dokumentasi
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="card border-warning border-opacity-25 bg-warning bg-opacity-10">
                                            <div class="card-body p-3">
                                                <form action="<?= base_url('dosen/verifikasi_logbook') ?>" method="post">
                                                    <input type="hidden" name="id_logbook" value="<?= $lb->id ?>">
                                                    <input type="hidden" name="id_mahasiswa" value="<?= $mhs->id ?>">
                                                    
                                                    <div class="mb-2">
                                                        <label class="small fw-bold text-dark mb-1">Feedback / Catatan Dosen</label>
                                                        <textarea name="feedback_dosen" class="form-control form-control-sm" rows="2" placeholder="Tuliskan masukan untuk mahasiswa..."><?= $lb->feedback_dosen ?></textarea>
                                                    </div>
                                                    
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <button type="submit" name="status" value="Ditolak" class="btn btn-sm btn-outline-danger bg-white">Minta Revisi</button>
                                                        <button type="submit" name="status" value="Disetujui" class="btn btn-sm btn-primary">Setujui Logbook</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>