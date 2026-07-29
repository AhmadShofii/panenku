<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home
$routes->get('/', 'Home::index');

// Route yang membutuhkan login
$routes->group('', ['filter' => 'session'], static function ($routes) {

    // Dashboard
    $routes->get('dashboard', 'Dashboard::index');

    // Kebun
    $routes->get('kebun', 'Kebun::index');
    $routes->get('kebun/create', 'Kebun::create');
    $routes->post('kebun/store', 'Kebun::store');

    $routes->get('kebun/edit/(:num)', 'Kebun::edit/$1');
    $routes->post('kebun/update/(:num)', 'Kebun::update/$1');
    
    $routes->get('kebun/delete/(:num)', 'Kebun::delete/$1');

});

service('auth')->routes($routes);