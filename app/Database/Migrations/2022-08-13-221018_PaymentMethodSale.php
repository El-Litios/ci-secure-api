<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PaymentMethodSale extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'paymentmethodid' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
        ]);
        $this->forge->addPrimaryKey('paymentmethodid');
        $this->forge->createTable('paymentmethodsale');
    }

    public function down()
    {
        $this->forge->dropTable('paymentmethodsale');
    }
}
