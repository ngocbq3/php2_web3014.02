<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\PostController;

$router->get('/', [HomeController::class, 'index']);
$router->get('/test', [HomeController::class, 'test']);

$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'postLogin']);

$router->get('/register', [AuthController::class, 'register']);
$router->post('/register', [AuthController::class, 'store']);

$router->get('/logout', [AuthController::class, 'logout']);

$router->get('/about', function () {
    return "<h1>About Page</h1>";
});
$router->get('/posts/{id}', function ($id) {
    return "<h3>Chi tiết bài viết có id=$id<h3>";
});
$router->get('/posts/{id}/comments/{comment_id}', function ($id, $comment_id) {
    return "<h3>Chi tiết bài viết có id=$id , $comment_id<h3>";
});

$router->get('/posts', [PostController::class, 'index']);
