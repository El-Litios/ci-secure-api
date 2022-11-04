<?php

namespace App\Models;

use CodeIgniter\Model;

class VendingModel extends Model
{
    protected $table = 'vending';
    protected $allowedFields = ['clientid', 'description', 'stateid', 'created_at', 'paymentid', 'totalprice'];
    protected $primaryKey       = 'id';
}