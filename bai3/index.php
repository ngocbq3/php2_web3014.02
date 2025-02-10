<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/app/helpers/handler.php";

$url = $_GET['url'] ?? '';

use App\Controllers\HomeController;
use App\Controllers\PostController;
use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

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

try {
    # NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

    // Print out the value returned from the dispatched function
    echo $response;
} catch (\Phroute\Phroute\Exception\HttpException $ex) {
    echo "404 Not found!";
}
