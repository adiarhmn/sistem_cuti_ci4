<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UsersController extends BaseController
{
    public function index()
    {
        $userModel = new \App\Models\UserModel();
        $list_user = $userModel->findAll();
        return view('admin/user/data_user', [
            'list_user' => $list_user,
        ]);
    }

    public function tampil_form_tambah()
    {
        return view('admin/user/form_user', [
            'url' => base_url('admin/user/tambah'),
            'user' => null,
        ]);
    }

    public function tambah()
    {
        // dd($this->request->getPost());
        // Validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|alpha_numeric|min_length[5]|max_length[20]|is_unique[users.username]',
            'password' => 'required|min_length[8]',
            'level'    => 'required|in_list[admin,karyawan]',
        ]);
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Simpan data ke database
        $userModel = new \App\Models\UserModel();
        $userModel->save([
            'username' => strtolower($this->request->getPost('username')),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'level'    => $this->request->getPost('level'),
        ]);

        return redirect()->to(base_url('admin/user'))->with('success', 'User berhasil ditambahkan.');
    }

    public function tampil_form_edit($id_user)
    {
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($id_user);
        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/user/form_user', [
            'url' => base_url("admin/user/edit/{$id_user}"),
            'user' => $user,
        ]);
    }

    public function edit($id_user)
    {
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($id_user);

        // Validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => "required|alpha_numeric|min_length[5]|max_length[20]|is_unique[users.username,id_user,{$id_user}]",
            'password' => 'permit_empty|min_length[8]',
            'level'    => 'required|in_list[admin,karyawan]',
        ]);
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Update data di database
        $data = [
            'username' => strtolower($this->request->getPost('username')),
            'level'    => $this->request->getPost('level'),
        ];
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
        }
        $userModel->update($id_user, $data);

        return redirect()->to(base_url('admin/user'))->with('success', 'User berhasil diperbarui.');
    }
}
