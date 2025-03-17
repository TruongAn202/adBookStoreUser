<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // Cho phép mọi nguồn truy cập
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Thông tin kết nối MySQL
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "dbbookstore1";

// Kết nối database
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die(json_encode(["error" => "Kết nối thất bại: " . $conn->connect_error]));
}

// Truy vấn lấy ngẫu nhiên 6 cuốn sách
$result = $conn->query("SELECT * FROM sach ORDER BY RAND() LIMIT 6");

// Kiểm tra nếu có dữ liệu
if ($result->num_rows > 0) {
    $books = [];
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
    echo json_encode($books, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(["message" => "Không có dữ liệu"]);
}

// Đóng kết nối
$conn->close();
?>
