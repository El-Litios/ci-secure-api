<?php

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
    $decodedToken = \Firebase\JWT\JWT::decode($tokenEncoded, $key, ['HS256']);
    $userModel = new \App\Models\User_Model();
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

    $jwt = \Firebase\JWT\JWT::enconde($payload, \Config\Services::getSecretKey());

    return $jwt;
}