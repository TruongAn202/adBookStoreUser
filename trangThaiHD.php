<?php
// Kết nối với cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbbookstore1"; // Thay bằng tên cơ sở dữ liệu của bạn

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy dữ liệu từ yêu cầu PUT
$inputData = json_decode(file_get_contents('php://input'), true);

if (isset($inputData['maHD']) && isset($inputData['trangThaiHD']) && isset($inputData['ngayNhan'])) {
    $maHD = $inputData['maHD'];
    $trangThaiHD = $inputData['trangThaiHD'];
    $ngayNhan = $inputData['ngayNhan'];

    // Cập nhật trạng thái đơn hàng và ngày nhận
    $sql = "UPDATE hoadon SET trangThaiHD = ?, ngayNhan = ? WHERE maHD = ?";

    // Chuẩn bị câu lệnh SQL
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $trangThaiHD, $ngayNhan, $maHD);

    // Thực thi câu lệnh SQL
    if ($stmt->execute()) {
        // Cập nhật thành công, lấy thông tin mới của đơn hàng
        $sqlSelect = "SELECT * FROM hoadon WHERE maHD = ?";
        $stmtSelect = $conn->prepare($sqlSelect);
        $stmtSelect->bind_param("s", $maHD);
        $stmtSelect->execute();
        $result = $stmtSelect->get_result();
        $order = $result->fetch_assoc();

        // Trả lại dữ liệu đã cập nhật
        echo json_encode([
            "status" => "success",
            "message" => "Cập nhật đơn hàng thành công.",
            "order" => $order // Trả về thông tin đơn hàng đã cập nhật
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "Cập nhật thất bại."]);
    }

    // Đóng kết nối
    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Dữ liệu đầu vào không hợp lệ."]);
}

$conn->close();
?>
