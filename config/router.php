<?php

use Illuminate\Events\Dispatcher;
use \Hillel\Controllers\CategoryController;
use Hillel\Controllers\MainController;

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
