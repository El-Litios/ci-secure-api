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
            'products' => $model->countProducts()
        ]);
    }

    public function store()
    {
        $input = $this->getRequestInput($this->request);

        $model = model('ProductModel');
        
        for ($i=0; $i < $input['quantity']; $i++) { 
            $model->save($input);
        }

        return $this->getResponse([
            'message' => 'Productos agregados'
        ]);
    }
}
