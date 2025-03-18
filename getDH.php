<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "dbbookstore1";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Lỗi kết nối: " . $conn->connect_error]);
    exit;
}

if (!isset($_GET['email']) || empty($_GET['email'])) {
    echo json_encode(["success" => false, "message" => "Thiếu email"]);
    exit;
}

$email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);

$sql = "SELECT maHD, ngayLapHD, trangThaiHD, phuongThucThanhToan, phuongThucGiaoHang 
        FROM hoadon WHERE email = ? ORDER BY ngayLapHD DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$orders = ["delivered" => [], "pending" => []];

while ($row = $result->fetch_assoc()) {
    if ($row["trangThaiHD"] == "Đã giao") {
        $orders["delivered"][] = $row;
    } elseif ($row["trangThaiHD"] == "Chờ xử lý" || $row["trangThaiHD"] == "Đang giao") {
        $orders["pending"][] = $row;
    }
}

echo json_encode(["success" => true, "orders" => $orders]);

$stmt->close();
$conn->close();
?>
