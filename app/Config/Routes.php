<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Register
$routes->get('/register', 'UserController::register');
$routes->post('/register/proses', 'UserController::registerProses');
$routes->get('/registrasi/kedua', 'UserController::registrasiKedua');
$routes->post('/register/kedua/proses', 'UserController::registrasiProsesKedua');

// login
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::index');
$routes->post('/login/proses', 'Home::login');
$routes->get('/logout', 'Home::logout');

// main
$routes->get('profile', 'UserController::index', ['filter' => 'authFilter']);
$routes->get('admin/dashboard', 'Home::dashboard', ['filter' => 'authFilter']);

$routes->get('perusahaan/dashboard', 'Home::dashboard', ['filter' => 'authFilter']);

$routes->get('pelamar/dashboard', 'Home::dashboard', ['filter' => 'authFilter']);


