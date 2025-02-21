<?php

use App\Controllers\Admin\PostController as PostController;

$router->group(['prefix' => 'admin'], function ($router) {
    $router->get('/posts', [PostController::class, 'index']);
    $router->get('/posts/add', [PostController::class, 'add']);
    $router->post('/posts/add', [PostController::class, 'store']);
    $router->post('/posts/delete/{id}', [PostController::class, 'destroy']);

    $router->get('/posts/edit/{id}', [PostController::class, 'edit']);
    $router->post('/posts/edit/{id}', [PostController::class, 'update']);
});

// dd($url);
