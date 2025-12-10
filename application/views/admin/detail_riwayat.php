<div class="mb-4 d-print-none">
    <a href="<?= base_url('admin/mahasiswa') ?>" class="text-decoration-none text-muted small fw-bold">
        <i class="bi bi-arrow-left me-1"></i> KEMBALI KE DATA MAHASISWA
    </a>
</div>

<div class="d-none d-print-block text-center mb-4">
    <h3 class="fw-bold">Laporan Logbook Magang Mahasiswa</h3>
    <p>Cyber University - Tahun Akademik <?= date('Y') ?></p>
    <p>Mahasiswa: <?= $mhs->nama_lengkap ?> (<?= $mhs->id ?>)</p>
    <hr>
</div>

<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4 d-print-none" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i><?= $this->session->flashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="row">
    
    <div class="col-md-4">
        
        <div class="card card-modern p-4 text-center mb-4">
            <div class="mb-3">
                <img src="<?= base_url('assets/img/default-avatar.png') ?>" class="rounded-circle border shadow-sm" width="100">
            </div>
            <h5 class="fw-bold text-dark mb-1"><?= $mhs->nama_lengkap ?></h5>
            <p class="text-muted mb-3"><?= $mhs->id ?> <br> <?= $mhs->prodi ?></p>
            
            <div class="d-grid gap-2 d-print-none">
                <?php 
                    // Bersihkan nomor (hapus spasi, -, +)
                    $clean_wa = preg_replace('/[^0-9]/', '', $mhs->telepon);
                    
                    // Ubah 08 jadi 628
                    if(substr($clean_wa, 0, 1) == '0') {
                        $clean_wa = '62' . substr($clean_wa, 1);
                    }
                    
                    $wa_link = $mhs->telepon ? 'https://wa.me/' . $clean_wa : '#';
                    $wa_class = $mhs->telepon ? 'btn-success text-white' : 'btn-light border disabled text-muted';
                ?>
                
                <a href="<?= $wa_link ?>" target="_blank" class="btn <?= $wa_class ?> d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-whatsapp me-2"></i>WhatsApp</span>
                    <small><?= $mhs->telepon ?? '-' ?></small>
                </a>
            </div>
        </div>

        <div class="card card-modern p-4">
            <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                <h6 class="fw-bold text-dark mb-0">Riwayat Penempatan</h6>
                <button class="btn btn-sm btn-primary rounded-circle d-print-none" data-bs-toggle="modal" data-bs-target="#addRiwayatMhs" title="Tambah Manual">
                    <i class="bi bi-plus-lg"></i>
                </button>
            </div>

            <?php if(empty($riwayat)): ?>
                <div class="text-center py-3">
                    <small class="text-muted fst-italic">Belum ada riwayat.</small>
                </div>
            <?php else: ?>
                <div class="d-flex flex-column gap-3">
                    <?php foreach($riwayat as $r): ?>
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="fw-bold text-primary small"><?= $r->nama_perusahaan ?></div>
                            <a href="<?= base_url('admin/hapus_riwayat/'.$r->id) ?>" class="text-danger small d-print-none" onclick="return confirm('Hapus riwayat ini?')">
                                <i class="bi bi-x-lg"></i>
                            </a>
                        </div>
                        <div class="text-dark small fw-medium"><?= $r->posisi ?></div>
                        <div class="text-muted" style="font-size: 10px;">
                            <?= date('M Y', strtotime($r->tgl_mulai)) ?> - 
                            <?= $r->status == 'Aktif' ? '<span class="text-success fw-bold">Aktif</span>' : ($r->tgl_selesai ? date('M Y', strtotime($r->tgl_selesai)) : 'Selesai') ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-md-8">
        
        <div class="d-flex justify-content-between align-items-center mb-3 d-print-none">
            <h5 class="fw-bold text-dark mb-0">Detail Aktivitas Logbook</h5>
            <button onclick="window.print()" class="btn btn-primary rounded-pill px-4 fw-bold">
                <i class="bi bi-printer me-2"></i> Cetak Laporan
            </button>
        </div>

        <div class="card card-modern overflow-hidden">
            <div class="table-responsive">
                <table class="table align-middle mb-0 table-bordered">
                    <thead class="bg-light text-center"> <tr>
                            <th class="py-3" width="15%">Tanggal</th>
                            <th width="20%">Perusahaan</th>
                            <th>Kegiatan</th>
                            <th width="15%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($logbooks)): ?>
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    Belum ada data logbook yang diisi.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach($logbooks as $log): ?>
                            <tr>
                                <td class="fw-bold text-dark text-center">
                                    <?= date('d/m/Y', strtotime($log->tanggal)) ?>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-light text-dark border text-wrap">
                                        <?= $log->nama_perusahaan ?>
                                    </span>
                                </td>
                                <td>
                                    <?= nl2br($log->kegiatan) ?>
                                    <?php if($log->feedback_dosen): ?>
                                        <div class="mt-2 p-2 bg-warning bg-opacity-10 rounded small text-dark border border-warning border-opacity-25">
                                            <b>Feedback Dosen:</b> <?= $log->feedback_dosen ?>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if($log->status == 'Disetujui'): ?>
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle">Disetujui</span>
                                    <?php elseif($log->status == 'Perlu Revisi'): ?>
                                        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning-subtle">Revisi</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border">Pending</span>
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

<div class="modal fade" id="addRiwayatMhs" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card-modern border-0 shadow-lg">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-dark">Tambah Riwayat Magang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('admin/tambah_riwayat_mhs') ?>" method="POST">
                <div class="modal-body p-4">
                    <input type="hidden" name="id_mahasiswa" value="<?= $mhs->id ?>">

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Perusahaan</label>
                        <select name="perusahaan_id" class="form-select input-modern" required>
                            <option value="">-- Pilih Mitra --</option>
                            <?php if(!empty($mitra_list)): ?>
                                <?php foreach($mitra_list as $pt): ?>
                                    <option value="<?= $pt->id ?>"><?= $pt->nama_perusahaan ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Posisi</label>
                        <input type="text" name="posisi" class="form-control input-modern" placeholder="Cth: Web Developer" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control input-modern" placeholder="Cth: Jakarta (WFH)">
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label class="form-label small fw-bold text-muted">Tgl Mulai</label>
                            <input type="date" name="tgl_mulai" class="form-control input-modern" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold text-muted">Tgl Selesai</label>
                            <input type="date" name="tgl_selesai" id="tglSelesaiAdm" class="form-control input-modern">
                        </div>
                    </div>

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" name="status" value="Aktif" id="statusAktifAdm">
                        <label class="form-check-label small fw-bold" for="statusAktifAdm">
                            Status Masih Aktif (Sedang Berjalan)
                        </label>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-light border rounded-pill" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4 rounded-pill fw-bold">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('statusAktifAdm').addEventListener('change', function() {
        const tgl = document.getElementById('tglSelesaiAdm');
        if(this.checked) {
            tgl.disabled = true;
            tgl.value = '';
        } else {
            tgl.disabled = false;
        }
    });
</script>

<style>
@media print {
    .sidebar-wrapper, .navbar, .d-print-none { display: none !important; }
    .main-content { margin: 0 !important; padding: 0 !important; width: 100% !important; }
    body { background-color: white !important; font-size: 12px; }
    .card { border: none !important; box-shadow: none !important; }
    .d-print-block { display: block !important; }
}
</style>