<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property CI_DB_query_builder $db
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property CI_Loader $load
 */
class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $this->load->view('login');
    }

    public function process_login()
    {
        $this->form_validation->set_rules('nim', 'NIM/NPM', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $nim = $this->input->post('nim');
            $password = $this->input->post('password');

            $user = $this->db->get_where('users', ['nim' => $nim])->row();
            if ($user && password_verify($password, $user->password)) {
                $session_data = array(
                    'user_id'   => $user->id,
                    'nim'       => $user->nim,
                    'nama'      => $user->nama_lengkap,
                    'role'      => $user->role,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);

                $this->session->set_userdata('must_change_password', ($user->default_password_changed == 0));

                switch ($user->role) {
                    case 'mhs':
                        redirect('mahasiswa/dashboard');
                        break;
                    case 'dsn':
                        redirect('dosen/dashboard');
                        break;
                    case 'adm':
                        redirect('admin/dashboard');
                        break;
                    default:
                        redirect('auth/login');
                        break;
                }

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
}