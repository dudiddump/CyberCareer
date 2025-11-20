<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property CI_DB_query_builder $db
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property CI_Loader $load
 */
class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'adm') {
            $this->session->set_flashdata('error', 'Anda harus login sebagai Admin!');
            redirect('auth/login');
        }
    }
    
    public function dashboard()
    {
        $data['title'] = 'Dashboard Admin';
        $data['user'] = $this->db->get_where('users', ['id' => $this->session->userdata('user_id')])->row();

        $this->load->view('partials/header_dashboard', $data);
        echo "<h1>Selamat Datang, Admin!</h1><p>Halaman dashboard admin.</p>";
        $this->load->view('partials/footer_dashboard');
    }

    public function tambah_mahasiswa()
    {
        $data['title'] = 'Tambah Mahasiswa';
        $this->load->view('partials/header_dashboard', $data);
        $this->load->view('admin/v_tambah_mahasiswa');
        $this->load->view('partials/footer_dashboard');
    }

    public function proses_tambah_mahasiswa()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[users.nim]', [
            'required' => 'NIM wajib diisi!',
            'is_unique' => 'NIM ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('prodi', 'Program Studi', 'required|trim');
        $this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk', 'required|trim|integer');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_mahasiswa();
        } else {
            $nim = $this->input->post('nim');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $prodi = $this->input->post('prodi');
            $tahun_masuk = $this->input->post('tahun_masuk');
            
            $default_password = 'CyberCareer1';
            $hashed_password = password_hash($default_password, PASSWORD_DEFAULT);

            $data_mahasiswa_baru = array(
                'nim' => $nim,
                'nama_lengkap' => $nama_lengkap,
                'prodi' => $prodi,
                'tahun_masuk' => $tahun_masuk,
                'password' => $hashed_password,
                'role' => 'mhs',
                'default_password_changed' => 0
            );

            $this->db->insert('users', $data_mahasiswa_baru);

            $this->session->set_flashdata('success', 'Data mahasiswa berhasil ditambahkan!');
            redirect('admin/kelola_mahasiswa');
        }
    }
    
    public function kelola_mahasiswa()
    {
        $data['title'] = 'Kelola Mahasiswa';
        $data['user'] = $this->db->get_where('users', ['id' => $this->session->userdata('user_id')])->row();

        $this->load->view('partials/header_dashboard', $data);
        echo "<h1>Kelola Mahasiswa</h1><p>Halaman ini akan menampilkan daftar mahasiswa.</p>";
        $this->load->view('partials/footer_dashboard');
    }
}