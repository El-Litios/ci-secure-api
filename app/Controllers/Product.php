<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\HTTP\ResponseInterface;

class Product extends BaseController
{
    public function index()
    {
        $model = model('ProductModel');
        return $this->getResponse([
            'message' => 'Prodcutos enviados satisfactoriamente',
            'products' => $model->countProducts()
        ]);
    }
}
