<?php
declare(strict_types=1);

namespace PgKit\Controllers;

use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class DatabaseController extends BaseController
{
    /**
     * 获取所有的数据库列表
     */
    protected function tables(): array
    {
        $sql = "SELECT * FROM pg_tables
                WHERE schemaname NOT in('information_schema', 'pg_catalog')
                ORDER BY schemaname, tablename";

        $sth = $this->getPDO()->prepare($sql);
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * 自动调用
     */
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $this->render('database', ['tables' => $this->tables()]);
        return $this->response;
    }
}
