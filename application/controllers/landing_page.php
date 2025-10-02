<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_page extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Selamat Datang di CyberCareer';
        $this->load->view('Landing_page', $data);
    }
}