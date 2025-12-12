<div class="mb-4">
    <a href="<?= base_url('mahasiswa/mitra') ?>" class="text-decoration-none text-muted small fw-bold">
        <i class="bi bi-arrow-left me-1"></i> KEMBALI KE DAFTAR MITRA
    </a>
</div>

<div class="card border-0 shadow-sm mb-4 overflow-hidden">
    <div class="bg-light border-bottom" style="height: 130px;"></div>
    
    <div class="card-body px-4 pb-4">
        <div class="d-flex flex-column flex-md-row align-items-start gap-4" style="margin-top: -60px;">
            
            <div class="bg-white p-2 rounded-3 shadow border">
                <img src="<?= $mitra->logo ? base_url('assets/img/'.$mitra->logo) : 'https://ui-avatars.com/api/?name='.urlencode($mitra->nama_perusahaan).'&background=random&size=128' ?>" 
                     alt="Logo" class="rounded" style="width: 110px; height: 110px; object-fit: contain;">
            </div>

            <div class="mt-md-5 pt-md-2 flex-grow-1">
                <h2 class="fw-bold text-dark mb-1"><?= $mitra->nama_perusahaan ?></h2>
                <div class="text-muted d-flex align-items-center gap-3">
                    <span><i class="bi bi-building me-1"></i> <?= $mitra->industri ?></span>
                    <span class="d-none d-md-inline">•</span>
                    <span><i class="bi bi-geo-alt me-1"></i> <?= $mitra->alamat ?></span>
                </div>
            </div>

            <div class="mt-md-5 pt-md-2">
                <a href="<?= $mitra->website ? 'https://'.$mitra->website : '#' ?>" target="_blank" class="btn btn-outline-primary rounded-pill fw-bold">
                    <i class="bi bi-globe me-1"></i> Kunjungi Website
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    
    <div class="col-lg-8">
        
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <h5 class="fw-bold text-dark mb-3">Tentang Perusahaan</h5>
                <p class="text-muted mb-0" style="line-height: 1.7;">
                    <?= nl2br($mitra->deskripsi ? $mitra->deskripsi : 'Belum ada deskripsi perusahaan.') ?>
                </p>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3 mt-2">
            <h5 class="fw-bold text-dark mb-0">Lowongan Aktif (<?= count($lowongan) ?>)</h5>
        </div>

        <?php if(empty($lowongan)): ?>
            <div class="alert alert-light text-center py-4 border">
                Belum ada lowongan dibuka saat ini.
            </div>
        <?php else: ?>
            <div class="d-flex flex-column gap-3">
                <?php foreach($lowongan as $l): ?>
                <div class="card border-0 shadow-sm hover-shadow transition-all">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-8 mb-3 mb-md-0">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <h5 class="fw-bold text-primary mb-0"><?= $l->posisi ?></h5>
                                    
                                    <?php 
                                        $badge = 'bg-info text-info';
                                        if($l->tipe == 'Full Time') $badge = 'bg-success text-success';
                                        if($l->tipe == 'Part Time') $badge = 'bg-warning text-warning';
                                    ?>
                                    <span class="badge <?= $badge ?> bg-opacity-10 border border-opacity-25 rounded-pill">
                                        <?= $l->tipe ?>
                                    </span>
                                </div>
                                
                                <div class="text-muted small">
                                    <i class="bi bi-clock me-1"></i> Diposting: <?= date('d M Y', strtotime($l->tgl_posting)) ?>
                                    <span class="mx-2">•</span>
                                    <span class="text-danger fw-bold">
                                        <i class="bi bi-calendar-x me-1"></i> Deadline: <?= $l->tenggat_pengajuan ? date('d M Y', strtotime($l->tenggat_pengajuan)) : '-' ?>
                                    </span>
                                </div>
                            </div>
                            
                            <div class="col-md-4 text-md-end">
                                <a href="<?= $l->link_pendaftaran ? $l->link_pendaftaran : '#' ?>" target="_blank" class="btn btn-primary rounded-pill fw-bold px-4">
                                    Lamar <i class="bi bi-box-arrow-up-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>

    <div class="col-lg-4">
        
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <h6 class="fw-bold text-dark mb-3">Insight Kampus</h6>
                
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-success bg-opacity-10 p-3 rounded-circle text-success me-3">
                        <i class="bi bi-people-fill fs-4"></i>
                    </div>
                    <div>
                        <h3 class="fw-bold mb-0"><?= $jumlah_magang ?></h3>
                        <small class="text-muted">Mahasiswa/Alumni bekerja disini</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h6 class="fw-bold text-dark mb-3">Kontak Perusahaan</h6>
                <ul class="list-unstyled mb-0 d-flex flex-column gap-3">
                    <?php if($mitra->email): ?>
                    <li class="d-flex align-items-center">
                        <i class="bi bi-envelope fs-5 text-muted me-3"></i>
                        <a href="mailto:<?= $mitra->email ?>" class="text-decoration-none text-dark text-truncate">
                            <?= $mitra->email ?>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <?php if($mitra->telepon): ?>
                    <li class="d-flex align-items-center">
                        <i class="bi bi-telephone fs-5 text-muted me-3"></i>
                        <a href="tel:<?= $mitra->telepon ?>" class="text-decoration-none text-dark">
                            <?= $mitra->telepon ?>
                        </a>
                    </li>
                    <?php endif; ?>

                    <li class="d-flex align-items-start">
                        <i class="bi bi-geo-alt fs-5 text-muted me-3"></i>
                        <span class="text-muted small"><?= $mitra->alamat ?></span>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>

<style>
    .hover-shadow:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
    }
    .transition-all { transition: all 0.3s ease; }
</style>