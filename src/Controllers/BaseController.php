<?php
namespace PgKit\Controllers;

use PDO;

/**
 * 基础控制器
 * 用来加载并预处理一些数据
 */
class BaseController extends Controller
{
    /**
     * 读取数据库列表和数据表列表
     */
    public function getDatabases()
    {
        $sql = "SELECT * FROM pg_database";
        $sth = $this->getPDO()->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}
