<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class CutiController extends BaseController
{
    public function index()
    {
        $list_cuti = (new \App\Models\CutiModel())
            ->join('karyawan', 'karyawan.id_karyawan = cuti.id_karyawan')
            ->join('jenis_cuti', 'jenis_cuti.id_jenis_cuti = cuti.id_jenis_cuti')
            ->findAll();

        return view('admin/cuti/data_cuti', [
            'list_cuti' => $list_cuti,
        ]);
    }

    public function approve($id_cuti)
    {
        $cutiModel = new \App\Models\CutiModel();
        $cuti = $cutiModel->find($id_cuti);
        if (!$cuti) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = $this->request->getPost([
            'status_hrd',
            'status_kadiv',
            'status_askep',
            'status_manager',
        ]);

        $cutiModel->update($id_cuti, $data);

        return redirect()->to(base_url('admin/cuti'))->with('success', 'Cuti berhasil diapprove.');
    }

}
