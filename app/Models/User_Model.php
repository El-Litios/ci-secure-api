<?php

namespace App\Models;

use CodeIgniter\Model;

class User_Model extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['name', 'email', 'password', 'roleid'];
    protected $updatedField = 'updated_at';
    
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    //CALLBACKS FUNCTIONS
    protected function beforeInsert(array $data): array
    {
        return $this->getUpdatedDataWithHashPass($data);
    }

    protected function beforeUpdate(array $data): array
    {
        return $this->getUpdatedDataWithHashPass($data);
    }


    //FUNCTIONS
    private function getUpdatedDataWithHashPass(array $data)
    {
        if(isset($data['data']['password']))
        {
            $textPlainedPassword = $data['data']['password'];
            $data['data']['password'] = password_hash($textPlainedPassword, PASSWORD_BCRYPT);
        }

        return $data;
    }

    public function findUserByEmail(string $email)
    {
        $user = $this->asArray()->where(['email' => $email])->first();

        if(!$user)
        {
            throw new \Exception('User does not exist for specific email');
        }

        return $user;
    }

}