<?php
namespace PgKit\Controllers;

use Psr\Http\Message\ResponseInterface;

/**
 * 首页控制器
 */
class IndexController extends BaseController
{
    public function __invoke(): ResponseInterface
    {
        // TODO 先暂时重定向，等待权限系统
        header('Location: /home', true, 302);
        exit;
    }
}
