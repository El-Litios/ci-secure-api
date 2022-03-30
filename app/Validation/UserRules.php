<?php

namespace App\Validation;

class UserRules
{
    public function validateUser(string $str, string $Fields, array $data)
    {
        try {
            $userModel = model('User_Model');
            $user = $userModel->findUserByEmail($data['email']);

            return password_verify($data['password'], $user['password']);
        } catch (\Exception $e) {
            return false;
        }
    }
}
