<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriBiayaModel extends Model
{
    protected $table            = 'kategori_biaya';
    protected $primaryKey       = 'id';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $protectFields = true;

    protected $allowedFields = [
        'nama_kategori',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'nama_kategori' => 'required|max_length[100]',
    ];

    protected $validationMessages = [
        'nama_kategori' => [
            'required' => 'Nama kategori wajib diisi.',
        ],
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}