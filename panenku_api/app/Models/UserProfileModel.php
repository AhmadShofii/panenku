<?php

namespace App\Models;

use CodeIgniter\Model;

class UserProfileModel extends Model
{
    protected $table            = 'user_profiles';
    protected $primaryKey       = 'id';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'nama',
        'no_hp',
    ];

    protected $useSoftDeletes = false;

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'user_id' => 'required|integer',
        'nama'    => 'required|min_length[3]|max_length[100]',
        'no_hp'   => 'permit_empty|max_length[20]',
    ];

    protected $validationMessages = [
        'nama' => [
            'required' => 'Nama wajib diisi.',
        ],
    ];

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