<?php

namespace App\Database\Migrations;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Migration;

class Lowongan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_perusahaan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'nama_pekerjaan' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => 255,
            ],
            'deskripsi' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => 255,
            ],
            'posisi' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => 255,
            ],
            'batas_post' => [
                'null' => true,
                'type' => 'DATE',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['1', '2'],
                'null' => true,
                'default' => '1',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => Time::now('Asia/Jakarta', 'id_ID'),
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_perusahaan', 'perusahaan', 'id');
        $this->forge->createTable('lowongan');
    }

    public function down()
    {
        $this->forge->dropTable('lowongan');
    }
}
