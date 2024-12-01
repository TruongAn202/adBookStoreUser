<?php
    function getChiTietSach($maSach) {
        // Tạo câu SQL với tham số :maSach
        $sql = "SELECT sach.*, 
                       tacgia.tenTG, 
                       nhaxuatban.tenNXB, 
                       loaisach.tenLoai 
                FROM sach
                JOIN tacgia ON sach.maTG = tacgia.maTG
                JOIN nhaxuatban ON sach.maNXB = nhaxuatban.maNXB
                JOIN loaisach ON sach.maLoai = loaisach.maLoai
                WHERE sach.maSach = :maSach"; // Thêm điều kiện cho mã sách
    
        // Kết nối cơ sở dữ liệu và thực thi câu truy vấn
        $conn = connectdb();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':maSach', $maSach, PDO::PARAM_STR);  // Dùng :maSach làm tham số truy vấn
        $stmt->execute();
    
        // Lấy kết quả và đóng kết nối
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $conn = null;  // Đóng kết nối
        return $result;
    }
    
?>