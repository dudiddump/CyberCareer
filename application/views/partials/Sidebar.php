<aside class="w-64 flex-shrink-0 bg-white shadow-lg">
    <div class="p-6 text-center border-b">
        <a href="#" class="text-xl font-bold text-blue-700">CyberCareer</a>
        <div class="mt-4">
            <p class="font-semibold text-gray-800"><?= isset($user->nama_lengkap) ? $user->nama_lengkap : 'Nama Pengguna' ?></p>
            <p class="text-sm text-gray-500"><?= isset($user->nim) ? $user->nim : 'ID Pengguna' ?></p>
        </div>
    </div>

    <nav class="mt-6">
        <?php $role = $this->session->userdata('role'); ?>

        <?php if ($role == 'mhs'): ?>
            <a href="<?= base_url('mahasiswa/dashboard') ?>" class="block py-3 px-6 text-white bg-blue-700 font-semibold">Dashboard</a>
            <a href="#" class="block py-3 px-6 text-gray-600 hover:bg-gray-100">Daftar Mitra</a>
            <a href="#" class="block py-3 px-6 text-gray-600 hover:bg-gray-100">Logbook Magang</a>
            <a href="<?= base_url('user/profil') ?>" class="block py-3 px-6 text-gray-600 hover:bg-gray-100">Profil Saya</a>

        <?php elseif ($role == 'dsn'): ?>
            <a href="<?= base_url('dosen/dashboard') ?>" class="block py-3 px-6 text-white bg-blue-700 font-semibold">Dashboard</a>
            <a href="#" class="block py-3 px-6 text-gray-600 hover:bg-gray-100">Mahasiswa Bimbingan</a>
            <a href="#" class="block py-3 px-6 text-gray-600 hover:bg-gray-100">Review Logbook</a>
            <a href="<?= base_url('user/profil') ?>" class="block py-3 px-6 text-gray-600 hover:bg-gray-100">Profil Saya</a>

        <?php elseif ($role == 'adm'): ?>
            <a href="<?= base_url('admin/dashboard') ?>" class="block py-3 px-6 text-white bg-blue-700 font-semibold">Dashboard</a>
            <a href="#" class="block py-3 px-6 text-gray-600 hover:bg-gray-100">Kelola Mahasiswa</a>
            <a href="#" class="block py-3 px-6 text-gray-600 hover:bg-gray-100">Kelola Dosen</a>
            <a href="#" class="block py-3 px-6 text-gray-600 hover:bg-gray-100">Kelola Perusahaan</a>
        <?php endif; ?>

        <a href="<?= base_url('auth/logout') ?>" class="block py-3 px-6 text-gray-600 hover:bg-gray-100 mt-4 border-t">
            Logout
        </a>
    </nav>
</aside>