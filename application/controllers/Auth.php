<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth'); 
    }

    public function login()
    {
        if ($this->session->userdata('logged_in')) {
            $this->_redirect_by_role($this->session->userdata('role'));
        } else {
            $data['title'] = 'Login - CyberCareer';
            $this->load->view('auth/login', $data);
        }
    }

    public function process_login()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login'); 
        } else {
            $nim = $this->input->post('nim', TRUE);
            $password = $this->input->post('password');

            // Cek user di database
            $user = $this->M_auth->get_user_by_nim($nim);

            // DEBUGGING: Jika mau liat kenapa gagal, uncomment baris bawah ini
            // var_dump($user); die;

            if ($user) {
                // User Ditemukan, Cek Password
                if (password_verify($password, $user->password)) {
                    // Password Benar
                    $session_data = [
                        'user_id'   => $user->id,
                        'nim'       => $user->nim,
                        'nama'      => $user->nama_lengkap,
                        'role'      => $user->role, // Pastikan di DB role-nya 'mhs'
                        'logged_in' => TRUE,
                        'must_change_password' => ($user->default_password_changed == 0)
                    ];
                    $this->session->set_userdata($session_data);
                    $this->_redirect_by_role($user->role);
                } else {
                    // Password Salah
                    $this->session->set_flashdata('error', 'Password Salah!');
                    redirect('auth/login');
                }
            } else {
                // User Tidak Ditemukan
                $this->session->set_flashdata('error', 'NIM tidak terdaftar!');
                redirect('auth/login');
            }
        }
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    private function _redirect_by_role($role)
    {
        if ($role == 'mhs') {
            redirect('mahasiswa/dashboard');
        } elseif ($role == 'dsn') {
            redirect('dosen/dashboard'); // Pastikan controller Dosen ada
        } elseif ($role == 'adm') {
            redirect('admin/dashboard'); // Pastikan controller Admin ada
        } else {
            echo "Role tidak dikenali: " . $role;
        }
    }
}