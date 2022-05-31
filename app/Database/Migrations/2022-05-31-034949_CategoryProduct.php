<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoryProduct extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'categoryid' => [
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
        $this->forge->addPrimaryKey('categoryid');
        $this->forge->createTable('categoryproduct');
    }

    public function down()
    {
        $this->forge->dropTable('categoryproduct');
    }
}
