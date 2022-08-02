<?php

namespace App\Models;

use CodeIgniter\Model;

class VendingModel extends Model
{
    protected $table = 'vending';
    protected $allowedFields = ['client_id', 'description', 'stateid', 'created_at'];
    protected $primaryKey       = 'id';
}