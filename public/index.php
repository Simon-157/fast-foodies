<?php

require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/**
 * Routing

 */
$router = new Core\Router();

// placeholder for connecting the client to the server
require './client-routes.php';

// Server routes
$router->add('create', ['controller' => 'Auth', 'action' => 'create']);
$router->add('authenticate', ['controller' => 'Auth', 'action' => 'authenticate']);
$router->add('logout', ['controller' => 'Auth', 'action' => 'logout']);
$router->add('addrestaurant', ['controller' => 'Restaurants', 'action' => 'create']);
$router->add('getrestaurant', ['controller' => 'Restaurants', 'action' => 'get']);
$router->add('getrestaurants', ['controller' => 'Restaurants', 'action' => 'getAll']);
$router->add('analytics', ['controller' => 'Analytic', 'action' => 'analytics']);
$router->add('googleauth', ['controller' => 'GoogleAuth', 'action' => 'index']);
$router->add('allmenus', ['controller' => 'Menus', 'action' => 'allmenus']);
$router->add('addmenu', ['controller' => 'Menus', 'action' => 'addmenu']);
$router->add('cart', ['controller' => 'Carts', 'action'=>'getCart']);


//default routes
$router->add('{controller}/{action}');
$router->add('{controller}/?');
$router->dispatch($_SERVER['QUERY_STRING']);
