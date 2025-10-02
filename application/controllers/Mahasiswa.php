<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Session $session
 * @property CI_Loader $load
 * @property CI_DB_query_builder $db
 */
class Mahasiswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'mhs') {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $userId = $this->session->userdata('user_id');

        $user_data = $this->db->get_where('users', ['id' => $userId])->row();

        $perusahaan_list = [
            (object)['id' => 1, 'nama' => 'PT. Blabber Media', 'logo' => 'blabber-logo.png', 'jml_lowongan' => 3],
            (object)['id' => 2, 'nama' => 'PT. Tokopedia', 'logo' => 'tokopedia-logo.png', 'jml_lowongan' => 7],
            (object)['id' => 3, 'nama' => 'PT. Google Indonesia', 'logo' => 'google-logo.png', 'jml_lowongan' => 2],
        ];

        $logbook_terakhir = $this->db->where('mahasiswa_id', $userId)->order_by('tanggal', 'DESC')->limit(3)->get('logbook')->result();
        
        $data['title'] = 'Dashboard Mahasiswa';
        $data['user'] = $user_data;
        $data['perusahaan_list'] = $perusahaan_list;
        $data['logbook_terakhir'] = $logbook_terakhir;

        $this->load->view('partials/dashboard', $data);
        $this->load->view('partials/sidebar', $data);
        $this->load->view('mahasiswa/dashboard', $data);
        $this->load->view('partials/footer');
    }

    public function dashboard()
    {
        $this->index();
    }
}