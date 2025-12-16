<div class="p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-0">Dashboard</h2>
            <p class="text-muted small">Halo, <span class="fw-bold text-primary"><?= $user->nama_lengkap ?></span>! Berikut ringkasan aktivitas bimbingan Anda.</p>
        </div>
        <div class="text-end text-muted small">
            <i class="bi bi-calendar3 me-1"></i> <?= date('d M Y') ?>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card card-modern p-4 bg-primary text-white border-0 h-100 position-relative overflow-hidden">
                <div class="position-relative z-1">
                    <h6 class="opacity-75 mb-1">Total Bimbingan</h6>
                    <h2 class="fw-bold mb-0"><?= $total_bimbingan ?> <span class="fs-6 fw-normal">Mhs</span></h2>
                </div>
                <i class="bi bi-people-fill position-absolute top-50 end-0 translate-middle-y me-3 fs-1 opacity-25"></i>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-modern p-4 bg-success text-white border-0 h-100 position-relative overflow-hidden">
                <div class="position-relative z-1">
                    <h6 class="opacity-75 mb-1">Sedang Magang</h6>
                    <h2 class="fw-bold mb-0"><?= $total_magang_aktif ?> <span class="fs-6 fw-normal">Mhs</span></h2>
                </div>
                <i class="bi bi-building-check position-absolute top-50 end-0 translate-middle-y me-3 fs-1 opacity-25"></i>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-modern p-4 bg-warning text-dark border-0 h-100 position-relative overflow-hidden">
                <div class="position-relative z-1">
                    <h6 class="opacity-75 mb-1 text-dark">Logbook Pending</h6>
                    <h2 class="fw-bold mb-0 text-dark"><?= $total_pending_logbook ?> <span class="fs-6 fw-normal">Entri</span></h2>
                </div>
                <i class="bi bi-journal-text position-absolute top-50 end-0 translate-middle-y me-3 fs-1 opacity-25"></i>
            </div>
        </div>
    </div>

    <div class="card card-modern border-0 shadow-sm">
        <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
            <h6 class="fw-bold text-dark mb-0"><i class="bi bi-clock-history me-2 text-primary"></i>Aktivitas Logbook Terbaru</h6>
            </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0 table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3 small text-secondary fw-bold">Mahasiswa</th>
                            <th class="py-3 small text-secondary fw-bold">Tanggal Kegiatan</th>
                            <th class="py-3 small text-secondary fw-bold">Isi Kegiatan</th>
                            <th class="py-3 small text-secondary fw-bold text-end pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($recent_logbooks)): ?>
                            <tr><td colspan="4" class="text-center py-5 text-muted">Belum ada aktivitas logbook terbaru.</td></tr>
                        <?php else: ?>
                            <?php foreach($recent_logbooks as $log): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <img src="<?= $log->foto ? base_url('uploads/foto/'.$log->foto) : base_url('assets/img/default-avatar.png') ?>" 
                                             class="rounded-circle border me-2 object-fit-cover" width="30" height="30">
                                        <span class="fw-bold text-dark small"><?= $log->nama_lengkap ?></span>
                                    </div>
                                </td>
                                <td class="small text-muted"><?= date('d M Y', strtotime($log->tanggal)) ?></td>
                                <td class="small text-dark text-truncate" style="max-width: 250px;">
                                    <?= strip_tags($log->kegiatan) ?>
                                </td>
                                <td class="text-end pe-4">
                                    <?php if($log->status == 'Menunggu Persetujuan'): ?>
                                        <a href="<?= base_url('dosen/detail_mahasiswa/'.$log->mahasiswa_id) ?>" class="btn btn-sm btn-outline-warning rounded-pill px-3" style="font-size: 11px;">Review</a>
                                    <?php else: ?>
                                        <span class="badge bg-light text-secondary border rounded-pill">Selesai</span>
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