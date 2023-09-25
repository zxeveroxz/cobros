<?php

use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Login::index');

$routes->get('/tabla', 'Login::index2');

$routes->post('/login/tabla', 'Login::tabla');