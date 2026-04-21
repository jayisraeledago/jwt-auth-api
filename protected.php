<?php
require "vendor/autoload.php";
include "jwt.php";

$headers = getallheaders();

if (!isset($headers['Authorization'])) {
    echo json_encode(["error" => "No token"]);
    exit;
}

$token = str_replace("Bearer ", "", $headers['Authorization']);
$decoded = validateJWT($token, $key);

if ($decoded) {
    echo json_encode([
        "message" => "Access granted",
        "user" => $decoded->data
    ]);
} else {
    echo json_encode(["error" => "Invalid token"]);
}
?>