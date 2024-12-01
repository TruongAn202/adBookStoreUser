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

  //   function getproduct($maLoai = '', $priceRange = '') { //kết hợp lọc theo mã loại, giá
  //     $sql = "SELECT sach.*, 
  //                    tacgia.tenTG, 
  //                    nhaxuatban.tenNXB, 
  //                    loaisach.tenLoai 
  //             FROM sach
  //             JOIN tacgia ON sach.maTG = tacgia.maTG
  //             JOIN nhaxuatban ON sach.maNXB = nhaxuatban.maNXB
  //             JOIN loaisach ON sach.maLoai = loaisach.maLoai
  //             WHERE 1";
  //     if (!empty($maLoai)) {  //nếu có mã loại thì gép mã loại vào
  //         $sql .= " AND sach.maLoai = '$maLoai'";
  //     }
  //     if (!empty($priceRange)) { //có giá thì ghép giá vào câu truy vấn
  //         if ($priceRange == '500000+') {
  //             $sql .= " AND sach.giaKM >= 500000";
  //         } else {
  //             list($minPrice, $maxPrice) = explode('-', $priceRange);
  //             $sql .= " AND sach.giaKM BETWEEN $minPrice AND $maxPrice";
  //         }
  //     }
  //     $sql .= " ORDER BY sach.maSach DESC";
  //     return get_all($sql);
  // }

  function getFilteredProducts($categories = [], $priceRange = '') {
    $sql = "SELECT sach.*, 
                   tacgia.tenTG, 
                   nhaxuatban.tenNXB, 
                   loaisach.tenLoai 
            FROM sach
            JOIN tacgia ON sach.maTG = tacgia.maTG
            JOIN nhaxuatban ON sach.maNXB = nhaxuatban.maNXB
            JOIN loaisach ON sach.maLoai = loaisach.maLoai
            WHERE 1";

    // Lọc theo loại sách (nhiều loại)
    if (!empty($categories)) {
        // Kiểm tra và chuyển các giá trị thành chuỗi nếu cần
        $categoryFilter = "'" . implode("','", $categories) . "'";  // Nối chuỗi và bao quanh bằng dấu nháy đơn
        $sql .= " AND sach.maLoai IN ($categoryFilter)";
    }
    // Lọc theo giá
    if (!empty($priceRange)) {
        if ($priceRange == '500000+') {
            $sql .= " AND sach.giaKM >= 500000";
        } else {
            list($minPrice, $maxPrice) = explode('-', $priceRange);
            $sql .= " AND sach.giaKM BETWEEN $minPrice AND $maxPrice";
        }
    }

    $sql .= " ORDER BY sach.maSach DESC";

    return get_all($sql);
}


  //neu co ma loai thi tìm kiếm gần dung nhung cuon sach theo từ khóa mà có mã loại này
function searchProducts($keyword, $maLoai = '') {
  $sql = "SELECT sach.*, 
                  tacgia.tenTG, 
                  nhaxuatban.tenNXB, 
                  loaisach.tenLoai
          FROM sach
          JOIN tacgia ON sach.maTG = tacgia.maTG
          JOIN nhaxuatban ON sach.maNXB = nhaxuatban.maNXB
          JOIN loaisach ON sach.maLoai = loaisach.maLoai
          WHERE sach.tenSach LIKE '%$keyword%'"; // Lọc theo từ khóa tìm kiếm
  
  // Lọc theo loại sách (nhiều loại)
  // if (!empty($maLoai)) {
  //     // Nếu $maLoai là mảng, nối các giá trị và thêm điều kiện vào SQL
  //     if (is_array($maLoai)) {
  //         $categoryFilter = "'" . implode("','", array_map('strval', $maLoai)) . "'"; // Chuyển mảng thành chuỗi
  //         $sql .= " AND sach.maLoai IN ($categoryFilter)";
  //     } else {
  //         // Nếu chỉ có một loại, xử lý như trước
  //         $sql .= " AND sach.maLoai = '$maLoai'";
  //     }
  // }
  return get_all($sql); // Trả về kết quả tìm kiếm
}



?>