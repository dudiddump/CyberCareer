<main class="flex-1 p-6 lg:p-10 overflow-y-auto">
    <h1 class="text-3xl font-bold text-gray-800">Dashboard Dosen</h1>
    <hr class="my-4">
    <p>Selamat datang, <?= isset($user['nama']) ? $user['nama'] : 'Dosen' ?>!</p>
    <p>Ini adalah halaman di mana Anda bisa memantau mahasiswa bimbingan Anda.</p>
</main>