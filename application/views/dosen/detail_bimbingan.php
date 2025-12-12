<div class="mb-4 d-print-none">
    <a href="<?= base_url('dosen/dashboard') ?>" class="text-decoration-none text-muted small fw-bold">
        <i class="bi bi-arrow-left me-1"></i> KEMBALI KE DASHBOARD
    </a>
</div>

<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
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
            <p class="text-muted small mb-3 font-monospace"><?= $mhs->id ?></p>
            
            <div class="text-start bg-light p-3 rounded border">
                <small class="text-muted fw-bold d-block mb-1">LOKASI MAGANG:</small>
                <?php if($magang): ?>
                    <div class="fw-bold text-primary mb-0"><?= $magang->nama_perusahaan ?></div>
                    <div class="small text-dark"><?= $magang->posisi ?></div>
                <?php else: ?>
                    <span class="text-danger small fst-italic">Belum ada data magang aktif.</span>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card card-modern overflow-hidden border-0 shadow-sm" style="min-height: 500px;">
            <div class="card-header bg-white border-bottom pt-4 px-4 pb-3">
                <h6 class="fw-bold text-dark mb-0">Riwayat Logbook</h6>
            </div>
            <div class="table-responsive">
                <table class="table align-middle mb-0 table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3" width="15%">Tanggal</th>
                            <th>Kegiatan</th>
                            <th class="text-center">Bukti</th>
                            <th class="text-center" width="15%">Status</th>
                            <th class="text-end pe-4" width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($logbooks)): ?>
                            <tr><td colspan="5" class="text-center py-5 text-muted">Mahasiswa belum mengisi logbook.</td></tr>
                        <?php else: ?>
                            <?php foreach($logbooks as $log): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold text-dark"><?= date('d M', strtotime($log->tanggal)) ?></div>
                                    <small class="text-muted"><?= date('Y', strtotime($log->tanggal)) ?></small>
                                </td>
                                <td>
                                    <div class="text-dark small mb-1"><?= nl2br($log->kegiatan) ?></div>
                                    <?php if($log->feedback_dosen): ?>
                                        <div class="mt-1 p-2 bg-info bg-opacity-10 rounded small text-dark border border-info border-opacity-25">
                                            <i class="bi bi-chat-quote-fill me-1 text-info"></i> <?= $log->feedback_dosen ?>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if($log->file_dokumentasi): ?>
                                        <a href="<?= base_url('uploads/logbook/'.$log->file_dokumentasi) ?>" target="_blank" class="btn btn-sm btn-light border text-primary rounded-circle" title="Lihat File">
                                            <i class="bi bi-file-earmark-text"></i>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted small">-</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php 
                                        $bg = 'bg-secondary';
                                        if($log->status == 'Disetujui') $bg = 'bg-success';
                                        if($log->status == 'Perlu Revisi') $bg = 'bg-warning text-dark';
                                    ?>
                                    <span class="badge <?= $bg ?> bg-opacity-75 rounded-pill px-2"><?= $log->status ?></span>
                                </td>
                                <td class="text-end pe-4">
                                    <button class="btn btn-sm btn-outline-primary rounded-pill btn-review" 
                                            data-id="<?= $log->id ?>" 
                                            data-tgl="<?= date('d M Y', strtotime($log->tanggal)) ?>"
                                            data-kegiatan="<?= html_escape($log->kegiatan) ?>"
                                            data-feedback="<?= html_escape($log->feedback_dosen) ?>"
                                            data-status="<?= $log->status ?>">
                                        Review
                                    </button>
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

<div class="modal fade" id="modalReview" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card-modern border-0 shadow-lg">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-dark">Review Logbook</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('dosen/verifikasi_logbook') ?>" method="POST">
                <div class="modal-body p-4">
                    <input type="hidden" name="id_logbook" id="rev_id">
                    <input type="hidden" name="id_mahasiswa" value="<?= $mhs->id ?>">

                    <div class="mb-3 p-3 bg-light rounded border">
                        <small class="text-muted d-block fw-bold mb-1" id="rev_tgl"></small>
                        <p class="mb-0 text-dark small fst-italic" id="rev_kegiatan"></p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Status</label>
                        <select name="status" id="rev_status" class="form-select input-modern">
                            <option value="Disetujui">✅ Disetujui</option>
                            <option value="Perlu Revisi">⚠️ Perlu Revisi</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Feedback / Komentar</label>
                        <textarea name="feedback_dosen" id="rev_feedback" class="form-control input-modern" rows="3" placeholder="Tulis masukan untuk mahasiswa..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-light border rounded-pill" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4 rounded-pill fw-bold">Simpan Review</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.btn-review').on('click', function() {
            // Ambil data dari tombol
            const id = $(this).data('id');
            const tgl = $(this).data('tgl');
            const kegiatan = $(this).data('kegiatan');
            const feedback = $(this).data('feedback');
            const status = $(this).data('status');

            // Isi ke Modal
            $('#rev_id').val(id);
            $('#rev_tgl').text(tgl);
            $('#rev_kegiatan').text(kegiatan);
            $('#rev_feedback').val(feedback);
            
            // Set status dropdown (default 'Disetujui' jika belum ada status)
            if(status === 'Menunggu Persetujuan') {
                $('#rev_status').val('Disetujui'); 
            } else {
                $('#rev_status').val(status);
            }

            new bootstrap.Modal(document.getElementById('modalReview')).show();
        });
    });
</script>