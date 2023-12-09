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

$routes->get('perusahaan/dashboard', 'Home::dashboard', ['filter' => 'authFilter']);
$routes->get('lowongan/kedua', 'LowonganController::index', ['filter' => 'authFilter']);
$routes->post('proses/lowongan/kedua', 'LowonganController::postLowongan', ['filter' => 'authFilter']);

$routes->get('pelamar/dashboard', 'Home::dashboard', ['filter' => 'authFilter']);


