<?php

use App\Controllers\Admin\PostController as PostController;

$router->get('/admin/posts', [PostController::class, 'index']);
$router->get('/admin/add', [PostController::class, 'add']);
// dd($url);
