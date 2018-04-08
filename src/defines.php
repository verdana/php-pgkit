<?php
use function DI\autowire;
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

    // Zend Response
    Psr\Http\Message\ResponseInterface::class => function () {
        return new Response();
    },

    // Monolog
    Psr\Log\LoggerInterface::class => function () {
        $logger = new Logger('mylog');

        $fileHandler = new StreamHandler('../logs/pgkit.log', Logger::DEBUG);
        $fileHandler->setFormatter(new LineFormatter());
        $logger->pushHandler($fileHandler);

        return $logger;
    },

    // Database Connection
    PgKit\Core\Connection::class => autowire()->constructor(
        get('db.dsn'),
        get('db.user'),
        get('db.password'),
        get('db.options')),

    // Plates Template Engine
    League\Plates\Engine::class => autowire()->constructor(get('template.path')),

    // All Controllers
    PgKit\Controllers\IndexController::class => autowire(),
    PgKit\Controllers\HomeController::class => autowire(),
];
