<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home'); // Set BLOG as the default controller
$routes->setDefaultMethod('index'); // Set index as the default method
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
