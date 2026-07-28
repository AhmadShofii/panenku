<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBiayaTable extends Migration
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
            'kategori_id' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'unsigned'   => true,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'nominal' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => 0,
            ],
            'keterangan' => [
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
        $this->forge->addKey('kategori_id');

        $this->forge->addForeignKey(
            'kebun_id',
            'kebun',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->addForeignKey(
            'kategori_id',
            'kategori_biaya',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('biaya');
    }

    public function down()
    {
        $this->forge->dropTable('biaya', true);
    }
}