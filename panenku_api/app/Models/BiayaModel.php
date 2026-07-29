<?php

namespace App\Models;

use CodeIgniter\Model;

class BiayaModel extends Model
{
    protected $table            = 'biaya';
    protected $primaryKey       = 'id';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $protectFields = true;

    protected $allowedFields = [
        'kebun_id',
        'kategori_id',
        'tanggal',
        'nominal',
        'keterangan',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'kebun_id' => 'required|integer',
        'kategori_id' => 'required|integer',
        'tanggal' => 'required|valid_date',
        'nominal' => 'required|decimal',
        'keterangan' => 'permit_empty|max_length[255]',
    ];

    protected $validationMessages = [
        'kebun_id' => [
            'required' => 'Kebun wajib dipilih.',
        ],
        'kategori_id' => [
            'required' => 'Kategori biaya wajib dipilih.',
        ],
        'tanggal' => [
            'required' => 'Tanggal wajib diisi.',
        ],
        'nominal' => [
            'required' => 'Nominal wajib diisi.',
            'decimal' => 'Nominal harus berupa angka.',
        ],
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}