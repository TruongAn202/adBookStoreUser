<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
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

$data = json_decode(file_get_contents("php://input"), true);

// Kiểm tra JSON hợp lệ
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(["success" => false, "message" => "Lỗi JSON: " . json_last_error_msg()]);
    exit;
}

// Kiểm tra dữ liệu đầu vào
$requiredFields = ['email', 'tenNguoiNhan', 'diaChiNguoiNhan', 'soDienThoaiHD', 'phuongThucThanhToan', 'phuongThucGiaoHang'];
foreach ($requiredFields as $field) {
    if (!isset($data[$field]) || empty($data[$field])) {
        echo json_encode(["success" => false, "message" => "Thiếu thông tin: $field"]);
        exit;
    }
}

// Lấy dữ liệu từ request
$email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
$tenNguoiNhan = htmlspecialchars($data['tenNguoiNhan']);
$diaChiNguoiNhan = htmlspecialchars($data['diaChiNguoiNhan']);
$soDienThoaiHD = htmlspecialchars($data['soDienThoaiHD']);
$phuongThucThanhToan = htmlspecialchars($data['phuongThucThanhToan']);
$phuongThucGiaoHang = htmlspecialchars($data['phuongThucGiaoHang']);

$trangThaiHD = "choxuly"; 
$ngayLapHD = date("Y-m-d");

// Tạo mã hóa đơn an toàn hơn
$maHD = "HD" . date('Ymd') . sprintf('%04d', mt_rand(0, 9999));

$sql = "INSERT INTO hoadon (maHD, email, tenNguoiNhan, diaChiNguoiNhan, soDienThoaiHD, ngayLapHD, trangThaiHD, phuongThucThanhToan, phuongThucGiaoHang) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(["success" => false, "message" => "Lỗi chuẩn bị truy vấn: " . $conn->error]);
    exit;
}

$stmt->bind_param("sssssssss", $maHD, $email, $tenNguoiNhan, $diaChiNguoiNhan, $soDienThoaiHD, $ngayLapHD, $trangThaiHD, $phuongThucThanhToan, $phuongThucGiaoHang);

if (!$stmt->execute()) {
    if ($conn->errno == 1062) { // Duplicate entry error
        echo json_encode(["success" => false, "message" => "Mã hóa đơn đã tồn tại, vui lòng thử lại!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Lỗi khi tạo hóa đơn: " . $stmt->error]);
    }
} else {
    echo json_encode(["success" => true, "message" => "Thanh toán thành công!", "maHD" => $maHD]);
}

$stmt->close();
$conn->close();
?>
    