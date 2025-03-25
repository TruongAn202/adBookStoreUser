<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

// Kết nối đến database
$servername = "localhost"; // hoặc dùng hosting từ xa
$username   = "root"; 
$password   = ""; 
$database   = "dbbookstore1"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die(json_encode(["error" => "Lỗi kết nối database: " . $conn->connect_error]));
}

// Kiểm tra xem có truyền email qua query không
if (!isset($_GET['email'])) {
    echo json_encode(["error" => "Thiếu email"]);
    exit;
}

$email = $_GET['email'];
$sql = "SELECT email, full_name, diaChi, soDienThoai FROM roleadminuser WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    echo json_encode($user);
} else {
    echo json_encode(["error" => "Không tìm thấy người dùng"]);
}

$stmt->close();
$conn->close();
?>
