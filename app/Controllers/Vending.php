<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VendingModel;
use CodeIgniter\HTTP\ResponseInterface;

class Vending extends BaseController
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
        $input = $this->getRequestInput($this->request);
        $model = model('VendingModel');

        $model->save($input);
        $id = $model->insertID;

        return $this->getResponse([
            'message' => $id
        ]);
    }
}
