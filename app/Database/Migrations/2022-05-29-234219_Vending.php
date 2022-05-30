<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Vending extends Migration
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
            'clientid' => [
                'type' => 'INT',
                'constraint' => 1,
                'unsigned' => true,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'stateid' => [
                'type' => 'INT',
                'constraint' => 1,
                'unsigned' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('stateid', 'vendingstate', 'vendingstateid');
        $this->forge->addForeignKey('clientid', 'client', 'id');
        $this->forge->createTable('vending');
    }

    public function down()
    {
        $this->forge->dropTable('vending');
    }
}
