<?php
namespace PgKit\Controllers;

use League\Plates\Engine;
use PgKit\Core\Connection;
use Psr\Http\Message\ResponseInterface;

/**
 * 基础控制类
 */
abstract class Controller
{
    /** @var Connection */
    protected $connection;

    /** @var Engine */
    protected $template;

    /** @var Response */
    protected $response;

    /**
     * 参数由 PHP-DI 自动注入
     */
    public function __construct(Connection $connection, Engine $template, ResponseInterface $response)
    {
        $this->connection = $connection;
        $this->template = $template;
        $this->response = $response;

        $this->template->addData(['databases' => $this->getDatabases()]);
    }

    /**
     * 渲染模板
     */
    public function render($name)
    {
        // 得到渲染内容
        $content = $this->template->render($name);

        // 写入 Response
        $stream = $this->response->getBody();
        $stream->write($content);
    }

    /** @return Connection */
    public function getConnection()
    {
        return $this->connection;
    }

    /** @return PDO */
    public function getPDO()
    {
        return $this->getConnection()->getPDO();
    }

    /** @return Template */
    public function getTemplate()
    {
        return $this->template;
    }

    /** @return Response */
    public function getResponse()
    {
        return $this->response;
    }
}
