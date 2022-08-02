<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class VendingState extends BaseController
{
    public function index()
    {
        $model = model('VendingStateModel');
        return $this->getResponse([
            'vendingstate' => $model->asArray()->findAll()
        ]);
    }

}
