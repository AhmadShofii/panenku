<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home
$routes->get('/', 'Home::index');

// Dashboard (sementara)
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'session']);

// Shield Authentication Routes
service('auth')->routes($routes);