<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableKaryawan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_karyawan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_karyawan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'id_departement' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'P'],
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'no_telp' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'agama' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'hak_cuti' => [
                'type' => 'INT',
            ],
            'aktif_cuti' => [
                'type' => 'DATE',
            ],
            'jatuh_tempo_cuti' => [
                'type' => 'DATE',
            ]
        ]);

        $this->forge->addKey('id_karyawan', true);
        $this->forge->addForeignKey('id_departement', 'departement', 'id_departement', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('karyawan');
    }

    public function down()
    {
        $this->forge->dropTable('karyawan');
    }
}
