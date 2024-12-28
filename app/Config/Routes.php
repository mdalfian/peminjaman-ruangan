<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->get('register', 'Auth::daftar');
$routes->post('registering', 'Auth::register');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

$routes->group('admin', static function ($routes) {
    $routes->get('home', 'Admin::index', ['filter' => 'adminGuard']);
    $routes->get('user', 'Admin::user', ['filter' => 'adminGuard']);
    $routes->get('user/delete/(:any)', 'UserController::delete_user/$1', ['filter' => 'adminGuard']);
    $routes->post('user/update/(:any)', 'UserController::edit_user/$1', ['filter' => 'adminGuard']);
});

$routes->group('user', static function ($routes) {
    $routes->get('home', 'User::index', ['filter' => 'authGuard']);
});
