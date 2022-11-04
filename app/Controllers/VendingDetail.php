<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VendingDetailModel;
use CodeIgniter\HTTP\ResponseInterface;

class VendingDetail extends BaseController
{
    public function store()
    {
        $input = $this->getRequestInput($this->request);

        $model = model('VendingDetailModel');

        foreach($input['items'] as $val){
            $data = [
                'quantity' => $val['quantity'],
                'productid' => $val['id'],
                'vendingid' => $input['vendingid']
            ];

            $model->save($data);
        }

        return $this->getResponse([
            'message' => $input
        ]);
    }
}
