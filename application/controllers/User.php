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
    
    public function profil()
    {
        $userId = $this->session->userdata('user_id');
        
        $data['title'] = 'Kelola Profil - CyberCareer';
        $data['user'] = $this->db->get_where('users', ['id' => $userId])->row();

        $tahun_masuk = (int) $data['user']->tahun_masuk;
        $tahun_skrg  = (int) date('Y');
        $bulan_skrg  = (int) date('n'); 

        $selisih_tahun = $tahun_skrg - $tahun_masuk;
        if ($bulan_skrg >= 9) {
            $semester = ($selisih_tahun * 2) + 1;
        } elseif ($bulan_skrg < 2) {
            $semester = ($selisih_tahun * 2) - 1;
        } else {
            $semester = ($selisih_tahun * 2);
        }

        if ($semester < 1) $semester = 1;
        
        $data['semester'] = $semester;
        if (!empty($data['user']->dosen_pembimbing_id)) {
            $dosen = $this->db->get_where('users', ['id' => $data['user']->dosen_pembimbing_id])->row();
            $data['nama_dosen'] = $dosen ? $dosen->nama_lengkap : '-';
        } else {
            $data['nama_dosen'] = 'Belum Ditentukan';
        }

        $this->load->view('mahasiswa/menu', $data);
        $this->load->view('user/profil', $data);
        $this->load->view('partials/footer_dashboard');
    }

    public function update_profil()
    {
        $userId = $this->session->userdata('user_id');
        $user = $this->db->get_where('users', ['id' => $userId])->row();

        $data_update = [
            'ipk_terakhir'  => $this->input->post('ipk_terakhir', TRUE),
            'tentang_saya'  => $this->input->post('tentang_saya', TRUE),
            'telepon'       => $this->input->post('telepon', TRUE),
            'linkedin'      => $this->input->post('linkedin', TRUE),
            'github'        => $this->input->post('github', TRUE),
            'website'       => $this->input->post('website', TRUE)
        ];

        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './uploads/foto/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $upData = $this->upload->data();
                $data_update['foto'] = $upData['file_name'];
                
                if ($user->foto && file_exists('./uploads/foto/' . $user->foto)) {
                    @unlink('./uploads/foto/' . $user->foto);
                }
            } else {
                $this->session->set_flashdata('error', 'Gagal Upload Foto: ' . $this->upload->display_errors());
                redirect('user/profil');
                return; 
            }
        }

        if (!empty($_FILES['file_cv']['name'])) {
            unset($config);
            $config['upload_path']   = './uploads/cv/';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size']      = 5120;
            $config['encrypt_name']  = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file_cv')) {
                $upData = $this->upload->data();
                $data_update['file_cv'] = $upData['file_name'];
                
                if ($user->file_cv && file_exists('./uploads/cv/' . $user->file_cv)) {
                    @unlink('./uploads/cv/' . $user->file_cv);
                }
            } else {
                $this->session->set_flashdata('error', 'Gagal Upload CV: ' . $this->upload->display_errors());
                redirect('user/profil');
                return; 
            }
        }

        $this->db->where('id', $userId);
        $this->db->update('users', $data_update);

        $this->session->set_flashdata('success', 'Profil berhasil diperbarui!');
        redirect('user/profil');
    }

    public function process_change_password()
    {
        $this->form_validation->set_rules('old_password', 'Password Lama', 'required');
        $this->form_validation->set_rules('new_password', 'Password Baru', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_pass', validation_errors('<p class="mb-0">', '</p>'));
            redirect('user/profil');
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
                redirect('user/profil');
            }
        }
    }
}