<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/*
    NOTE:
    - Route ini hanya untuk fitur admin
*/
$routes->group('admin', ['filter' => 'access:admin'], static function ($routes) {
    $routes->get('/', 'Admin\DashboardController::index'); // Halaman Dashboard

    // Users
    $routes->get('user', 'Admin\UsersController::index'); // Halaman Data Users
    $routes->get('user/tambah', 'Admin\UsersController::tampil_form_tambah'); // Halaman Tambah Users
    $routes->post('user/tambah', 'Admin\UsersController::tambah'); // Proses Tambah Users
    $routes->get('user/edit/(:num)', 'Admin\UsersController::tampil_form_edit/$1'); // Halaman Ubah Users
    $routes->post('user/edit/(:num)', 'Admin\UsersController::edit/$1'); // Proses Ubah Users
    $routes->get('user/hapus/(:num)', 'Admin\UsersController::hapus/$1'); // Proses Hapus Users

    // Departement
    $routes->get('departement', 'Admin\DepartementController::index'); // Halaman Data Departements
    $routes->get('departement/tambah', 'Admin\DepartementController::tampil_form_tambah'); // Halaman Tambah Departements
    $routes->post('departement/tambah', 'Admin\DepartementController::tambah'); // Proses Tambah Departements
    $routes->get('departement/edit/(:num)', 'Admin\DepartementController::tampil_form_edit/$1'); // Halaman Ubah Departements
    $routes->post('departement/edit/(:num)', 'Admin\DepartementController::edit/$1'); // Proses Ubah Departements
    $routes->get('departement/hapus/(:num)', 'Admin\DepartementController::hapus/$1'); // Proses Hapus Departements


    // Jenis Cuti
    $routes->get('jenis-cuti', 'Admin\JenisCutiController::index'); // Halaman Data Jenis Cuti
    $routes->get('jenis-cuti/tambah', 'Admin\JenisCutiController::tampil_form_tambah'); // Halaman Tambah Jenis Cuti
    $routes->post('jenis-cuti/tambah', 'Admin\JenisCutiController::tambah'); // Proses Tambah Jenis Cuti
    $routes->get('jenis-cuti/edit/(:num)', 'Admin\JenisCutiController::tampil_form_edit/$1'); // Halaman Ubah Jenis Cuti
    $routes->post('jenis-cuti/edit/(:num)', 'Admin\JenisCutiController::edit/$1'); // Proses Ubah Jenis Cuti
    $routes->get('jenis-cuti/hapus/(:num)', 'Admin\JenisCutiController::hapus/$1'); // Proses Hapus Jenis Cuti

    // Karyawan
    $routes->get('karyawan', 'Admin\KaryawanController::index'); // Halaman Data Karyawan
    $routes->get('karyawan/tambah', 'Admin\KaryawanController::tampil_form_tambah'); // Halaman Tambah Karyawan
    $routes->post('karyawan/tambah', 'Admin\KaryawanController::tambah'); // Proses Tambah Karyawan
    $routes->get('karyawan/edit/(:num)', 'Admin\KaryawanController::tampil_form_edit/$1'); // Halaman Ubah Karyawan
    $routes->post('karyawan/edit/(:num)', 'Admin\KaryawanController::edit/$1'); // Proses Ubah Karyawan
    $routes->get('karyawan/hapus/(:num)', 'Admin\KaryawanController::hapus/$1'); // Proses Hapus Karyawan
    $routes->get('karyawan/monitoring-cuti/(:num)', 'Admin\KaryawanController::monitoring_cuti/$1'); // Proses approve Cuti

    // Cuti
    $routes->get('cuti', 'Admin\CutiController::index'); // Halaman Data Cuti
    $routes->get('cuti/tambah', 'Admin\CutiController::tampil_form_tambah'); // Halaman Tambah Cuti
    $routes->post('cuti/tambah', 'Admin\CutiController::tambah'); // Proses Tambah Cuti
    $routes->get('cuti/edit/(:num)', 'Admin\CutiController::tampil_form_edit/$1'); // Halaman Ubah Cuti
    $routes->post('cuti/edit/(:num)', 'Admin\CutiController::edit/$1'); // Proses Ubah Cuti
    $routes->get('cuti/hapus/(:num)', 'Admin\CutiController::hapus/$1'); // Proses Hapus Cuti
    $routes->post('cuti/approve/(:num)', 'Admin\CutiController::approve/$1'); // Proses approve Cuti
});
