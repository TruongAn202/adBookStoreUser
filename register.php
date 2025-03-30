<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "dbbookstore1";

// Kết nối database
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Lỗi kết nối Database!"]));
}

// Nhận dữ liệu JSON từ Flutter
$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data["username"], $data["email"], $data["password"], $data["confirm_password"])) {
    echo json_encode(["success" => false, "message" => "Thiếu thông tin đăng ký!"]);
    exit();
}

$username = trim($data["username"]);
$email = trim($data["email"]);
$password = trim($data["password"]);
$confirm_password = trim($data["confirm_password"]);

// Kiểm tra mật khẩu nhập lại
if ($password !== $confirm_password) {
    echo json_encode(["success" => false, "message" => "Mật khẩu không khớp!"]);
    exit();
}

// Kiểm tra email đã tồn tại chưa
$sql = "SELECT * FROM roleadminuser WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    echo json_encode(["success" => false, "message" => "Email đã tồn tại!"]);
    exit();
}

// Kiểm tra tên tài khoản đã tồn tại chưa
$sql = "SELECT * FROM roleadminuser WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    echo json_encode(["success" => false, "message" => "Tên tài khoản đã tồn tại!"]);
    exit();
}

// Mã hóa mật khẩu
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Thêm người dùng vào database
$sql = "INSERT INTO roleadminuser (email, username, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $email, $username, $hashed_password);

if ($stmt->execute()) {
    // Tạo response chứa thông tin user
    $user = [
        "username" => $username,
        "email" => $email
    ];
    
    echo json_encode([
        "success" => true,
        "message" => "Đăng ký thành công!",
        "user" => $user // ✅ Trả về user để Flutter dùng
    ]);
} else {
    echo json_encode(["success" => false, "message" => "Lỗi khi đăng ký!"]);
}

$stmt->close();
$conn->close();
?>
