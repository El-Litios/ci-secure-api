<?php

namespace App\Controllers;

use Exception;
use App\Models\Client_Model;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \Datetime;

class Client extends BaseController
{
    public function index()
    {
        $model = model('Client_Model');
        return $this->getResponse([
            'message' => 'Clients retrieved successfully',
            'client' => $model->asArray()->findAll()
        ]);
    }

    public function store()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[client.email]',
            'retainer_fee' => 'required|max_length[255]'
        ];

        $input = $this->getRequestInput($this->request);

        if (!$this->validateRequest($input, $rules)) {
            return $this->getResponse($this->validator->getErrors(), ResponseInterface::HTTP_BAD_REQUEST);
        }

        $clientEmail = $input['email'];

        $model = new Client_Model();
        $model->save($input);


        $client = $model->where('email', $clientEmail)->first();

        return $this->getResponse([
            'message' => 'Client added successfully',
            'client' => $client
        ]);
    }

    public function show($id)
    {
        try {

            $model = new Client_Model();
            $client = $model->findClientById($id);

            return $this->getResponse([
                'message' => 'Client retrieved successfully',
                'client' => $client
            ]);

        } catch (Exception $e) {
            return $this->getResponse([
                'message' => 'Could not find client for specified ID'
            ], ResponseInterface::HTTP_NOT_FOUND);
        }
    }

    public function update()
    {
        try {
            $dt = new DateTime();
            $input = $this->getRequestInput($this->request);
            $id = $input['id'];
            $input['updated_at'] = $dt->format('Y-m-d H:i:s');
            $model = new Client_Model();
            $model->findClientById($id);
            $model->update($id, $input);
            $client = $model->findClientById($id);

            return $this->getResponse([
                'message' => 'Client updated successfully',
                'client' => $client
            ]);

        } catch (Exception $exception) {

            return $this->getResponse([
                'message' => $exception->getMessage()
            ], ResponseInterface::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        try {

            $model = new Client_Model();
            $client = $model->findClientById($id);
            $model->delete($client);

            return $this->getResponse([
                'message' => 'Client deleted successfully',
            ]);

        } catch (Exception $exception) {
            return $this->getResponse([
                'message' => $exception->getMessage()
            ], ResponseInterface::HTTP_NOT_FOUND);
        }
    }
}