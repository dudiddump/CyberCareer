<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Theme extends CI_Controller {
    
    public function toggle() {
        // Cek tema saat ini
        $current_theme = $this->session->userdata('theme');
        
        // Switch logic
        $new_theme = ($current_theme === 'dark') ? 'light' : 'dark';
        
        // Simpan ke session
        $this->session->set_userdata('theme', $new_theme);
        
        // Kembali ke halaman sebelumnya
        redirect($_SERVER['HTTP_REFERER']);
    }
}