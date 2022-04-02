<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kostan extends Migration
{
    public function up()
    {
          $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'fitur'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'banyak_kamar' => [
                'type'       => 'INT',
                'constraint' => '15',
            ],
            'sisa_kamar'       => [
                'type'       => 'INT',
                'constraint' => '15',
            ],
            'harga'       => [
                'type'       => 'INT',
                'constraint' => '15',
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kostan');
    }

    public function down()
    {
        $this->forge->dropTable('kostan');
    }
}
