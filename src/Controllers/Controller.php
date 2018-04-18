<?php
declare(strict_types=1);

namespace PgKit\Controllers;

use League\Plates\Engine;
use PgKit\Postgres\Connection;
use Psr\Http\Message\ResponseInterface;

/**
 * 基础控制类
 */
abstract class Controller
{
    /** @var Connection */
    protected static $connection;

    /** @var Engine */
    protected $template;

    /** @var Response */
    protected $response;

    /**
     * 参数由 PHP-DI 自动注入
     */
    public function __construct(ResponseInterface $response, Engine $template)
    {
        $this->response = $response;
        $this->template = $template;
    }

    /**
     * 渲染模板
     */
    public function render($name, array $data = []): void
    {
        // 得到渲染内容
        $content = $this->template->render($name, $data);

        // 写入 Response
        $stream = $this->response->getBody();
        $stream->write($content);
    }

    /** @return Connection */
    public static function getConnection(): Connection
    {
        return self::$connection;
    }

    /** @return void */
    public static function setConnection(Connection $conn): void
    {
        self::$connection = $conn;
    }

    /** @return PDO */
    public function getPDO(): \PDO
    {
        return $this->getConnection()->getPDO();
    }

    /** @return Template */
    public function getTemplate(): Engine
    {
        return $this->template;
    }

    /** @return Response */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
