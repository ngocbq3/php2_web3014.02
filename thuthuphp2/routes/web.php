<?php

use App\Controllers\ProductController;

$router->get('/', function () {
    return "Phần dàn cho khách";
});

$router->get('/products',               [ProductController::class,          'index']);
$router->get('/products/create',        [ProductController::class,          'create']);
$router->post('/products/store',        [ProductController::class,          'store']);
$router->get('/products/{id}/edit',     [ProductController::class,          'edit']);
$router->post('/products/{id}/edit',    [ProductController::class,          'update']);
$router->get('/products/{id}/delete',    [ProductController::class,          'destroy']);
