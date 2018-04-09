<?php
declare(strict_types=1);

namespace PgKit\Controllers;

/**
 * 基础控制器
 * 用来加载并预处理一些数据
 */
class BaseController extends Controller
{
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

    }
}
