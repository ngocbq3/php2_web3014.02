<?php

use eftec\bladeone\BladeOne;

function view($pathView, $data = [])
{
    $views = __DIR__ . '/../Views';
    $cache = __DIR__ . '/../cache';
    $blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG); // MODE_DEBUG allows to pinpoint troubles.
    return $blade->run($pathView, $data); // it calls /views/hello.blade.php
}

//Hàm dd dùng để bug code
function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die;
}

//Hàm di chuyển website theo đường dẫn
function redirect($path)
{
    $path = APP_URL . $path;
    header("location: $path");
    die;
}
