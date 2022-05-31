<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StateProduct extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'stateid' => [
                'type' => 'INT',
                'constraint' => 1,
                'unsigned' => true,
                'auto_increment' => true,
                'null' => false
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
        ]);
        $this->forge->addPrimaryKey('stateid');
        $this->forge->createTable('stateproduct');
    }

    public function down()
    {
        $this->forge->dropTable('stateproduct');
    }
}
