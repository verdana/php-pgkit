<?php
declare (strict_types = 1);

namespace PgKit\Controllers;

use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * 基础控制器
 * 用来加载并预处理一些数据
 */
class BaseController extends Controller
{
    /**
     * 参数由 PHP-DI 自动注入
     */
    public function __construct(ResponseInterface $response, Engine $template)
    {
        parent::__construct($response, $template);

        $this->template->addData([
            'databases' => $this->getDatabases(),
            'tables' => $this->getTables(),
        ]);
    }

    /**
     * 读取数据库列表和数据表列表
     */
    protected function getDatabases(): array
    {
        $sql = "SELECT * FROM pg_database WHERE datistemplate = false";
        $sth = $this->getPDO()->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * 读取数据库下的所有数据表
     */
    protected function getTables(): array
    {
        $sql = "SELECT *
                FROM pg_tables
                WHERE tablename !~ 'pg_' AND schemaname !~ 'information_schema'
                ORDER BY schemaname, tablename";
        $sth = $this->getPDO()->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * 从当前 URL 中读取 dbname，并设置到模板中
     */
    protected function currentDatabase(ServerRequestInterface $request): void
    {
        $dbname = $request->getAttribute('dbname');
        $this->getTemplate()->addData(['dbname' => $dbname]);
    }

    /**
     *
     */
    protected function currentTable(ServerRequestInterface $request): void
    {
        $params = $request->getQueryParams();
        if (isset($params['tbl'])) {
            $this->getTemplate()->addData(['tblname' => $params['tbl']]);
        }
    }
}
