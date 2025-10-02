<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Session $session
 * @property CI_Loader $load
 */
class Dosen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        if ($this->session->userdata('role') != 'dsn') {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses ke halaman ini.');
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard Dosen';
        $data['user'] = [
            'nama' => $this->session->userdata('nama'),
            'nim'  => $this->session->userdata('nim')
        ];

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar', $data);
        $this->load->view('dosen/dashboard', $data);
        $this->load->view('partials/footer');
    }

    public function dashboard()
    {
        // Arahkan ke method index
        $this->index();
    }
}