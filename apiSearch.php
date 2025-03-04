<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

// Kết nối database
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "dbbookstore1";

$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die(json_encode(["error" => "Kết nối thất bại: " . $conn->connect_error]));
}

// Nhận từ khóa tìm kiếm từ client (Flutter)
if (isset($_GET['query'])) {
    $query = $_GET['query'];

    // Truy vấn tìm kiếm sách
    $sql = "SELECT * FROM sach WHERE tenSach LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchParam = "%{$query}%";
    $stmt->bind_param("s", $searchParam);
    $stmt->execute();
    $result = $stmt->get_result();

    $books = [];
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }

    echo json_encode($books);
} else {
    echo json_encode(["error" => "Thiếu từ khóa tìm kiếm"]);
}

// Đóng kết nối
$conn->close();
?>
