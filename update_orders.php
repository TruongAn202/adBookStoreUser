<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Kết nối database
$servername = "localhost";
$username = "root";
$password = "";
$database = "dbbookstore1";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die(json_encode(["message" => "Connection failed: " . $conn->connect_error]));
}

// Lấy email từ request (Flutter gửi lên)
$email = isset($_GET['email']) ? $_GET['email'] : '';

if (empty($email)) {
    die(json_encode(["message" => "Missing email parameter"]));
}

// Truy vấn lấy danh sách đơn hàng theo email
$sql = "
   SELECT h.maHD, h.trangThaiHD, h.ngayLapHD, h.phuongThucThanhToan, h.phuongThucGiaoHang, h.ngayNhan,
           ct.soLuong, ct.donGia, s.tenSach, s.maSach, s.anh, h.tenNguoiNhan, h.diaChiNguoiNhan, h.soDienThoaiHD
    FROM hoadon h
    LEFT JOIN chitiethoadon ct ON h.maHD = ct.maHD
    LEFT JOIN sach s ON ct.maSach = s.maSach
    WHERE h.email = ? AND (h.trangThaiHD = 'dagiao' OR h.trangThaiHD = 'danggiao' OR h.trangThaiHD = 'choxuly')
    ORDER BY h.ngayLapHD DESC 
";

$stmt = $conn->prepare($sql);
if ($stmt === false) {  
    die(json_encode(["message" => "SQL prepare error: " . $conn->error]));
}

$stmt->bind_param("s", $email);
if (!$stmt->execute()) {
    die(json_encode(["message" => "SQL execute error: " . $stmt->error]));
}

$result = $stmt->get_result();
$orders = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Tách chuỗi ảnh nếu có nhiều ảnh được lưu dạng "img1.jpg,img2.jpg"
        if (!empty($row['anh'])) {
            $row['anh'] = explode(',', $row['anh']);
        } else {
            $row['anh'] = []; // Trả về mảng rỗng nếu không có ảnh
        }
        $orders[] = $row;
    }
    echo json_encode(["status" => "success", "data" => $orders], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(["status" => "error", "message" => "No orders found"]);
}

$stmt->close();
$conn->close();
?>
