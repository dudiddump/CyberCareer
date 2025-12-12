<div class="row align-items-center mb-5">
    <div class="col-md-7">
        <h2 class="fw-bold text-dark mb-1">Eksplorasi Mitra</h2>
        <p class="text-muted">Temukan peluang magang di perusahaan top.</p>
    </div>
    <div class="col-md-5">
        <div class="position-relative">
            <i class="bi bi-search position-absolute text-muted" style="top: 50%; left: 20px; transform: translateY(-50%);"></i>
            <input type="text" id="searchMitra" class="form-control input-modern ps-5" placeholder="Cari perusahaan, posisi, atau lokasi...">
        </div>
    </div>
</div>

<div class="d-flex flex-wrap gap-2 mb-4 pb-2" id="filterContainer">
    <button class="btn btn-filter active" data-filter="all">Semua</button>
    <button class="btn btn-filter" data-filter="Technology">Technology</button>
    <button class="btn btn-filter" data-filter="Finance">Finance</button>
    <button class="btn btn-filter" data-filter="Creative">Creative</button>
    <button class="btn btn-filter" data-filter="BUMN">BUMN</button>
</div>

<div class="row g-4" id="mitraContainer">
    <?php foreach($mitra_list as $m): ?>
    <?php 
        $raw_industri = !empty($m->industri) ? $m->industri : 'Lainnya';
        $badges_industri = array_map('trim', explode(',', $raw_industri)); 
    ?>
    
    <div class="col-md-6 col-lg-4 mitra-item" data-category="<?= $raw_industri ?>">
        
        <div class="card card-modern h-100 p-4 d-flex flex-column hover-shadow transition-all">
            
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="logo-container bg-white p-2 rounded-4 border shadow-sm" style="width: 64px; height: 64px; display: flex; align-items: center; justify-content: center;">
                    <img src="<?= $m->logo ? base_url('assets/img/'.$m->logo) : 'https://ui-avatars.com/api/?name='.urlencode($m->nama_perusahaan).'&background=random' ?>" 
                         class="img-fluid object-fit-contain" style="max-height: 40px;">
                </div>
                
                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-10 rounded-pill px-3 py-1 fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">
                    <i class="bi bi-patch-check-fill me-1"></i>VERIFIED
                </span>
            </div>

            <div class="mb-3">
                <h5 class="fw-bold text-dark mb-1 mitra-name text-truncate" title="<?= $m->nama_perusahaan ?>">
                    <?= $m->nama_perusahaan ?>
                </h5>
                <div class="text-muted small mb-3 text-truncate">
                    <i class="bi bi-geo-alt-fill me-1 text-danger"></i> 
                    <?= $m->alamat ? substr($m->alamat, 0, 30).'...' : 'Lokasi tersedia' ?>
                </div>
                
                <div class="d-flex flex-wrap gap-2">
                    
                    <?php foreach($badges_industri as $badg): ?>
                        <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-10 rounded-2 fw-medium px-2 py-1">
                            <?= $badg ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="mt-auto pt-3 border-top border-light-subtle">
                <a href="<?= base_url('mahasiswa/detail_mitra/'.$m->id) ?>" class="btn btn-outline-primary w-100 rounded-pill fw-bold">
                    Lihat Detail
                </a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<script>
$(document).ready(function() {
    let currentCategory = 'all';

    $('.btn-filter').on('click', function() {
        $('.btn-filter').removeClass('active');
        $(this).addClass('active');

        currentCategory = $(this).data('filter');
        filterMitra();
    });

    $('#searchMitra').on('keyup', function() {
        filterMitra();
    });

    function filterMitra() {
        let searchText = $('#searchMitra').val().toLowerCase();

        $('.mitra-item').each(function() {
            // Ambil data-category, misal: "Finance, BUMN"
            let itemCategories = $(this).data('category'); 
            let itemText = $(this).text().toLowerCase();
            
            // LOGIKA BARU:
            // 1. Jika tombol 'Semua' diklik -> TRUE
            // 2. ATAU, jika string kategori item MENGANDUNG kata kunci filter -> TRUE
            // Contoh: "Finance, BUMN".includes("BUMN") -> TRUE
            let categoryMatch = (currentCategory === 'all') || itemCategories.includes(currentCategory);
            
            let searchMatch = itemText.includes(searchText);

            if (categoryMatch && searchMatch) {
                $(this).fadeIn(200);
            } else {
                $(this).hide();
            }
        });
    }
});
</script>