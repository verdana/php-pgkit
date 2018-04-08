<?php
namespace PgKit\Controllers;

use League\Plates\Engine;
use PgKit\Core\Connection;
use Psr\Http\Message\ResponseInterface;

class DatabaseController extends BaseController
{
    public function __invoke(): ResponseInterface
    {
        $this->render('database');
        return $this->response;
    }
}
