<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/cadastro', 'FilaController::index');
$routes->post('/inserir', 'FilaController::inserir');
$routes->get('/', 'FilaController::index');
$routes->get('/lista', 'FilaController::getFila');
$routes->get('/admin', 'UsuarioController::index');
$routes->post('/login', 'UsuarioController::login');
$routes->get('/proximo/(:any)','FilaController::proximo/$1');
$routes->get('/json','UsuarioController::jsonUser');
$routes->get('/listar','FilaController::jsonLista');



