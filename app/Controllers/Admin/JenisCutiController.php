<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class JenisCutiController extends BaseController
{
    public function index()
    {
        $jenisCutiModel = new \App\Models\JenisCutiModel();
        $list_jenis_cuti = $jenisCutiModel->findAll();
        return view('admin/jenis_cuti/data_jenis_cuti', [
            'list_jenis_cuti' => $list_jenis_cuti,
        ]);
    }

    public function tampil_form_tambah()
    {
        return view('admin/jenis_cuti/form_jenis_cuti', [
            'url' => base_url('admin/jenis-cuti/tambah'),
            'jenis_cuti' => null,
        ]);
    }

    public function tambah()
    {
        // dd($this->request->getPost());
        // Validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'jenis_cuti' => 'required|alpha_numeric_space|min_length[3]|max_length[100]|is_unique[jenis_cuti.jenis_cuti]',
            'potongan_cuti' => 'required|numeric',
            'status_potong_cuti' => 'required|in_list[0,1]',
        ]);
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Simpan data ke database
        $jenisCutiModel = new \App\Models\JenisCutiModel();
        $jenisCutiModel->save([
            'jenis_cuti' => $this->request->getPost('jenis_cuti'),
            'potongan_cuti' => $this->request->getPost('potongan_cuti'),
            'status_potong_cuti' => $this->request->getPost('status_potong_cuti'),
        ]);

        return redirect()->to(base_url('admin/jenis-cuti'))->with('success', 'Jenis Cuti berhasil ditambahkan.');
    }

    public function tampil_form_edit($id_jenis_cuti)
    {
        $jenisCutiModel = new \App\Models\JenisCutiModel();
        $jenis_cuti = $jenisCutiModel->find($id_jenis_cuti);
        if (!$jenis_cuti) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/jenis_cuti/form_jenis_cuti', [
            'url' => base_url('admin/jenis-cuti/edit/' . $id_jenis_cuti),
            'jenis_cuti' => $jenis_cuti,
        ]);
    }

    public function edit($id_jenis_cuti)
    {
        // Validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'jenis_cuti' => 'required|alpha_numeric_space|min_length[3]|max_length[100]|is_unique[jenis_cuti.jenis_cuti,id_jenis_cuti,' . $id_jenis_cuti . ']',
            'potongan_cuti' => 'required|numeric',
            'status_potong_cuti' => 'required|in_list[0,1]',
        ]);
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Simpan data ke database
        $jenisCutiModel = new \App\Models\JenisCutiModel();
        $jenisCutiModel->update($id_jenis_cuti, [
            'jenis_cuti' => $this->request->getPost('jenis_cuti'),
            'potongan_cuti' => $this->request->getPost('potongan_cuti'),
            'status_potong_cuti' => $this->request->getPost('status_potong_cuti'),
        ]);

        return redirect()->to(base_url('admin/jenis-cuti'))->with('success', 'Jenis Cuti berhasil diubah.');
    }

    public function hapus($id_jenis_cuti)
    {
        $jenisCutiModel = new \App\Models\JenisCutiModel();
        $jenisCutiModel->delete($id_jenis_cuti);
        return redirect()->to(base_url('admin/jenis-cuti'))->with('success', 'Jenis Cuti berhasil dihapus.');
    }
}
