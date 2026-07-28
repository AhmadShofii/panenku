<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePanenTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kebun_id' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'unsigned'   => true,
            ],
            'tanggal_panen' => [
                'type' => 'DATE',
            ],
            'hasil_kg' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'default'    => 0,
            ],
            'harga_per_kg' => [
                'type'       => 'DECIMAL',
                'constraint' => '12,2',
                'default'    => 0,
            ],
            'total_harga' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => 0,
            ],
            'catatan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('kebun_id');

        $this->forge->addForeignKey(
            'kebun_id',
            'kebun',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('panen');
    }

    public function down()
    {
        $this->forge->dropTable('panen', true);
    }
}