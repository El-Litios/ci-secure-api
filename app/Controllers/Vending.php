<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Product extends BaseController
{
    public function index()
    {
        $model = model('VendingModel');
        return $this->getResponse([
            'vendings' => $model->asArray()->findAll()
        ]);
    }

    public function store()
    {
        
    }
}
