<?php
$pilihan_industri = [
    'Teknologi & IT', 
    'Keuangan & Perbankan', 
    'Pendidikan', 
    'Kesehatan', 
    'BUMN', 
    'Konstruksi & Properti',
    'Manufaktur',
    'Media & Kreatif',
    'Retail & E-Commerce',
    'Lainnya'
];
?>

<div class="p-4">
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-dark mb-0">Kelola Mitra Industri</h2>
        <p class="text-muted small mb-0">Partner perusahaan penyedia lowongan magang.</p>
    </div>
    <button class="btn btn-primary rounded-pill px-4 fw-bold" data-bs-toggle="modal" data-bs-target="#modalAddMitra">
        <i class="bi bi-plus-lg me-1"></i> Tambah Mitra
    </button>
</div>

<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i><?= $this->session->flashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="row g-4">
    <?php foreach($mitra as $m): ?>
    <div class="col-md-4 col-sm-6">
        <div class="card card-modern h-100 border-0 shadow-sm hover-shadow transition-all">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="bg-light p-2 rounded border d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <img src="<?= $m->logo ? base_url('assets/img/'.$m->logo) : 'https://ui-avatars.com/api/?name='.urlencode($m->nama_perusahaan).'&background=random&color=fff&size=128' ?>" 
                             class="img-fluid object-fit-contain rounded">
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-light rounded-circle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                            <li><a class="dropdown-item btn-edit-mitra" href="#" data-id="<?= $m->id ?>">Edit Info</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="<?= base_url('admin/hapus_mitra/'.$m->id) ?>" onclick="return confirm('Yakin hapus mitra ini? Data lowongan terkait juga akan terhapus.')">Hapus</a></li>
                        </ul>
                    </div>
                </div>
                
                <h5 class="fw-bold text-dark mb-1 text-truncate" title="<?= $m->nama_perusahaan ?>"><?= $m->nama_perusahaan ?></h5>
                <span class="badge bg-primary bg-opacity-10 text-primary mb-3 rounded-pill px-3"><?= $m->industri ?></span>
                
                <p class="text-muted small mb-1 text-truncate">
                    <i class="bi bi-geo-alt me-1 text-danger"></i> <?= $m->alamat ? $m->alamat : '-' ?>
                </p>

                <p class="text-muted small mb-3 text-truncate">
                    <i class="bi bi-telephone me-1 text-success"></i> <?= $m->telepon ? $m->telepon : '-' ?>
                </p>
                
                <?php if($m->website): ?>
                    <a href="<?= (strpos($m->website, 'http') === 0) ? $m->website : 'https://'.$m->website ?>" target="_blank" class="small text-decoration-none mb-3 d-block text-truncate">
                        <i class="bi bi-link-45deg me-1"></i> <?= $m->website ?>
                    </a>
                <?php else: ?>
                    <div class="mb-3 small text-muted fst-italic"><i class="bi bi-link-45deg me-1"></i> No Website</div>
                <?php endif; ?>

                <div class="d-grid mt-4">
                    <a href="<?= base_url('admin/detail_mitra/'.$m->id) ?>" class="btn btn-outline-primary rounded-pill fw-bold">
                        <i class="bi bi-briefcase me-1"></i> Kelola <?= $m->jumlah_loker ?> Lowongan
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="modal fade" id="modalAddMitra" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg card-modern">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-dark">Tambah Mitra Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('admin/tambah_mitra') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label small fw-bold text-muted">Upload Logo Perusahaan</label>
                            <input type="file" name="logo" class="form-control input-modern" accept="image/*">
                            <small class="text-muted fst-italic">Format: JPG/PNG, Max: 2MB</small>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label small fw-bold text-muted">Nama Perusahaan <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control input-modern" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted">Industri (Bisa pilih lebih dari satu)</label>
                            <div class="card card-body bg-light border-0 p-3" style="max-height: 150px; overflow-y: auto;">
                                <div class="row g-2">
                                    <?php foreach($pilihan_industri as $ind): ?>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="industri[]" value="<?= $ind ?>" id="add_ind_<?= str_replace(' ', '', $ind) ?>">
                                            <label class="form-check-label small" for="add_ind_<?= str_replace(' ', '', $ind) ?>">
                                                <?= $ind ?>
                                            </label>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-muted">No. Telepon</label>
                            <input type="text" name="telepon" class="form-control input-modern" placeholder="0812...">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Website</label>
                        <input type="text" name="website" class="form-control input-modern" placeholder="www.example.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Alamat</label>
                        <textarea name="alamat" class="form-control input-modern" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="submit" class="btn btn-primary w-100 rounded-pill fw-bold">Simpan Mitra</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditMitra" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg card-modern">
            <div class="modal-header border-bottom bg-warning bg-opacity-10">
                <h5 class="modal-title fw-bold text-dark">Edit Data Mitra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('admin/update_mitra') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body p-4">
                    <input type="hidden" name="id_mitra" id="edit_id">
                    
                    <div class="row">
                        <div class="col-md-5 border-end pe-md-4">
                            <div class="text-center mb-3 p-3 bg-light rounded border">
                                <img id="current_logo_img" src="" alt="Logo Preview" class="img-fluid object-fit-contain" style="max-height: 120px;">
                                <div class="mt-2 small text-muted fst-italic" id="logo_text_status">Logo Saat Ini</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Ganti Logo (Opsional)</label>
                                <input type="file" name="logo" class="form-control form-control-sm input-modern" accept="image/*">
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Nama Perusahaan <span class="text-danger">*</span></label>
                                <input type="text" name="nama" id="edit_nama" class="form-control input-modern" required>
                            </div>
                        </div>

                        <div class="col-md-7 ps-md-4">
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted d-block">Industri</label>
                                <div class="card card-body bg-light border-0 p-2" style="max-height: 200px; overflow-y: auto;">
                                    <div class="row g-2"> <?php foreach($pilihan_industri as $ind): ?>
                                        <div class="col-6"> <div class="form-check">
                                                <input class="form-check-input check-industri-edit" type="checkbox" name="industri[]" value="<?= $ind ?>" id="edit_ind_<?= str_replace([' ', '&'], '', $ind) ?>">
                                                <label class="form-check-label small text-truncate d-block" for="edit_ind_<?= str_replace([' ', '&'], '', $ind) ?>" title="<?= $ind ?>">
                                                    <?= $ind ?>
                                                </label>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label small fw-bold text-muted">No. Telepon</label>
                                    <input type="text" name="telepon" id="edit_telepon" class="form-control input-modern">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label small fw-bold text-muted">Website</label>
                                    <input type="text" name="website" id="edit_website" class="form-control input-modern">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Alamat</label>
                                <textarea name="alamat" id="edit_alamat" class="form-control input-modern" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top bg-light">
                    <button type="button" class="btn btn-link text-muted text-decoration-none me-2" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning rounded-pill fw-bold px-4 shadow-sm">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $(document).on('click', '.btn-edit-mitra', function() {
        const id = $(this).data('id');
        
        $('#current_logo_img').attr('src', '');
        $('.check-industri-edit').prop('checked', false);
        $('#logo_text_status').text('Memuat...');

        console.log("Mengambil data untuk ID Mitra: " + id);

        $.ajax({
            url: '<?= base_url('admin/get_mitra_detail/') ?>' + id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log("Data diterima:", data); 

                if(data) {
                    $('#edit_id').val(data.id);
                    $('#edit_nama').val(data.nama_perusahaan);
                    $('#edit_website').val(data.website);
                    $('#edit_alamat').val(data.alamat);
                    $('#edit_telepon').val(data.telepon);

                    if(data.industri) {
                        let industriArray = data.industri.split(',').map(item => item.trim());
                        $('.check-industri-edit').each(function() {
                            if(industriArray.includes($(this).val())) {
                                $(this).prop('checked', true);
                            }
                        });
                    }

                    let logoUrl = '';
                    if(data.logo) {
                        logoUrl = '<?= base_url('assets/img/') ?>' + data.logo;
                        $('#logo_text_status').text('Logo Saat Ini');
                    } else {
                        logoUrl = 'https://ui-avatars.com/api/?name=' + encodeURIComponent(data.nama_perusahaan) + '&background=random&color=fff&size=128';
                        $('#logo_text_status').text('Belum ada logo (Default Avatar)');
                    }
                    $('#current_logo_img').attr('src', logoUrl);

                    new bootstrap.Modal(document.getElementById('modalEditMitra')).show();
                } else {
                    alert('Data mitra tidak ditemukan di database.');
                }
            },
            error: function(xhr, status, error) {
                console.error("Error AJAX:", xhr.responseText);
                alert('Gagal mengambil data: ' + error + '\nCek Console (F12) untuk detail.');
            }
        });
    });
});
</script>