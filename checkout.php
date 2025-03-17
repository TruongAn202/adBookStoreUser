<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "dbbookstore1";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die(json_encode(["error" => "Kết nối thất bại: " . $conn->connect_error]));
}

// Nhận dữ liệu từ Flutter (JSON)
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['email']) || !isset($data['tenNguoiNhan']) || !isset($data['diaChiNguoiNhan']) ||
    !isset($data['soDienThoaiHD']) || !isset($data['phuongThucThanhToan']) || !isset($data['phuongThucGiaoHang'])) {
    echo json_encode(["success" => false, "message" => "Thiếu thông tin đơn hàng"]);
    exit;
}

// Lấy dữ liệu từ request
$email = $data['email'];
$tenNguoiNhan = $data['tenNguoiNhan'];
$diaChiNguoiNhan = $data['diaChiNguoiNhan'];
$soDienThoaiHD = $data['soDienThoaiHD'];
$phuongThucThanhToan = $data['phuongThucThanhToan']; // "COD" hoặc "chuyenkhoan"
$phuongThucGiaoHang = $data['phuongThucGiaoHang']; // "giaoNhanh" hoặc "giaoTietKiem"
$trangThaiHD = "choxuly"; // Trạng thái mặc định khi tạo đơn hàng
$ngayLapHD = date("Y-m-d");

// Tạo mã hóa đơn ngẫu nhiên
$maHD = "HD" . uniqid();

// Chèn dữ liệu vào bảng `hoadon`
$sql = "INSERT INTO hoadon (maHD, email, tenNguoiNhan, diaChiNguoiNhan, soDienThoaiHD, ngayLapHD, trangThaiHD, phuongThucThanhToan, phuongThucGiaoHang) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $maHD, $email, $tenNguoiNhan, $diaChiNguoiNhan, $soDienThoaiHD, $ngayLapHD, $trangThaiHD, $phuongThucThanhToan, $phuongThucGiaoHang);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Thanh toán thành công!", "maHD" => $maHD]);
} else {
    echo json_encode(["success" => false, "message" => "Lỗi khi tạo hóa đơn: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
