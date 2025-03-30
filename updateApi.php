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

if (!isset($data['email'])) {
    echo json_encode(["error" => "Thiếu email"]);
    exit;
}

$email = $data['email'];
$fields = [];
$params = [];
$types = "";

// Kiểm tra và thêm các trường có giá trị vào câu lệnh SQL
if (isset($data['full_name'])) {
    $fields[] = "full_name = ?";
    $params[] = $data['full_name'];
    $types .= "s";
}
if (isset($data['diaChi'])) {
    $fields[] = "diaChi = ?";
    $params[] = $data['diaChi'];
    $types .= "s";
}
if (isset($data['soDienThoai'])) {
    $fields[] = "soDienThoai = ?";
    $params[] = $data['soDienThoai'];
    $types .= "s";
}

// Nếu không có trường nào được cập nhật
if (empty($fields)) {
    echo json_encode(["error" => "Không có dữ liệu cập nhật"]);
    exit;
}

// Tạo câu lệnh SQL động
$sql = "UPDATE roleadminuser SET " . implode(", ", $fields) . " WHERE email = ?";
$params[] = $email;
$types .= "s";

// Chuẩn bị và thực thi câu lệnh
$stmt = $conn->prepare($sql);
$stmt->bind_param($types, ...$params);

if ($stmt->execute()) {
    echo json_encode(["message" => "Cập nhật thành công"]);
} else {
    echo json_encode(["error" => "Lỗi khi cập nhật thông tin"]);
}

$stmt->close();
$conn->close();
?>
