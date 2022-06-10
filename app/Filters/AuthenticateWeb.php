<?php

namespace App\Filters;

use App\Services\BusinessProcess\UserService;
use App\Eloquents\M_users;
use Ci4Common\Libraries\RedirectLib;
use Ci4Common\Libraries\SessionLib;
use Closure;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthenticateWeb implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $user = SessionLib::get('user');
        // echo json_encode($user);
        // die();
        if (empty($user)) {
            if (!$request->isAJAX()) {
                return RedirectLib::redirect('user/login')->go();
            }
        }
        // Do something here
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
