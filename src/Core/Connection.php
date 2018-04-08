<?php
declare (strict_types = 1);

namespace PgKit\Core;

use PDO;
use PDOException;

/**
 * PDO 连接
 */
class Connection
{
    /** @var array */
    private $params;
    /** @var array */
    private $options;
    /** @var PDO */
    private $pdo;

    /**
     * 构造函数收集参数
     */
    public function __construct(string $dsn, string $user = null, string $password = null, array $options = null)
    {
        $this->params = [$dsn, $user, $password];
        $this->options = (array) $options;

        if (empty($options['lazy'])) {
            $this->connect();
        }
    }

    /**
     * 连接到 PostgreSQL
     */
    public function connect(): void
    {
        if ($this->pdo) {
            return;
        }

        try {
            $this->pdo = new PDO($this->params[0], $this->params[1], $this->params[2], $this->options);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            throw $e;
        }
    }

    /**
     * 断开连接
     */
    public function disconnect(): void
    {
        $this->pdo = null;
    }

    /** @return string */
    public function getDsn(): string
    {
        return $this->params[0];
    }

    /** @return PDO */
    public function getPdo(): PDO
    {
        $this->connect();
        return $this->pdo;
    }

    /**
     * 返回最后一条插入记录的 ID
     */
    public function getInsertId(string $sequence = null): string
    {
        try {
            $res = $this->getPdo()->lastInsertId($sequence);
            return $res === false ? '0' : $res;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    /**
     * 用引号包裹 SQL 中的字符串
     */
    public function quote(string $string, int $type = PDO::PARAM_STR): string
    {
        try {
            return $this->getPdo()->quote($string, $type);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    /********************* shortcuts ****************d*g**/
}
