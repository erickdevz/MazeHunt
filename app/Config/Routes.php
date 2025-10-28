<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Home pública
$routes->get('/', 'Products::index');

// Rotas públicas
$routes->get('produtos', 'Products::index');
$routes->get('produtos/semana', 'Products::produtosSemana');
$routes->get('produtos/dia', 'Products::produtosDia');

// Grupo /admin (protegido por filtro auth -> ver nota)
$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'auth'], static function($routes) {
    $routes->get('promotions',               'PromotionsController::index');
    $routes->get('promotions/create',        'PromotionsController::create');
    $routes->post('promotions/store',        'PromotionsController::store');
    $routes->get('promotions/edit/(:num)',   'PromotionsController::edit/$1');
    $routes->post('promotions/update/(:num)','PromotionsController::update/$1');
    $routes->post('promotions/delete/(:num)','PromotionsController::delete/$1');
});
