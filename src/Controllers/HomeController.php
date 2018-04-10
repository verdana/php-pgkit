<?php
declare(strict_types=1);

namespace PgKit\Controllers;

use League\Plates\Engine;
use PgKit\Core\Connection;
use Psr\Http\Message\ResponseInterface;

class HomeController extends BaseController
{
    public function __invoke(): ResponseInterface
    {
        $this->render('home');
        return $this->response;
    }
}
