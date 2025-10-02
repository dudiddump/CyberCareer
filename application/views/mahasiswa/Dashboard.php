<main class="flex-1 p-6 lg:p-8 overflow-y-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-gray-600">Selamat datang kembali, <?= html_escape($user->nama_lengkap) ?>!</p>
    </div>

    <?php if ($this->session->userdata('must_change_password')): ?>
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 p-4 mb-6 rounded-md shadow-sm" role="alert">
            <p class="font-bold">Peringatan Keamanan</p>
            <p>Anda masih menggunakan password default. Segera <a href="<?= base_url('user/change_password') ?>" class="font-bold underline hover:text-yellow-900">ganti password Anda</a>.</p>
        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2 space-y-8">

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Peluang Karier & Magang</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php foreach ($perusahaan_list as $p): ?>
                    <div class="border rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <div class="flex items-center mb-3">
                            <img src="<?= base_url('assets/img/' . $p->logo) ?>" alt="Logo <?= $p->nama ?>" class="h-10 w-10 mr-4 object-contain">
                            <h4 class="font-bold text-md text-gray-900"><?= $p->nama ?></h4>
                        </div>
                        <p class="text-sm text-green-600 font-semibold mb-3"><?= $p->jml_lowongan ?> Lowongan Tersedia</p>
                        <a href="<?= base_url('perusahaan/detail/' . $p->id) ?>" class="block w-full text-center bg-gray-800 text-white font-semibold py-2 text-sm rounded-md hover:bg-gray-900 transition">
                            Lihat Detail
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Aktivitas Logbook Terbaru</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="p-4 font-semibold">Tanggal</th>
                                <th class="p-4 font-semibold">Kegiatan</th>
                                <th class="p-4 font-semibold">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            <?php if (!empty($logbook_terakhir)): ?>
                                <?php foreach ($logbook_terakhir as $log): ?>
                                    <tr>
                                        <td class="p-4 whitespace-nowrap"><?= date('d M Y', strtotime($log->tanggal)) ?></td>
                                        <td class="p-4 truncate max-w-xs"><?= html_escape($log->kegiatan) ?></td>
                                        <td class="p-4">
                                            <?php if ($log->status == 'Disetujui'): ?>
                                                <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">Disetujui</span>
                                            <?php elseif ($log->status == 'Perlu Revisi'): ?>
                                                <span class="px-2 py-1 text-xs font-semibold text-orange-800 bg-orange-200 rounded-full">Perlu Revisi</span>
                                            <?php else: ?>
                                                 <span class="px-2 py-1 text-xs font-semibold text-gray-800 bg-gray-200 rounded-full">Menunggu</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="p-4 text-center text-gray-500">Belum ada aktivitas logbook.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="space-y-8">

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-gray-800 border-b pb-3 mb-4">Profil Singkat</h3>
                <div class="space-y-3 text-sm">
                    <p><strong class="w-24 inline-block text-gray-500">Nama:</strong> <span class="font-semibold"><?= html_escape($user->nama_lengkap) ?></span></p>
                    <p><strong class="w-24 inline-block text-gray-500">NIM:</strong> <span class="font-semibold"><?= html_escape($user->nim) ?></span></p>
                    <p><strong class="w-24 inline-block text-gray-500">Prodi:</strong> <span class="font-semibold"><?= html_escape($user->prodi) ?></span></p>
                    <p><strong class="w-24 inline-block text-gray-500">Status:</strong> <span class="font-semibold text-green-600">Aktif</span></p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-gray-800 border-b pb-3 mb-4">Dokumen & Akademik</h3>
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-700">Curriculum Vitae (CV)</p>
                        <?php if(!empty($user->file_cv)): ?>
                            <a href="<?= base_url('uploads/cv/'.$user->file_cv) ?>" target="_blank" class="text-sm text-blue-600 hover:underline">Lihat File Terunggah</a>
                        <?php else: ?>
                            <p class="text-sm text-red-500">Belum diunggah</p>
                        <?php endif; ?>
                    </div>
                     <div>
                        <p class="font-semibold text-gray-700">IPK Terakhir (KHS)</p>
                        <p class="text-2xl font-bold text-blue-700"><?= $user->ipk_terakhir ? $user->ipk_terakhir : '-' ?></p>
                    </div>
                    <a href="<?= base_url('user/profil') ?>" class="block w-full text-center bg-blue-600 text-white font-semibold py-2 text-sm rounded-md hover:bg-blue-700 transition mt-4">
                        Kelola Profil & Dokumen
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>