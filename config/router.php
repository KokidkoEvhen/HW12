<?php

use Illuminate\Events\Dispatcher;
use Hillel\Controllers\MainController;
use \Hillel\Controllers\CategoryController;
use Hillel\Controllers\PostController;
use Hillel\Controllers\TagController;


$request = \Illuminate\Http\Request::createFromGlobals();
function request() {
    global $request;

    return $request;
}

$dispatcher = new Dispatcher();
$container = new \Illuminate\Container\Container();
$router = new \Illuminate\Routing\Router($dispatcher, $container);

function router() {
    global $router;

    return $router;
}

$router->get('/', [MainController::class, 'index']);
$router->post('/', [MainController::class, 'loadData']);

$router->prefix('categories')->group(function($router){
    $router->get('/', [CategoryController::class, 'index']);
    $router->match(['get', 'post'], '/create', [CategoryController::class, 'form']);
    $router->match(['get', 'post'], '/update/{id}', [CategoryController::class, 'form']);
    $router->get('/delete/{id}', [CategoryController::class, 'delete']);
});

$router->prefix('posts')->group(function($router){
    $router->get('/', [PostController::class, 'index']);
    $router->get('/form', [PostController::class, 'form']);
    $router->post('/form', [PostController::class, 'create']);
    $router->get('/form/{id}', [PostController::class, 'form']);
    $router->post('/form/{id}', [PostController::class, 'update']);
    $router->get('/delete/{id}', [PostController::class, 'delete']);
});

$router->prefix('tags')->group(function($router){
    $router->get('/', [TagController::class, 'index']);
    $router->get('/form', [TagController::class, 'form']);
    $router->post('/form', [TagController::class, 'create']);
    $router->get('/form/{id}', [TagController::class, 'form']);
    $router->post('/form/{id}', [TagController::class, 'update']);
    $router->get('/delete/{id}', [TagController::class, 'delete']);
});


