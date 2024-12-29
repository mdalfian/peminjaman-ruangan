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
    $routes->get('get_notification', 'Admin::pending_notif', ['filter' => 'adminGuard']);
    $routes->get('user', 'Admin::user', ['filter' => 'adminGuard']);
    $routes->get('user/delete/(:any)', 'UserController::delete_user/$1', ['filter' => 'adminGuard']);
    $routes->post('user/update/(:any)', 'UserController::update_user/$1', ['filter' => 'adminGuard']);
    $routes->get('room', 'Admin::room', ['filter' => 'adminGuard']);
    $routes->post('room/add', 'RoomController::insert_room', ['filter' => 'adminGuard']);
    $routes->get('room/delete/(:any)', 'RoomController::delete_room/$1', ['filter' => 'adminGuard']);
    $routes->post('room/update/(:any)', 'RoomController::update_room/$1', ['filter' => 'adminGuard']);
    $routes->get('booking/pending', 'Admin::booking_pending', ['filter' => 'adminGuard']);
    $routes->get('booking/approved', 'Admin::booking_approved', ['filter' => 'adminGuard']);
    $routes->get('booking/rejected', 'Admin::booking_rejected', ['filter' => 'adminGuard']);
    $routes->get('booking/report', 'Admin::booking_report', ['filter' => 'adminGuard']);
    $routes->post('booking/report', 'Admin::booking_report', ['filter' => 'adminGuard']);
    $routes->get('booking/accept/(:any)', 'BookingController::accept/$1', ['filter' => 'adminGuard']);
    $routes->get('booking/reject/(:any)', 'BookingController::reject/$1', ['filter' => 'adminGuard']);
});

$routes->group('user', static function ($routes) {
    $routes->get('home', 'User::index', ['filter' => 'authGuard']);
    $routes->get('room', 'User::room', ['filter' => 'authGuard']);
    $routes->post('room/books', 'BookingController::insert_booking', ['filter' => 'authGuard']);
    $routes->get('booking', 'User::booking', ['filter' => 'authGuard']);
});
