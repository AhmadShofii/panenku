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

    // Panen
    $routes->get('panen', 'Panen::index');
    $routes->get('panen/create', 'Panen::create');
    $routes->post('panen/store', 'Panen::store');

    $routes->get('panen/edit/(:num)', 'Panen::edit/$1');
    $routes->post('panen/update/(:num)', 'Panen::update/$1');
    
    $routes->get('panen/delete/(:num)', 'Panen::delete/$1');
});

service('auth')->routes($routes);