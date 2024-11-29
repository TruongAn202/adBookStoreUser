<?php
    function checkUser($username, $password) {
        // Kết nối đến cơ sở dữ liệu
        $conn = connectdb();
    
        try {
            // Tạo prepared statement với điều kiện vaiTro = 'user'
            $stmt = $conn->prepare("
                SELECT vaiTro 
                FROM roleadminuser 
                WHERE username = :username 
                  AND password = :password 
                  AND vaiTro = 'user'
            ");
            
            // Gán giá trị cho các tham số
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            
            // Thực thi câu lệnh
            $stmt->execute();
            
            // Lấy kết quả
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Kiểm tra kết quả và trả về vai trò nếu tồn tại
            if ($result) {
                return $result['vaiTro']; // Chỉ trả về 'user'
            } else {
                return 0; // Trả về 0 nếu không tìm thấy người dùng hợp lệ
            }
        } catch (PDOException $e) {
            // Xử lý lỗi nếu có
            echo "Error: " . $e->getMessage();
            return 0; // Trả về 0 nếu có lỗi
        }
    }


   function getUserInfo($username, $password) {
    // Kết nối đến cơ sở dữ liệu
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM roleadminuser WHERE username = '".$username."' AND password = '".$password."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll(); // trả về tất cả (hiển thị)
    $conn=null; //đóng kết nối
    return $kq;
    
}

    

?>