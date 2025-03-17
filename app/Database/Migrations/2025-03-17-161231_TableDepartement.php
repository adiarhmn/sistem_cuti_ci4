<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableDepartement extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_departement' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'departement_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);

        $this->forge->addKey('id_departement', true);
        $this->forge->createTable('departement');
    }

    public function down()
    {
        $this->forge->dropTable('departement');
    }
}
