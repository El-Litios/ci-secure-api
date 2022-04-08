<?php

use Config\Services;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use App\Models\User_Model;

function getJWTFromRequest($authHeader): string
{
    if(is_null($authHeader))
    {
        throw new Exception('Invalid JWT in Request');
    }

    return explode(' ', $authHeader)[1];
}


function validateJWTFromRequest(string $tokenEncoded)
{
    $key = \Config\Services::getSecretKey();
    $decodedToken = JWT::decode($tokenEncoded, new Key($key, 'HS256'));
    $userModel = new User_Model();
    $userModel->findUserByEmail($decodedToken->email);
}

function getSignedJWTForUser(string $email)
{
    $issuedAtTime = time();
    $tokenTimeLive = getenv('JWT_TIME_TO_LIVE');
    $tokenExpire = $issuedAtTime + $tokenTimeLive;
    $payload = [
        'email' => $email,
        'iat' => $issuedAtTime,
        'exp' => $tokenExpire
    ];

    $jwt = JWT::encode($payload, Services::getSecretKey(), 'HS256');

    return $jwt;
}