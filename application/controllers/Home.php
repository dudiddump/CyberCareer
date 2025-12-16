<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->view('presentation');
    }

    public function landing()
    {
        $data['title'] = 'CyberCareer - Home';
        $this->load->view('landing_page', $data);
    }

    public function tour()
    {
        $this->load->view('tour');
    }
}