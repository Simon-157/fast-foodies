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

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('admin', ['controller' => 'Admin', 'action' => 'admin']);
$router->add('create', ['controller' => 'Auth', 'action' => 'create']);
$router->add('menu', ['controller' => 'Menu', 'action' => 'index']);
$router->add('register', ['controller' => 'Customers', 'action' => 'register']);
$router->add('{controller}/{action}');
$router->add('{controller}/?');
$router->dispatch($_SERVER['QUERY_STRING']);
