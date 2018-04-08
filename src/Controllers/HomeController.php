<?php
namespace PgKit\Controllers;

use Psr\Http\Message\ResponseInterface;

class HomeController extends BaseController
{
    public function __invoke(): ResponseInterface
    {
        $this->render('home');
        return $this->response;
    }
}
