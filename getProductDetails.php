<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Thông tin kết nối database
$servername = "localhost";
$username = "root";
$password = "";
$database = "dbbookstore1";

// Kết nối database
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Kết nối database thất bại: " . $conn->connect_error]));
}

// Lấy mã sách từ request
$maSach = isset($_GET['maSach']) ? $_GET['maSach'] : '';

if (empty($maSach)) {
    die(json_encode(["status" => "error", "message" => "Thiếu tham số maSach"]));
}

// Truy vấn sản phẩm theo mã sách
$sql = "SELECT * FROM sach WHERE maSach = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die(json_encode(["status" => "error", "message" => "Lỗi truy vấn SQL: " . $conn->error]));
}

$stmt->bind_param("s", $maSach);

if (!$stmt->execute()) {
    die(json_encode(["status" => "error", "message" => "Lỗi thực thi truy vấn: " . $stmt->error]));
}

$result = $stmt->get_result();

// Kiểm tra xem sản phẩm có tồn tại không
if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
    echo json_encode(["status" => "success", "data" => $product], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(["status" => "error", "message" => "Không tìm thấy sản phẩm"]);
}

// Đóng kết nối
$stmt->close();
$conn->close();
?>
