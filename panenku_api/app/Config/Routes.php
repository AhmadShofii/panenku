<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home
$routes->get('/', 'Home::index');

// Route yang membutuhkan login
$routes->group('', ['filter' => 'session'], static function ($routes) {

    // ==========================
    // Dashboard
    // ==========================
    $routes->get('dashboard', 'Dashboard::index');

    // ==========================
    // Kebun
    // ==========================
    $routes->get('kebun', 'Kebun::index');
    $routes->get('kebun/create', 'Kebun::create');
    $routes->post('kebun/store', 'Kebun::store');

    $routes->get('kebun/edit/(:num)', 'Kebun::edit/$1');
    $routes->post('kebun/update/(:num)', 'Kebun::update/$1');

    $routes->get('kebun/delete/(:num)', 'Kebun::delete/$1');

    // ==========================
    // Panen
    // ==========================
    $routes->get('panen', 'Panen::index');
    $routes->get('panen/create', 'Panen::create');
    $routes->post('panen/store', 'Panen::store');

    $routes->get('panen/edit/(:num)', 'Panen::edit/$1');
    $routes->post('panen/update/(:num)', 'Panen::update/$1');

    $routes->get('panen/delete/(:num)', 'Panen::delete/$1');

    // ==========================
    // Biaya
    // ==========================
    $routes->get('biaya', 'Biaya::index');
    $routes->get('biaya/create', 'Biaya::create');
    $routes->post('biaya/store', 'Biaya::store');

    $routes->get('biaya/edit/(:num)', 'Biaya::edit/$1');
    $routes->post('biaya/update/(:num)', 'Biaya::update/$1');

    $routes->get('biaya/delete/(:num)', 'Biaya::delete/$1');

    // ==========================
    // Laporan
    // ==========================
    $routes->get('laporan', 'Laporan::index');
    $routes->get('laporan/pdf', 'Laporan::pdf');
    $routes->get('laporan/excel', 'Laporan::excel');

    // (Opsional nanti jika membuat Export Excel)
    // $routes->get('laporan/excel', 'Laporan::excel');

});

// Shield Authentication
service('auth')->routes($routes);