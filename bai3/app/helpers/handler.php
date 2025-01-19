<?php

use eftec\bladeone\BladeOne;

function view($pathView, $data = [])
{
    $views = __DIR__ . '/../Views';
    $cache = __DIR__ . '/../cache';
    $blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG); // MODE_DEBUG allows to pinpoint troubles.
    return $blade->run($pathView, $data); // it calls /views/hello.blade.php
}
