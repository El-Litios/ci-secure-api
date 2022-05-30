<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class VendingState extends Migration
{
    public function up()
	{
        $this->forge->addField([
            'vendingstateid' => [
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
            ]
        ]);
        $this->forge->addPrimaryKey('vendingstateid');
        $this->forge->createTable('vendingstate');
	}

	public function down()
	{
		$this->forge->dropTable('vendingstate');
	}
}
