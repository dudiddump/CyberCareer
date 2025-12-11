<div class="row align-items-center mb-5">
    <div class="col-md-7">
        <h2 class="fw-bold text-dark mb-1">Explorasi Mitra</h2>
        <p class="text-muted">Temukan peluang magang di perusahaan top.</p>
    </div>
    <div class="col-md-5">
        <div class="position-relative">
            <i class="bi bi-search position-absolute text-muted" style="top: 15px; left: 15px;"></i>
            <input type="text" id="searchMitra" class="form-control input-modern ps-5" placeholder="Cari perusahaan, posisi, atau lokasi...">
        </div>
    </div>
</div>

<div class="d-flex gap-2 mb-4 overflow-auto pb-2">
    <button class="btn btn-sm btn-modern btn-dark border">Semua</button>
    <button class="btn btn-sm btn-modern btn-light border">Technology</button>
    <button class="btn btn-sm btn-modern btn-light border">Finance</button>
    <button class="btn btn-sm btn-modern btn-light border">Creative</button>
</div>

<div class="row g-4" id="mitraContainer">
    <?php foreach($mitra_list as $m): ?>
    <div class="col-md-6 col-lg-4 mitra-item">
        <div class="card card-modern h-100 p-4 d-flex flex-column">
            
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="bg-light p-2 rounded-3 border" style="width: 64px; height: 64px; display: flex; align-items: center; justify-content: center;">
                    <img src="<?= $m->logo ? base_url('assets/img/'.$m->logo) : 'https://ui-avatars.com/api/?name='.urlencode($m->nama_perusahaan).'&background=random' ?>" 
                         class="img-fluid" style="max-height: 40px;">
                </div>
                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1" style="font-size: 10px;">
                    VERIFIED
                </span>
            </div>

            <div class="mb-3">
                <h5 class="fw-bold text-dark mb-1 mitra-name"><?= $m->nama_perusahaan ?></h5>
                <div class="text-muted small mb-3">
                    <i class="bi bi-geo-alt me-1 text-danger"></i> <?= $m->alamat ? substr($m->alamat, 0, 30).'...' : 'Lokasi tersedia' ?>
                </div>
                
                <div class="d-flex flex-wrap gap-2">
                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-10 rounded-2 fw-normal">
                        <?= $m->industri ?? 'Technology' ?>
                    </span>
                    <span class="badge bg-orange bg-opacity-10 text-orange border border-orange border-opacity-10 rounded-2 fw-normal">
                        Magang
                    </span>
                </div>
            </div>

            <div class="mt-auto pt-3 border-top border-light">
                <a href="<?= base_url('mahasiswa/detail_mitra/'.$m->id) ?>" class="btn btn-modern btn-outline-primary w-100">
                    Lihat Detail
                </a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<script>
document.getElementById('searchMitra').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let items = document.getElementsByClassName('mitra-item');
    for (let i = 0; i < items.length; i++) {
        let txt = items[i].innerText.toLowerCase();
        items[i].style.display = txt.includes(filter) ? "" : "none";
    }
});
</script>