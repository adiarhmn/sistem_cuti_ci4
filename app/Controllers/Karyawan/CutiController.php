<?php

namespace App\Controllers\Karyawan;

use App\Controllers\BaseController;
use App\Models\JenisCutiModel;
use CodeIgniter\HTTP\ResponseInterface;

class CutiController extends BaseController
{
    public function index()
    {
        return view('karyawan/cuti/data_cuti');
    }

    public function tampil_form_tambah()
    {
        $list_jenis_cuti = (new JenisCutiModel())->findAll();
        return view('karyawan/cuti/form_cuti', [
            'list_jenis_cuti' => $list_jenis_cuti,
            'url' => base_url('karyawan/cuti/tambah'),
            'cuti' => null,
        ]);
    }

    public function tambah()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_jenis_cuti' => 'required|integer',
            'potongan_cuti' => 'required|integer|min_length[0]',
            'alasan' => 'permit_empty|string',
            'tanggal_mulai' => 'required|valid_date',
            'bukti' => 'permit_empty|uploaded[bukti]|max_size[bukti,2048]|ext_in[bukti,jpg,jpeg,png,pdf]',
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $jenis_cuti = (new JenisCutiModel())->find($this->request->getPost('id_jenis_cuti'));
        if (!$jenis_cuti) {
            return redirect()->back()->withInput()->with('error', 'Jenis cuti tidak ditemukan.');
        }

        // Ambil data dari form
        $data = [
            'id_jenis_cuti' => $this->request->getPost('id_jenis_cuti'),
            'potongan_cuti' => $jenis_cuti['lama_cuti'] < 1 ? $this->request->getPost('potongan_cuti') : $jenis_cuti['lama_cuti'],
            'alasan' => $this->request->getPost('alasan'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'id_karyawan' => session()->get('id_karyawan'),
            'tanggal_pengajuan' => date('Y-m-d'),
            'tanggal_selesai' => date('Y-m-d', strtotime($this->request->getPost('tanggal_mulai') . ' + ' . $this->request->getPost('potongan_cuti') . ' days')),
        ];

        // Upload file jika ada
        $file = $this->request->getFile('bukti');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $newName);
            $data['bukti'] = $newName;
        }

        // Simpan data ke database
        $cutiModel = new \App\Models\CutiModel();
        if ($cutiModel->insert($data)) {
            return redirect()->to(base_url('karyawan/cuti'))->with('success', 'Cuti berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan cuti.');
        }
    }
}
