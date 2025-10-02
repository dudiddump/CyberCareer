<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Landing_page';
$route['mahasiswa/dashboard'] = 'mahasiswa/dashboard';
$route['dosen/dashboard'] = 'dosen/dashboard';
$route['admin/dashboard'] = 'admin/dashboard';
$route['login'] = 'auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
