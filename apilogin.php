<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$conn = new mysqli("localhost", "root", "", "dbbookstore1"); // Cập nhật thông tin database của bạn

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed"]));
}

// Đọc dữ liệu đầu vào
$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

// Kiểm tra dữ liệu có hợp lệ không
if (!$data || !isset($data["username"]) || !isset($data["password"])) {
    echo json_encode(["status" => "error", "message" => "Missing fields"]);
    exit;
}

$username = trim($data["username"]);
$password = trim($data["password"]);

// Truy vấn mật khẩu từ cơ sở dữ liệu
$sql = $conn->prepare("SELECT `password` FROM roleadminuser WHERE username = ?;");
$sql->bind_param("s", $username);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $storedPassword = $row["password"];
    
    // Kiểm tra nếu mật khẩu được mã hóa (bcrypt thường bắt đầu với $2y$ hoặc $2a$)
    if (password_verify($password, $storedPassword)) {
        echo json_encode(["status" => "success", "message" => "Login successful"]);
    } 
    // Kiểm tra nếu mật khẩu là plain text
    elseif ($password === $storedPassword) {
        echo json_encode(["status" => "success", "message" => "Login successful"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid password"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "User not found"]);
}

$conn->close();
?>
