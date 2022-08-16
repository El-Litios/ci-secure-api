<?php

namespace App\Controllers;

use Exception;
use App\Models\PaymentMethodSaleModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \Datetime;

class PaymentMethodSale extends BaseController
{
    public function index()
    {
        $model = model('PaymentMethodSaleModel');
        return $this->getResponse([
            'methods' => $model->findAll()
        ]);
    }

}