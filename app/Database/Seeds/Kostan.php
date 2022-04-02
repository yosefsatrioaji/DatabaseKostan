<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kostan extends Seeder
{
    public function run()
    {
        $data = [
            'nama' => 'Kost Sehat',
            'alamat' => 'Jalan Gondang no. 90',
            'fitur' => 'ac,kmdalam,listrik',
            'banyak_kamar' => 200,
            'sisa_kamar' => 10,
            'harga' => 1000000
        ];
        $this->db->table('kostan')->insert($data);

        $data = [
            'nama' => 'Kost Sakit',
            'alamat' => 'Jalan Gondang no. 91',
            'banyak_kamar' => 100,
            'sisa_kamar' => 10,
            'harga' => 100000
        ];
        $this->db->table('kostan')->insert($data);
    }
}
