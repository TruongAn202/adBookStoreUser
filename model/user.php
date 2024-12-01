<?php
    function checkUser($username, $password) {
       //code
    }


//    function getUserInfo($username, $password) {
    
//     $conn=connectdb();
//     $stmt = $conn->prepare("SELECT * FROM roleadminuser WHERE username = '".$username."' AND password = '".$password."'");
//     $stmt->execute();
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $kq=$stmt->fetchAll(); // trả về tất cả (hiển thị)
//     $conn=null; //đóng kết nối
//     return $kq;
// }
function getUserInfo($username) {
    // Kết nối đến cơ sở dữ liệu
    $conn = connectdb();
    
    // Sử dụng Prepared Statements để tránh SQL Injection
    $stmt = $conn->prepare("SELECT * FROM roleadminuser WHERE username = '".$username."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll(); // trả về tất cả (hiển thị)
    $conn=null; //đóng kết nối
    return $kq;
}
    

?>