<?php
require dirname(__DIR__) . '/vendor/autoload.php';
$router = new Core\Router();
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('menu', ['controller' => 'Menus', 'action' => 'index']);
$router->add('register', ['controller' => 'Auth', 'action' => 'register']);
$router->add('login', ['controller' => 'Auth', 'action' => 'login']);
$router->add('test', ['controller' => 'Test', 'action' => 'index']);
$router->add('restaurant', ['controller' => 'Restaurants', 'action' => 'view']);
$router->add('register_restaurant', ['controller' => 'Restaurants', 'action' => 'index']);
$router->add('published', ['controller' => 'Restaurants', 'action' => 'published']);
$router->add('orders', ['controller' => 'Restaurants', 'action' => 'orders']);
$router->add('new_menu', ['controller' => 'Restaurants', 'action' => 'newmenu']);
$router->add('cart', ['controller' => 'Carts', 'action' => 'view']);
$router->add('checkout', ['controller' => 'Checkout', 'action' => 'view']);

