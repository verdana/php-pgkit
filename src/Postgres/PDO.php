<?php
declare(strict_types=1);

namespace PgKit\Postgres;

/**
 * 工具类
 */
class PDO
{
    /**
     * 帮助创建一个合法的 DSN 字串
     */
    public static function buildDSN(): string
    {
        $host = getenv('PG_HOST');
        $dbname = getenv('PG_DBNAME');

        $dsn = "pgsql:host=%s;dbname=%s";
        return sprintf($dsn, $host, $dbname);
    }
}
