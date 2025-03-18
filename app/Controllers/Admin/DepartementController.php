<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DepartementController extends BaseController
{
    public function index()
    {
        $departementModel = new \App\Models\DepartementModel();
        $list_departement = $departementModel->select('departement.*, COUNT(karyawan.id_karyawan) as total_karyawan')
            ->join('karyawan', 'karyawan.id_departement = departement.id_departement', 'left')
            ->groupBy('departement.id_departement')
            ->findAll();
        // dd($list_departement);
        return view('admin/departement/data_departement', [
            'list_departement' => $list_departement,
        ]);
    }

    public function tampil_form_tambah()
    {
        return view('admin/departement/form_departement', [
            'url' => base_url('admin/departement/tambah'),
            'departement' => null,
        ]);
    }

    public function tambah()
    {
        // Validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'departement_name' => 'required|alpha_numeric_space|min_length[3]|max_length[100]|is_unique[departement.departement_name]',
        ]);
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Simpan data ke database
        $departementModel = new \App\Models\DepartementModel();
        $departementModel->save([
            'departement_name' => $this->request->getPost('departement_name'),
        ]);

        return redirect()->to(base_url('admin/departement'))->with('success', 'Departement berhasil ditambahkan.');
    }

    public function tampil_form_edit($id_departement)
    {
        $departementModel = new \App\Models\DepartementModel();
        $departement = $departementModel->find($id_departement);
        if (!$departement) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/departement/form_departement', [
            'url' => base_url('admin/departement/edit/' . $id_departement),
            'departement' => $departement,
        ]);
    }

    public function edit($id_departement)
    {
        // Validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'departement_name' => 'required|alpha_numeric_space|min_length[3]|max_length[100]|is_unique[departement.departement_name,id_departement,' . $id_departement . ']',
        ]);
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Simpan data ke database
        $departementModel = new \App\Models\DepartementModel();
        $departementModel->update($id_departement, [
            'departement_name' => $this->request->getPost('departement_name'),
        ]);

        return redirect()->to(base_url('admin/departement'))->with('success', 'Departement berhasil diubah.');
    }

    public function hapus($id_departement)
    {
        $departementModel = new \App\Models\DepartementModel();
        $departementModel->delete($id_departement);

        return redirect()->to(base_url('admin/departement'))->with('success', 'Departement berhasil dihapus.');
    }
}
