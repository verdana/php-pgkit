<?php
declare(strict_types=1);

namespace PgKit\Controllers;

use Psr\Http\Message\ResponseInterface;

/**
 * 首页控制器
 * 默认情况下显示登陆页面，如果用户已经登录
 * 则跳转到主页
 */
class IndexController extends BaseController
{
    public function __invoke(): ResponseInterface
    {
        $this->render('login');
        return $this->response;
    }
}
