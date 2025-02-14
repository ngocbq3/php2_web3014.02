<?php

use App\Controllers\HomeController;
use App\Controllers\PostController;

$router->get('/', [HomeController::class, 'index']);
$router->get('/test', [HomeController::class, 'test']);


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
