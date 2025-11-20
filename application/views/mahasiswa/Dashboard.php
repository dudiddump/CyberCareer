<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-dark mb-0">Dashboard</h2>
        <p class="text-muted">Selamat datang kembali, <b><?= html_escape($user->nama_lengkap) ?></b>! 👋</p>
    </div>
    <div class="d-none d-md-block">
        <span class="badge bg-white text-secondary border px-3 py-2 rounded-pill shadow-sm">
            <i class="bi bi-calendar-event me-2"></i> <?= date('d M Y') ?>
        </span>
    </div>
</div>

<?php if ($this->session->userdata('must_change_password')): ?>
    <div class="alert alert-warning border-0 shadow-sm d-flex align-items-center mb-4" role="alert">
        <div class="fs-1 text-warning me-3">
            <i class="bi bi-exclamation-triangle-fill"></i>
        </div>
        <div>
            <h6 class="fw-bold mb-1">Peringatan Keamanan!</h6>
            <span class="small">Anda masih menggunakan password default. Demi keamanan akun, segera 
            <a href="<?= base_url('user/change_password') ?>" class="fw-bold text-dark text-decoration-underline">ganti password Anda</a>.</span>
        </div>
    </div>
<?php endif; ?>

<div class="row g-4">
    
    <div class="col-lg-8">
        
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0"><i class="bi bi-briefcase me-2 text-primary"></i>Peluang Terbaru</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <?php if(empty($perusahaan_list)): ?>
                        <div class="col-12 text-center py-5 text-muted bg-light rounded">
                            <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary"></i>
                            Belum ada data lowongan tersedia saat ini.
                        </div>
                    <?php else: ?>
                        <?php foreach ($perusahaan_list as $p): ?>
                        <div class="col-md-6">
                            <div class="card h-100 border border-light-subtle hover-shadow transition-all">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="<?= $p->logo ? base_url('assets/img/' . $p->logo) : 'https://ui-avatars.com/api/?name='.urlencode($p->nama).'&background=random&size=128' ?>" 
                                             alt="<?= $p->nama ?>" 
                                             class="rounded p-1 border bg-white shadow-sm" 
                                             style="width: 50px; height: 50px; object-fit: contain;">
                                        
                                        <div class="ms-3 overflow-hidden">
                                            <h6 class="fw-bold mb-0 text-truncate text-dark"><?= $p->nama ?></h6>
                                            <small class="text-success fw-bold" style="font-size: 0.75rem;">
                                                <i class="bi bi-check-circle-fill me-1"></i><?= $p->jml_lowongan ?> Posisi Aktif
                                            </small>
                                        </div>
                                    </div>
                                    <a href="<?= base_url('perusahaan/detail/'.$p->id) ?>" class="btn btn-outline-primary btn-sm w-100 rounded-pill fw-medium">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0"><i class="bi bi-journal-text me-2 text-primary"></i>Aktivitas Logbook</h5>
                <a href="<?= base_url('mahasiswa/logbook') ?>" class="btn btn-sm btn-link text-decoration-none fw-bold">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered text-center align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4 py-3 text-secondary small border-bottom-0">TANGGAL</th>
                                <th class="py-3 text-secondary small border-bottom-0">KEGIATAN</th>
                                <th class="py-3 text-secondary small border-bottom-0">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($logbook_terakhir)): ?>
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-muted">
                                        <small>Belum ada catatan logbook yang dibuat.</small>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach($logbook_terakhir as $log): ?>
                                <tr>
                                    <td class="ps-4 fw-medium text-secondary">
                                        <?= date('d M Y', strtotime($log->tanggal)) ?>
                                    </td>
                                    <td>
                                        <div class="text-truncate text-dark" style="max-width: 250px;">
                                            <?= html_escape($log->kegiatan) ?>
                                        </div>
                                        <?php if($log->nama_dosen): ?>
                                            <small class="text-muted" style="font-size: 10px;">Reviewer: <?= $log->nama_dosen ?></small>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($log->status == 'Disetujui'): ?>
                                            <span class="badge bg-success-subtle text-success px-2 py-1 rounded-pill border border-success-subtle">
                                                <i class="bi bi-check-lg me-1"></i>Disetujui
                                            </span>
                                        <?php elseif ($log->status == 'Perlu Revisi'): ?>
                                            <span class="badge bg-warning-subtle text-warning px-2 py-1 rounded-pill border border-warning-subtle">
                                                <i class="bi bi-pencil-fill me-1"></i>Revisi
                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary-subtle text-secondary px-2 py-1 rounded-pill border border-secondary-subtle">
                                                <i class="bi bi-clock me-1"></i>Menunggu
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        
        <div class="card border-0 shadow-sm mb-4 text-center overflow-hidden">
            <div class="bg-primary bg-opacity-10" style="height: 80px;"></div>
            
            <div class="card-body pt-0 pb-4">
                <div class="position-relative d-inline-block" style="margin-top: -50px;">
                    <img src="<?= base_url('assets/img/default-avatar.png') ?>" 
                         class="rounded-circle border border-4 border-white shadow-sm bg-white" 
                         width="100" height="100" alt="User" style="object-fit: cover;">
                </div>
                
                <h5 class="fw-bold mt-3 mb-1 text-dark"><?= html_escape($user->nama_lengkap) ?></h5>
                
                <div class="text-muted small mb-3">
                    <div class="fw-semibold text-primary"><?= $user->nim ?></div>
                    <div><?= $user->prodi ?? 'Prodi Belum Diisi' ?></div>
                </div>
                
                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill mb-3">
                    ● Mahasiswa Aktif
                </span>

                <div class="d-grid px-4">
                    <a href="<?= base_url('user/profil') ?>" class="btn btn-outline-dark btn-sm rounded-pill">
                        <i class="bi bi-gear-fill me-1"></i> Kelola Profil
                    </a>
                </div>
            </div>
        </div>
        
        <div class="card border-0 shadow-sm bg-primary text-white position-relative overflow-hidden">
            <div class="position-absolute top-0 end-0 bg-white opacity-10 rounded-circle" style="width: 100px; height: 100px; margin-top: -30px; margin-right: -30px;"></div>
            
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="fw-bold opacity-75 mb-0">IPK Terakhir</h6>
                    <i class="bi bi-mortarboard-fill fs-4 opacity-50"></i>
                </div>
                
                <h1 class="fw-bold display-4 mb-0">
                    <?= ($user->ipk_terakhir > 0) ? $user->ipk_terakhir : '-' ?>
                </h1>
                
                <div class="border-top border-white border-opacity-25 mt-3 pt-2">
                    <small class="opacity-75" style="font-size: 0.75rem;">
                        <i class="bi bi-info-circle me-1"></i>Berdasarkan KHS Semester Lalu
                    </small>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mt-4 bg-white">
            <div class="card-body p-4">
                <h6 class="fw-bold text-dark mb-2">Butuh Bantuan?</h6>
                <p class="text-muted small mb-3">Hubungi dosen pembimbing atau admin jika ada kendala.</p>
                <a href="#" class="btn btn-light btn-sm w-100 text-success fw-bold border">
                    <i class="bi bi-whatsapp me-1"></i> Hubungi Admin
                </a>

                </a>
            </div>
        </div>

    </div>
</div>

<style>
    .hover-shadow:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
        border-color: var(--bs-primary) !important;
    }
    .transition-all {
        transition: all 0.3s ease;
    }
</style>