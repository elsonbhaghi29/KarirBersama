<?php

namespace App\Database\Migrations;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Migration;

class Perusahaan extends Migration
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
            'id_user' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'nama_perusahaan' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => 255,
            ],
            'pemilik' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => 255,
            ],
            'jenis_perusahaan' => [
                'type' => 'ENUM',
                'constraint' => ['1', '2'],
                'null' => true,
                'default' => '1',
            ],
            'phone_number' => [
                'type' => 'INT',
                'null' => true,
                'constraint' => 15,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => 255,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => 255,
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
        $this->forge->addForeignKey('id_user', 'users', 'id');
        $this->forge->createTable('perusahaan');
    }

    public function down()
    {
        $this->forge->dropTable('perusahaan');
    }
}
