<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/cadastro', 'FilaController::index');
$routes->post('/inserir', 'FilaController::inserir');
$routes->get('/', 'FilaController::index');
$routes->get('/lista', 'FilaController::getFila');
$routes->get('/admin', 'FilaController::proximo');

