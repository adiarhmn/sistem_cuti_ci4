<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/*
    NOTE:
    - Route ini hanya untuk fitur karyawan
*/
$routes->group('karyawan', ['filter' => 'access:karyawan'], static function ($routes) {
    $routes->get('/', 'Karyawan\DashboardController::index'); // Halaman Dashboard

    // Cuti
    $routes->get('cuti', 'Karyawan\CutiController::index'); // Halaman Data Cuti
    $routes->get('cuti/tambah', 'Karyawan\CutiController::tampil_form_tambah'); // Halaman Tambah Cuti
    $routes->post('cuti/tambah', 'Karyawan\CutiController::tambah'); // Proses Tambah Cuti
    $routes->get('cuti/edit/(:num)', 'Karyawan\CutiController::tampil_form_edit/$1'); // Halaman Ubah Cuti
    $routes->post('cuti/edit/(:num)', 'Karyawan\CutiController::edit/$1'); // Proses Ubah Cuti

});
