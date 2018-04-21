<?php
declare (strict_types = 1);

namespace PgKit\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * 创建新的数据库或者数据表
 */
class CreateController extends BaseController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $this->currentDatabase($request);
        $this->currentTable($request);

        $this->render('table-create');
        return $this->response;
    }
}
