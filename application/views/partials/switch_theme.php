<style>
    .theme-toggle-btn {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        border: none;
        background-color: #fff;
        color: #333;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    
    .theme-toggle-btn:hover {
        transform: scale(1.1);
    }

    /* Warna tombol saat dark mode */
    body.dark .theme-toggle-btn {
        background-color: #1d3b5e;
        color: #ffd700; /* Warna kuning matahari */
    }
</style>

<a href="<?= base_url('theme/toggle') ?>" class="btn theme-toggle-btn" title="Ganti Tema">
    <?= ($this->session->userdata('theme') == 'dark') ? '<i class="bi bi-sun-fill"></i>' : '<i class="bi bi-moon-stars-fill"></i>' ?>
</a>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">