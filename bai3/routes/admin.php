<?php

use App\Controllers\Admin\PostController as PostController;


$router->get('/admin/posts', [PostController::class, 'index']);
$router->get('/admin/posts/add', [PostController::class, 'add']);
$router->post('/admin/posts/add', [PostController::class, 'store']);
$router->post('/admin/posts/delete/{id}', [PostController::class, 'destroy']);

$router->get('/admin/posts/edit/{id}', [PostController::class, 'edit']);
$router->post('/admin/posts/edit/{id}', [PostController::class, 'update']);

// dd($url);
