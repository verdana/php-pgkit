<?php
use function DI\factory;
use function DI\get;

// 自动加载 vendor 目录中的第三方类
require_once dirname(__DIR__) . '/vendor/autoload.php';

// 定义注入对象
$config = [
    // 数据库连接参数
    'db.dsn' => PgKit\Postgres\PDO::buildDSN(),
    'db.user' => getenv('PG_USER'),
    'db.password' => getenv('PG_PASSWORD'),
    'db.options' => [],
    'db.charset' => 'utf-8',

    // PSR-3 Logger
    Psr\Log\LoggerInterface::class => function () {
        $logger = new Monolog\Logger('pgkit');
        $handler = new Monolog\Handler\StreamHandler('../logs/pgkit.log', Monolog\Logger::DEBUG);
        $handler->setFormatter(new Monolog\Handler\LineFormatter);
        $logger->pushHandler($handler);
        return $logger;
    },

    // 数据库连接
    PgKit\Postgres\Connection::class => factory([PgKit\Postgres\Connection::class, 'getInstance'])
        ->parameter('dsn', get('db.dsn'))
        ->parameter('user', get('db.user'))
        ->parameter('password', get('db.password'))
        ->parameter('options', get('db.options')),

    // 模板引擎
    'template.path' => __DIR__ . '/Views',
    League\Plates\Engine::class => function (Psr\Container\ContainerInterface $c) {
        $engine = new League\Plates\Engine($c->get('template.path'));
        $engine->loadExtension(new League\Plates\Extension\URI(isset($_SERVER['PATH_INFO']) ?? ''));
        $engine->loadExtension(new PgKit\Functions\PrintColumn);
        $engine->loadExtension(new PgKit\Functions\PrintValue);
        return $engine;
    },

    // Zend 响应对象
    Psr\Http\Message\ResponseInterface::class => function () {
        return new Zend\Diactoros\Response;
    },
];

// 初始化 PHP-DI 容器
$builder = new DI\ContainerBuilder;
$builder->useAutowiring(false);
$builder->useAnnotations(false);
$builder->addDefinitions($config);
$container = $builder->build();

return $container;
