<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['mahasiswa/dashboard'] = 'mahasiswa/dashboard';
$route['dosen/dashboard'] = 'dosen/dashboard';
$route['admin/dashboard'] = 'admin/dashboard';
$route['login'] = 'auth/login';
$route['theme_toggle'] = 'theme/toggle';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
