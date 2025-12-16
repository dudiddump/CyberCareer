<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        
        $this->load->helper('form');
        $this->load->library('upload');
        $this->load->library('form_validation');
    }

    public function change_pass()
    {
        $role = $this->session->userdata('role');
        $back_url = 'admin/dashboard';

        if ($role == 'mhs') {
            $back_url = 'mahasiswa/profil';
        } elseif ($role == 'dsn') {
            $back_url = 'dosen/profil';
        }

        $this->form_validation->set_rules('old_password', 'Password Lama', 'required');
        $this->form_validation->set_rules('new_password', 'Password Baru', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_pass', validation_errors('<p class="mb-0">', '</p>'));
            redirect($back_url);
        } else {
            $userId = $this->session->userdata('user_id');
            $oldPassword = $this->input->post('old_password');
            $newPassword = $this->input->post('new_password');

            $user = $this->db->get_where('users', ['id' => $userId])->row();

            if (password_verify($oldPassword, $user->password)) {
                $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $updateData = [
                    'password' => $hashedNewPassword,
                    'default_password_changed' => 1 
                ];
                $this->db->where('id', $userId);
                $this->db->update('users', $updateData);

                $this->session->set_flashdata('success', 'Password berhasil diubah! Silakan login ulang.');
                redirect('auth/logout'); 
            } else {
                $this->session->set_flashdata('error_pass', 'Password lama salah!');
                redirect($back_url); 
            }
        }
    }
}