<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Se quiser que a home já abra o Admin:
$routes->get('/', '\App\Controllers\Admin\PromotionsController::index');

// Se quiser que /promotions também use o Admin:
$routes->get('promotions', '\App\Controllers\Admin\PromotionsController::index');

// Grupo /admin apontando para o namespace do Admin
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], static function($routes) {
    $routes->get('promotions',               'PromotionsController::index');
    $routes->get('promotions/create',        'PromotionsController::create');
    $routes->post('promotions/store',        'PromotionsController::store');
    $routes->get('promotions/edit/(:num)',   'PromotionsController::edit/$1');
    $routes->post('promotions/update/(:num)','PromotionsController::update/$1');
    $routes->post('promotions/delete/(:num)','PromotionsController::delete/$1');
});
