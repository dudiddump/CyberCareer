<?php $role = $this->session->userdata('role'); ?>

<style>
    body.dark .sidebar {
        background-color: #102A4C !important;
    }
</style>
<div class="sidebar p-3 shadow bg-light" style="width:250px; min-height:100vh;">
    <h4 class="fw-bold text-primary text-center">CyberCareer</h4>

    <div class="mt-3 text-center">
        <p class="fw-semibold"><?= isset($user->nama_lengkap) ? $user->nama_lengkap : 'Nama Pengguna' ?></p>
        <p class="text-muted"><?= isset($user->nim) ? $user->nim : 'ID Pengguna' ?></p>
    </div>

    <hr>

    <ul class="nav flex-column">

        <?php if ($role == 'mhs'): ?>
            <li><a href="<?= base_url('mahasiswa/dashboard') ?>" class="nav-link">Dashboard</a></li>
            <li><a href="#" class="nav-link">Daftar Mitra</a></li>
            <li><a href="#" class="nav-link">Logbook Magang</a></li>
            <li><a href="<?= base_url('user/profil') ?>" class="nav-link">Profil Saya</a></li>

        <?php elseif ($role == 'dsn'): ?>
            <li><a href="<?= base_url('dosen/dashboard') ?>" class="nav-link">Dashboard</a></li>
            <li><a href="#" class="nav-link">Mahasiswa Bimbingan</a></li>
            <li><a href="#" class="nav-link">Review Logbook</a></li>
            <li><a href="<?= base_url('user/profil') ?>" class="nav-link">Profil Saya</a></li>

        <?php elseif ($role == 'adm'): ?>
            <li><a href="<?= base_url('admin/dashboard') ?>" class="nav-link">Dashboard</a></li>
            <li><a href="#" class="nav-link">Kelola Mahasiswa</a></li>
            <li><a href="#" class="nav-link">Kelola Dosen</a></li>
            <li><a href="#" class="nav-link">Kelola Perusahaan</a></li>
        <?php endif; ?>

        <li class="mt-3">
            <a href="<?= base_url('auth/logout') ?>" class="nav-link text-danger fw-bold">Logout</a>
        </li>

    </ul>
</div>
