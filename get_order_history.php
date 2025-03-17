<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(200);
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "dbbookstore1";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Kết nối database thất bại"]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $rawData = file_get_contents("php://input");
    $data = json_decode($rawData, true);

    if (!isset($data["email"]) || empty($data["email"])) {
        echo json_encode(["status" => "error", "message" => "Thiếu email"]);
        exit;
    }

    $email = trim($data["email"]);

    $sql = "SELECT 
        chitiethoadon.maSach,
        sach.tenSach,
        sach.anh,
        chitiethoadon.maHD,
        chitiethoadon.soLuong,
        chitiethoadon.DonGia,
        hoadon.ngayLapHD,
        hoadon.trangThaiHD
    FROM chitiethoadon
    JOIN hoadon ON chitiethoadon.maHD = hoadon.maHD
    JOIN sach ON chitiethoadon.maSach = sach.maSach
    JOIN roleadminuser ON hoadon.email = roleadminuser.email
    WHERE roleadminuser.email = ?
    ORDER BY hoadon.ngayLapHD DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $orders = [];
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }

    if (empty($orders)) {
        echo json_encode(["status" => "error", "message" => "Không có lịch sử đơn hàng"]);
    } else {
        echo json_encode(["status" => "success", "orders" => $orders]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Chỉ hỗ trợ phương thức POST"]);
}

$conn->close();
?>
