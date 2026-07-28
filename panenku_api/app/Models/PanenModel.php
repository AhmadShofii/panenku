<?php

namespace App\Models;

use CodeIgniter\Model;

class PanenModel extends Model
{
    protected $table            = 'panen';
    protected $primaryKey       = 'id';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $protectFields = true;

    protected $allowedFields = [
        'kebun_id',
        'tanggal_panen',
        'hasil_kg',
        'harga_per_kg',
        'total_harga',
        'catatan',
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