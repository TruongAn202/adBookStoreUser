<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Kết nối database
$conn = new mysqli("localhost", "root", "", "dbbookstore1");

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed"]));
}

// Nhận dữ liệu JSON từ client
$rawData = file_get_contents("php://input"); //Đọc toàn bộ dữ liệu thô mà client (Flutter) gửi đến (thường là JSON)."php://input" là một luồng ảo, dùng để lấy body của yêu cầu HTTP POST (JSON).
$data = json_decode($rawData, true); //Hàm PHP gốc để giải mã JSON.true: chuyển JSON thành mảng kết hợp (associative array) thay vì object.json_decode('{"a":1}') → ["a" => 1] nếu dùng true



if (!$data || !isset($data["username"], $data["email"], $data["password"], $data["confirm_password"])) { //neu data giai ma that bai hoac thieu bat ky truong nào thi bao loi cho client : {"status":"error", "message":"Missing fields"}
    echo json_encode(["status" => "error", "message" => "Missing fields"]);
    exit;
}

$username = trim($data["username"]);
$email = trim($data["email"]);
$password = trim($data["password"]);
$confirmPassword = trim($data["confirm_password"]);

// Kiểm tra mật khẩu khớp nhau
if ($password !== $confirmPassword) {
    echo json_encode(["status" => "error", "message" => "Passwords do not match"]);
    exit;
}

// Kiểm tra email đã tồn tại chưa
$sql = $conn->prepare("SELECT * FROM roleadminuser WHERE email = ?");
$sql->bind_param("s", $email);
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "Email already exists"]);
    exit;
}

// Kiểm tra username đã tồn tại chưa
$sql = $conn->prepare("SELECT * FROM roleadminuser WHERE username = ?");
$sql->bind_param("s", $username);
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "Username already exists"]);
    exit;
}

// Mã hóa mật khẩu
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Lưu thông tin vào database
$sql = $conn->prepare("INSERT INTO roleadminuser (email, username, password, trangThai, vaiTro) VALUES (?, ?, ?, 'active', 'user')");
$sql->bind_param("sss", $email, $username, $hashed_password);

if ($sql->execute()) {
    echo json_encode(["status" => "success", "message" => "Registration successful"]);
} else {
    echo json_encode(["status" => "error", "message" => "Registration failed"]);
}

$conn->close();
?>
