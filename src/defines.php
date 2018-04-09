<?php
use function DI\autowire;
use function DI\create;
use function DI\get;
use League\Plates\Engine;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PgKit\Postgres\PDO;
use Zend\Diactoros\Response;

return [
    // 数据库连接参数
    'db.dsn' => PDO::buildDSN(),
    'db.user' => getenv('PG_USER'),
    'db.password' => getenv('PG_PASSWORD'),
    'db.options' => [],

    // 日志
    Psr\Log\LoggerInterface::class => function () {
        $logger = new Logger('mylog');

        $fileHandler = new StreamHandler('../logs/pgkit.log', Logger::DEBUG);
        $fileHandler->setFormatter(new LineFormatter());
        $logger->pushHandler($fileHandler);

        return $logger;
    },

    // PDO 数据库连接
    // PgKit\Postgres\Connection::class => create()->constructor(
    //     get('db.dsn'),
    //     get('db.user'),
    //     get('db.password'),
    //     get('db.options')),

    // 模板引擎
    'template.path' => __DIR__ . '/Views',
    League\Plates\Engine::class => create()->constructor(get('template.path')),

    // Zend 响应对象
    Psr\Http\Message\ResponseInterface::class => function () {
        return new Response();
    },
];
