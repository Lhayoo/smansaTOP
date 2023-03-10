<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\userModel;

class Auth extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new userModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('Auth/index', $data);
    }

    public function handleLogin()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $this->userModel->where('username', $username)->first();

        if ($user) {
            if (md5($password) == $user['password']) {
                $data = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'masok' => TRUE
                ];
                $this->userModel->save([
                    'id' => $user['id'],
                    'last_login' => date('Y-m-d H:i:s')
                ]);
                session()->set($data);
                return redirect()->to('/Home');
            } else {
                session()->setFlashdata('error', 'Password salah');
                return redirect()->to('/Auth');
            }
        } else {
            session()->setFlashdata('error', 'username tidak terdaftar');
            return redirect()->to('/Auth');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/Auth');
    }
}
