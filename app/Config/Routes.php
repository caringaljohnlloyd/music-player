<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/player', 'Home::index');
$routes->get('/', 'MusicController::index');
$routes->post('/upload', 'MusicController::upload');



