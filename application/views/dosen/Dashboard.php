<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-dark mb-0">Dashboard Dosen</h2>
        <p class="text-muted small">Selamat datang, Bapak/Ibu <span class="fw-bold text-primary"><?= $user->nama_lengkap ?></span>.</p>
    </div>
    <div class="text-end text-muted small">
        <i class="bi bi-calendar3 me-1"></i> <?= date('d M Y') ?>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="card card-modern p-4 bg-primary text-white border-0 position-relative overflow-hidden h-100">
            <div class="position-relative z-1">
                <h6 class="opacity-75 mb-1">Total Mahasiswa Bimbingan</h6>
                <h2 class="fw-bold mb-0"><?= $total_bimbingan ?> Mahasiswa</h2>
            </div>
            <i class="bi bi-people-fill position-absolute top-50 end-0 translate-middle-y me-3 fs-1 opacity-25"></i>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-modern p-4 bg-warning text-dark border-0 position-relative overflow-hidden h-100">
            <div class="position-relative z-1">
                <h6 class="opacity-75 mb-1">Perlu Persetujuan</h6>
                <h2 class="fw-bold mb-0"><?= $total_pending ?> Logbook</h2>
            </div>
            <i class="bi bi-exclamation-circle-fill position-absolute top-50 end-0 translate-middle-y me-3 fs-1 opacity-25"></i>
        </div>
    </div>
</div>

<div class="card card-modern border-0 shadow-sm">
    <div class="card-header bg-transparent border-0 pt-4 px-4">
        <h6 class="fw-bold text-dark mb-0"><i class="bi bi-list-task me-2 text-primary"></i>Daftar Mahasiswa Bimbingan</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table align-middle mb-0 table-hover">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 text-secondary small fw-bold text-uppercase">Mahasiswa</th>
                        <th class="text-secondary small fw-bold text-uppercase">Program Studi</th>
                        <th class="text-secondary small fw-bold text-uppercase">Status Magang</th>
                        <th class="text-end pe-4 text-secondary small fw-bold text-uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($mahasiswa_bimbingan)): ?>
                        <tr><td colspan="4" class="text-center py-5 text-muted">Belum ada mahasiswa bimbingan.</td></tr>
                    <?php else: ?>
                        <?php foreach($mahasiswa_bimbingan as $m): ?>
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <img src="<?= $m->foto ? base_url('uploads/foto/'.$m->foto) : base_url('assets/img/default-avatar.png') ?>" 
                                         class="rounded-circle border shadow-sm me-3 object-fit-cover" width="40" height="40">
                                    <div>
                                        <div class="fw-bold text-dark"><?= $m->nama_lengkap ?></div>
                                        <div class="text-muted small font-monospace"><?= $m->id ?></div>
                                    </div>
                                </div>
                            </td>
                            <td><?= $m->prodi ?></td>
                            <td>
                                <?php if($m->nama_perusahaan): ?>
                                    <div class="fw-bold text-dark small"><?= $m->nama_perusahaan ?></div>
                                    <div class="text-muted small" style="font-size: 11px;"><?= $m->posisi ?></div>
                                <?php else: ?>
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary-subtle">Belum Magang</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-end pe-4">
                                <a href="<?= base_url('dosen/detail_mahasiswa/'.$m->id) ?>" class="btn btn-sm btn-primary rounded-pill px-3 fw-bold">
                                    Lihat Logbook
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>