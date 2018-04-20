<?php
declare (strict_types = 1);

namespace PgKit\Functions;

use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;

/**
 * 数据表字段相关的模板函数
 */
class PrintColumn implements ExtensionInterface
{
    /**
     * 注册模板插件
     */
    public function register(Engine $engine): void
    {
        $engine->registerFunction('column_type', [$this, 'column_type']);
        $engine->registerFunction('column_isnull', [$this, 'column_isnull']);
    }

    /**
     * 列类型
     */
    public function column_type($col)
    {
        if ($col['data_type'] == 'numeric') {
            return "$col[data_type] ($col[numeric_precision], $col[numeric_scale])";
        }
        return $col['data_type'] ?? "";
    }

    /**
     * 列是否为空
     */
    public function column_isnull($col): string
    {
        return $col['is_nullable'] == 'NO' ? 'not null' : 'null';
    }
}
