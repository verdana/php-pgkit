<?php
declare(strict_types=1);

namespace PgKit\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * 登录控制器
 */
class LoginController extends BaseController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        ['user' => $user, 'password' => $password, 'dbname' => $dbname] = $request->getParsedBody();

        // 写入配置文件
        $code = "<?php\n\$host='localhost';\n\$user='%s';\n\$password='%s';\n\$dbname='%s';\n";
        file_put_contents('../src/config.php', sprintf($code, $user, $password, $dbname));

        $this->render('home');
        return $this->response;
    }
}
