<?php

use FireUp\Routing\Router;
use App\Controllers\WelcomeController;

/** @var Router $router */

// Welcome route
$router->get('/', [WelcomeController::class, 'index']);

// Example route with parameters
$router->get('/hello/{name}', function($name) {
    return "Hello, {$name}!";
});

// Example route with controller
$router->get('/users', [App\Controllers\UserController::class, 'index']);

// Example API route
$router->get('/api/users', function() {
    return json_encode([
        'users' => [
            ['id' => 1, 'name' => 'John Doe'],
            ['id' => 2, 'name' => 'Jane Smith']
        ]
    ]);
});