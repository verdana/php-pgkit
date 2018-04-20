<?php
declare (strict_types = 1);

namespace PgKit\Functions;

use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;

/**
 * 数据表字段相关的模板函数
 */
class PrintValue implements ExtensionInterface
{
    /**
     * 注册模板插件
     */
    public function register(Engine $engine): void
    {
        $engine->registerFunction('print_val', [$this, 'print_val']);
        $engine->registerFunction('print_tip', [$this, 'print_tip']);
    }

    /**
     * 打印列的值，截断过长的字串
     */
    public function print_val($val): string
    {
        if (empty($val)) {
            return "$val";
        }
        if (!is_numeric($val) and is_string($val) and mb_strlen($val) >= 10) {
            $val = mb_substr($val, 0, 10) . '...';
        }
        return "$val";
    }

    /**
     * 打印列的值，显示成 uk-tooltip
     */
    public function print_tip($val): string
    {
        if (!empty($val) and is_string($val) and mb_strlen($val) >= 10) {
            return sprintf(' uk-tooltip="title: %s"', $val);
        }
        return "";
    }
}
