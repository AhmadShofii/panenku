<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')->insert([
            'nama'       => 'Administrator',
            'email'      => 'admin@panenku.test',
            'password'   => password_hash('password123', PASSWORD_DEFAULT),
            'no_hp'      => '081234567890',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}