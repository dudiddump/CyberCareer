<style>
    body.dark .table {
        color: #e2e8f0;
        border-color: #334155;
    }
    body.dark .table thead th {
        background-color: #1e293b;
        color: #fff;
        border-bottom: 1px solid #334155;
    }
    body.dark .table tbody td {
        border-bottom: 1px solid #334155;
        background-color: #1e293b; 
    }
    body.dark .table-hover tbody tr:hover td {
        background-color: #334155; 
    }
    body.dark .text-muted {
        color: #94a3b8 !important;
    }
</style>

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
        <div class="card card-modern p-4 border-0 position-relative overflow-hidden h-100 text-white" 
             style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);">
            <div class="position-relative z-1">
                <h6 class="opacity-75 mb-1">Total Mahasiswa</h6>
                <h2 class="fw-bold mb-0"><?= $total_mhs ?></h2>
            </div>
            <i class="bi bi-people position-absolute top-50 end-0 translate-middle-y me-3 fs-1 opacity-25"></i>
            <a href="<?= base_url('admin/mahasiswa') ?>" class="stretched-link"></a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-modern p-4 border-0 position-relative overflow-hidden h-100 text-white"
             style="background: linear-gradient(135deg, #0dcaf0 0%, #0aa2c0 100%);">
            <div class="position-relative z-1">
                <h6 class="opacity-75 mb-1">Total Dosen</h6>
                <h2 class="fw-bold mb-0"><?= $total_dosen ?></h2>
            </div>
            <i class="bi bi-person-video3 position-absolute top-50 end-0 translate-middle-y me-3 fs-1 opacity-25"></i>
            <a href="<?= base_url('admin/dosen') ?>" class="stretched-link"></a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-modern p-4 border-0 position-relative overflow-hidden h-100 text-white"
             style="background: linear-gradient(135deg, #fd7e14 0%, #e36209 100%);"> 
            <div class="position-relative z-1">
                <h6 class="opacity-75 mb-1">Mitra Industri</h6>
                <h2 class="fw-bold mb-0"><?= $total_mitra ?></h2>
            </div>
            <i class="bi bi-buildings position-absolute top-50 end-0 translate-middle-y me-3 fs-1 opacity-25"></i>
            <a href="<?= base_url('admin/mitra') ?>" class="stretched-link"></a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-modern p-4 border-0 position-relative overflow-hidden h-100 text-white"
             style="background: linear-gradient(135deg, #198754 0%, #146c43 100%);">
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
                <h6 class="fw-bold text-dark mb-0">
                    <i class="bi bi-pie-chart-fill me-2 text-primary"></i>Target Magang (2022)
                </h6>
                <small class="text-muted">Progres Mahasiswa Angkatan <?= $stats_magang['angkatan'] ?></small>
            </div>
            <div class="card-body d-flex align-items-center justify-content-center">
                <div style="width: 240px; height: 240px;">
                    <canvas id="chartStatus"></canvas>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 pb-4 text-center">
                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 me-2">
                    <?= $stats_magang['sudah'] ?> Sudah
                </span>
                <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3">
                    <?= $stats_magang['belum'] ?> Belum
                </span>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card card-modern h-100 border-0 shadow-sm">
            <div class="card-header bg-transparent border-0 pt-4 px-4">
                <h6 class="fw-bold text-dark mb-0"><i class="bi bi-trophy-fill me-2 text-warning"></i>Top Mitra Rekrutmen</h6>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <?php foreach($top_mitra as $tm): ?>
                    <li class="list-group-item border-0 d-flex align-items-center px-4 py-3 bg-transparent">
                        <div class="bg-light p-2 rounded border me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <img src="<?= $tm->logo ? base_url('assets/img/'.$tm->logo) : 'https://ui-avatars.com/api/?name='.urlencode($tm->nama_perusahaan).'&background=random' ?>" 
                                 class="img-fluid" style="max-height: 24px;">
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="fw-bold text-dark mb-0 text-truncate" style="max-width: 150px;"><?= $tm->nama_perusahaan ?></h6>
                        </div>
                        <span class="badge bg-primary rounded-pill"><?= $tm->jumlah ?> Mhs</span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-modern h-100 border-0 shadow-sm">
            <div class="card-header bg-transparent border-0 pt-4 px-4">
                <h6 class="fw-bold text-dark mb-0"><i class="bi bi-bar-chart-line-fill me-2 text-info"></i>Sebaran Mahasiswa</h6>
            </div>
            <div class="card-body">
                <div style="height: 250px; width: 100%;">
                    <canvas id="chartProdi"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card card-modern border-0 shadow-sm">
    <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
        <h6 class="fw-bold text-dark mb-0"><i class="bi bi-clock-history me-2 text-primary"></i>Aktivitas Terbaru</h6>
        <a href="<?= base_url('admin/mahasiswa') ?>" class="btn btn-sm btn-light border fw-bold text-primary small">Lihat Semua</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light border-bottom">
                    <tr>
                        <th class="ps-4 py-3 small text-secondary fw-bold text-uppercase">Mahasiswa</th>
                        <th class="py-3 small text-secondary fw-bold text-uppercase">Perusahaan & Posisi</th>
                        <th class="py-3 small text-secondary fw-bold text-uppercase">Status</th>
                        <th class="py-3 small text-secondary fw-bold text-uppercase text-end pe-4">Mulai Magang</th>
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
                                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-10 rounded-pill px-3">
                                        <i class="bi bi-circle-fill me-1 small" style="font-size: 6px; vertical-align: middle;"></i> Aktif
                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-10 rounded-pill px-3">
                                        <i class="bi bi-check-circle-fill me-1 small"></i> Selesai
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="text-end pe-4 text-muted small">
                                <i class="bi bi-calendar-event me-1"></i><?= date('d M Y', strtotime($act->tgl_mulai)) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2 opacity-25"></i>
                                <span class="small">Belum ada aktivitas terbaru.</span>
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
    new Chart(ctxStatus, {
        type: 'doughnut',
        data: {
            labels: ['Sudah Magang', 'Belum Magang'],
            datasets: [{
                data: [<?= $stats_magang['sudah'] ?>, <?= $stats_magang['belum'] ?>],
                backgroundColor: ['#10b981', '#ef4444'],
                borderWidth: 0,
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
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
                label: 'Jumlah Mahasiswa',
                data: dataProdi,
                backgroundColor: '#0dcaf0', 
                borderRadius: 6,
                barPercentage: 0.6,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { borderDash: [4, 4], color: '#f1f5f9' }, ticks: { stepSize: 5 }, border: { display: false } },
                x: { grid: { display: false }, ticks: { font: { size: 10 } }, border: { display: false } }
            }
        }
    });
});
</script>