<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property CI_DB_query_builder $db
 * @property CI_Upload $upload
 * @property CI_Loader $load
 */
class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        $this->load->helper('form');
        $this->load->library('upload');
    }
    
    public function profil()
    {
        $userId = $this->session->userdata('user_id');

        if ($this->input->method() === 'post') {
            $config['upload_path']   = './uploads/cv/';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfile')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $user = $this->db->get_where('users', ['id' => $userId])->row();
                if (!empty($user->file_cv)) {
                    @unlink('./uploads/cv/' . $user->file_cv);
                }

                $upload_data = $this->upload->data();
                $nama_file = $upload_data['file_name'];

                $this->db->where('id', $userId);
                $this->db->update('users', ['file_cv' => $nama_file]);

                $this->session->set_flashdata('success', 'File CV berhasil diperbarui!');
                redirect('user/profil');
            }
        }
        
        $data['user'] = $this->db->get_where('users', ['id' => $userId])->row();
        $data['title'] = 'Profil Saya';

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar', $data);
        $this->load->view('user/profil', $data);
        $this->load->view('partials/footer', $data);
    }
    
    public function change_password()
    {
        $data['title'] = 'Ganti Password';
        $data['user'] = $this->db->get_where('users', ['id' => $this->session->userdata('user_id')])->row();

        $this->load->view('partials/header_dashboard', $data);
        $this->load->view('partials/sidebar', $data);
        $this->load->view('user/change_pass', $data);
        $this->load->view('partials/footer');
    }
    
    public function process_change_password()
    {
        $this->form_validation->set_rules('old_password', 'Password Lama', 'required');
        $this->form_validation->set_rules('new_password', 'Password Baru', 'required|min_length[8]', [
            'min_length' => 'Password baru minimal harus 8 karakter.'
        ]);
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[new_password]', [
            'matches' => 'Konfirmasi password tidak cocok dengan password baru.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->change_password();
        } else {
            $userId = $this->session->userdata('user_id');
            $oldPassword = $this->input->post('old_password');
            $newPassword = $this->input->post('new_password');

            $user = $this->db->get_where('users', ['id' => $userId])->row();

            if (password_verify($oldPassword, $user->password)) {
                $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                $updateData = array(
                    'password' => $hashedNewPassword,
                    'default_password_changed' => 1 
                );

                $this->db->where('id', $userId);
                $this->db->update('users', $updateData);

                $this->session->set_flashdata('success', 'Password berhasil diubah! Silakan login kembali dengan password baru Anda.');
                redirect('auth/logout');

            } else {
                $this->session->set_flashdata('error', 'Password lama yang Anda masukkan salah.');
                redirect('user/change_pass');
            }
        }
    }
}