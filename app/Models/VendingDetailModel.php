<?php

namespace App\Models;

use CodeIgniter\Model;

class VendingDetailModel extends Model
{
    protected $table            = 'vendingdetail';
    protected $allowedFields    = ['vendingid','productid', 'quantity'];

    
}
