<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = "my_super_secret_key_102498_secure_key";

function generateJWT($data, $key) {
    $payload = [
        "iss" => "localhost",
        "iat" => time(),
        "exp" => time() + (60 * 60), // 1 hour
        "data" => $data
    ];

    return JWT::encode($payload, $key, 'HS256');
}

function validateJWT($token, $key) {
    try {
        return JWT::decode($token, new Key($key, 'HS256'));
    } catch (Exception $e) {
        return null;
    }
}
?>