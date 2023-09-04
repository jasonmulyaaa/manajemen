<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 40,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 40,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'no_telp' => [
                'type' => 'BIGINT',
                'constraint' => 13,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ]
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('user');
    }

    public function down()
    {
        //
    }
}
