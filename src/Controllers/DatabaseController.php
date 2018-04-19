<?php
declare (strict_types = 1);

namespace PgKit\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class DatabaseController extends BaseController
{
    /**
     * 自动调用
     */
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $this->currentDbname($request);

        // URL 中的参数
        $qs = $request->getQueryParams();
        if (!empty($qs['tbl'])) {
            $this->showTableStruct($qs['tbl']);
        } else {
            $this->showDatabaseStruct();
        }

        return $this->response;
    }

    /**
     * 显示数据库页面
     */
    protected function showDatabaseStruct(): void
    {
        $this->render('database');
    }

    /**
     * 显示数据表页面
     */
    protected function showTableStruct(string $tbl): void
    {
        $sql = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS
                WHERE table_name LIKE ?
                ORDER BY ordinal_position ASC";

        $sth = $this->getPDO()->prepare($sql);
        $sth->execute([$tbl]);
        $data = $sth->fetchAll(\PDO::FETCH_ASSOC);

        $this->render('table', ['columns' => $data]);
    }
}
