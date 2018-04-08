<?php
use function DI\autowire;
use function DI\create;
use function DI\get;
use League\Plates\Engine;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Zend\Diactoros\Response;

return [
    // PostgreSQL
    'db.dsn' => getenv('PG_DSN'),
    'db.user' => getenv('PG_USER'),
    'db.password' => getenv('PG_PASSWORD'),
    'db.options' => [],

    // Variables
    'template.path' => __DIR__ . '/Views',

    // Monolog
    Psr\Log\LoggerInterface::class => function () {
        $logger = new Logger('mylog');

        $fileHandler = new StreamHandler('../logs/pgkit.log', Logger::DEBUG);
        $fileHandler->setFormatter(new LineFormatter());
        $logger->pushHandler($fileHandler);

        return $logger;
    },

    // Database Connection
    PgKit\Core\Connection::class => create()->constructor(
        get('db.dsn'),
        get('db.user'),
        get('db.password'),
        get('db.options')),

    // Plates Template Engine
    League\Plates\Engine::class => create()->constructor(get('template.path')),

    // Zend Response
    Psr\Http\Message\ResponseInterface::class => function () {
        return new Response();
    },
];
