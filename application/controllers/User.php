<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller User (Profil, Foto, CV, Password)
 */
class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // 1. Cek Login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        
        // 2. Load Library Wajib
        $this->load->helper('form');
        $this->load->library('upload');
        $this->load->library('form_validation');
    }

    // ======================================================
    // 1. MENAMPILKAN HALAMAN PROFIL
    // ======================================================
    public function profil()
    {
        $userId = $this->session->userdata('user_id');
        
        $data['title'] = 'Kelola Profil - CyberCareer';
        $data['user'] = $this->db->get_where('users', ['id' => $userId])->row();

        $this->load->view('partials/header_dashboard', $data);
        $this->load->view('user/profil', $data);
        $this->load->view('partials/footer_dashboard');
    }

    // ======================================================
    // 2. PROSES UPDATE DATA DIRI & FILE (FOTO/CV)
    // ======================================================
    public function update_profil()
    {
        $userId = $this->session->userdata('user_id');
        $user = $this->db->get_where('users', ['id' => $userId])->row();

        // A. DATA YANG BOLEH DIEDIT (Nama & NIM tidak masuk sini)
        // Alamat juga sudah dihapus sesuai request
        $data_update = [
            'telepon'  => $this->input->post('telepon', TRUE),
            'keahlian' => $this->input->post('keahlian', TRUE),
            'linkedin' => $this->input->post('linkedin', TRUE),
            'github'   => $this->input->post('github', TRUE)
        ];

        // B. LOGIKA UPLOAD FOTO PROFIL
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './uploads/foto/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048; // 2MB
            $config['encrypt_name']  = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $upData = $this->upload->data();
                $data_update['foto'] = $upData['file_name'];
                
                // Hapus foto lama (biar server hemat storage)
                if ($user->foto && file_exists('./uploads/foto/' . $user->foto)) {
                    @unlink('./uploads/foto/' . $user->foto);
                }
            } else {
                $this->session->set_flashdata('error', 'Gagal Upload Foto: ' . $this->upload->display_errors());
                redirect('user/profil');
                return; // Stop
            }
        }

        // C. LOGIKA UPLOAD CV
        if (!empty($_FILES['file_cv']['name'])) {
            unset($config); // Reset config foto sebelumnya
            $config['upload_path']   = './uploads/cv/';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size']      = 5120; // 5MB
            $config['encrypt_name']  = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file_cv')) {
                $upData = $this->upload->data();
                $data_update['file_cv'] = $upData['file_name'];
                
                // Hapus CV lama
                if ($user->file_cv && file_exists('./uploads/cv/' . $user->file_cv)) {
                    @unlink('./uploads/cv/' . $user->file_cv);
                }
            } else {
                $this->session->set_flashdata('error', 'Gagal Upload CV: ' . $this->upload->display_errors());
                redirect('user/profil');
                return; // Stop
            }
        }

        // D. EKSEKUSI UPDATE KE DATABASE
        $this->db->where('id', $userId);
        $this->db->update('users', $data_update);

        $this->session->set_flashdata('success', 'Profil berhasil diperbarui!');
        redirect('user/profil');
    }

    // ======================================================
    // 3. PROSES GANTI PASSWORD
    // ======================================================
    public function process_change_password()
    {
        $this->form_validation->set_rules('old_password', 'Password Lama', 'required');
        $this->form_validation->set_rules('new_password', 'Password Baru', 'required|min_length[6]', [
            'min_length' => 'Password baru minimal 6 karakter.'
        ]);
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[new_password]', [
            'matches' => 'Konfirmasi password tidak cocok.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kirim error spesifik password
            $this->session->set_flashdata('error_pass', validation_errors('<p class="mb-0">', '</p>'));
            redirect('user/profil');
        } else {
            $userId = $this->session->userdata('user_id');
            $oldPassword = $this->input->post('old_password');
            $newPassword = $this->input->post('new_password');

            $user = $this->db->get_where('users', ['id' => $userId])->row();

            // Cek Password Lama
            if (password_verify($oldPassword, $user->password)) {
                
                // Hash Password Baru
                $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                $updateData = [
                    'password' => $hashedNewPassword,
                    'default_password_changed' => 1 
                ];

                $this->db->where('id', $userId);
                $this->db->update('users', $updateData);

                // Sukses -> Logout (Best Practice)
                $this->session->set_flashdata('success', 'Password berhasil diubah! Silakan login ulang.');
                redirect('auth/logout');

            } else {
                $this->session->set_flashdata('error_pass', 'Password lama salah!');
                redirect('user/profil');
            }
        }
    }
}