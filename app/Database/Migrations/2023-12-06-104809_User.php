<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use function PHPSTORM_META\type;

class User extends Migration
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
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['1', '2', '3'], // 1 = admin, 2 = perusahaan, 3 = pelamar
                'default' => '2',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null, 
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null, // Pastikan konfigurasi default null untuk kolom datetime
            ]
        ]);

        $this->forge->addKey('id', true); // Menggunakan addKey untuk mendefinisikan kolom id sebagai primary key
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
