<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriBiayaSeeder extends Seeder
{
    public function run()
    {
        $kategori = [
            'Bibit',
            'Pupuk',
            'Pestisida',
            'Tenaga Kerja',
            'Transportasi',
            'Peralatan',
            'Lain-lain',
        ];

        foreach ($kategori as $item) {
            $this->db->table('kategori_biaya')->insert([
                'user_id'        => 1,
                'nama_kategori'  => $item,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ]);
        }
    }
}