<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type");

$servername = "localhost";
$username = "root";
$password = "";
$database = "dbbookstore1";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed"]));
}

if (!isset($_GET['email']) || empty($_GET['email'])) {
    echo json_encode(["status" => "error", "message" => "Missing or empty email"]);
    exit;
}

$email = $conn->real_escape_string($_GET['email']);

$sql = $conn->prepare("SELECT email, username, full_name, diaChi, soDienThoai FROM roleadminuser WHERE email = ?");
$sql->bind_param("s", $email);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    echo json_encode(["status" => "success", "user" => $user]);
} else {
    echo json_encode(["status" => "error", "message" => "User not found"]);
}

$conn->close();

