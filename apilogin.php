<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$conn = new mysqli("localhost", "root", "", "dbbookstore1");

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed"]));
}

// Đọc dữ liệu đầu vào
$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

if (!$data || !isset($data["username"]) || !isset($data["password"])) {
    echo json_encode(["status" => "error", "message" => "Missing fields"]);
    exit;
}

$username = trim($data["username"]);
$password = trim($data["password"]);

// Truy vấn thông tin user từ database
$sql = $conn->prepare("SELECT * FROM roleadminuser WHERE username = ?");
$sql->bind_param("s", $username);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $storedPassword = $row["password"];
    $trangThai = $row["trangThai"];
    $vaiTro = $row["vaiTro"];

    // Kiểm tra trạng thái tài khoản
    if ($trangThai == "inactive") {
        echo json_encode(["status" => "error", "message" => "Tài khoản đã bị vô hiệu hóa"]);
        exit;
    }

    // Chặn tài khoản admin đăng nhập
    if ($vaiTro == "admin") {
        echo json_encode(["status" => "error", "message" => "Đây là tài khoản admin. Không thể đăng nhập vào ứng dụng."]);
        exit;
    }

    // Kiểm tra mật khẩu
    if (password_verify($password, $storedPassword) || $password === $storedPassword) {
        echo json_encode([
            "status" => "success",
            "message" => "Login successful",
            "user" => [
                "email" => $row["email"],
                "username" => $row["username"],
                "full_name" => $row["full_name"],
                "diaChi" => $row["diaChi"],
                "soDienThoai" => $row["soDienThoai"],
                "trangThai" => $row["trangThai"],
                "vaiTro" => $row["vaiTro"]
            ]
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid password"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "User not found"]);
}

$conn->close();
?>
