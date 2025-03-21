<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/*
    NOTE:
    - Route ini hanya untuk fitur auth
    - Route ini hanya bisa diakses oleh public
*/


$routes->get('', static function () {
    return redirect()->to('login');
});

$routes->group('', ['filter' => 'access:public'], static function ($routes) {
    $routes->get('login', 'AuthController::index');
    $routes->post('login', 'AuthController::login');
    $routes->get('logout', 'AuthController::logout');
});
