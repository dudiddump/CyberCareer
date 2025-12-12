<style>
    /* --- GLOBAL STYLE --- */
    :root {
        --color-primary: #0d6efd;
    }
    
    .card-modern {
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        background: white;
    }

    /* --- DARK MODE --- */
    body.dark .text-dark { color: #f1f5f9 !important; }
    body.dark .text-muted { color: #94a3b8 !important; }
    body.dark .card-modern {
        background-color: #1e293b;
        border-color: #334155;
        color: #f1f5f9;
        box-shadow: none;
    }
    body.dark .btn-light {
        background-color: #334155;
        color: #fff;
        border-color: #475569;
    }
    body.dark .border-bottom { border-bottom-color: #334155 !important; }
    
    /* Modal Dark Mode */
    body.dark .modal-content { background-color: #1e293b; border: 1px solid #334155; color: #fff; }
    body.dark .modal-header, body.dark .modal-footer { border-color: #334155; }
    body.dark .form-control, body.dark .form-select {
        background-color: #334155; border-color: #475569; color: #fff;
    }
    body.dark .form-control:focus { border-color: var(--color-primary); }
    body.dark .btn-close { filter: invert(1) grayscale(100%) brightness(200%); }

    /* --- PRINT MODE --- */
    @media print {
        .sidebar-wrapper, .navbar, .d-print-none { display: none !important; }
        .main-content { margin: 0 !important; padding: 0 !important; width: 100% !important; }
        body { background-color: white !important; font-size: 12px; color: black !important; }
        .card { border: 1px solid #ddd !important; box-shadow: none !important; }
        .d-print-block { display: block !important; }
        a { text-decoration: none !important; color: black !important; }
        .badge { border: 1px solid #000; color: #000 !important; background: transparent !important; }
    }
</style>

<div class="mb-4 d-print-none">
    <a href="<?= base_url('admin/mahasiswa') ?>" class="text-decoration-none text-muted small fw-bold">
        <i class="bi bi-arrow-left me-1"></i> KEMBALI KE DATA MAHASISWA
    </a>
</div>

<div class="d-none d-print-block text-center mb-4">
    <h3 class="fw-bold">Laporan Riwayat Magang Mahasiswa</h3>
    <p class="mb-0">Cyber University - Tahun Akademik <?= date('Y') ?></p>
    <hr>
</div>

<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4 d-print-none" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i><?= $this->session->flashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="row g-4">
    <div class="col-lg-4">
        
        <div class="card card-modern p-4 text-center mb-4">
            <div class="mb-3">
                <img src="<?= $mhs->foto ? base_url('uploads/foto/'.$mhs->foto) : base_url('assets/img/default-avatar.png') ?>" 
                     class="rounded-circle border shadow-sm object-fit-cover" width="100" height="100">
            </div>
            <h5 class="fw-bold text-dark mb-1"><?= $mhs->nama_lengkap ?></h5>
            <p class="text-muted small mb-1 font-monospace"><?= $mhs->id ?></p>
            <span class="badge bg-light text-dark border rounded-pill px-3 mb-3"><?= $mhs->prodi ?></span>
            
            <div class="d-grid gap-2 d-print-none">
                <?php 
                    $clean_wa = preg_replace('/[^0-9]/', '', $mhs->telepon);
                    if(substr($clean_wa, 0, 1) == '0') $clean_wa = '62' . substr($clean_wa, 1);
                    $wa_link = $mhs->telepon ? 'https://wa.me/' . $clean_wa : '#';
                    $wa_class = $mhs->telepon ? 'btn-success text-white' : 'btn-light border disabled text-muted';
                ?>
                <a href="<?= $wa_link ?>" target="_blank" class="btn <?= $wa_class ?> btn-sm d-flex justify-content-between align-items-center rounded-pill px-3">
                    <span><i class="bi bi-whatsapp me-2"></i>WhatsApp</span>
                    <small><?= $mhs->telepon ?? '-' ?></small>
                </a>
            </div>
        </div>

        <div class="card card-modern p-4">
            <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-3">
                <h6 class="fw-bold text-dark mb-0">Riwayat Penempatan</h6>
                <button class="btn btn-sm btn-primary rounded-circle d-print-none shadow-sm" data-bs-toggle="modal" data-bs-target="#addRiwayatMhs" title="Tambah Manual" style="width: 32px; height: 32px;">
                    <i class="bi bi-plus-lg"></i>
                </button>
            </div>

            <?php if(empty($riwayat)): ?>
                <div class="text-center py-4">
                    <i class="bi bi-journal-x text-muted fs-1 opacity-50 mb-2 d-block"></i>
                    <small class="text-muted fst-italic">Belum ada riwayat magang.</small>
                </div>
            <?php else: ?>
                <div class="d-flex flex-column gap-3">
                    <?php foreach($riwayat as $r): ?>
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <div class="fw-bold text-primary small text-truncate" style="max-width: 200px;" title="<?= $r->nama_perusahaan ?>">
                                <?= $r->nama_perusahaan ?>
                            </div>
                            <a href="<?= base_url('admin/hapus_riwayat/'.$r->id) ?>" class="text-danger small d-print-none opacity-50 hover-opacity-100" onclick="return confirm('Hapus riwayat ini?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>
                        <div class="text-dark small fw-bold mb-1"><?= $r->posisi ?></div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted" style="font-size: 10px;">
                                <i class="bi bi-calendar-event me-1"></i>
                                <?= date('M Y', strtotime($r->tgl_mulai)) ?> - 
                                <?= $r->status == 'Aktif' ? 'Sekarang' : ($r->tgl_selesai ? date('M Y', strtotime($r->tgl_selesai)) : '?') ?>
                            </div>
                            <?php if($r->status == 'Aktif'): ?>
                                <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle rounded-pill" style="font-size: 9px;">Aktif</span>
                            <?php else: ?>
                                <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary-subtle rounded-pill" style="font-size: 9px;">Selesai</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-lg-8">
        
        <div class="d-flex justify-content-between align-items-center mb-3 d-print-none">
            <div>
                <h5 class="fw-bold text-dark mb-0">Aktivitas Logbook</h5>
                <small class="text-muted">Rekap kegiatan harian mahasiswa.</small>
            </div>
            <button onclick="window.print()" class="btn btn-outline-primary btn-sm rounded-pill px-3 fw-bold">
                <i class="bi bi-printer me-2"></i> Cetak Laporan
            </button>
        </div>

        <div class="card card-modern overflow-hidden border-0 shadow-sm" style="min-height: 400px;">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3 text-secondary small fw-bold text-uppercase" width="15%">Tanggal</th>
                            <th class="text-secondary small fw-bold text-uppercase" width="20%">Perusahaan</th>
                            <th class="text-secondary small fw-bold text-uppercase">Kegiatan</th>
                            <th class="text-secondary small fw-bold text-uppercase text-center" width="15%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($logbooks)): ?>
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="bi bi-clipboard-x display-6 d-block mb-3 opacity-25"></i>
                                    Belum ada data logbook yang diisi oleh mahasiswa ini.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach($logbooks as $log): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold text-dark"><?= date('d M', strtotime($log->tanggal)) ?></div>
                                    <small class="text-muted"><?= date('Y', strtotime($log->tanggal)) ?></small>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border text-wrap fw-normal text-start">
                                        <?= $log->nama_perusahaan ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="text-dark small mb-1"><?= nl2br($log->kegiatan) ?></div>
                                    <?php if($log->feedback_dosen): ?>
                                        <div class="p-2 bg-warning bg-opacity-10 rounded small text-dark border border-warning border-opacity-25 d-flex gap-2">
                                            <i class="bi bi-chat-quote-fill text-warning mt-1"></i>
                                            <div>
                                                <strong class="text-warning" style="font-size: 10px;">FEEDBACK DOSEN:</strong><br>
                                                <?= $log->feedback_dosen ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if($log->status == 'Disetujui'): ?>
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle rounded-pill">Disetujui</span>
                                    <?php elseif($log->status == 'Perlu Revisi'): ?>
                                        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning-subtle rounded-pill">Revisi</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary-subtle rounded-pill">Pending</span>
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
            <div class="modal-header border-bottom pb-3">
                <h5 class="modal-title fw-bold text-dark">Tambah Riwayat Magang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('admin/tambah_riwayat_mhs') ?>" method="POST">
                <div class="modal-body p-4">
                    <input type="hidden" name="id_mahasiswa" value="<?= $mhs->id ?>">

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Perusahaan</label>
                        <select name="perusahaan_id" class="form-select" style="border-radius: 8px;" required>
                            <option value="">-- Pilih Mitra Terdaftar --</option>
                            <?php if(!empty($mitra_list)): ?>
                                <?php foreach($mitra_list as $pt): ?>
                                    <option value="<?= $pt->id ?>"><?= $pt->nama_perusahaan ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <div class="form-text small">Jika tidak ada, tambahkan dulu di menu Mitra.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Posisi Magang</label>
                        <input type="text" name="posisi" class="form-control" placeholder="Cth: Web Developer Intern" style="border-radius: 8px;" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Lokasi Penempatan</label>
                        <input type="text" name="lokasi" class="form-control" placeholder="Cth: Jakarta Selatan (WFH)" style="border-radius: 8px;">
                    </div>

                    <div class="row g-3">
                        <div class="col-6">
                            <label class="form-label small fw-bold text-muted">Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai" class="form-control" style="border-radius: 8px;" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold text-muted">Tanggal Selesai</label>
                            <input type="date" name="tgl_selesai" id="tglSelesaiAdm" class="form-control" style="border-radius: 8px;">
                        </div>
                    </div>

                    <div class="form-check mt-3 p-3 bg-light rounded border">
                        <input class="form-check-input" type="checkbox" name="status" value="Aktif" id="statusAktifAdm" style="cursor: pointer;">
                        <label class="form-check-label small fw-bold text-dark" for="statusAktifAdm" style="cursor: pointer;">
                            Status Masih Aktif (Sedang Berjalan)
                        </label>
                    </div>
                </div>
                <div class="modal-footer border-top pt-3">
                    <button type="button" class="btn btn-light border rounded-pill" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4 rounded-pill fw-bold">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Logic: Jika dicentang 'Aktif', tanggal selesai disable
    document.getElementById('statusAktifAdm').addEventListener('change', function() {
        const tgl = document.getElementById('tglSelesaiAdm');
        if(this.checked) {
            tgl.disabled = true;
            tgl.value = '';
            tgl.removeAttribute('required');
        } else {
            tgl.disabled = false;
            tgl.setAttribute('required', true);
        }
    });
</script>