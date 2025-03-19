<?php

namespace App\Models;

use CodeIgniter\Model;

class CutiModel extends Model
{
    protected $table            = 'cuti';
    protected $primaryKey       = 'id_cuti';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_karyawan',
        'tanggal_pengajuan',
        'tanggal_mulai',
        'tanggal_selesai',
        'alasan',
        'bukti',
        'status_hrd',
        'status_kadiv',
        'status_askep',
        'status_manager',
        'id_jenis_cuti',
        'sisa_cuti',
        'potongan_cuti',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
