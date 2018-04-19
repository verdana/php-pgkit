<?php
declare (strict_types = 1);

namespace PgKit\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController extends BaseController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $this->currentDbname($request);
        $this->render('home');
        return $this->response;
    }
}
