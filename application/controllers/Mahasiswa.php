<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== 'mhs') {
            redirect('auth/login');
        }
        $this->load->library(['form_validation', 'upload']);
    }

    public function dashboard() 
    {
        $user_id = $this->session->userdata('user_id');

        $data['user'] = $this->db->get_where('users', ['id' => $user_id])->row();

        if (!$data['user']) {
            $this->session->sess_destroy();
            redirect('auth/login');
            return;
        }

        $this->db->select('lowongan.*, perusahaan.nama_perusahaan as nama, perusahaan.logo, perusahaan.industri');
        $this->db->from('lowongan');
        $this->db->join('perusahaan', 'perusahaan.id = lowongan.perusahaan_id');
        $this->db->limit(4);
        $data['perusahaan_list'] = $this->db->get()->result();

        $this->db->select('logbook.*, dsn.nama_lengkap as nama_dosen');
        $this->db->from('logbook');
        $this->db->join('users as dsn', 'dsn.id = logbook.dosen_id', 'left');
        $this->db->where('logbook.mahasiswa_id', $user_id);
        $this->db->order_by('logbook.tanggal', 'DESC');
        $this->db->limit(5);
        $data['logbook_terakhir'] = $this->db->get()->result();

        $data['title'] = 'Dashboard Mahasiswa';

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar_mhs'); 
        $this->load->view('mahasiswa/dashboard', $data);
        echo '</div>'; 
        $this->load->view('partials/footer');
    }

    public function logbook()
    {
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->db->get_where('users', ['id' => $user_id])->row();

        if (!$data['user']) { redirect('auth/logout'); return; }

        $tahun_masuk = (int) $data['user']->tahun_masuk;
        $tahun_skrg  = (int) date('Y');
        $bulan_skrg  = (int) date('n'); 

        $selisih_tahun = $tahun_skrg - $tahun_masuk;

        if ($bulan_skrg >= 9) { 
            $semester = ($selisih_tahun * 2) + 1;
        } elseif ($bulan_skrg < 3) { 
            $semester = ($selisih_tahun * 2) - 1;
        } else { 
            $semester = ($selisih_tahun * 2);
        }
        if ($semester < 1) $semester = 1;
        $data['semester_sekarang'] = $semester;

        $magang_aktif = $this->db->get_where('riwayat_magang', [
            'mahasiswa_id' => $user_id,
            'status' => 'Aktif'
        ])->row();
        $is_magang_aktif = ($magang_aktif != null);

        $akses_terbuka = false;
        if ($semester >= 6) {
            $akses_terbuka = true;
        } elseif ($semester == 5 && $bulan_skrg == 2 && $is_magang_aktif) {
            $akses_terbuka = true;
        }
        $data['akses_terbuka'] = $akses_terbuka; 

        $this->db->select('logbook.*, dsn.nama_lengkap as nama_dosen');
        $this->db->from('logbook');
        $this->db->join('users as dsn', 'dsn.id = logbook.dosen_id', 'left');
        $this->db->where('logbook.mahasiswa_id', $user_id);
        $this->db->order_by('logbook.tanggal', 'DESC');
        $data['logbook_list'] = $this->db->get()->result();

        $data['title'] = 'Logbook Magang';

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar_mhs'); 
        $this->load->view('mahasiswa/logbook', $data);
        echo '</div>'; 
        $this->load->view('partials/footer');
    }

    public function tambah_logbook()
    {
        $user_id = $this->session->userdata('user_id');
        $user_data = $this->db->get_where('users', ['id' => $user_id])->row();
        
        $magang_aktif = $this->db->get_where('riwayat_magang', [
            'mahasiswa_id' => $user_id,
            'status' => 'Aktif'
        ])->row();

        $perusahaan_id = $magang_aktif ? $magang_aktif->perusahaan_id : 0;

        $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required|min_length[10]');

        if ($this->form_validation->run() == FALSE) {
             $this->session->set_flashdata('error', validation_errors());
             redirect('mahasiswa/logbook');
        } else {
             if (empty($_FILES['file_dokumentasi']['name'])) {
                $this->session->set_flashdata('error', 'Wajib upload File Laporan/Bukti Kegiatan!');
                redirect('mahasiswa/logbook');
                return;
             }

             $data = [
                'mahasiswa_id'  => $user_id,
                'perusahaan_id' => $perusahaan_id,
                'dosen_id'      => $user_data->dosen_pembimbing_id ?? '0', 
                'tanggal'       => date('Y-m-d'), 
                'kegiatan'      => $this->input->post('kegiatan'),
                'status'        => 'Menunggu Persetujuan'
             ];

             $config['upload_path']   = './uploads/logbook/';
             $config['allowed_types'] = 'pdf|jpg|jpeg|png|doc|docx';
             $config['max_size']      = 5120;
             $config['encrypt_name']  = TRUE;
             $this->load->library('upload', $config);

             if ($this->upload->do_upload('file_dokumentasi')) {
                $data['file_dokumentasi'] = $this->upload->data('file_name');
             } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('mahasiswa/logbook');
                return;
             }

             $this->db->insert('logbook', $data);
             $this->session->set_flashdata('success', 'Logbook berhasil disimpan!');
             redirect('mahasiswa/logbook');
        }
    }

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
            return;
        }

        if (empty($old_data->file_dokumentasi) && empty($_FILES['file_dokumentasi']['name'])) {
            $this->session->set_flashdata('error', 'Anda wajib mengupload file bukti!');
            redirect('mahasiswa/logbook');
            return;
        }

        $data = [
            'kegiatan' => $this->input->post('kegiatan'),
            'status'   => 'Menunggu Persetujuan'
        ];

        if (!empty($_FILES['file_dokumentasi']['name'])) {
            $config['upload_path']   = './uploads/logbook/';
            $config['allowed_types'] = 'pdf|jpg|jpeg|png|doc|docx';
            $config['max_size']      = 5120;
            $config['encrypt_name']  = TRUE;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_dokumentasi')) {
                $data['file_dokumentasi'] = $this->upload->data('file_name');
                if (!empty($old_data->file_dokumentasi)) {
                    @unlink('./uploads/logbook/' . $old_data->file_dokumentasi);
                }
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

        if (!$data['user']) { redirect('auth/logout'); return; }

        $this->db->order_by('nama_perusahaan', 'ASC');
        $data['mitra_list'] = $this->db->get('perusahaan')->result();

        $data['title'] = 'Daftar Mitra Industri';

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar_mhs'); 
        $this->load->view('mahasiswa/mitra', $data);
        echo '</div>'; 
        $this->load->view('partials/footer');
    }

    public function detail_mitra($id_perusahaan)
    {
        $user_id = $this->session->userdata('user_id');
        
        $data['user'] = $this->db->get_where('users', ['id' => $user_id])->row();
        if (!$data['user']) { redirect('auth/logout'); return; }

        $data['mitra'] = $this->db->get_where('perusahaan', ['id' => $id_perusahaan])->row();

        if (!$data['mitra']) show_404();

        $data['lowongan'] = $this->db->get_where('lowongan', ['perusahaan_id' => $id_perusahaan])->result();
        
        $this->db->where('perusahaan_id', $id_perusahaan);
        $this->db->from('riwayat_magang');
        $data['jumlah_magang'] = $this->db->count_all_results(); 
        
        $data['title'] = 'Profil Mitra - ' . $data['mitra']->nama_perusahaan;

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar_mhs'); 
        $this->load->view('mahasiswa/detail_mitra', $data);
        echo '</div>'; 
        $this->load->view('partials/footer');
    }

    public function riwayat()
    {
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->db->get_where('users', ['id' => $user_id])->row();

        if (!$data['user']) { redirect('auth/logout'); return; }

        $this->db->select('riwayat_magang.*, perusahaan.nama_perusahaan, perusahaan.logo');
        $this->db->from('riwayat_magang');
        $this->db->join('perusahaan', 'perusahaan.id = riwayat_magang.perusahaan_id');
        $this->db->where('mahasiswa_id', $user_id);
        $this->db->order_by('tgl_mulai', 'DESC');
        $data['riwayat_list'] = $this->db->get()->result();
        $data['perusahaan_list'] = $this->db->get('perusahaan')->result();
        $data['title'] = 'Riwayat Karier Saya';

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar_mhs'); 
        $this->load->view('mahasiswa/riwayat', $data); 
        echo '</div>'; 
        $this->load->view('partials/footer');
        }

    public function tambah_riwayat()
    {
        $user_id = $this->session->userdata('user_id');
        $nama_perusahaan = $this->input->post('nama_perusahaan');
        
        $perusahaan = $this->db->get_where('perusahaan', ['nama_perusahaan' => $nama_perusahaan])->row();

        if ($perusahaan) {
            $perusahaan_id = $perusahaan->id;
        } else {
            $data_pt = [
                'nama_perusahaan' => $nama_perusahaan,
                'alamat' => $this->input->post('lokasi'), 
                'industri' => 'Lainnya'
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
            'tgl_selesai'   => ($this->input->post('status') == 'Aktif') ? NULL : $this->input->post('tgl_selesai'),
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