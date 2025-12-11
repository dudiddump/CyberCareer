<link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    /* Pagination Orange */
    .page-item.active .page-link { background-color: var(--color-orange) !important; border-color: var(--color-orange) !important; border-radius: 50%; color: white !important; }
    .page-link { color: var(--color-orange); border: none; border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; margin: 0 2px; }
    .dataTables_filter, .dataTables_length { display: none; } 
    
    /* Table Styling */
    #tableLoker thead th {
        border-bottom: 2px solid #fff3cd;
        color: #856404; 
    }
    .btn-orange {
        background-color: var(--color-orange);
        color: white;
        border: none;
    }
    .btn-orange:hover {
        background-color: #e86300;
        color: white;
    }
</style>

<div class="card card-modern border-0 mb-4 overflow-hidden position-relative" style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);">
    <div class="card-body p-4 position-relative z-1 text-white">
        <div class="d-flex align-items-center mb-3">
            <a href="<?= base_url('admin/mitra') ?>" class="btn btn-sm btn-light bg-opacity-25 text-white border-0 rounded-pill me-2 px-3" title="Kembali ke Daftar Mitra">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
            <span class="opacity-75 small text-uppercase ls-1 border-start border-white border-opacity-25 ps-3 ms-1">Kelola Lowongan Magang</span>
        </div>

        <div class="d-flex align-items-center">
            <div class="bg-white p-2 rounded-3 me-3 shadow-sm d-flex align-items-center justify-content-center" style="width: 72px; height: 72px;">
                <img src="<?= $mitra->logo ? base_url('assets/img/'.$mitra->logo) : 'https://ui-avatars.com/api/?name='.urlencode($mitra->nama_perusahaan).'&background=random' ?>" class="img-fluid" style="max-height: 100%;">
            </div>
            <div>
                <h2 class="fw-bold mb-1"><?= $mitra->nama_perusahaan ?></h2>
                <div class="d-flex align-items-center gap-3 opacity-75 small">
                    <span><i class="bi bi-geo-alt me-1"></i> <?= $mitra->alamat ?></span>
                    <?php if($mitra->website): ?>
                        <span class="border-start border-white border-opacity-50 ps-3">
                            <i class="bi bi-globe me-1"></i> <?= $mitra->website ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <i class="bi bi-buildings position-absolute top-50 end-0 translate-middle-y me-4 text-white opacity-10" style="font-size: 8rem; pointer-events: none;"></i>
</div>

<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i><?= $this->session->flashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<!-- TABEL LOWONGAN -->
<div class="card card-modern overflow-hidden" style="min-height: 400px;">
    <div class="card-header bg-white border-bottom p-4 d-flex justify-content-between align-items-center">
        <div>
            <h6 class="fw-bold text-dark mb-0">Daftar Lowongan Aktif</h6>
            <p class="text-muted small mb-0">Kelola posisi magang yang dibuka oleh mitra ini.</p>
        </div>
        <button class="btn btn-orange rounded-pill fw-bold px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalAddLoker">
            <i class="bi bi-plus-lg me-1"></i> Tambah Lowongan
        </button>
    </div>
    
    <div class="table-responsive">
        <table class="table align-middle mb-0 w-100 table-hover" id="tableLoker">
            <thead class="bg-light">
                <tr>
                    <th class="ps-4 py-3 text-uppercase border-0">Posisi</th>
                    <th class="text-uppercase border-0">Tipe & Kuota</th>
                    <th class="text-uppercase border-0">Tenggat</th>
                    <th class="text-uppercase border-0">Status</th>
                    <th class="text-end pe-4 text-uppercase border-0">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lowongan as $l): ?>
                <tr>
                    <td class="ps-4 py-3">
                        <div class="fw-bold text-dark mb-1" style="font-size: 1rem;"><?= $l->posisi ?></div>
                        <div class="text-muted small d-flex align-items-center gap-2">
                            <i class="bi bi-clock-history text-warning"></i> 
                            Posted: <?= date('d M Y', strtotime($l->tgl_posting)) ?>
                        </div>
                    </td>
                    <td>
                        <span class="badge bg-white text-dark border shadow-sm rounded-pill mb-1 fw-normal px-2"><?= $l->tipe ?></span>
                        <div class="small text-muted mt-1">Kuota: <strong class="text-dark"><?= $l->kuota ?></strong></div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark"><?= date('d M Y', strtotime($l->tenggat_pengajuan)) ?></div>
                        <div class="small text-muted">Batas Akhir</div>
                    </td>
                    <td>
                        <?php if($l->tenggat_pengajuan < date('Y-m-d')): ?>
                            <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3 py-2">Expired</span>
                        <?php else: ?>
                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2">Active</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end pe-4">
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-sm btn-outline-warning rounded-2 btn-edit" data-id="<?= $l->id ?>" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <a href="<?= base_url('admin/hapus_lowongan/'.$l->id) ?>" class="btn btn-sm btn-outline-danger rounded-2" onclick="return confirm('Hapus lowongan ini?')" title="Hapus">
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalAddLoker" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg card-modern">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-dark">Tambah Lowongan di <?= $mitra->nama_perusahaan ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('admin/tambah_lowongan') ?>" method="POST">
                <div class="modal-body p-4">
                    <input type="hidden" name="perusahaan_id" value="<?= $mitra->id ?>">
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">Posisi Magang</label>
                            <input type="text" name="posisi" class="form-control input-modern" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-bold text-muted">Tipe</label>
                            <select name="tipe" class="form-select input-modern">
                                <option value="Magang">Magang</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-bold text-muted">Kuota</label>
                            <input type="number" name="kuota" class="form-control input-modern" value="1" min="1">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">Tenggat Waktu</label>
                            <input type="date" name="tenggat_pengajuan" class="form-control input-modern" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control input-modern" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">Kualifikasi</label>
                            <textarea name="kualifikasi" class="form-control input-modern" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">Link Pendaftaran (Opsional)</label>
                            <input type="text" name="link_pendaftaran" class="form-control input-modern" placeholder="https://...">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="submit" class="btn btn-orange px-4 rounded-pill fw-bold w-100">Terbitkan Lowongan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditLoker" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg card-modern">
            <div class="modal-header border-bottom bg-warning bg-opacity-10">
                <h5 class="modal-title fw-bold text-dark">Edit Lowongan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('admin/update_lowongan') ?>" method="POST">
                <div class="modal-body p-4">
                    <input type="hidden" name="id_lowongan" id="edit_id">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">Posisi</label>
                            <input type="text" name="posisi" id="edit_posisi" class="form-control input-modern" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-bold text-muted">Tipe</label>
                            <select name="tipe" id="edit_tipe" class="form-select input-modern">
                                <option value="Magang">Magang</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-bold text-muted">Kuota</label>
                            <input type="number" name="kuota" id="edit_kuota" class="form-control input-modern">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">Tenggat Waktu</label>
                            <input type="date" name="tenggat_pengajuan" id="edit_tenggat" class="form-control input-modern" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">Deskripsi</label>
                            <textarea name="deskripsi" id="edit_deskripsi" class="form-control input-modern" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">Kualifikasi</label>
                            <textarea name="kualifikasi" id="edit_kualifikasi" class="form-control input-modern" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">Link Pendaftaran</label>
                            <input type="text" name="link_pendaftaran" id="edit_link" class="form-control input-modern">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="submit" class="btn btn-warning px-4 rounded-pill fw-bold w-100 text-white">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#tableLoker').DataTable({
        "pageLength": 10,
        "lengthChange": false,
        "dom": 'rtip',
        "language": { "paginate": { "next": ">", "previous": "<" }, "zeroRecords": "Belum ada lowongan di perusahaan ini" }
    });

    $(document).on('click', '.btn-edit', function() {
        const id = $(this).data('id');
        $.ajax({
            url: '<?= base_url('index.php/admin/get_loker_detail/') ?>' + id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if(data) {
                    $('#edit_id').val(data.id);
                    $('#edit_posisi').val(data.posisi);
                    $('#edit_tipe').val(data.tipe);
                    $('#edit_kuota').val(data.kuota);
                    $('#edit_tenggat').val(data.tenggat_pengajuan);
                    $('#edit_deskripsi').val(data.deskripsi);
                    $('#edit_kualifikasi').val(data.kualifikasi);
                    $('#edit_link').val(data.link_pendaftaran);
                    new bootstrap.Modal(document.getElementById('modalEditLoker')).show();
                }
            }
        });
    });
});
</script>