<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/*
    NOTE:
    - Route ini hanya untuk fitur admin
*/
$routes->group('admin', ['filter' => 'access:public'], static function ($routes) {
    $routes->get('/', 'Admin\DashboardController::index'); // Halaman Dashboard

    // Users
    $routes->get('user', 'Admin\UsersController::index'); // Halaman Data Users
    $routes->get('user/tambah', 'Admin\UsersController::tampil_form_tambah'); // Halaman Tambah Users
    $routes->post('user/tambah', 'Admin\UsersController::tambah'); // Proses Tambah Users
    $routes->get('user/edit/(:num)', 'Admin\UsersController::tampil_form_edit/$1'); // Halaman Ubah Users
    $routes->post('user/edit/(:num)', 'Admin\UsersController::edit/$1'); // Proses Ubah Users
    $routes->get('user/hapus/(:num)', 'Admin\UsersController::hapus/$1'); // Proses Hapus Users

    // Karyawan
    
});
