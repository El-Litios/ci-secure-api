<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class VendingDetails extends Migration
{
    public function up()
	{
        $this->forge->addField([
            'vendingid' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'productid' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 3,
            ],
        ]);
        $this->forge->addForeignKey('vendingid', 'vending', 'id');
        $this->forge->addForeignKey('productid', 'product', 'id');
        $this->forge->createTable('vendingdetail');
	}

	public function down()
	{
		$this->forge->dropTable('vendingdetail');
	}
}
