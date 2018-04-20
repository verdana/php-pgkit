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
        $this->currentDatabase($request);
        $this->currentTable($request);

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
        // 读取字段信息
        $sql = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS
                WHERE table_name LIKE ?
                ORDER BY ordinal_position ASC";
        $columns = $this->getConnection()->findAll($sql, [$tbl]);

        // 读取表数据
        $sql = "SELECT * FROM $tbl LIMIT 20";
        $rows = $this->getConnection()->findAll($sql);

        $this->render('table', ['columns' => $columns, 'rows' => $rows]);
    }

    /**
     * 读取表中的数据
     */
    protected function showTableData(string $tbl, int $limit = 20): void
    {
        $sql = "SELECT * FROM ?";
        $data = $this->getConnection()->findAll($sql, $tbl);
        // $this->
    }
}
