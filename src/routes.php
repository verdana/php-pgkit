<?php
// 使用 fastroute 分发所有的请求
$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET',     '/',            'PgKit\Controllers\IndexController');
    $r->addRoute('POST',    '/login',       'PgKit\Controllers\LoginController');
    $r->addRoute('GET',     '/home',        'PgKit\Controllers\HomeController');
    $r->addRoute('GET',     '/db/{name}',   'PgKit\Controllers\DatabaseController');
    $r->addRoute('GET',     '/tbl/{name}',  'PgKit\Controllers\TableController');
});

return $dispatcher;
