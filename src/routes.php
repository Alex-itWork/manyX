<?php
// src/routes.php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add('home', new Route('/', [
    '_controller' => 'App\Controllers\AuthController::index',
]));

$routes->add('register', new Route('/register', [
    '_controller' => 'App\Controllers\AuthController::register',
], [], [], '', [], ['GET', 'POST']));

$routes->add('login', new Route('/login', [
    '_controller' => 'App\Controllers\AuthController::login',
], [], [], '', [], ['GET', 'POST']));

$routes->add('logout', new Route('/logout', [
    '_controller' => 'App\Controllers\AuthController::logout',
]));

$routes->add('dashboard', new Route('/dashboard', [
    '_controller' => 'App\Controllers\UserController::dashboard',
]));

$routes->add('admin', new Route('/admin', [
    '_controller' => 'App\Controllers\AdminController::index',
]));

$routes->add('api_users', new Route('/api/users', [
    '_controller' => 'App\Controllers\AdminController::getUsers',
]));

return $routes;