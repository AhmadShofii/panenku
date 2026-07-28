<?php

namespace App\Models;

use CodeIgniter\Model;

class KebunModel extends Model
{
    protected $table            = 'kebun';
    protected $primaryKey       = 'id';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $protectFields = true;

    protected $allowedFields = [
        'user_id',
        'nama_kebun',
        'lokasi',
        'luas',
        'jenis_tanaman',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}