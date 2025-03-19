<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{

    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        $userModel = new \App\Models\UserModel();
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/login')->withInput()->with('errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();



        if (!$user) {
            return redirect()->to('/login')->withInput()->with('error', 'Username not found');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->to('/login')->withInput()->with('error', 'Password is wrong');
        }

        // Jika user level admin
        if ($user['level'] == 'admin') {
            session()->set([
                'id_user' => $user['id_user'],
                'username' => $user['username'],
                'level' => $user['level'],
            ]);
            return redirect()->to('admin');
        }

        // Jika user level karyawan
        if ($user['level'] == 'karyawan') {
            $karyawan = new \App\Models\KaryawanModel();
            $karyawan = $karyawan->where('id_user', $user['id_user'])->first();
            session()->set([
                'id_user' => $user['id_user'],
                'username' => $user['username'],
                'level' => $user['level'],
                'id_karyawan' => $karyawan['id_karyawan'],
            ]);
            return redirect()->to('karyawan');
        }

        return redirect()->to('/login')->withInput()->with('error', 'Your account is not active');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
