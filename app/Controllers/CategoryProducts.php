<?php

namespace App\Controllers;

use Exception;
use App\Models\CategoryProductsModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CategoryProducts extends BaseController
{
    public function index()
    {
        $model = model('CategoryProductsModel');

        return $this->getResponse([
            'categories' => $model->asArray()->findAll()
        ]);
    }
}
