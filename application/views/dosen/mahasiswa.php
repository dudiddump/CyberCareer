<div class="p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-0">Mahasiswa Bimbingan</h2>
            <p class="text-muted small">Kelola data dan pantau progres mahasiswa bimbingan Anda.</p>
        </div>
    </div>

    <div class="card card-modern border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0 table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3 text-secondary small fw-bold">Mahasiswa</th>
                            <th class="text-secondary small fw-bold">Kontak</th>
                            <th class="text-secondary small fw-bold">Status Magang</th>
                            <th class="text-end pe-4 text-secondary small fw-bold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($mahasiswa_bimbingan)): ?>
                            <tr><td colspan="4" class="text-center py-5 text-muted">Belum ada mahasiswa.</td></tr>
                        <?php else: ?>
                            <?php foreach($mahasiswa_bimbingan as $m): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <img src="<?= $m->foto ? base_url('uploads/foto/'.$m->foto) : base_url('assets/img/default-avatar.png') ?>" 
                                             class="rounded-circle border shadow-sm me-3 object-fit-cover" width="45" height="45">
                                        <div>
                                            <div class="fw-bold text-dark"><?= $m->nama_lengkap ?></div>
                                            <div class="text-muted small font-monospace"><?= $m->id ?> <span class="mx-1">•</span> <?= $m->prodi ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?php if($m->telepon): ?>
                                        <a href="https://wa.me/<?= $m->telepon ?>" target="_blank" class="text-decoration-none btn btn-sm btn-light text-success border-success-subtle">
                                            <i class="bi bi-whatsapp me-1"></i> Hubungi
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted small">-</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($m->nama_perusahaan): ?>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2">Aktif</span>
                                            <div>
                                                <div class="fw-bold text-dark small"><?= $m->nama_perusahaan ?></div>
                                                <div class="text-muted small" style="font-size: 10px;"><?= $m->posisi ?></div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border">Belum Magang</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end pe-4">
                                    <a href="<?= base_url('dosen/detail_mahasiswa/'.$m->id) ?>" class="btn btn-sm btn-primary rounded-pill px-4 fw-bold shadow-sm">
                                        <i class="bi bi-eye me-1"></i> Detail Lengkap
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
</div>