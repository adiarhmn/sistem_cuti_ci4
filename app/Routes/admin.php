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
});
