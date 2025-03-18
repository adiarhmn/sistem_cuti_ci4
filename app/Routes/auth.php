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
$routes->group('', ['filter' => 'access:public'], static function ($routes) {
    $routes->get('login', 'AuthController::index');
    $routes->post('login', 'AuthController::login');
    $routes->get('logout', 'AuthController::logout');
});
