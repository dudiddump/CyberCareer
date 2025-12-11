<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
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
        $this->form_validation->set_rules('id', 'NIM/NIDN', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login'); 
        } else {
            $id_input = $this->input->post('id', TRUE); 
            $password = $this->input->post('password');

            $user = $this->db->get_where('users', ['id' => $id_input])->row();

            if ($user && password_verify($password, $user->password)) {
                
                session_regenerate_id(true);

                $session_data = [
                    'user_id'   => $user->id,
                    'nama'      => $user->nama_lengkap,
                    'role'      => $user->role,
                    'logged_in' => TRUE,
                    'must_change_password' => ($user->default_password_changed == 0)
                ];

                $this->session->set_userdata($session_data);
                $this->_redirect_by_role($user->role);

            } else {
                $this->session->set_flashdata('error', 'NIM/NIDN atau Password salah!');
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
        switch ($role) {
            case 'mhs': redirect('mahasiswa/dashboard'); break;
            case 'dsn': redirect('dosen/dashboard'); break;
            case 'adm': redirect('admin/dashboard'); break;
            default:    redirect('auth/login'); break;
        }
    }
}