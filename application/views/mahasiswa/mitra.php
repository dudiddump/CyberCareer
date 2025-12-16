<div class="p-4">
<div class="row align-items-center mb-5">
    <div class="col-md-7">
        <h2 class="fw-bold text-dark mb-1">Eksplorasi Mitra</h2>
        <p class="text-muted">Temukan peluang magang di perusahaan top.</p>
    </div>
    <div class="col-md-5">
        <div class="position-relative">
            <i class="bi bi-search position-absolute text-muted" style="top: 50%; left: 20px; transform: translateY(-50%);"></i>
            <input type="text" id="searchMitra" class="form-control input-modern ps-5 rounded-pill" placeholder="Cari perusahaan atau industri...">
        </div>
    </div>
</div>

<div class="d-flex flex-wrap gap-2 mb-4 pb-2" id="filterContainer">
    <button class="btn btn-filter active rounded-pill px-3" data-filter="all">Semua</button>
    
    <button class="btn btn-filter rounded-pill px-3" data-filter="Teknologi">Teknologi</button>
    <button class="btn btn-filter rounded-pill px-3" data-filter="Keuangan">Keuangan</button>
    <button class="btn btn-filter rounded-pill px-3" data-filter="BUMN">BUMN</button>
    <button class="btn btn-filter rounded-pill px-3" data-filter="Pemerintahan">Pemerintahan</button>
    
    <button class="btn btn-filter rounded-pill px-3" data-filter="Kreatif">Kreatif & Media</button>
    <button class="btn btn-filter rounded-pill px-3" data-filter="Pendidikan">Pendidikan</button>
    <button class="btn btn-filter rounded-pill px-3" data-filter="Kesehatan">Kesehatan</button>
    
    <button class="btn btn-filter rounded-pill px-3" data-filter="Lainnya">Lainnya</button>
</div>

<div class="row g-4" id="mitraContainer">
    <?php foreach($mitra_list as $m): ?>
    <?php 
        $raw_industri = !empty($m->industri) ? $m->industri : 'Lainnya';
        $badges_industri = array_map('trim', explode(',', $raw_industri)); 
        $display_badges = array_slice($badges_industri, 0, 3);
        $remaining = count($badges_industri) - count($display_badges);
    ?>
    
    <div class="col-md-6 col-lg-4 mitra-item" data-category="<?= strtolower($raw_industri) ?>">
        <div class="card card-modern h-100 p-4 d-flex flex-column hover-shadow transition-all border-0 shadow-sm">
            
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="bg-white p-2 rounded border d-flex align-items-center justify-content-center shadow-sm" style="width: 64px; height: 64px;">
                    <img src="<?= $m->logo ? base_url('assets/img/'.$m->logo) : 'https://ui-avatars.com/api/?name='.urlencode($m->nama_perusahaan).'&background=random&color=fff&size=128' ?>" 
                         class="img-fluid object-fit-contain rounded" style="max-height: 40px;">
                </div>
                
                <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle rounded-pill px-2 py-1" style="font-size: 10px;">
                    <i class="bi bi-patch-check-fill me-1"></i> VERIFIED
                </span>
            </div>

            <div class="mb-3">
                <h5 class="fw-bold text-dark mb-1 text-truncate" title="<?= $m->nama_perusahaan ?>">
                    <?= $m->nama_perusahaan ?>
                </h5>
                <div class="text-muted small mb-3 text-truncate">
                    <i class="bi bi-geo-alt-fill me-1 text-danger"></i> 
                    <?= $m->alamat ? $m->alamat : 'Lokasi tidak tersedia' ?>
                </div>
                
                <div class="d-flex flex-wrap gap-1">
                    <?php foreach($display_badges as $badg): ?>
                        <span class="badge bg-light text-secondary border fw-normal">
                            <?= $badg ?>
                        </span>
                    <?php endforeach; ?>
                    
                    <?php if($remaining > 0): ?>
                        <span class="badge bg-light text-muted border fw-normal">+<?= $remaining ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mt-auto pt-3 border-top border-light-subtle">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="small text-muted fw-bold">Lowongan Tersedia</span>
                    <?php if($m->jumlah_loker > 0): ?>
                        <span class="badge bg-primary rounded-pill px-3"><?= $m->jumlah_loker ?></span>
                    <?php else: ?>
                        <span class="badge bg-secondary bg-opacity-25 text-secondary rounded-pill px-3">0</span>
                    <?php endif; ?>
                </div>
                <a href="<?= base_url('mahasiswa/detail_mitra/'.$m->id) ?>" class="btn btn-outline-primary w-100 rounded-pill fw-bold btn-sm">
                    Lihat Profil
                </a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div id="noResults" class="text-center py-5 d-none">
    <div class="mb-3">
        <i class="bi bi-search text-muted opacity-25 display-1"></i>
    </div>
    <h5 class="fw-bold text-dark">Yah, pencarian tidak ditemukan</h5>
    <p class="text-muted">Coba gunakan kata kunci atau filter lain.</p>
</div>

<style>
    .btn-filter {
        background-color: #fff;
        border: 1px solid #e2e8f0;
        color: #64748b;
        font-size: 0.875rem;
        transition: all 0.2s ease;
    }
    .btn-filter:hover {
        background-color: #f8fafc;
        border-color: #cbd5e1;
        transform: translateY(-1px);
    }
    .btn-filter.active {
        background-color: #0d6efd;
        color: #fff;
        border-color: #0d6efd;
        box-shadow: 0 4px 6px -1px rgba(13, 110, 253, 0.2);
    }
</style>

<script>
$(document).ready(function() {
    let currentCategory = 'all';
    $('.btn-filter').on('click', function() {
        $('.btn-filter').removeClass('active');
        $(this).addClass('active');
        currentCategory = $(this).data('filter').toLowerCase();
        
        filterMitra();
    });

    $('#searchMitra').on('keyup', function() {
        filterMitra();
    });

    function filterMitra() {
        let searchText = $('#searchMitra').val().toLowerCase();
        let visibleCount = 0;

        $('.mitra-item').each(function() {
            let itemCategories = $(this).data('category'); 
            let itemText = $(this).text().toLowerCase(); 
            let categoryMatch = (currentCategory === 'all') || itemCategories.includes(currentCategory);
            let searchMatch = itemText.includes(searchText);

            if (categoryMatch && searchMatch) {
                $(this).fadeIn(200);
                visibleCount++;
            } else {
                $(this).hide();
            }
        });

        if(visibleCount === 0) {
            $('#noResults').removeClass('d-none');
        } else {
            $('#noResults').addClass('d-none');
        }
    }
});
</script>