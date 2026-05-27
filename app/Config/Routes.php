<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

$routes->group('product', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'ProductController::index');
    $routes->post('', 'ProductController::create');
    $routes->post('update/(:any)', 'ProductController::update/$1');
    $routes->get('delete/(:any)', 'ProductController::delete/$1');
});

$routes->get('/transaction', 'TransactionController::index',['filter' => 'auth']);
