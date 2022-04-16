<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Role extends Migration
{
    public function up()
	{
        $this->forge->addField([
            'roleid' => [
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
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('roleid');
        $this->forge->createTable('role');
	}

	public function down()
	{
		$this->forge->dropTable('role');
	}
}
