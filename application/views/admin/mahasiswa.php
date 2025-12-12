<link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    /* --- GLOBAL VARIABLES --- */
    :root {
        --color-primary: #0d6efd;
        --color-orange: #fd7e14;
    }

    /* --- PAGINATION & TABLE UTILS --- */
    .page-item.active .page-link {
        background-color: var(--color-primary) !important;
        border-color: var(--color-primary) !important;
        border-radius: 50%;
        color: white !important;
    }
    .page-link {
        color: var(--color-primary);
        border: none;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 2px;
        background: transparent;
    }
    .page-link:hover {
        background-color: #eff6ff;
    }
    .dataTables_filter, .dataTables_length { display: none; } 
    table.dataTable { border-collapse: collapse !important; width: 100% !important; margin-top: 0 !important; }

    /* --- INPUT FIELDS --- */
    .input-modern {
        border-radius: 50px;
        padding: 10px 20px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 2px 6px rgba(0,0,0,0.02);
        transition: all 0.3s;
    }
    .input-modern:focus {
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.15);
        border-color: var(--color-primary);
    }

    /* --- DARK MODE STYLING (Soft Slate Theme) --- */
    body.dark .text-dark { color: #f1f5f9 !important; }
    body.dark .text-muted { color: #94a3b8 !important; }
    body.dark .bg-light { background-color: #334155 !important; color: #fff; }
    
    /* Dark Mode Table */
    body.dark .table { color: #cbd5e1; border-color: #334155; }
    body.dark .table thead th {
        background-color: #1e293b;
        color: #f8fafc;
        border-bottom: 1px solid #475569;
    }
    body.dark .table tbody td {
        background-color: #1e293b;
        border-bottom: 1px solid #334155;
    }
    body.dark .table-hover tbody tr:hover td {
        background-color: #334155; /* Highlight row */
    }

    /* Dark Mode Form Elements */
    body.dark .form-control, 
    body.dark .form-select {
        background-color: #1e293b;
        border-color: #475569;
        color: #fff;
    }
    body.dark .form-control:focus, 
    body.dark .form-select:focus {
        border-color: var(--color-primary);
        background-color: #1e293b;
    }
    body.dark .form-control::placeholder { color: #64748b; }

    /* Dark Mode Modal */
    body.dark .modal-content { background-color: #1e293b; border: 1px solid #334155; color: #fff; }
    body.dark .modal-header { border-bottom-color: #334155; }
    body.dark .modal-footer { border-top-color: #334155; }
    body.dark .btn-close { filter: invert(1) grayscale(100%) brightness(200%); }
    body.dark .nav-tabs .nav-link { color: #94a3b8; }
    body.dark .nav-tabs .nav-link.active { background-color: #1e293b; border-color: #334155 #334155 #1e293b; color: #fff; }

    /* Dark Mode Pagination */
    body.dark .page-link { color: #cbd5e1; }
    body.dark .page-link:hover { background-color: #334155; color: #fff; }
    body.dark .page-item.active .page-link { background-color: var(--color-primary); color: #fff; }

    /* --- PRINT MODE --- */
    @media print {
        .sidebar-wrapper, .navbar, .d-print-none, .dataTables_paginate, .dataTables_info { display: none !important; }
        .main-content { margin: 0 !important; padding: 0 !important; width: 100% !important; }
        body { background-color: white !important; color: black !important; }
        .card { border: none !important; box-shadow: none !important; }
        .table th:last-child, .table td:last-child { display: none !important; }
    }
</style>

<div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center mb-4 d-print-none gap-3">
    <div class="mb-2 mb-lg-0">
        <h2 class="fw-bold text-dark mb-0">Data Mahasiswa</h2>
        <p class="text-muted mb-0 small">Kelola data akademik dan monitoring magang.</p>
    </div>

    <div class="d-flex flex-column flex-sm-row gap-2">
        <select id="filterProdi" class="form-select input-modern rounded-pill" style="min-width: 160px;">
            <option value="">Semua Prodi</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Sistem dan Teknologi Informasi">Sistem & Tek. Informasi</option>
            <option value="Informatika">Informatika</option>
            <option value="Bisnis Digital">Bisnis Digital</option>
        </select>

        <select id="filterAngkatan" class="form-select input-modern rounded-pill" style="min-width: 100px; width: 110px; flex-shrink: 0;">
            <option value="">Thn</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
        </select>

        <div class="position-relative flex-grow-1" style="min-width: 250px;">
            <i class="bi bi-search position-absolute text-muted" style="top: 10px; left: 15px; font-size: 0.9rem;"></i>
            <input type="text" id="customSearch" class="form-control input-modern ps-5 rounded-pill w-100" placeholder="Cari Nama/NIM...">
        </div>

        <div class="d-flex gap-2 flex-shrink-0">
            <button class="btn btn-primary rounded-pill fw-bold px-3" data-bs-toggle="modal" data-bs-target="#modalAddMhs">
                <i class="bi bi-plus-lg"></i>
            </button>
            <button onclick="window.print()" class="btn btn-outline-primary rounded-pill px-3" title="Cetak Data">
                <i class="bi bi-printer"></i>
            </button>
        </div>
    </div>
</div>

<div class="d-none d-print-block text-center mb-4">
    <h3>Data Mahasiswa Cyber University</h3>
    <p>Tahun Akademik <?= date('Y') ?></p>
    <hr>
</div>

<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 d-print-none" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i><?= $this->session->flashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>
<?php if($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 d-print-none" role="alert">
        <i class="bi bi-exclamation-circle-fill me-2"></i><?= $this->session->flashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="card card-modern overflow-hidden" style="min-height: 400px;">
    <div class="table-responsive p-0">
        <table class="table align-middle mb-0 w-100" id="tableMhs">
            <thead class="bg-light">
                <tr>
                    <th class="ps-4 py-3 text-secondary small fw-bold text-uppercase" width="30%">Mahasiswa</th>
                    <th class="text-secondary small fw-bold text-center text-uppercase">Program Studi</th>
                    <th class="text-secondary small fw-bold text-uppercase">Pembimbing</th>
                    <th class="text-secondary small fw-bold text-uppercase d-print-none">Magang</th>
                    <th class="text-secondary small fw-bold text-center text-uppercase d-print-none">Kontak</th>
                    <th class="text-end pe-4 text-secondary small fw-bold text-uppercase d-print-none">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($mahasiswa as $m): ?>
                <tr class="mhs-row" 
                    data-prodi="<?= $m->prodi ?>" 
                    data-angkatan="<?= $m->tahun_masuk ?>">
                    
                    <td class="ps-4 py-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3 text-primary fw-bold flex-shrink-0 d-print-none" style="width: 40px; height: 40px;">
                                <?= substr($m->nama_lengkap, 0, 1) ?>
                            </div>
                            <div style="min-width: 0;">
                                <div class="fw-bold text-dark mhs-name text-wrap"><?= $m->nama_lengkap ?></div>
                                <div class="text-muted mhs-nim font-monospace small text-primary"><?= $m->id ?></div>
                                <span class="badge bg-light text-secondary border rounded-pill d-md-none mt-1" style="font-size: 9px;"><?= $m->tahun_masuk ?></span>
                            </div>
                        </div>
                    </td>
                    
                    <td class="text-center">
                        <div class="small text-muted mt-1"><?= $m->prodi ?></div>
                        <div class="small text-muted" style="font-size: 10px;">Angkatan <?= $m->tahun_masuk ?></div>
                    </td>
                    
                    <td>
                        <?php if($m->nama_dosen): ?>
                            <div class="fw-medium text-dark small mb-1"><?= $m->nama_dosen ?></div>
                        <?php else: ?>
                            <span class="text-danger small fst-italic">Belum ada</span>
                        <?php endif; ?>
                    </td>

                    <td class="d-print-none">
                        <div class="d-flex flex-column align-items-start gap-1">
                            <?php if($m->magang_aktif > 0): ?>
                                <span class="badge bg-info bg-opacity-10 text-info border border-info-subtle rounded-pill" style="font-size: 10px;">Sedang Magang</span>
                            <?php elseif($m->total_riwayat > 0): ?>
                                <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle rounded-pill" style="font-size: 10px;">Selesai</span>
                            <?php else: ?>
                                <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary-subtle rounded-pill" style="font-size: 10px;">Belum</span>
                            <?php endif; ?>
                            <a href="<?= base_url('admin/riwayat_mahasiswa/'.$m->id) ?>" class="btn btn-sm btn-link p-0 text-decoration-none fw-bold" style="font-size: 11px;">Lihat Detail <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </td>

                    <td class="text-center d-print-none">
                        <button class="btn btn-sm btn-outline-dark rounded-pill px-3 btn-contact" 
                                data-nama="<?= $m->nama_lengkap ?>"
                                data-prodi="<?= $m->prodi ?>"
                                data-telepon="<?= $m->telepon ?>"
                                data-bio="<?= html_escape($m->tentang_saya) ?>"
                                data-linkedin="<?= $m->linkedin ?>"
                                data-github="<?= $m->github ?>"
                                data-website="<?= $m->website ?>"
                                data-foto="<?= $m->foto ? base_url('uploads/foto/'.$m->foto) : base_url('assets/img/default-avatar.png') ?>"
                                title="Lihat Kontak">
                            <i class="bi bi-person-vcard"></i>
                        </button>
                    </td>
                    <td class="text-end pe-4 d-print-none">
                        <button class="btn btn-sm btn-warning text-white rounded-circle btn-edit" data-id="<?= $m->id ?>" title="Edit Data">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalContact" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow-lg card-modern overflow-hidden">
            <div class="modal-header border-0 pb-0"><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
            <div class="modal-body text-center pt-0 pb-4 px-4">
                <img id="view_foto" src="" class="rounded-circle border shadow-sm mb-3 object-fit-cover" width="90" height="90">
                <h5 class="fw-bold text-dark mb-2" id="view_nama"></h5>
                <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 rounded-pill px-3 mb-3" id="view_prodi"></span>
                <div class="bg-light p-3 rounded border mb-3 mt-2"><p class="small text-muted mb-0 fst-italic" id="view_bio">-</p></div>
                <div class="d-grid gap-2">
                    <a href="#" id="btn_wa" target="_blank" class="btn btn-success btn-sm text-start d-flex justify-content-between align-items-center py-2">
                        <span><i class="bi bi-whatsapp me-2"></i>WhatsApp</span><i class="bi bi-box-arrow-up-right small"></i>
                    </a>
                    <div class="d-flex gap-2 justify-content-center mt-2">
                        <a href="#" id="btn_linkedin" target="_blank" class="btn btn-outline-primary btn-sm flex-grow-1"><i class="bi bi-linkedin"></i></a>
                        <a href="#" id="btn_github" target="_blank" class="btn btn-outline-dark btn-sm flex-grow-1"><i class="bi bi-github"></i></a>
                        <a href="#" id="btn_web" target="_blank" class="btn btn-outline-info btn-sm flex-grow-1"><i class="bi bi-globe"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditMhs" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg card-modern">
            <div class="modal-header border-bottom pb-0">
                <ul class="nav nav-tabs border-0" id="tabEdit" role="tablist">
                    <li class="nav-item"><button class="nav-link active fw-bold" id="edit-akademik-tab" data-bs-toggle="tab" data-bs-target="#edit-akademik" type="button">Akademik</button></li>
                    <li class="nav-item"><button class="nav-link fw-bold" id="edit-kontak-tab" data-bs-toggle="tab" data-bs-target="#edit-kontak" type="button">Kontak</button></li>
                    <li class="nav-item"><button class="nav-link fw-bold" id="edit-sosmed-tab" data-bs-toggle="tab" data-bs-target="#edit-sosmed" type="button">Sosmed</button></li>
                    <li class="nav-item"><button class="nav-link fw-bold text-danger" id="edit-akun-tab" data-bs-toggle="tab" data-bs-target="#edit-akun" type="button">Akun</button></li>
                </ul>
                <button type="button" class="btn-close mb-3 me-2" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('admin/update_mahasiswa') ?>" method="POST">
                <div class="modal-body p-4">
                    <input type="hidden" name="id_mhs_lama" id="edit_id_lama">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="edit-akademik">
                            <div class="row g-3">
                                <div class="col-md-6"><label class="form-label small fw-bold text-muted">NIM</label><input type="text" name="nim" id="edit_nim" class="form-control input-modern" required></div>
                                <div class="col-md-6"><label class="form-label small fw-bold text-muted">Angkatan</label><input type="number" name="tahun_masuk" id="edit_tahun" class="form-control input-modern" required></div>
                                <div class="col-12"><label class="form-label small fw-bold text-muted">Nama Lengkap</label><input type="text" name="nama_lengkap" id="edit_nama" class="form-control input-modern" required></div>
                                <div class="col-12"><label class="form-label small fw-bold text-muted">Program Studi</label><select name="prodi" id="edit_prodi" class="form-select input-modern" required><option value="Sistem dan Teknologi Informasi">Sistem dan Teknologi Informasi</option><option value="Informatika">Informatika</option><option value="Sistem Informasi">Sistem Informasi</option><option value="Bisnis Digital">Bisnis Digital</option></select></div>
                                <div class="col-12 border-top pt-2 mt-1"><label class="form-label small fw-bold text-primary">IPK Terakhir</label><input type="number" step="0.01" name="ipk_terakhir" id="edit_ipk" class="form-control input-modern"></div>
                                <div class="col-12"><label class="form-label small fw-bold text-primary">Dosen Pembimbing</label><select name="dosen_pembimbing_id" id="edit_dosen" class="form-select input-modern"><option value="">-- Pilih Dosen --</option><?php foreach($dosen_list as $d): ?><option value="<?= $d->id ?>"><?= $d->nama_lengkap ?></option><?php endforeach; ?></select></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="edit-kontak">
                            <div class="mb-3"><label class="form-label small fw-bold text-muted">No WA</label><input type="text" name="telepon" id="edit_telepon" class="form-control input-modern"></div>
                            <div class="mb-3"><label class="form-label small fw-bold text-muted">Alamat</label><textarea name="alamat" id="edit_alamat" class="form-control input-modern" rows="2"></textarea></div>
                            <div class="mb-3"><label class="form-label small fw-bold text-muted">Bio</label><textarea name="tentang_saya" id="edit_bio" class="form-control input-modern" rows="3"></textarea></div>
                        </div>
                        <div class="tab-pane fade" id="edit-sosmed">
                            <div class="mb-3"><label class="form-label small fw-bold text-muted">LinkedIn</label><input type="text" name="linkedin" id="edit_linkedin" class="form-control input-modern"></div>
                            <div class="mb-3"><label class="form-label small fw-bold text-muted">GitHub</label><input type="text" name="github" id="edit_github" class="form-control input-modern"></div>
                            <div class="mb-3"><label class="form-label small fw-bold text-muted">Website</label><input type="text" name="website" id="edit_website" class="form-control input-modern"></div>
                        </div>
                        <div class="tab-pane fade" id="edit-akun">
                            <div class="d-flex justify-content-between align-items-center p-3 border rounded bg-white shadow-sm mb-3">
                                <div><h6 class="fw-bold text-warning mb-0">Reset Password</h6><small class="text-muted">Kembalikan ke default?</small></div>
                                <div class="form-check form-switch m-0"><input class="form-check-input" type="checkbox" name="reset_password" value="1" id="checkResetPass" style="width: 3em; height: 1.5em;"></div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center p-3 border border-danger bg-danger bg-opacity-10 rounded shadow-sm">
                                <div><h6 class="fw-bold text-danger mb-0">Hapus Akun</h6><small class="text-danger opacity-75">Data akan hilang permanen.</small></div>
                                <div><a href="#" id="btnDeleteModal" class="btn btn-sm btn-danger rounded-pill fw-bold px-3" onclick="return confirm('Yakin hapus?')"><i class="bi bi-trash me-1"></i> Hapus</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-light border rounded-pill" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4 rounded-pill fw-bold">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAddMhs" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg card-modern">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-dark">Tambah Mahasiswa Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('admin/tambah_mahasiswa') ?>" method="POST">
                <div class="modal-body p-4">
                    <div class="alert alert-info small py-2 mb-4 border-0 bg-opacity-10 bg-info text-info fw-bold"><i class="bi bi-info-circle me-1"></i> Password default: CyberCareer25</div>
                    <div class="row g-3">
                        <div class="col-md-6"><label class="form-label small fw-bold text-muted">NIM <span class="text-danger">*</span></label><input type="text" name="nim" class="form-control input-modern" required></div>
                        <div class="col-md-6"><label class="form-label small fw-bold text-muted">Angkatan <span class="text-danger">*</span></label><input type="number" name="tahun_masuk" class="form-control input-modern" value="<?= date('Y') ?>" required></div>
                        <div class="col-12"><label class="form-label small fw-bold text-muted">Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control input-modern" required></div>
                        <div class="col-12"><label class="form-label small fw-bold text-muted">Prodi</label><select name="prodi" class="form-select input-modern" required><option value="Sistem dan Teknologi Informasi">Sistem dan Teknologi Informasi</option><option value="Informatika">Informatika</option><option value="Sistem Informasi">Sistem Informasi</option><option value="Bisnis Digital">Bisnis Digital</option></select></div>
                        <div class="col-12"><label class="form-label small fw-bold text-muted">Pembimbing</label><select name="dosen_pembimbing_id" class="form-select input-modern"><option value="">-- Belum --</option><?php foreach($dosen_list as $d): ?><option value="<?= $d->id ?>"><?= $d->nama_lengkap ?></option><?php endforeach; ?></select></div>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="submit" class="btn btn-primary px-4 rounded-pill fw-bold">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    
    // 1. Custom Filter Logic
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var selectedProdi = $('#filterProdi').val();
            var selectedAngkatan = $('#filterAngkatan').val();
            
            var rowNode = settings.aoData[dataIndex].nTr;
            var mhsProdi = $(rowNode).attr('data-prodi') || "";
            var mhsAngkatan = $(rowNode).attr('data-angkatan') || "";

            var prodiMatch = (selectedProdi === "" || mhsProdi === selectedProdi);
            var angkatanMatch = (selectedAngkatan === "" || mhsAngkatan === selectedAngkatan);

            return prodiMatch && angkatanMatch;
        }
    );

    // 2. Initialize DataTables
    var table = $('#tableMhs').DataTable({
        "pageLength": 10,
        "lengthChange": false,
        "dom": 'rtip',
        "ordering": false, 
        "language": { 
            "paginate": { "next": "<i class='bi bi-chevron-right'></i>", "previous": "<i class='bi bi-chevron-left'></i>" }, 
            "zeroRecords": "<div class='text-center py-5 text-muted'><i class='bi bi-search display-6 d-block mb-2 opacity-25'></i>Data tidak ditemukan</div>",
            "info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ mahasiswa"
        }
    });

    // 3. Events
    $('#customSearch').on('keyup', function() { table.search(this.value).draw(); });
    $('#filterProdi, #filterAngkatan').on('change', function() { table.draw(); });

    // 4. Contact Modal
    $(document).on('click', '.btn-contact', function() {
        const nama = $(this).data('nama');
        const prodi = $(this).data('prodi');
        const foto = $(this).data('foto');
        const bio = $(this).data('bio');
        const telp = $(this).data('telepon');
        const linkedin = $(this).data('linkedin');
        const github = $(this).data('github');
        const website = $(this).data('website');

        $('#view_nama').text(nama);
        $('#view_prodi').text(prodi);
        $('#view_foto').attr('src', foto);
        $('#view_bio').text(bio ? bio : '-');

        if(telp) {
            let clean_wa = telp.toString().replace(/[^0-9]/g, '');
            if(clean_wa.startsWith('0')) clean_wa = '62' + clean_wa.substring(1);
            $('#btn_wa').attr('href', 'https://wa.me/'+clean_wa).removeClass('disabled btn-light text-muted').addClass('btn-success text-white');
        } else {
            $('#btn_wa').attr('href', '#').addClass('disabled btn-light text-muted').removeClass('btn-success text-white');
        }

        function setLink(id, val) {
            if(val && val.length > 1) $(id).attr('href', val).removeClass('disabled opacity-25');
            else $(id).attr('href', '#').addClass('disabled opacity-25');
        }
        setLink('#btn_linkedin', linkedin);
        setLink('#btn_github', github);
        setLink('#btn_web', website);

        new bootstrap.Modal(document.getElementById('modalContact')).show();
    });

    // 5. Edit Modal
    $(document).on('click', '.btn-edit', function() {
        const id = $(this).data('id');
        $('#checkResetPass').prop('checked', false);
        $('#btnDeleteModal').attr('href', '<?= base_url('admin/hapus_user/') ?>' + id);
        
        var tabEl = document.querySelector('#tabEdit li:first-child button');
        bootstrap.Tab.getInstance(tabEl)?.show() || new bootstrap.Tab(tabEl).show();

        $.ajax({
            url: '<?= base_url('admin/get_user_detail/') ?>' + id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if(data) {
                    $('#edit_id_lama').val(data.id);
                    $('#edit_nim').val(data.id);
                    $('#edit_nama').val(data.nama_lengkap);
                    $('#edit_tahun').val(data.tahun_masuk);
                    $('#edit_prodi').val(data.prodi);
                    $('#edit_ipk').val(data.ipk_terakhir); 
                    $('#edit_dosen').val(data.dosen_pembimbing_id); 
                    $('#edit_telepon').val(data.telepon);
                    $('#edit_alamat').val(data.alamat);
                    $('#edit_bio').val(data.tentang_saya);
                    $('#edit_linkedin').val(data.linkedin);
                    $('#edit_github').val(data.github);
                    $('#edit_website').val(data.website);
                    new bootstrap.Modal(document.getElementById('modalEditMhs')).show();
                } else {
                    alert('Data tidak ditemukan.');
                }
            },
            error: function() { alert('Gagal mengambil data via AJAX.'); }
        });
    });
});
</script>