<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type");

// Kết nối database
$servername = "localhost"; 
$username   = "root"; 
$password   = ""; 
$database   = "dbbookstore1"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die(json_encode(["error" => "Lỗi kết nối database: " . $conn->connect_error]));
}

// Nhận dữ liệu JSON từ Flutter
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['email']) || !isset($data['full_name']) || !isset($data['diaChi']) || !isset($data['soDienThoai'])) {
    echo json_encode(["error" => "Thiếu dữ liệu"]);
    exit;
}

$email = $data['email'];
$fullName = $data['full_name'];
$diaChi = $data['diaChi'];
$soDienThoai = $data['soDienThoai'];

$sql = "UPDATE roleadminuser SET full_name = ?, diaChi = ?, soDienThoai = ? WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $fullName, $diaChi, $soDienThoai, $email);

if ($stmt->execute()) {
    echo json_encode(["message" => "Cập nhật thành công"]);
} else {
    echo json_encode(["error" => "Lỗi khi cập nhật thông tin"]);
}

$stmt->close();
$conn->close();
?>
