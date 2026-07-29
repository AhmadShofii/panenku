<?php

namespace App\Models;

use CodeIgniter\Model;

class PanenModel extends Model
{
    protected $table = 'panen';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $useTimestamps = true;

    protected $allowedFields = [
        'kebun_id',
        'tanggal_panen',
        'hasil_kg',
        'harga_per_kg',
        'total_harga',
        'catatan'
    ];
}