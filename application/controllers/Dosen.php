<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'dsn') {
            redirect('auth/login');
        }
        $this->load->library('upload');
    }

    public function index()
    {
        $id_dosen = $this->session->userdata('user_id');
        $data['user'] = $this->db->get_where('users', ['id' => $id_dosen])->row();
        $data['title'] = 'Dashboard Dosen';

        $this->db->where('dosen_pembimbing_id', $id_dosen);
        $data['total_bimbingan'] = $this->db->count_all_results('users');

        $this->db->select('count(DISTINCT rm.mahasiswa_id) as total');
        $this->db->from('riwayat_magang rm');
        $this->db->join('users u', 'u.id = rm.mahasiswa_id');
        $this->db->where('u.dosen_pembimbing_id', $id_dosen);
        $this->db->where('rm.status', 'Aktif');
        $row_aktif = $this->db->get()->row();
        $data['total_magang_aktif'] = $row_aktif ? $row_aktif->total : 0;

        $this->db->from('logbook');
        $this->db->join('users', 'users.id = logbook.mahasiswa_id');
        $this->db->where('users.dosen_pembimbing_id', $id_dosen);
        $this->db->where('logbook.status', 'Menunggu Persetujuan');
        $data['total_pending_logbook'] = $this->db->count_all_results();

        $this->db->select('logbook.*, users.nama_lengkap, users.foto');
        $this->db->from('logbook');
        $this->db->join('users', 'users.id = logbook.mahasiswa_id');
        $this->db->where('users.dosen_pembimbing_id', $id_dosen);
        $this->db->order_by('logbook.tanggal', 'DESC'); 
        $this->db->limit(5); 
        $data['recent_logbooks'] = $this->db->get()->result();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar_dsn');
        $this->load->view('dosen/dashboard', $data);
        $this->load->view('partials/footer');
    }

    public function dashboard() { $this->index(); }

    public function mahasiswa()
    {
        $id_dosen = $this->session->userdata('user_id');
        $data['user'] = $this->db->get_where('users', ['id' => $id_dosen])->row();
        $data['title'] = 'Mahasiswa Bimbingan';

        $this->db->select('users.id, users.nama_lengkap, users.prodi, users.foto, users.telepon, 
                           users.angkatan, p.nama_perusahaan, rm.posisi, rm.status as status_magang');
        $this->db->from('users');
        $this->db->join('riwayat_magang rm', 'rm.mahasiswa_id = users.id AND rm.status = "Aktif"', 'left');
        $this->db->join('perusahaan p', 'p.id = rm.perusahaan_id', 'left');
        $this->db->where('users.dosen_pembimbing_id', $id_dosen);
        $this->db->order_by('users.nama_lengkap', 'ASC');
        $data['mahasiswa_bimbingan'] = $this->db->get()->result();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar_dsn');
        $this->load->view('dosen/mahasiswa', $data); 
        $this->load->view('partials/footer');
    }

    public function detail_mahasiswa($id_mhs)
    {
        $id_dosen = $this->session->userdata('user_id');

        $cek_mhs = $this->db->get_where('users', ['id' => $id_mhs, 'dosen_pembimbing_id' => $id_dosen])->row();
        if(!$cek_mhs) {
            show_error('Anda tidak memiliki akses ke mahasiswa ini.', 403);
        }

        $data['mhs'] = $cek_mhs;
        $data['user'] = $this->db->get_where('users', ['id' => $id_dosen])->row();

        $this->db->select('rm.*, p.nama_perusahaan, p.alamat as alamat_perusahaan');
        $this->db->from('riwayat_magang rm');
        $this->db->join('perusahaan p', 'p.id = rm.perusahaan_id');
        $this->db->where('rm.mahasiswa_id', $id_mhs);
        $this->db->order_by('rm.tgl_mulai', 'DESC');
        $data['riwayat_magang'] = $this->db->get()->result();

        $this->db->order_by('tanggal', 'DESC');
        $data['logbooks'] = $this->db->get_where('logbook', ['mahasiswa_id' => $id_mhs])->result();

        $data['title'] = 'Detail - ' . $data['mhs']->nama_lengkap;

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar_dsn');
        $this->load->view('dosen/detail_mahasiswa', $data); // View detail lengkap
        $this->load->view('partials/footer');
    }

    public function profil() {
        $data['title'] = 'Profil Dosen';
        $data['user'] = $this->db->get_where('users', ['id' => $this->session->userdata('user_id')])->row();
        
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar_dsn');
        $this->load->view('dosen/profil', $data); 
        echo '</div>';
        $this->load->view('partials/footer');
    }

    public function update_profil() {
        $userId = $this->session->userdata('user_id');
        $user = $this->db->get_where('users', ['id' => $userId])->row();

        $data_update = [
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'telepon'      => $this->input->post('telepon'),
            'alamat'       => $this->input->post('alamat'),
            'website'      => $this->input->post('website')
        ];

        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './uploads/foto/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config); 

            if ($this->upload->do_upload('foto')) {
                $upData = $this->upload->data();
                $data_update['foto'] = $upData['file_name'];
                
                if ($user->foto && $user->foto != 'default.jpg' && file_exists('./uploads/foto/' . $user->foto)) {
                    unlink('./uploads/foto/' . $user->foto);
                }
            } else {
                $error_msg = $this->upload->display_errors('', '');
                $this->session->set_flashdata('error', 'Gagal update foto: ' . $error_msg);
                redirect('dosen/profil');
                return; 
            }
        }

        $this->db->where('id', $userId);
        $update = $this->db->update('users', $data_update);
        
        if ($update) {
            $this->session->set_flashdata('success', 'Profil Dosen berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengupdate database.');
        }
        
        redirect('dosen/profil');
    }
}