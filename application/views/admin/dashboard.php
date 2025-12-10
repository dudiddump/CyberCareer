<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-dark mb-0">Dashboard</h2>
        <p class="text-muted small">Halo, <span class="fw-bold text-primary"><?= $this->session->userdata('nama_lengkap') ?></span>! Berikut ringkasan data hari ini.</p>
    </div>
    <div class="text-end text-muted small">
        <i class="bi bi-calendar3 me-1"></i> <?= date('d M Y') ?>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card card-modern p-4 bg-primary text-white border-0 position-relative overflow-hidden h-100">
            <div class="position-relative z-1">
                <h6 class="opacity-75 mb-1">Total Mahasiswa</h6>
                <h2 class="fw-bold mb-0"><?= $total_mhs ?></h2>
            </div>
            <i class="bi bi-people position-absolute top-50 end-0 translate-middle-y me-3 fs-1 opacity-25"></i>
            <a href="<?= base_url('admin/mahasiswa') ?>" class="stretched-link"></a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-modern p-4 bg-info text-white border-0 position-relative overflow-hidden h-100">
            <div class="position-relative z-1">
                <h6 class="opacity-75 mb-1">Total Dosen</h6>
                <h2 class="fw-bold mb-0"><?= $total_dosen ?></h2>
            </div>
            <i class="bi bi-person-video3 position-absolute top-50 end-0 translate-middle-y me-3 fs-1 opacity-25"></i>
            <a href="<?= base_url('admin/dosen') ?>" class="stretched-link"></a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-modern p-4 bg-warning text-dark border-0 position-relative overflow-hidden h-100">
            <div class="position-relative z-1">
                <h6 class="opacity-75 mb-1">Mitra Industri</h6>
                <h2 class="fw-bold mb-0"><?= $total_mitra ?></h2>
            </div>
            <i class="bi bi-buildings position-absolute top-50 end-0 translate-middle-y me-3 fs-1 opacity-25"></i>
            <a href="<?= base_url('admin/mitra') ?>" class="stretched-link"></a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-modern p-4 bg-success text-white border-0 position-relative overflow-hidden h-100">
            <div class="position-relative z-1">
                <h6 class="opacity-75 mb-1">Lowongan Aktif</h6>
                <h2 class="fw-bold mb-0"><?= $total_loker ?></h2>
            </div>
            <i class="bi bi-briefcase position-absolute top-50 end-0 translate-middle-y me-3 fs-1 opacity-25"></i>
            <a href="<?= base_url('admin/detail_mitra') ?>" class="stretched-link"></a>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card card-modern h-100 border-0 shadow-sm">
            <div class="card-header bg-transparent border-0 pt-4 px-4">
                <h6 class="fw-bold text-dark mb-0"><i class="bi bi-pie-chart me-2"></i>Status Magang</h6>
            </div>
            <div class="card-body d-flex align-items-center justify-content-center">
                <div style="width: 250px; height: 250px;">
                    <canvas id="chartStatus"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card card-modern h-100 border-0 shadow-sm">
            <div class="card-header bg-transparent border-0 pt-4 px-4">
                <h6 class="fw-bold text-dark mb-0"><i class="bi bi-bar-chart-line me-2"></i>Mahasiswa per Prodi</h6>
            </div>
            <div class="card-body">
                <div style="height: 300px; width: 100%;">
                    <canvas id="chartProdi"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card card-modern border-0 shadow-sm">
    <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
        <h6 class="fw-bold text-dark mb-0">Aktivitas Terbaru</h6>
        <a href="<?= base_url('admin/mahasiswa') ?>" class="btn btn-sm btn-light border small">Lihat Semua</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 small text-muted">Mahasiswa</th>
                        <th class="small text-muted">Perusahaan & Posisi</th>
                        <th class="small text-muted">Status</th>
                        <th class="small text-muted text-end pe-4">Mulai Magang</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($recent_activities)): ?>
                        <?php foreach($recent_activities as $act): ?>
                        <tr>
                            <td class="ps-4">
                                <span class="fw-bold text-dark"><?= $act->nama_lengkap ?></span>
                                <br>
                                <span class="text-muted small font-monospace"><?= $act->mahasiswa_id ?></span>
                            </td>
                            <td>
                                <span class="fw-bold text-dark"><?= $act->nama_perusahaan ?></span>
                                <div class="text-muted small"><?= $act->posisi ?></div>
                            </td>
                            <td>
                                <?php if($act->status == 'Aktif'): ?>
                                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3">Aktif</span>
                                <?php else: ?>
                                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">Selesai</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-end pe-4 text-muted small">
                                <i class="bi bi-clock me-1"></i><?= date('d M Y', strtotime($act->tgl_mulai)) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2 opacity-25"></i>
                                Belum ada aktivitas terbaru.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {

    const ctxStatus = document.getElementById('chartStatus');
    const totalDataStatus = <?= $mhs_magang + $mhs_selesai + $mhs_belum ?>;

    new Chart(ctxStatus, {
        type: 'doughnut',
        data: {
            labels: ['Sedang Magang', 'Selesai Magang', 'Belum Magang'],
            datasets: [{
                data: [<?= $mhs_magang ?>, <?= $mhs_selesai ?>, <?= $mhs_belum ?>],
                backgroundColor: ['#3b82f6', '#10b981', '#e5e7eb'],
                borderWidth: 2,
                borderColor: '#ffffff',
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom', labels: { usePointStyle: true, padding: 20 } }
            }
        }
    });

    const labelsProdi = [<?php foreach($stats_prodi as $s) echo '"' . $s->prodi . '",'; ?>];
    const dataProdi = [<?php foreach($stats_prodi as $s) echo $s->jumlah . ','; ?>];

    new Chart(document.getElementById('chartProdi'), {
        type: 'bar',
        data: {
            labels: labelsProdi,
            datasets: [{
                label: 'Jumlah Mhs',
                data: dataProdi,
                backgroundColor: ['#3b82f6', '#6366f1', '#8b5cf6', '#ec4899', '#f43f5e'],
                borderRadius: 4,
                maxBarThickness: 50
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { borderDash: [2, 2] }, ticks: { stepSize: 1 } },
                x: { grid: { display: false } }
            }
        }
    });
});
</script>