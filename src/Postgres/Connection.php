<?php
declare (strict_types = 1);

namespace PgKit\Postgres;

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

    /** @var Connection */
    private static $instance;

    /** 禁用 __sleep */
    private function __sleep()
    {}
    /** 禁用 __wakeup */
    private function __wakeup()
    {}
    /** 禁用 __clone */
    private function __clone()
    {}

    /**
     * 构造函数收集参数
     */
    private function __construct(string $dsn, string $user, string $password, array $options)
    {
        $this->params = [$dsn, $user, $password];
        $this->options = (array) $options;

        if (empty($options['lazy'])) {
            $this->connect();
        }
    }

    /**
     * 初始化单一实例
     */
    public static function getInstance(string $dsn, string $user = null, string $password = null, array $options = null): Connection
    {
        if (null === static::$instance) {
            static::$instance = new static($dsn, $user, $password, $options);
        }
        return static::$instance;
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

    /**
     * 重新连接
     */
    public function reconnect(): void
    {
        $this->disconnect();
        $this->connect();
    }

    /** @return string */
    public function getDsn(): string
    {
        return $this->params[0];
    }

    /** @return PDO */
    public function getPDO(): PDO
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
            $res = $this->getPDO()->lastInsertId($sequence);
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
            return $this->getPDO()->quote($string, $type);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    /********************* 快速取得结果的方法 *******************/

    /**
     * 读取一行数据
     */
    public function find(string $sql, array $params = null): array
    {
        $sth = $this->getPDO()->prepare($sql);
        $sth->execute((array) $params);
        return $sth->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * 读取所有数据
     */
    public function findAll(string $sql, array $params = null): array
    {
        $sth = $this->getPDO()->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * 更新数据
     */
    public function update(string $sql, array $data = null): int
    {
        $sth = $this->getPDO()->prepare($sql);
        $sth->execute($params);
        return $sth->rowCount();
    }

    /**
     * 删除数据
     */
    public function delete(string $sql): int
    {
        $sth = $this->getPDO()->prepare($sql);
        $sth->execute();
        return $sth->rowCount();
    }
}
