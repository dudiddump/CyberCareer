<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'dsn') {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $id_dosen = $this->session->userdata('user_id');
        
        $data['user'] = $this->db->get_where('users', ['id' => $id_dosen])->row();

        $this->db->select('users.id, users.nama_lengkap, users.prodi, users.foto, 
                           p.nama_perusahaan, rm.posisi, rm.status as status_magang');
        $this->db->from('users');
        $this->db->join('riwayat_magang rm', 'rm.mahasiswa_id = users.id AND rm.status = "Aktif"', 'left');
        $this->db->join('perusahaan p', 'p.id = rm.perusahaan_id', 'left');
        $this->db->where('users.dosen_pembimbing_id', $id_dosen);
        $data['mahasiswa_bimbingan'] = $this->db->get()->result();

        $data['total_bimbingan'] = count($data['mahasiswa_bimbingan']);
        
        $this->db->from('logbook');
        $this->db->join('users', 'users.id = logbook.mahasiswa_id');
        $this->db->where('users.dosen_pembimbing_id', $id_dosen);
        $this->db->where('logbook.status', 'Menunggu Persetujuan');
        $data['total_pending'] = $this->db->count_all_results();

        $data['title'] = 'Dashboard Dosen';

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar_dsn');
        $this->load->view('dosen/dashboard', $data);
        echo '</div>';
        $this->load->view('partials/footer');
    }

    public function dashboard() { $this->index(); }

    public function detail_mahasiswa($id_mhs)
    {
        $id_dosen = $this->session->userdata('user_id');

        $cek_mhs = $this->db->get_where('users', ['id' => $id_mhs, 'dosen_pembimbing_id' => $id_dosen])->row();
        if(!$cek_mhs) {
            show_error('Anda tidak memiliki akses ke mahasiswa ini.', 403);
        }

        $data['mhs'] = $cek_mhs;
        $data['user'] = $this->db->get_where('users', ['id' => $id_dosen])->row();

        $this->db->select('rm.*, p.nama_perusahaan');
        $this->db->from('riwayat_magang rm');
        $this->db->join('perusahaan p', 'p.id = rm.perusahaan_id');
        $this->db->where('rm.mahasiswa_id', $id_mhs);
        $this->db->where('rm.status', 'Aktif');
        $data['magang'] = $this->db->get()->row();

        $this->db->order_by('tanggal', 'DESC');
        $data['logbooks'] = $this->db->get_where('logbook', ['mahasiswa_id' => $id_mhs])->result();

        $data['title'] = 'Detail Bimbingan - ' . $data['mhs']->nama_lengkap;

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar_dsn');
        $this->load->view('dosen/detail_bimbingan', $data);
        echo '</div>';
        $this->load->view('partials/footer');
    }

    public function verifikasi_logbook()
    {
        $id_dosen   = $this->session->userdata('user_id');
        $id_logbook = $this->input->post('id_logbook');
        $id_mhs     = $this->input->post('id_mahasiswa');
        
        $cek_valid = $this->db->query("
            SELECT logbook.id 
            FROM logbook 
            JOIN users ON users.id = logbook.mahasiswa_id
            WHERE logbook.id = ? 
            AND users.dosen_pembimbing_id = ?
        ", array($id_logbook, $id_dosen))->row();

        if (!$cek_valid) {
            $this->session->set_flashdata('error', 'Akses ditolak! Mahasiswa ini bukan bimbingan Anda.');
            redirect('dosen/dashboard');
            return;
        }

        $data = [
            'status' => $this->input->post('status'), 
            'feedback_dosen' => $this->input->post('feedback_dosen')
        ];

        $this->db->where('id', $id_logbook);
        $this->db->update('logbook', $data);

        $status_text = ($data['status'] == 'Disetujui') ? 'disetujui' : 'dikembalikan untuk revisi';
        $this->session->set_flashdata('success', 'Logbook berhasil ' . $status_text);
        
        redirect('dosen/detail_mahasiswa/' . $id_mhs);
    }