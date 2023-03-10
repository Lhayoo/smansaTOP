<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\userModel;

class Middleware implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('masok')) {
            return redirect()->to('/Auth');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $dataUsers = new userModel();
        $user = $dataUsers->getUser(session()->get('id'));
        if ($user['level'] != '1') {
            return redirect()->to('/forbidden/index');
        }
    }
}
