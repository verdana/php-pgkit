<?php
// 自动加载 vendor 目录中的第三方类
require_once dirname(__DIR__) . '/vendor/autoload.php';

// 初始化 PHP-DI 容器
$builder = new \DI\ContainerBuilder();
$builder->useAutowiring(true);
$builder->useAnnotations(false);
$builder->addDefinitions(dirname(__DIR__) . '/src/defines.php');
$container = $builder->build();

return $container;
