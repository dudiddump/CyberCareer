<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-dark mb-1">Logbook Magang</h2>
        <p class="text-muted mb-0 small">Semester Saat Ini: <span class="fw-bold text-primary"><?= $semester_sekarang ?></span></p>
    </div>

    <?php if($akses_terbuka): ?>
        <button type="button" class="btn btn-primary rounded-pill px-4 shadow-sm fw-bold" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="bi bi-plus-lg me-2"></i>Entry Baru
        </button>
    <?php endif; ?>
</div>

<?php if(! $akses_terbuka): ?>

    <div class="card card-modern border-0 shadow-sm py-5 text-center bg-white">
        <div class="card-body">
            <div class="mb-4">
                <div class="bg-light p-4 rounded-circle d-inline-block text-muted">
                    <i class="bi bi-lock-fill display-4 opacity-50"></i>
                </div>
            </div>
            <h4 class="fw-bold text-dark">Fitur Belum Tersedia</h4>
            <p class="text-muted mx-auto mb-4 small" style="max-width: 500px; line-height: 1.6;">
                Halo! Logbook Magang hanya dapat diisi oleh mahasiswa <b>Semester 6</b> ke atas.<br>
                Saat ini kamu berada di <b>Semester <?= $semester_sekarang ?></b>.
                
                <?php if($semester_sekarang == 5): ?>
                    <br><span class="text-warning fw-bold fst-italic">*Khusus Semester 5: Akses dibuka bulan Februari JIKA status magang sudah 'Aktif'.</span>
                <?php endif; ?>
            </p>
            
            <a href="<?= base_url('mahasiswa/dashboard') ?>" class="btn btn-outline-dark rounded-pill px-4 fw-bold">
                Kembali ke Dashboard
            </a>
        </div>
    </div>

<?php else: ?>

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

    <div class="card card-modern overflow-hidden border-0 shadow-sm">
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
                    <?php if(empty($logbook_list)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="bi bi-journal-x fs-1 d-block mb-2 opacity-50"></i>
                                <small>Belum ada catatan logbook yang dibuat.</small>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($logbook_list as $log): ?>
                        <tr class="border-bottom border-light hover-row">
                            <td class="ps-4">
                                <div class="fw-bold text-dark"><?= date('d', strtotime($log->tanggal)) ?></div>
                                <div class="text-muted small" style="font-size: 11px;"><?= date('M Y', strtotime($log->tanggal)) ?></div>
                            </td>
                            <td style="max-width: 300px;">
                                <div class="text-dark fw-medium text-truncate"><?= $log->kegiatan ?></div>
                                <?php if($log->feedback_dosen): ?>
                                    <div class="mt-1 p-2 bg-warning bg-opacity-10 rounded small text-warning border border-warning border-opacity-25 d-inline-block">
                                        <i class="bi bi-chat-quote-fill me-1"></i> <?= $log->feedback_dosen ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if($log->file_dokumentasi): ?>
                                    <a href="<?= base_url('uploads/logbook/'.$log->file_dokumentasi) ?>" target="_blank" class="btn btn-sm btn-light border text-primary rounded-circle" title="Lihat File">
                                        <i class="bi bi-file-earmark-text"></i>
                                    </a>
                                <?php else: ?>
                                    <span class="badge bg-light text-muted border rounded-pill" style="font-size: 10px;">Empty</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php 
                                    $cls = 'bg-secondary text-white';
                                    $icon = 'bi-clock';
                                    if($log->status == 'Disetujui') { $cls = 'bg-success text-white'; $icon = 'bi-check-circle'; }
                                    if($log->status == 'Perlu Revisi') { $cls = 'bg-warning text-dark'; $icon = 'bi-exclamation-circle'; }
                                ?>
                                <span class="badge badge-pill-modern <?= $cls ?> bg-opacity-75 fw-normal px-3 py-2">
                                    <i class="bi <?= $icon ?> me-1"></i><?= $log->status ?>
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                 <?php if($log->status != 'Disetujui'): ?>
                                    <button class="btn btn-sm btn-light border btn-edit rounded-circle" data-id="<?= $log->id ?>" title="Edit">
                                        <i class="bi bi-pencil-fill text-dark"></i>
                                    </button>
                                <?php else: ?>
                                    <i class="bi bi-lock-fill text-secondary fs-5" title="Terkunci"></i>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg card-modern">
                <div class="modal-header border-bottom pb-3">
                    <h5 class="modal-title fw-bold text-dark">Isi Logbook Hari Ini</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="<?= base_url('mahasiswa/tambah_logbook') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">TANGGAL (Otomatis)</label>
                            <input type="date" class="form-control input-modern bg-light" value="<?= date('Y-m-d') ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">KEGIATAN</label>
                            <textarea name="kegiatan" class="form-control input-modern" rows="4" placeholder="Deskripsikan kegiatan magangmu..." required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-danger small fw-bold">FILE LAPORAN (WAJIB)</label>
                            <input type="file" name="file_dokumentasi" class="form-control input-modern" accept=".pdf,.jpg,.png,.doc,.docx" required>
                            <div class="form-text small">Bukti kegiatan (Foto/PDF). Max 5MB.</div>
                        </div>
                    </div>
                    <div class="modal-footer border-top pt-3">
                        <button type="button" class="btn btn-light border rounded-pill" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Simpan Logbook</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg card-modern">
                <div class="modal-header border-bottom pb-3">
                    <h5 class="modal-title fw-bold text-warning">Edit Logbook</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="<?= base_url('mahasiswa/update_logbook') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body p-4">
                        <input type="hidden" name="id_logbook" id="edit_id">
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">TANGGAL</label>
                            <input type="date" id="edit_tanggal" class="form-control input-modern bg-light" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">KEGIATAN</label>
                            <textarea name="kegiatan" id="edit_kegiatan" class="form-control input-modern" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold" id="label_file_edit">GANTI BUKTI</label>
                            <input type="file" name="file_dokumentasi" id="input_file_edit" class="form-control input-modern" accept=".pdf,.jpg,.png,.doc,.docx">
                            <small id="current_file_info" class="text-primary d-block mt-2 small fw-bold"></small>
                        </div>
                    </div>
                    <div class="modal-footer border-top pt-3">
                        <button type="button" class="btn btn-light border rounded-pill" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning rounded-pill px-4 fw-bold">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.btn-edit').on('click', function() {
            const id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('mahasiswa/get_logbook_detail/') ?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#edit_id').val(data.id);
                    $('#edit_tanggal').val(data.tanggal);
                    $('#edit_kegiatan').val(data.kegiatan);
                    
                    if(data.file_dokumentasi) {
                        $('#current_file_info').html('<i class="bi bi-check-circle-fill"></i> File saat ini: ' + data.file_dokumentasi);
                        $('#label_file_edit').text('GANTI FILE (Opsional)');
                        $('#input_file_edit').removeAttr('required');
                    } else {
                        $('#current_file_info').html('<span class="text-danger">Belum ada file! Wajib upload.</span>');
                        $('#label_file_edit').html('UPLOAD BUKTI <span class="text-danger">*</span>');
                        $('#input_file_edit').attr('required', true);
                    }
                    $('#modalEdit').modal('show');
                }
            });
        });
    });
    </script>

<?php endif; ?>