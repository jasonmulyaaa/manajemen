<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin;

class LoginController extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function authentication() 
    {
        $model = new Admin;
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $result = $model->where(['username'=>$username])->first();

        // return redirect()->to(base_url('user'));
        if ($result) {
            if (password_verify($password, $result->password)) {
                session()->set([
                    'username' => $result->username,
                    'nama' => $result->nama,
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('user'));
            }
            else{
                session()->setFlashdata('error', 'Username dan Password tidak sesuai!');
                return redirect()->back();
            }
        }
        else{
            session()->setFlashdata('error', 'Username dan Password tidak sesuai!');
            return redirect()->back();
        }
    }

    public function logout() 
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
