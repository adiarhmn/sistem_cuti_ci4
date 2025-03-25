<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class KaryawanController extends BaseController
{
    public function index()
    {
        $karyawanModel = new \App\Models\KaryawanModel();
        $list_karyawan = $karyawanModel->select('karyawan.*, departement.departement_name')
            ->join('departement', 'karyawan.id_departement = departement.id_departement')
            ->findAll();
        return view('admin/karyawan/data_karyawan', [
            'list_karyawan' => $list_karyawan,
        ]);
    }

    public function tampil_form_tambah()
    {
        $list_departement = (new \App\Models\DepartementModel())->findAll();
        $list_user = (new \App\Models\UserModel())->where('level', 'karyawan')->findAll();
        return view('admin/karyawan/form_karyawan', [
            'url' => base_url('admin/karyawan/tambah'),
            'karyawan' => null,
            'list_departement' => $list_departement,
            'list_user' => $list_user,
        ]);
    }

    public function tambah()
    {
        // Validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_karyawan' => 'required|alpha_space|min_length[3]|max_length[100]',
            'nik' => 'required|numeric|is_unique[karyawan.nik]',
            'id_departement' => 'required|numeric',
            'id_user' => 'required|numeric',
            'jenis_kelamin' => 'required|in_list[L,P]',
            'alamat' => 'required',
            'no_telp' => 'required|numeric|min_length[10]|max_length[15]|is_unique[karyawan.no_telp]',
            'agama' => 'required|alpha',
            'tanggal_lahir' => 'required|valid_date',
            'hak_cuti' => 'required|numeric',
            'aktif_cuti' => 'required|valid_date',
            'jatuh_tempo_cuti' => 'required|valid_date',
        ]);
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Simpan data ke database
        $karyawanModel = new \App\Models\KaryawanModel();
        $karyawanModel->save([
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'nik' => $this->request->getPost('nik'),
            'id_departement' => $this->request->getPost('id_departement'),
            'id_user' => $this->request->getPost('id_user'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('no_telp'),
            'agama' => $this->request->getPost('agama'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'hak_cuti' => $this->request->getPost('hak_cuti'),
            'aktif_cuti' => $this->request->getPost('aktif_cuti'),
            'jatuh_tempo_cuti' => $this->request->getPost('jatuh_tempo_cuti'),
        ]);

        return redirect()->to(base_url('admin/karyawan'))->with('success', 'Karyawan berhasil ditambahkan.');
    }

    public function tampil_form_edit($id_karyawan)
    {
        $list_departement = (new \App\Models\DepartementModel())->findAll();
        $list_user = (new \App\Models\UserModel())->where('level', 'karyawan')->findAll();
        return view('admin/karyawan/form_karyawan', [
            'url' => base_url('admin/karyawan/edit/' . $id_karyawan),
            'karyawan' => (new \App\Models\KaryawanModel())->find($id_karyawan),
            'list_departement' => $list_departement,
            'list_user' => $list_user,
        ]);
    }


    public function edit($id_karyawan)
    {
        // Validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_karyawan' => 'required|alpha_space|min_length[3]|max_length[100]',
            'nik' => 'required|numeric|is_unique[karyawan.nik,id_karyawan,' . $id_karyawan . ']',
            'id_departement' => 'required|numeric',
            'id_user' => 'required|numeric',
            'jenis_kelamin' => 'required|in_list[L,P]',
            'alamat' => 'required',
            'no_telp' => 'required|numeric|min_length[10]|max_length[15]|is_unique[karyawan.no_telp,id_karyawan,' . $id_karyawan . ']',
            'agama' => 'required|alpha',
            'tanggal_lahir' => 'required|valid_date',
            'hak_cuti' => 'required|numeric',
            'aktif_cuti' => 'required|valid_date',
            'jatuh_tempo_cuti' => 'required|valid_date',
        ]);
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Update data di database
        $karyawanModel = new \App\Models\KaryawanModel();
        $karyawanModel->update($id_karyawan, [
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'nik' => $this->request->getPost('nik'),
            'id_departement' => $this->request->getPost('id_departement'),
            'id_user' => $this->request->getPost('id_user'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('no_telp'),
            'agama' => $this->request->getPost('agama'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'hak_cuti' => $this->request->getPost('hak_cuti'),
            'aktif_cuti' => $this->request->getPost('aktif_cuti'),
            'jatuh_tempo_cuti' => $this->request->getPost('jatuh_tempo_cuti'),
        ]);

        return redirect()->to(base_url('admin/karyawan'))->with('success', 'Karyawan berhasil diperbarui.');
    }

    public function hapus($id_karyawan)
    {
        $karyawanModel = new \App\Models\KaryawanModel();
        $karyawanModel->delete($id_karyawan);
        return redirect()->to(base_url('admin/karyawan'))->with('success', 'Karyawan berhasil dihapus.');
    }

    public function monitoring_cuti($id_karyawan)
    {
        $list_cuti = (new \App\Models\CutiModel())->where('id_karyawan', $id_karyawan)
            ->join('jenis_cuti', 'jenis_cuti.id_jenis_cuti = cuti.id_jenis_cuti')
            ->findAll();
        $karyawan = (new \App\Models\KaryawanModel())->find($id_karyawan);
        // dd($list_cuti);
        return view('admin/karyawan/monitoring_cuti', [
            'list_cuti' => $list_cuti,
            'karyawan'  => $karyawan
        ]);
    }
}
