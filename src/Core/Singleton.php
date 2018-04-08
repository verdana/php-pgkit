<?php
namespace Pgkit\Core;

/**
 * 单例抽象
 */
abstract class Singleton
{
    protected static $_instance;

    protected function __construct()
    {}
    protected function __sleep()
    {}
    protected function __wakeup()
    {}
    protected function __clone()
    {}

    public static function instance()
    {
        if (null === static::$_instance) {
            static::$_instance = new static();
        }
        return static::$_instance;
    }
}
