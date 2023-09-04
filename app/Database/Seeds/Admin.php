<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'username' => 'admin',
                'nama' => 'Admin',
                'password' => password_hash('12345', PASSWORD_BCRYPT),
            ]
        ];
        $this->db->table('admin')->insertBatch($data);
    }
}
