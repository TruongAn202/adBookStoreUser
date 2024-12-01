<?php
    // function getproduct($maLoai=''){
    //   $sql = "SELECT sach.*, 
    //            tacgia.tenTG, 
    //            nhaxuatban.tenNXB, 
    //            loaisach.tenLoai 
    //     FROM sach
    //     JOIN tacgia ON sach.maTG = tacgia.maTG
    //     JOIN nhaxuatban ON sach.maNXB = nhaxuatban.maNXB
    //     JOIN loaisach ON sach.maLoai = loaisach.maLoai
    //     WHERE 1";
    //   if($maLoai>0){
    //     $sql.=" AND maLoai=".$maLoai;  //nối chuỗi, tách câu sql ra để thêm điều kiện
    //   }
    //   $sql.=" ORDER BY maSach DESC"; 



    //     return get_all($sql);
    // }

    function getproduct($maLoai = '') { // phai co  tacgia.tenTG,nhaxuatban.tenNXB, loaisach.tenLoai , nếu ko sẽ lỗi
      $sql = "SELECT sach.*, 
                     tacgia.tenTG, 
                     nhaxuatban.tenNXB, 
                     loaisach.tenLoai 
              FROM sach
              JOIN tacgia ON sach.maTG = tacgia.maTG
              JOIN nhaxuatban ON sach.maNXB = nhaxuatban.maNXB
              JOIN loaisach ON sach.maLoai = loaisach.maLoai
              WHERE 1";
  
      if (!empty($maLoai)) {
          $sql .= " AND sach.maLoai='" . $maLoai . "'"; // Lọc theo maLoai dạng chuỗi
      }
  
      $sql .= " ORDER BY maSach DESC"; // Sắp xếp theo maSach

      return get_all($sql); // Trả về danh sách sản phẩm
  }
  
  function searchProducts($keyword, $maLoai = '') { //phải join các bản thì các biến vi dụ $tenTG mới được tìm thấy, nếu ko sẽ báo lỗi
    $sql = "SELECT sach.*, 
                    tacgia.tenTG, 
                    nhaxuatban.tenNXB, 
                    loaisach.tenLoai
            FROM sach
            JOIN tacgia ON sach.maTG = tacgia.maTG
            JOIN nhaxuatban ON sach.maNXB = nhaxuatban.maNXB
            JOIN loaisach ON sach.maLoai = loaisach.maLoai
            WHERE sach.tenSach LIKE '%$keyword%'"; // Lọc theo từ khóa tìm kiếm
    
    if (!empty($maLoai)) {
        $sql .= " AND sach.maLoai = '$maLoai'"; // Lọc theo loại sách nếu có
    }

    return get_all($sql); // Trả về kết quả tìm kiếm
}


?>