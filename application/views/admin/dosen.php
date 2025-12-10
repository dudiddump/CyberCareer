<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-dark mb-0">Data Dosen</h2>
    <button class="btn btn-primary rounded-pill px-4 fw-bold" data-bs-toggle="modal" data-bs-target="#modalAddDosen">
        <i class="bi bi-plus-lg me-2"></i>Tambah Dosen
    </button>
</div>

<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i><?= $this->session->flashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="card card-modern overflow-hidden">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="bg-light text-center">
                <tr>
                    <th class="ps-4 py-3">Nama Dosen</th>
                    <th>NIDN</th>
                    <th>Homebase</th>
                    <th class="text-center">Bimbingan</th>
                    <th class="text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dosen as $d): ?>
                <tr class="border-bottom border-light">
                    <td class="ps-4">
                        <div class="fw-bold text-dark"><?= $d->nama_lengkap ?></div>
                    </td>
                    <td><span class="badge bg-light text-dark border font-monospace"><?= $d->id ?></span></td>
                    <td><?= $d->prodi ?></td>
                    <td class="text-center">
                        <span class="badge bg-info bg-opacity-10 text-info border border-info-subtle rounded-pill px-3">
                            <?= $d->jumlah_bimbingan ?> Mahasiswa
                        </span>
                    </td>
                    <td class="text-end pe-4">
                        <button class="btn btn-sm btn-light border text-warning btn-edit" 
                                data-id="<?= $d->id ?>" 
                                data-nama="<?= $d->nama_lengkap ?>"
                                data-prodi="<?= $d->prodi ?>">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <a href="<?= base_url('admin/hapus_user/'.$d->id) ?>" class="btn btn-sm btn-light border text-danger" onclick="return confirm('Hapus dosen ini?')">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalAddDosen" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg card-modern">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-dark">Tambah Dosen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('admin/tambah_dosen') ?>" method="POST">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">NIDN</label>
                        <input type="text" name="nidn" class="form-control input-modern" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nama Lengkap & Gelar</label>
                        <input type="text" name="nama" class="form-control input-modern" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Program Studi</label>
                        <select name="prodi" class="form-select input-modern">
                            <option>Sistem dan Teknologi Informasi</option>
                            <option>Teknologi Informasi</option>
                            <option>Sistem Informasi</option>
                            <option>Bisnis Digital</option>
                            <option>Digital Entrepreneur</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="submit" class="btn btn-primary w-100 rounded-pill fw-bold">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL EDIT -->
<div class="modal fade" id="modalEditDosen" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg card-modern">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-dark">Edit Dosen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('admin/update_dosen') ?>" method="POST">
                <div class="modal-body p-4">
                    <input type="hidden" name="id_lama" id="edit_id_lama">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">NIDN</label>
                        <input type="text" name="nidn" id="edit_nidn" class="form-control input-modern" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nama Lengkap</label>
                        <input type="text" name="nama" id="edit_nama" class="form-control input-modern" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Program Studi</label>
                        <select name="prodi" class="form-select input-modern">
                            <option>Sistem dan Teknologi Informasi</option>
                            <option>Teknologi Informasi</option>
                            <option>Sistem Informasi</option>
                            <option>Bisnis Digital</option>
                            <option>Digital Entrepreneur</option>
                        </select>
                    </div>
                    <div class="form-check form-switch p-3 border rounded bg-light mt-3">
                        <input class="form-check-input" type="checkbox" name="reset_password" value="1">
                        <label class="form-check-label fw-bold text-danger">Reset Password?</label>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="submit" class="btn btn-primary w-100 rounded-pill fw-bold">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function() {
    $('.btn-edit').on('click', function() {
        $('#edit_id_lama').val($(this).data('id'));
        $('#edit_nidn').val($(this).data('id'));
        $('#edit_nama').val($(this).data('nama'));
        $('#edit_prodi').val($(this).data('prodi'));
        $('#modalEditDosen').modal('show');
    });
});
</script>