<?php
$tahun_masuk = (int) $user->tahun_masuk;
$tahun_skrg  = (int) date('Y');
$bulan_skrg  = (int) date('n'); 
$selisih_tahun = $tahun_skrg - $tahun_masuk;

if ($bulan_skrg >= 9) $semester_sekarang = ($selisih_tahun * 2) + 1;
elseif ($bulan_skrg < 3) $semester_sekarang = ($selisih_tahun * 2) - 1;
else $semester_sekarang = ($selisih_tahun * 2);
if ($semester_sekarang < 1) $semester_sekarang = 1;

$ci =& get_instance();
$magang_aktif = $ci->db->get_where('riwayat_magang', ['mahasiswa_id' => $user->id, 'status' => 'Aktif'])->num_rows() > 0;

$akses_terbuka = false;
if ($semester_sekarang >= 6) $akses_terbuka = true;
elseif ($semester_sekarang == 5 && $bulan_skrg == 2 && $magang_aktif) $akses_terbuka = true;
?>

<div class="p-4">
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-dark mb-0">Dashboard</h2>
        <p class="text-muted mb-0">Selamat datang kembali, <b><?= html_escape($user->nama_lengkap) ?></b>! 👋</p>
    </div>
    <div class="d-none d-md-block">
        <span class="badge bg-white text-secondary border px-3 py-2 rounded-pill shadow-sm">
            <i class="bi bi-calendar-event me-2"></i> <?= date('d M Y') ?>
        </span>
    </div>
</div>

<?php if ($this->session->userdata('must_change_password')): ?>
    <div id="securityAlert" class="alert alert-warning border-0 shadow-sm d-flex align-items-center mb-4" role="alert">
        <div class="fs-1 text-warning me-3">
            <i class="bi bi-exclamation-triangle-fill"></i>
        </div>
        <div>
            <h6 class="fw-bold mb-1 text-alert-danger">Peringatan Keamanan!</h6>
            <span class="small">Anda masih menggunakan password default. Demi keamanan akun, segera 
            <a href="<?= base_url('mahasiswa/profil') ?>" class="fw-bold text-decoration-underline text-alert-danger">ganti password Anda</a>.</span>
        </div>
    </div>
<?php endif; ?>

<div class="row g-4">
    
    <div class="col-lg-8">
        
        <div class="card card-modern border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-briefcase me-2 text-primary"></i>Peluang Terbaru</h5>
                <a href="<?= base_url('mahasiswa/mitra') ?>" class="text-decoration-none small fw-bold">Lihat Semua</a>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <?php if(empty($perusahaan_list)): ?>
                        <div class="col-12 text-center py-5 text-muted bg-light rounded">
                            <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary"></i>
                            Belum ada lowongan tersedia saat ini.
                        </div>
                    <?php else: ?>
                        <?php foreach ($perusahaan_list as $p): ?>
                        <div class="col-md-6">
                            <div class="card h-100 border border-light-subtle hover-shadow transition-all p-3">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="<?= $p->logo ? base_url('assets/img/' . $p->logo) : 'https://ui-avatars.com/api/?name='.urlencode($p->nama).'&background=random&size=128' ?>" 
                                         alt="<?= $p->nama ?>" 
                                         class="rounded p-1 border bg-white shadow-sm" 
                                         style="width: 48px; height: 48px; object-fit: contain;">
                                    <div class="ms-3 overflow-hidden">
                                        <h6 class="fw-bold mb-0 text-truncate text-dark" title="<?= $p->posisi ?>">
                                            <?= $p->posisi ?>
                                        </h6>
                                        <small class="text-muted text-truncate d-block"><?= $p->nama ?></small>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <?php 
                                        $badge = 'bg-info text-info';
                                        if($p->tipe == 'Full Time') $badge = 'bg-success text-success';
                                        if($p->tipe == 'Part Time') $badge = 'bg-warning text-warning';
                                    ?>
                                    <span class="badge <?= $badge ?> bg-opacity-10 border border-opacity-25 rounded-pill px-3">
                                        <?= $p->tipe ?>
                                    </span>
                                    <a href="<?= base_url('mahasiswa/detail_mitra/'.$p->perusahaan_id) ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-bold">Detail</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="card card-modern border-0 shadow-sm">
            <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-journal-text me-2 text-primary"></i>Logbook Terakhir</h5>
                
                <?php if($akses_terbuka): ?>
                    <a href="<?= base_url('mahasiswa/logbook') ?>" class="text-decoration-none small fw-bold">Kelola Logbook</a>
                <?php endif; ?>
            </div>
            
            <div class="card-body p-0">
                
                <?php if(!$akses_terbuka): ?>
                    
                    <div class="text-center py-5">
                        <div class="bg-light p-3 rounded-circle d-inline-block text-muted mb-3">
                            <i class="bi bi-lock-fill fs-1 opacity-50"></i>
                        </div>
                        <h6 class="fw-bold text-dark">Fitur Belum Tersedia</h6>
                        <p class="text-muted small mb-0 px-4">
                            Anda masih <b>Semester <?= $semester_sekarang ?></b>.<br>
                            Logbook akan terbuka otomatis di Semester 6.
                        </p>
                    </div>

                <?php else: ?>

                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 py-3 text-secondary small fw-bold">Tanggal</th>
                                    <th class="py-3 text-secondary small fw-bold">Kegiatan</th>
                                    <th class="py-3 text-secondary small fw-bold">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($logbook_terakhir)): ?>
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-muted">
                                            <small>Belum ada catatan logbook terbaru.</small>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach($logbook_terakhir as $log): ?>
                                    <tr class="border-bottom border-light hover-row">
                                        <td class="ps-4">
                                            <div class="fw-bold text-dark"><?= date('d M', strtotime($log->tanggal)) ?></div>
                                            <small class="text-muted"><?= date('Y', strtotime($log->tanggal)) ?></small>
                                        </td>
                                        <td class="text-truncate" style="max-width: 220px;">
                                            <?= html_escape($log->kegiatan) ?>
                                        </td>
                                        <td>
                                            <?php 
                                                $cls = 'bg-secondary text-white';
                                                if($log->status == 'Disetujui') $cls = 'bg-success text-white';
                                                if($log->status == 'Perlu Revisi') $cls = 'bg-warning text-dark';
                                            ?>
                                            <span class="badge <?= $cls ?> bg-opacity-75 rounded-pill px-2 py-1" style="font-size: 10px;">
                                                <?= $log->status ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                <?php endif; ?>
            </div>
        </div>

    </div>

    <div class="col-lg-4">
        
        <div class="card card-modern border-0 shadow-sm mb-4 text-center overflow-hidden">
            <div class="bg-primary bg-opacity-10" style="height: 80px;"></div>
            <div class="card-body pt-0 pb-4">
                <div class="position-relative d-inline-block" style="margin-top: -50px;">
                    <img src="<?= $user->foto ? base_url('uploads/foto/'.$user->foto) : base_url('assets/img/default-avatar.png') ?>" 
                         class="rounded-circle border border-4 border-white shadow-sm bg-white object-fit-cover" 
                         width="100" height="100" alt="User">
                </div>
                
                <h5 class="fw-bold mt-3 mb-1 text-dark"><?= html_escape($user->nama_lengkap) ?></h5>
                <div class="text-muted small mb-3">
                    <div class="fw-semibold text-primary"><?= $user->id ?></div>
                    <div><?= $user->prodi ?></div>
                </div>
                
                <div class="d-grid px-4">
                    <a href="<?= base_url('mahasiswa/profil') ?>" class="btn btn-outline-dark btn-sm rounded-pill">
                        <i class="bi bi-gear-fill me-1"></i> Kelola Profil
                    </a>
                </div>
            </div>
        </div>
        
        <div class="card card-modern border-0 shadow-sm bg-primary text-white position-relative overflow-hidden">
            
            <div class="position-absolute d-flex align-items-center justify-content-center" 
                 style="width: 150px; height: 150px; top: -20px; right: -20px; 
                        background: rgba(255, 255, 255, 0.1); 
                        border-radius: 50%;">
                 <i class="bi bi-mortarboard-fill text-white opacity-50" style="font-size: 4rem;"></i>
            </div>
            
            <div class="card-body p-4 position-relative">
                <h6 class="fw-bold opacity-75 mb-2">IPK Terakhir</h6>
                <h1 class="fw-bold display-3 mb-0">
                    <?= ($user->ipk_terakhir > 0) ? $user->ipk_terakhir : '-' ?>
                </h1>
                <div class="mt-4 pt-3 border-top border-white border-opacity-25">
                    <small class="opacity-75">
                        <i class="bi bi-info-circle me-1"></i>Berdasarkan KHS Semester Lalu
                    </small>
                </div>
            </div>
        </div>

        <div class="card card-modern border-0 shadow-sm mt-4">
            <div class="card-body p-4">
                <h6 class="fw-bold text-dark mb-2">Butuh Bantuan?</h6>
                <p class="text-muted small mb-3">Hubungi dosen pembimbing atau admin jika ada kendala teknis.</p>
                <a href="#" class="btn btn-success btn-sm w-100 text-primary fw-bold border rounded-pill">
                    <i class="bi bi-whatsapp me-1"></i> Hubungi Admin
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
    .transition-all { transition: all 0.3s ease; }
    .hover-row:hover { background-color: rgba(0,0,0,0.02)}


    .text-alert-danger {
        color: inherit; 
    }

    body.dark .alert-warning {
        background-color: #fff3cd !important; 
        border-color: #ffecb5 !important;
    }
    body.dark .text-alert-danger {
        color: #842029 !important;
    }
    body.dark .text-warning {
        color: #ffc107 !important;
    }
</style>

<script>
    $(document).ready(function() {
        // Cek apakah alert keamanan ada di halaman
        if ($("#securityAlert").length) {
            // Tunggu 5000ms (5 detik), lalu fade out pelan-pelan
            setTimeout(function() {
                $("#securityAlert").fadeOut('slow');
            }, 5000);
        }
    });
</script>
</div>