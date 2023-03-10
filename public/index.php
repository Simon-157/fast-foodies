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
$router->add('getuser', ['controller' => 'Home', 'action' => 'getuser']);
$router->add('authenticate', ['controller' => 'Auth', 'action' => 'authenticate']);
$router->add('auth_res', ['controller' => 'Auth', 'action' => 'auth_res']);
$router->add('logout', ['controller' => 'Auth', 'action' => 'logout']);
$router->add('addrestaurant', ['controller' => 'Restaurants', 'action' => 'create']);
$router->add('getrestaurant', ['controller' => 'Restaurants', 'action' => 'get']);
$router->add('getrestaurantinfo', ['controller' => 'Restaurants', 'action' => 'get_restaurant']);
$router->add('getrestaurants', ['controller' => 'Restaurants', 'action' => 'getAll']);
$router->add('getanalytics', ['controller' => 'Analytic', 'action' => 'analytics']);
$router->add('googleauth', ['controller' => 'GoogleAuth', 'action' => 'index']);
$router->add('allmenus', ['controller' => 'Menus', 'action' => 'allmenus']);
$router->add('allmenus_res', ['controller' => 'Menus', 'action' => 'allmenus_res']);
$router->add('orders_placed', ['controller' => 'Orders', 'action' => 'orders_placed']);

$router->add('addmenu', ['controller' => 'Menus', 'action' => 'addmenu']);
$router->add('update_menu', ['controller' => 'Menus', 'action' => 'updatemenu']);
$router->add('delete_menu', ['controller' => 'Menus', 'action' => 'deletemenu']);
$router->add('remove_cart', ['controller' => 'Carts', 'action' => 'removefromCart']);
$router->add('add_cartitem', ['controller' => 'Carts', 'action' => 'add_cartItem']);
$router->add('getuser_cart', ['controller' => 'Carts', 'action'=>'getCart']);


$router ->add('confirm_order', ['controller'=>'PaymentGateway', 'action' => 'make_payment']);
//default routes
$router->add('{controller}/{action}');
$router->add('{controller}/?');
$router->dispatch($_SERVER['QUERY_STRING']);
