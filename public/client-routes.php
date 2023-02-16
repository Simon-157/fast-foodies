<?php
require dirname(__DIR__) . '/vendor/autoload.php';
$router = new Core\Router();
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('menu', ['controller' => 'Menus', 'action' => 'index']);
$router->add('register', ['controller' => 'Auth', 'action' => 'register']);
$router->add('login', ['controller' => 'Auth', 'action' => 'login']);
$router->add('test', ['controller' => 'PaymentGateway', 'action' => 'test']);
