<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableCuti extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_cuti' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_karyawan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'tanggal_pengajuan' => [
                'type' => 'DATE',
            ],
            'tanggal_mulai' => [
                'type' => 'DATE',
            ],
            'tanggal_selesai' => [
                'type' => 'DATE',
            ],
            'alasan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'bukti' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status_hrd' => [
                'type' => 'ENUM',
                'constraint' => ['diajukan', 'disetujui', 'ditolak'],
                'default' => 'diajukan',
            ],
            'status_kadiv' => [
                'type' => 'ENUM',
                'constraint' => ['diajukan', 'disetujui', 'ditolak'],
                'default' => 'diajukan',
            ],
            'status_askep' => [
                'type' => 'ENUM',
                'constraint' => ['diajukan', 'disetujui', 'ditolak'],
                'default' => null,
                'null' => true,
            ],
            'status_manager' => [
                'type' => 'ENUM',
                'constraint' => ['diajukan', 'disetujui', 'ditolak'],
                'default' => null,
                'null' => true,
            ],
            'id_jenis_cuti' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'sisa_cuti' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'lama_cuti' => [
                'type' => 'INT',
                'default' => 0,
            ],
        ]);

        $this->forge->addKey('id_cuti', true);
        $this->forge->addForeignKey('id_karyawan', 'karyawan', 'id_karyawan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_jenis_cuti', 'jenis_cuti', 'id_jenis_cuti', 'CASCADE', 'CASCADE');
        $this->forge->createTable('cuti');
    }

    public function down()
    {
        $this->forge->dropTable('cuti');
    }
}
