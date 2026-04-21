<?php
include "db.php";

$data = json_decode(file_get_contents("php://input"));

$email = $data->email;
$password = password_hash($data->password, PASSWORD_BCRYPT);

$sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

if ($conn->query($sql)) {
    echo json_encode(["message" => "User registered"]);
} else {
    echo json_encode(["error" => "Registration failed"]);
}
?>