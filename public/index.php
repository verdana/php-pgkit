<?php
use League\Plates\Engine;
use Middlewares\ErrorHandler;
use Middlewares\FastRoute;
use Middlewares\GzipEncoder;
use Middlewares\RequestHandler;
use Middlewares\ResponseTime;
use Middlewares\Robots;
use Middlewares\Utils\RequestHandlerContainer;
use PgKit\Postgres\Connection;
use Psr\Http\Message\ResponseInterface;
use Relay\Relay;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;

// 加载引导文件
$container = require_once dirname(__DIR__) . '/src/bootstrap.php';

// 加载路由定义
$dispatcher = require_once dirname(__DIR__) . '/src/routes.php';

// 使用 PSR-11 容器存储 request handlers 的实例
// 这里的三个参数会被用来创建路由器配置的类实例，也就是各种控制器
$requestHandlerContainer = new RequestHandlerContainer([
    // $container->get(Connection::class),
    $container->get(ResponseInterface::class),
    $container->get(Engine::class),
]);

// PSR-15 请求分发器以及中间件
$relay = new Relay([
    // 记录错误
    (new ErrorHandler())->catchExceptions(true),

    // 记录请求时间
    new ResponseTime(),

    // 禁止搜索引擎爬虫
    new Robots(false),

    // 使用 gzip 压缩 Response
    new GzipEncoder(),

    // 高速路由
    new FastRoute($dispatcher),

    // 处理路由
    new RequestHandler($requestHandlerContainer),
]);

$response = $relay->handle(ServerRequestFactory::fromGlobals());

// 输出
return (new SapiEmitter())->emit($response);
