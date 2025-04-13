<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "dbbookstore1";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die(json_encode(["error" => "Kết nối thất bại: " . $conn->connect_error]));
}

$result = $conn->query("
    SELECT 
        s.*, 
        tg.tenTG, 
        l.tenLoai 
    FROM sach s
    JOIN tacgia tg ON s.maTG = tg.maTG
    JOIN loaisach l ON s.maLoai = l.maLoai
");

if ($result->num_rows > 0) {
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    echo json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(["message" => "Không có dữ liệu"]);
}

$conn->close();
?>
