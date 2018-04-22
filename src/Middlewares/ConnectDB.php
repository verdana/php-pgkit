<?php
declare (strict_types = 1);

namespace PgKit\Middlewares;

use DI\Container;
use PgKit\Controllers\Controller;
use PgKit\Postgres\Connection;
use PgKit\Postgres\PDO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ConnectDB implements MiddlewareInterface
{
    /**
     * @var DI\Container Used to modify db parameters
     */
    private $container;

    /**
     * Set the resolver instance.
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Process a server request and return a response.
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // 先尝试从 URL 中的查询参数中读取 dbname
        $params = $request->getQueryParams();
        $dbname = $params['db'] ?? null;

        // 然后尝试从 route 参数中读取
        if ($dbname == null) {
            $dbname = $request->getAttribute('dbname') ?? 'postgres';
        }

        // New PDO Connection DSN
        $dsn = PDO::buildDSN($dbname);

        // Now make connection to PostgreSQL
        $this->container->set('db.dsn', $dsn);
        $pdo = $this->container->get(Connection::class);

        // Inject into Controller as static member
        Controller::setConnection($pdo);

        return $handler->handle($request);
    }
}
