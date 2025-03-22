<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "dbbookstore1";

// Kết nối tới cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Lỗi kết nối: " . $conn->connect_error]);
    exit;
}

// Nhận dữ liệu JSON từ Flutter
$data = json_decode(file_get_contents("php://input"), true);

// Kiểm tra JSON hợp lệ
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(["success" => false, "message" => "Lỗi JSON: " . json_last_error_msg()]);
    exit;
}

// Kiểm tra dữ liệu đầu vào
$requiredFields = ['email', 'tenNguoiNhan', 'diaChiNguoiNhan', 'soDienThoaiHD', 
                   'phuongThucThanhToan', 'phuongThucGiaoHang', 'giohang'];

foreach ($requiredFields as $field) {
    if (!isset($data[$field]) || empty($data[$field])) {
        error_log("Thiếu thông tin: $field, giá trị nhận được: " . json_encode($data[$field]));
        echo json_encode(["success" => false, "message" => "Thiếu thông tin: $field"]);
        exit;
    }
}

// Lấy dữ liệu từ request và kiểm tra
$email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
$tenNguoiNhan = htmlspecialchars($data['tenNguoiNhan']);
$diaChiNguoiNhan = htmlspecialchars($data['diaChiNguoiNhan']);
$soDienThoaiHD = htmlspecialchars($data['soDienThoaiHD']);
$phuongThucThanhToan = htmlspecialchars($data['phuongThucThanhToan']);
$phuongThucGiaoHang = htmlspecialchars($data['phuongThucGiaoHang']);
$giohang = $data['giohang'];  // Giỏ hàng từ Flutter

$trangThaiHD = "choxuly"; 
$ngayLapHD = date("Y-m-d");

// Tạo mã hóa đơn an toàn
$maHD = "HD" . date('Ymd') . sprintf('%04d', mt_rand(0, 9999));

// Thực hiện truy vấn INSERT hóa đơn
$sql = "INSERT INTO hoadon (maHD, email, tenNguoiNhan, diaChiNguoiNhan, 
            soDienThoaiHD, ngayLapHD, trangThaiHD, phuongThucThanhToan, phuongThucGiaoHang) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(["success" => false, "message" => "Lỗi chuẩn bị truy vấn: " . $conn->error]);
    exit;
}

$stmt->bind_param("sssssssss", $maHD, $email, $tenNguoiNhan, $diaChiNguoiNhan, $soDienThoaiHD, $ngayLapHD,
         $trangThaiHD, $phuongThucThanhToan, $phuongThucGiaoHang);

if (!$stmt->execute()) {
    echo json_encode(["success" => false, "message" => "Lỗi khi tạo hóa đơn: " . $stmt->error]);
    exit;
}

// Lưu chi tiết hóa đơn từ giỏ hàng
foreach ($giohang as $item) {
    $maSach = $item['maSach']; // Lấy mã sách từ giỏ hàng
    $soLuong = (int) $item['soLuong'];

    // Truy vấn lấy giá và giá khuyến mãi của sản phẩm
    $sql_getGia = "SELECT gia, giaKM FROM sach WHERE maSach = ?";
    $stmt_getGia = $conn->prepare($sql_getGia);
    if (!$stmt_getGia) {
        error_log("Lỗi chuẩn bị truy vấn lấy giá sản phẩm: " . $conn->error);
        echo json_encode(["success" => false, "message" => "Lỗi chuẩn bị truy vấn lấy giá sản phẩm: " . $conn->error]);
        exit;
    }

    $stmt_getGia->bind_param("s", $maSach);
    $stmt_getGia->execute();
    $result = $stmt_getGia->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $gia = (int) $row['gia'];
        $giaKM = (int) $row['giaKM'];

        // Tính giá cho chi tiết hóa đơn: gia*soLuong hoặc giaKM*soLuong
        $donGia = ($giaKM > 0) ? $giaKM : $gia; 
        $donGia = $donGia * $soLuong; // Nhân với số lượng

        // Debug kiểm tra dữ liệu đầu vào
        error_log("Đang thêm vào bảng chitiethoadon: maSach = $maSach, maHD = $maHD, soLuong = $soLuong, donGia = $donGia");

        // Thêm vào bảng chi tiết hóa đơn
        $sql_chitiethd = "INSERT INTO chitiethoadon (maSach, maHD, soLuong, donGia) VALUES (?, ?, ?, ?)";
        $stmt_chitiethd = $conn->prepare($sql_chitiethd);

        if (!$stmt_chitiethd) {
            error_log("Lỗi chuẩn bị truy vấn chitiethoadon: " . $conn->error);
            echo json_encode(["success" => false, "message" => "Lỗi chuẩn bị truy vấn chi tiết hóa đơn: " . $conn->error]);
            exit;
        }

        $stmt_chitiethd->bind_param("ssii", $maSach, $maHD, $soLuong, $donGia);

        if (!$stmt_chitiethd->execute()) {
            error_log("Lỗi khi INSERT chitiethoadon: " . $stmt_chitiethd->error);
            echo json_encode([ 
                "success" => false, 
                "message" => "Lỗi khi lưu chi tiết hóa đơn: " . $stmt_chitiethoadon->error,
                "query" => "INSERT INTO chitiethoadon (maSach, maHD, soLuong, donGia) VALUES ('$maSach', '$maHD', '$soLuong', '$donGia')",
                "data" => [
                    "maSach" => $maSach,
                    "maHD" => $maHD,
                    "soLuong" => $soLuong,
                    "donGia" => $donGia
                ]
            ]);
            exit;
        }

        // Debug kiểm tra từng lần insert
        error_log("Đã INSERT thành công vào chitiethoadon: maSach = $maSach, maHD = $maHD");
    } else {
        error_log("Sản phẩm maSach = $maSach không tìm thấy trong cơ sở dữ liệu.");
        echo json_encode(["success" => false, "message" => "Sản phẩm không tồn tại"]);
        exit;
    }

    $stmt_getGia->close();
}

echo json_encode(["success" => true, "message" => "Đặt hàng thành công!", "maHD" => $maHD]);

$stmt->close();
$stmt_chitiethd->close();
$conn->close();
?>
