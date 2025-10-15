<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Promotions::index');
$routes->get('promotions', 'Promotions::index');
