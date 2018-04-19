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
        // New PDO Connection DSN
        $dbname = $request->getAttribute('dbname') ?? 'postgres';
        $dsn = PDO::buildDSN($dbname);

        // Now make connection to PostgreSQL
        $this->container->set('db.dsn', $dsn);
        $pdo = $this->container->get(Connection::class);

        // Inject into Controller as static member
        Controller::setConnection($pdo);

        return $handler->handle($request);
    }
}
