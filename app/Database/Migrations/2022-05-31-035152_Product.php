<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
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
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'categoryid' => [
                'type' => 'INT',
                'constraint' => 1,
                'unsigned' => true,
            ],
            'stateid' => [
                'type' => 'INT',
                'constraint' => 1,
                'unsigned' => true,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('categoryid', 'categoryproduct', 'categoryid');
        $this->forge->addForeignKey('stateid', 'stateproduct', 'stateid');
        $this->forge->createTable('product');
    }

    public function down()
    {
        $this->forge->dropTable('product');
    }
}
