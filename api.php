<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // Cho phép mọi nguồn truy cập
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// // Thông tin kết nối MySQL trên localhost
$servername = "localhost"; // Localhost
$username   = "root"; // Username mặc định của XAMPP/WAMP thường là "root"
$password   = ""; // Mặc định của XAMPP/WAMP thường là rỗng (có thể thay đổi)
$database   = "dbbookstore1"; // Thay bằng tên database của bạn

// $servername = "sql207.infinityfree.com";
// $username = "if0_37577996";
// $password = "mqfxbdhp";
// $database   = "dbbookstore1";
// Kết nối database
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die(json_encode(["error" => "Kết nối thất bại: " . $conn->connect_error]));
}

// Truy vấn dữ liệu từ bảng sản phẩm
$result = $conn->query("SELECT * FROM sach");

// Kiểm tra nếu có dữ liệu
if ($result->num_rows > 0) {
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    echo json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(["message" => "Không có dữ liệu"]);
}

// Đóng kết nối
$conn->close();
?>
