<?php

namespace App\Database\Migrations;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Migration;

class Pelamar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'first_name' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => 255,
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => 255,
            ],
            'gender' => [
                'type' => 'ENUM',
                'constraint' => ['1', '2'],
                'null' => true,
                'default' => '1',
            ],
            'agama' => [
                'type' => 'ENUM',
                'constraint' => ['1', '2', '3', '4', '5'],
                'null' => true,
                'default' => '1',
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => 255,
            ],
            'tanggal_lahir' => [
                'null' => true,
                'type' => 'DATE',
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

        $this->forge->addForeignKey('id', 'users', 'id');
        $this->forge->createTable('pelamar');
    }

    public function down()
    {
        $this->forge->dropTable('pelamar');
    }
}
