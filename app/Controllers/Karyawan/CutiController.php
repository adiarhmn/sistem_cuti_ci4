<?php

namespace App\Controllers\Karyawan;

use App\Controllers\BaseController;
use App\Models\JenisCutiModel;

class CutiController extends BaseController
{
    public function index()
    {
        $list_cuti = (new \App\Models\CutiModel())->where('id_karyawan', session()->get('id_karyawan'))
            ->join('jenis_cuti', 'jenis_cuti.id_jenis_cuti = cuti.id_jenis_cuti')
            ->findAll();
        // dd($list_cuti);
        return view('karyawan/cuti/data_cuti', [
            'list_cuti' => $list_cuti,
        ]);
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
            'lama_cuti' => 'required|integer|min_length[0]',
            'alasan' => 'permit_empty|string',
            'tanggal_mulai' => 'required|valid_date',
            'bukti' => 'permit_empty|uploaded[bukti]|max_size[bukti,2048]|ext_in[bukti,jpg,jpeg,png,pdf]',
        ]);

        $data_karyawan = (new \App\Models\KaryawanModel())->find(session()->get('id_karyawan'));
        if (!$data_karyawan) {
            return redirect()->back()->withInput()->with('error', 'Data karyawan tidak ditemukan.');
        }

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $jenis_cuti = (new JenisCutiModel())->find($this->request->getPost('id_jenis_cuti'));
        if (!$jenis_cuti) {
            return redirect()->back()->withInput()->with('error', 'Jenis cuti tidak ditemukan.');
        }

        if ($jenis_cuti['status_potong_cuti'] == 0) {
            $lama_cuti = $this->request->getPost('lama_cuti');
            $sisa_cuti = $data_karyawan['hak_cuti'];
        } else {
            $lama_cuti = $jenis_cuti['potongan_cuti'] < 1 ? $this->request->getPost('lama_cuti') : $jenis_cuti['potongan_cuti'];
            $sisa_cuti = $data_karyawan['hak_cuti'] - $lama_cuti;
        }

        // Simpan Hak Cuti
        $data_karyawan['hak_cuti'] = $sisa_cuti;
        (new \App\Models\KaryawanModel())->save($data_karyawan);

        // Ambil data dari form
        $data = [
            'id_jenis_cuti' => $this->request->getPost('id_jenis_cuti'),
            'lama_cuti' => $lama_cuti,
            'alasan' => $this->request->getPost('alasan'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'id_karyawan' => session()->get('id_karyawan'),
            'tanggal_pengajuan' => date('Y-m-d'),
            'sisa_cuti' => $sisa_cuti,
            'status_askep' => 'diajukan',
            'status_manager' => 'diajukan',
            'tanggal_selesai' => date('Y-m-d', strtotime($this->request->getPost('tanggal_mulai') . ' + ' . $lama_cuti . ' days')),
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
