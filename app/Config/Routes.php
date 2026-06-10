<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->group('', ['filter' => 'session'], static function ($routes) {
    $routes->get('/', 'MessageController::index', ['as' => 'dashboard']);
    $routes->get('p', 'ProfileController::edit', ['as' => 'profile-edit']);
    $routes->post('p', 'ProfileController::update', ['as' => 'profile-update']);
    $routes->get('m/(:segment)', 'MessageController::show/$1', ['as' => 'message-show']);
    $routes->delete('m/(:segment)', 'MessageController::delete/$1', ['as' => 'message-delete']);
});
$routes->get('u/(:segment)', 'MessageController::new/$1', ['as' => 'message-new']);
$routes->post('u/(:segment)', 'MessageController::create/$1', ['as' => 'message-create']);
$routes->get('success', 'MessageController::success', ['as' => 'message-success']);

service('auth')->routes($routes, ['except' => ['magic-link', 'auth-actions']]);
