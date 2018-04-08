<?php
use FastRoute\RouteCollector;
use Middlewares\FastRoute;
use Middlewares\RequestHandler;
use PgKit\Controllers\HomeController;
use PgKit\Controllers\IndexController;
use Relay\Relay;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;
use function FastRoute\simpleDispatcher;

// 加载引导文件
$container = require_once dirname(__DIR__) . '/src/bootstrap.php';

// 启动路由以及中间件
$routes = simpleDispatcher(function (RouteCollector $r) use($container) {
    $r->get('/',     $container->get(IndexController::class));
    $r->get('/home', $container->get(HomeController::class));
});

$middlewareQueue[] = new FastRoute($routes);
$middlewareQueue[] = new RequestHandler();

$requestHandler = new Relay($middlewareQueue);
$response = $requestHandler->handle(ServerRequestFactory::fromGlobals());

// 追加一个页面运行时间
$elapsed = microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'];
$response->getBody()->write("<address>" . $elapsed . "</address>");

return (new SapiEmitter())->emit($response);
