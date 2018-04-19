<?php
declare (strict_types = 1);

namespace PgKit\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class DatabaseController extends BaseController
{
    /**
     * 自动调用
     */
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $this->currentDbname($request);

        // URL 中的参数
        $qs = $request->getQueryParams();
        if (!empty($qs['tbl'])) {
            $this->render('table');
        } else {
            $this->render('database');
        }

        return $this->response;
    }
}
