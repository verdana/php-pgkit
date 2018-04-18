<?php
declare (strict_types = 1);

namespace PgKit\Postgres;

/**
 * 工具类
 */
class PDO
{
    /**
     * 帮助创建一个合法的 DSN 字串
     */
    public static function buildDSN(string $dbname = null): string
    {
        $host = getenv('PG_HOST');
        $dbname = $dbname ?? (getenv('PG_DBNAME') ?? 'postgres');

        $dsn = "pgsql:host=%s;dbname=%s";
        return sprintf($dsn, $host, $dbname);
    }
}
