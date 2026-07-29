<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriBiayaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_kategori' => 'Pupuk',
            ],
            [
                'nama_kategori' => 'Bibit',
            ],
            [
                'nama_kategori' => 'Pestisida',
            ],
            [
                'nama_kategori' => 'Upah',
            ],
            [
                'nama_kategori' => 'Transportasi',
            ],
            [
                'nama_kategori' => 'Peralatan',
            ],
            [
                'nama_kategori' => 'Lain-lain',
            ],
        ];

        $this->db->table('kategori_biaya')->insertBatch($data);
    }
}