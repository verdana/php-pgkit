<?php
// 使用 fastroute 分发所有的请求
$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET',  '/',             'PgKit\Controllers\IndexController');
    $r->addRoute('POST', '/login',        'PgKit\Controllers\LoginController');
    $r->addRoute('GET',  '/home',         'PgKit\Controllers\HomeController');

    $r->addRoute('GET',  '/db/{dbname}',            'PgKit\Controllers\DatabaseController');
    $r->addRoute('GET',  '/db/{dbname}/{tbname}',   'PgKit\Controllers\DatabaseController');
    $r->addRoute('GET',  '/create-database',        'PgKit\Controllers\CreateController');
    $r->addRoute('GET',  '/create-table',           'PgKit\Controllers\CreateController');
    $r->addRoute('GET',  '/export',                 'PgKit\Controllers\ExportController');
    $r->addRoute('GET',  '/import',                 'PgKit\Controllers\ImportController');
});

return $dispatcher;
