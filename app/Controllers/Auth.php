<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function register()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[user.email]',
            'password' => 'required|min_length[8]|max_length[255]',
            'roleid' => 'required'
        ];

        $input = $this->getRequestInput($this->request);

        if(!$this->validateRequest($input, $rules))
        {
            return $this->getResponse($this->validator->getErrors(), ResponseInterface::HTTP_BAD_REQUEST);
        }

        $userModel = model('User_Model');
        $userModel->save($input);

        return $this->getJWTForUser($input['email'], ResponseInterface::HTTP_CREATED);
    }

    private function getJWTForUser(string $email, int $responseCode = ResponseInterface::HTTP_OK)
    {
        try {
            $userModel = model('User_Model');
            $user = $userModel->findUserByEmail($email); //verificar si el email corresponde a algun usuario dentro de la bd
            unset($user['password']); //sacamos la pass del arreglo
            unset($user['created_at']); //sacamos la pass del arreglo
            unset($user['updated_at']); //sacamos la pass del arreglo

            helper('jwt');

            return $this->getResponse([
                'user' => $user,
                'access_token' => getSignedJWTForUser($email),
            ]);
        } catch (\Exception $e) {
            return  $this->getResponse([
                'error' => $e->getMessage()
            ], $responseCode);
        }
    }


    public function login()
    {
        $rules = [
            'email' => 'required|valid_email|min_length[6]|max_length[60]',
            'password' => 'required|min_length[8]|max_length[255]|validateUser[email, password]'
        ];

        $errors = [
            'password' => [
                'validateUser' => 'credenciales invalidas'
            ]
        ];

        $input = $this->getRequestInput($this->request);

        if(!$this->validateRequest($input, $rules, $errors))
        {
            return $this->getResponse($this->validator->getErrors(), ResponseInterface::HTTP_BAD_REQUEST);
            
        }

        return $this->getJWTForUser($input['email']);
    }
}
