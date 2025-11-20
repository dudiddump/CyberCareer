<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller Mahasiswa
 * Menangani Dashboard, Logbook, dan Upload
 */
class Mahasiswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Cek Login & Role
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== 'mhs') {
            redirect('auth/login');
        }
        $this->load->library(['form_validation', 'upload']);
    }

    // --- HALAMAN DASHBOARD ---
    public function dashboard() // Ganti nama index jadi dashboard sesuai routing
    {
        $nim = $this->session->userdata('nim');
        $user_id = $this->session->userdata('user_id');

        // Data User
        $data['user'] = $this->db->get_where('users', ['nim' => $nim])->row();

        // Data Lowongan (Dummy)
        $this->db->select('id, nama_perusahaan as nama, logo, "5" as jml_lowongan');
        $data['perusahaan_list'] = $this->db->get('perusahaan', 4)->result();

        // Data Logbook (Limit 5 untuk Dashboard)
        $this->db->select('logbook.*, dsn.nama_lengkap as nama_dosen');
        $this->db->from('logbook');
        $this->db->join('users as dsn', 'dsn.id = logbook.dosen_id', 'left');
        $this->db->where('logbook.mahasiswa_id', $user_id);
        $this->db->order_by('logbook.tanggal', 'DESC');
        $this->db->limit(5);
        $data['logbook_terakhir'] = $this->db->get()->result();

        $data['title'] = 'Dashboard Mahasiswa';

        $this->load->view('partials/header_dashboard', $data);
        $this->load->view('mahasiswa/dashboard', $data);
        $this->load->view('partials/footer_dashboard');
    }

    // --- HALAMAN LOGBOOK (FULL LIST) ---
    public function logbook()
    {
        $user_id = $this->session->userdata('user_id');
        
        // Ambil SEMUA Logbook
        $this->db->select('logbook.*, dsn.nama_lengkap as nama_dosen');
        $this->db->from('logbook');
        $this->db->join('users as dsn', 'dsn.id = logbook.dosen_id', 'left');
        $this->db->where('logbook.mahasiswa_id', $user_id);
        $this->db->order_by('logbook.tanggal', 'DESC');
        $data['logbook_list'] = $this->db->get()->result();

        $data['title'] = 'Logbook Magang';
        $data['user'] = $this->db->get_where('users', ['id' => $user_id])->row();

        $this->load->view('partials/header_dashboard', $data);
        $this->load->view('mahasiswa/logbook', $data);
        $this->load->view('partials/footer_dashboard');
    }

    public function tambah_logbook()
    {
        $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required|min_length[10]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('mahasiswa/logbook');
        } else {
            
            // 1. CEK APAKAH FILE DIUPLOAD? (Validasi Server)
            if (empty($_FILES['file_dokumentasi']['name'])) {
                $this->session->set_flashdata('error', 'Wajib upload File Laporan/Bukti Kegiatan!');
                redirect('mahasiswa/logbook');
                return; // Stop proses
            }

            $data = [
                'mahasiswa_id' => $this->session->userdata('user_id'),
                'perusahaan_id'=> 1, 
                'dosen_id'     => 11, 
                'tanggal'      => date('Y-m-d'), // Tanggal Server
                'kegiatan'     => $this->input->post('kegiatan'),
                'status'       => 'Menunggu Persetujuan'
            ];

            // 2. PROSES UPLOAD
            $config['upload_path']   = './uploads/logbook/';
            $config['allowed_types'] = 'pdf|jpg|jpeg|png|doc|docx';
            $config['max_size']      = 5120; // 5MB
            $config['encrypt_name']  = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file_dokumentasi')) {
                $data['file_dokumentasi'] = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('mahasiswa/logbook');
                return;
            }

            $this->db->insert('logbook', $data);
            $this->session->set_flashdata('success', 'Logbook & File berhasil disimpan!');
            redirect('mahasiswa/logbook');
        }
    }

    // --- API GET DATA UTK EDIT (AJAX) ---
    public function get_logbook_detail($id)
    {
        $user_id = $this->session->userdata('user_id');
        $data = $this->db->get_where('logbook', ['id' => $id, 'mahasiswa_id' => $user_id])->row();
        echo json_encode($data);
    }

    public function update_logbook()
    {
        $id_logbook = $this->input->post('id_logbook');
        $old_data = $this->db->get_where('logbook', ['id' => $id_logbook])->row();

        if($old_data->status == 'Disetujui') {
            $this->session->set_flashdata('error', 'Logbook disetujui tidak bisa diedit!');
            redirect('mahasiswa/logbook');
        }

        $data = [
            'kegiatan' => $this->input->post('kegiatan'),
            'status'   => 'Menunggu Persetujuan'
        ];

        // Upload File Baru (Opsional saat edit)
        if (!empty($_FILES['file_dokumentasi']['name'])) {
            $config['upload_path']   = './uploads/logbook/';
            $config['allowed_types'] = 'pdf|jpg|jpeg|png|doc|docx';
            $config['max_size']      = 5120;
            $config['encrypt_name']  = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file_dokumentasi')) {
                $data['file_dokumentasi'] = $this->upload->data('file_name');
                // Hapus file lama
                if (!empty($old_data->file_dokumentasi)) {
                    @unlink('./uploads/logbook/' . $old_data->file_dokumentasi);
                }
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('mahasiswa/logbook');
                return;
            }
        }

        $this->db->where('id', $id_logbook);
        $this->db->update('logbook', $data);

        $this->session->set_flashdata('success', 'Logbook berhasil diperbarui!');
        redirect('mahasiswa/logbook');
    }

    public function mitra()
    {
        $user_id = $this->session->userdata('user_id');
        
        $data['user'] = $this->db->get_where('users', ['id' => $user_id])->row();

        $this->db->order_by('nama_perusahaan', 'ASC');
        $data['mitra_list'] = $this->db->get('perusahaan')->result();

        $data['title'] = 'Daftar Mitra Industri';

        $this->load->view('partials/header_dashboard', $data);
        $this->load->view('mahasiswa/mitra', $data); // View baru
        $this->load->view('partials/footer_dashboard');
    }

    public function detail_mitra($id_perusahaan)
    {
        $user_id = $this->session->userdata('user_id');
        
        $data['user'] = $this->db->get_where('users', ['id' => $user_id])->row();
        $data['mitra'] = $this->db->get_where('perusahaan', ['id' => $id_perusahaan])->row();

        if (!$data['mitra']) show_404();

        $data['lowongan'] = $this->db->get_where('lowongan', ['perusahaan_id' => $id_perusahaan])->result();
        
        $this->db->where('perusahaan_id', $id_perusahaan);
        $this->db->from('logbook');
        $data['jumlah_magang'] = $this->db->count_all_results(); 
        
        if($data['jumlah_magang'] == 0) $data['jumlah_magang'] = rand(5, 50);

        $data['title'] = 'Profil Mitra - ' . $data['mitra']->nama_perusahaan;

        $this->load->view('partials/header_dashboard', $data);
        $this->load->view('mahasiswa/detail_mitra', $data);
        $this->load->view('partials/footer_dashboard');
    }

    // --- HALAMAN RIWAYAT KARIER ---
    public function riwayat()
    {
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->db->get_where('users', ['id' => $user_id])->row();

        // Ambil Data Riwayat (Join Perusahaan)
        $this->db->select('riwayat_magang.*, perusahaan.nama_perusahaan, perusahaan.logo');
        $this->db->from('riwayat_magang');
        $this->db->join('perusahaan', 'perusahaan.id = riwayat_magang.perusahaan_id');
        $this->db->where('mahasiswa_id', $user_id);
        $this->db->order_by('tgl_mulai', 'DESC');
        $data['riwayat_list'] = $this->db->get()->result();

        // Ambil Daftar Nama Perusahaan untuk Suggestion (Datalist)
        $data['perusahaan_list'] = $this->db->get('perusahaan')->result();

        $data['title'] = 'Riwayat Karier Saya';

        $this->load->view('partials/header_dashboard', $data);
        $this->load->view('mahasiswa/riwayat', $data);
        $this->load->view('partials/footer_dashboard');
    }

    // --- PROSES TAMBAH RIWAYAT (AUTO CREATE COMPANY) ---
    public function tambah_riwayat()
    {
        $user_id = $this->session->userdata('user_id');
        $nama_perusahaan = $this->input->post('nama_perusahaan');
        
        // 1. CEK: Perusahaan sudah ada belum?
        $perusahaan = $this->db->get_where('perusahaan', ['nama_perusahaan' => $nama_perusahaan])->row();

        if ($perusahaan) {
            // KASUS A: Sudah ada, ambil ID-nya
            $perusahaan_id = $perusahaan->id;
        } else {
            // KASUS B: Belum ada, BUAT BARU otomatis
            $data_pt = [
                'nama_perusahaan' => $nama_perusahaan,
                'alamat' => $this->input->post('lokasi'), // Pakai lokasi magang sbg alamat sementara
                'industri' => 'Lainnya' // Default
            ];
            $this->db->insert('perusahaan', $data_pt);
            $perusahaan_id = $this->db->insert_id(); 
        }

        $data_riwayat = [
            'mahasiswa_id'  => $user_id,
            'perusahaan_id' => $perusahaan_id,
            'posisi'        => $this->input->post('posisi'),
            'lokasi'        => $this->input->post('lokasi'),
            'tgl_mulai'     => $this->input->post('tgl_mulai'),
            'tgl_selesai'   => $this->input->post('status') == 'Aktif' ? NULL : $this->input->post('tgl_selesai'),
            'status'        => $this->input->post('status')
        ];

        $this->db->insert('riwayat_magang', $data_riwayat);
        $this->session->set_flashdata('success', 'Riwayat karier berhasil ditambahkan!');
        redirect('mahasiswa/riwayat');
    }

    public function hapus_riwayat($id)
    {
        $this->db->delete('riwayat_magang', ['id' => $id, 'mahasiswa_id' => $this->session->userdata('user_id')]);
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('mahasiswa/riwayat');
    }
}