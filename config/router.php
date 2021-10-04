<?php

use Illuminate\Events\Dispatcher;
use Hillel\Controllers\MainController;
use \Hillel\Controllers\CategoryController;
use Hillel\Controllers\PostController;


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
    $router->get('/form', [PostController::class, 'addForm']);
    $router->post('/form', [PostController::class, 'create']);
    $router->get('/form/{id}', [PostController::class, 'editForm']);
    $router->post('/form/{id}', [PostController::class, 'update']);
    $router->get('/delete/{id}', [PostController::class, 'delete']);
});


