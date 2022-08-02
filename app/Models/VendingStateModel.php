<?php

namespace App\Models;

use CodeIgniter\Model;

class VendingStateModel extends Model
{
    protected $table = 'vendingstate';
    protected $allowedFields = ['description'];
    protected $primaryKey       = 'id';

}