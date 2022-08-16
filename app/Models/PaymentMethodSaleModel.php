<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentMethodSaleModel extends Model
{
    protected $table            = 'paymentmethodsale';
    protected $allowedFields = ['id', 'description'];
    protected $primaryKey       = 'id';

}