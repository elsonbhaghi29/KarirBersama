<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/home', 'home::index');
// $routes->get('/', 'UserController::index');


// Register
$routes->get('/register', 'UserController::register');
$routes->post('/register/proses', 'UserController::registerProses');

// login
$routes->get('/login', 'UserController::index');
$routes->post('/login/proses', 'UserController::dashboard');

