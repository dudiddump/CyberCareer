<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Theme extends CI_Controller {
    
    public function toggle() {
        $current_theme = $this->session->userdata('theme');
        $new_theme = ($current_theme === 'dark') ? 'light' : 'dark';
        $this->session->set_userdata('theme', $new_theme);
        redirect($_SERVER['HTTP_REFERER']);
    }
}