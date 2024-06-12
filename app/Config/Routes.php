<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Register
$routes->get('/register', 'UserController::register');
$routes->post('/register/proses', 'UserController::registerProses');
// punya pelamar
$routes->get('/registrasi/ketiga', 'PelamarController::registrasiKedua');
$routes->post('/register/ketiga/proses', 'PelamarController::registrasiProsesKedua');
// punya perusahaan
$routes->get('/registrasi/kedua', 'PerusahaanController::registrasiKedua');
$routes->post('/register/kedua/proses', 'PerusahaanController::registrasiProsesKedua');

// admin
$routes->get('/registrasi/admin', 'userController::registrasiadmin');
$routes->post('/register/admin/proses', 'userController::registrasiadminProses');

// login
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::index');
$routes->post('/login/proses', 'Home::login');
$routes->get('/logout', 'Home::logout');

// profile
$routes->get('profile', 'UserController::index', ['filter' => 'authFilter']);
$routes->post('edit/profile/proses/ketiga/(:any)', 'PelamarController::update/$1', ['filter' => 'authFilter']);
$routes->post('edit/profile/proses/kedua/(:any)', 'PerusahaanController::update/$1', ['filter' => 'authFilter']);
// main
$routes->get('admin/dashboard', 'Home::dashboard', ['filter' => 'authFilter']);

// perusahaan
$routes->get('perusahaan/dashboard', 'Home::dashboard', ['filter' => 'authFilter']);
$routes->get('perusahaan/lowongan/kedua', 'LowonganController::index', ['filter' => 'authFilter']);
$routes->post('proses/lowongan/kedua', 'LowonganController::postLowongan', ['filter' => 'authFilter']);
$routes->get('perusahaan/daftar/lowongan/kedua', 'LowonganController::listLowongan', ['filter' => 'authFilter']);
$routes->get('perusahaan/daftar/lowongan/kedua/edit/(:any)', 'LowonganController::editLowongan/$1', ['filter' => 'authFilter']);
$routes->post('perusahaan/daftar/lowongan/kedua/edit/proses', 'LowonganController::editLowonganProses', ['filter' => 'authFilter']);
$routes->get('perusahaan/daftar/lowongan/kedua/delete/(:any)', 'LowonganController::hapusLowonganProses/$1', ['filter' => 'authFilter']);
$routes->get('perusahaan/daftar/pelamar/kedua/', 'PerusahaanController::accPelamar', ['filter' => 'authFilter']);
$routes->get('perusahaan/daftar/keputusan/kedua/(:any)/(:any)/(:any)', 'PerusahaanController::keputusan/$1/$2/$3', ['filter' => 'authFilter']);

// Pelamar
$routes->get('pelamar/dashboard', 'Home::dashboard', ['filter' => 'authFilter']);
$routes->get('pelamar/daftar/lowongan', 'PelamarController::daftarLowongan', ['filter' => 'authFilter']);

// lamaran 
$routes->get('pelamar/lowongan/apply/(:any)', 'ApplyJobController::index/$1', ['filter' => 'authFilter']);
$routes->post('pelamar/lowongan/apply/proses', 'ApplyJobController::prosesLamar', ['filter' => 'authFilter']);
$routes->get('pelamar/lowongan/daftar', 'ApplyJobController::daftarJob', ['filter' => 'authFilter']);

