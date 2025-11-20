<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h2 class="fw-bold text-dark mb-1">Logbook Aktivitas</h2>
        <p class="text-muted mb-0">Catat dan laporkan kegiatan harianmu.</p>
    </div>
    <button type="button" class="btn btn-modern btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-plus-lg me-2"></i>Entry Baru
    </button>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card card-modern p-3 d-flex flex-row align-items-center">
            <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary me-3">
                <i class="bi bi-journal-text fs-4"></i>
            </div>
            <div>
                <h3 class="fw-bold mb-0 text-dark"><?= count($logbook_list) ?></h3>
                <small class="text-muted">Total Logbook</small>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-modern p-3 d-flex flex-row align-items-center">
            <div class="bg-success bg-opacity-10 p-3 rounded-circle text-success me-3">
                <i class="bi bi-check-lg fs-4"></i>
            </div>
            <div>
                <h3 class="fw-bold mb-0 text-dark">
                    <?= count(array_filter($logbook_list, function($l){ return $l->status == 'Disetujui'; })) ?>
                </h3>
                <small class="text-muted">Disetujui</small>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-modern p-3 d-flex flex-row align-items-center">
            <div class="bg-warning bg-opacity-10 p-3 rounded-circle text-warning me-3">
                <i class="bi bi-clock-history fs-4"></i>
            </div>
            <div>
                <h3 class="fw-bold mb-0 text-dark">
                    <?= count(array_filter($logbook_list, function($l){ return $l->status != 'Disetujui'; })) ?>
                </h3>
                <small class="text-muted">Menunggu/Revisi</small>
            </div>
        </div>
    </div>
</div>

<div class="card card-modern overflow-hidden">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="bg-light border-bottom">
                <tr>
                    <th class="ps-4 py-3 text-secondary small text-uppercase fw-bold">Tanggal</th>
                    <th class="py-3 text-secondary small text-uppercase fw-bold">Kegiatan</th>
                    <th class="py-3 text-secondary small text-uppercase fw-bold text-center">Bukti</th>
                    <th class="py-3 text-secondary small text-uppercase fw-bold">Status</th>
                    <th class="py-3 text-secondary small text-uppercase fw-bold text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($logbook_list as $log): ?>
                <tr class="border-bottom border-light">
                    <td class="ps-4">
                        <div class="fw-bold text-dark"><?= date('d', strtotime($log->tanggal)) ?></div>
                        <div class="text-muted small"><?= date('M Y', strtotime($log->tanggal)) ?></div>
                    </td>
                    <td style="max-width: 300px;">
                        <div class="text-dark fw-medium text-truncate"><?= substr($log->kegiatan, 0, 50) ?>...</div>
                        <?php if($log->feedback_dosen): ?>
                            <div class="mt-1 p-2 bg-warning bg-opacity-10 rounded small text-warning border border-warning border-opacity-25">
                                <i class="bi bi-chat-quote-fill me-1"></i> <?= $log->feedback_dosen ?>
                            </div>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <?php if($log->file_dokumentasi): ?>
                            <a href="<?= base_url('uploads/logbook/'.$log->file_dokumentasi) ?>" target="_blank" class="btn btn-sm btn-light border text-primary">
                                <i class="bi bi-file-earmark-text"></i>
                            </a>
                        <?php else: ?>
                            <span class="badge bg-light text-muted border">Empty</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php 
                            $cls = 'bg-secondary text-white';
                            if($log->status == 'Disetujui') $cls = 'bg-success text-white';
                            if($log->status == 'Perlu Revisi') $cls = 'bg-warning text-dark';
                        ?>
                        <span class="badge badge-pill-modern <?= $cls ?> bg-opacity-75">
                            <?= $log->status ?>
                        </span>
                    </td>
                    <td class="text-end pe-4">
                         <?php if($log->status != 'Disetujui'): ?>
                            <button class="btn btn-sm btn-light border btn-edit" data-id="<?= $log->id ?>">
                                <i class="bi bi-pencil-fill text-dark"></i>
                            </button>
                        <?php else: ?>
                            <i class="bi bi-check2-all text-success fs-5"></i>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>