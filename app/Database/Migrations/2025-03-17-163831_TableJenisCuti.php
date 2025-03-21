<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableJenisCuti extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis_cuti' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'jenis_cuti' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'lama_cuti' => [
                'type' => 'INT',
            ],
            'status_potongan_cuti' => [
                'type' => 'BOOLEAN',
                'default' => 1,
            ],
        ]);

        $this->forge->addKey('id_jenis_cuti', true);
        $this->forge->createTable('jenis_cuti');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_cuti');
    }
}
