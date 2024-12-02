<?php
    // function getProductHome($maLoai=''){
    //       $sql = "SELECT sach.*, 
    //                tacgia.tenTG, 
    //                nhaxuatban.tenNXB, 
    //                loaisach.tenLoai 
    //         FROM sach
    //         JOIN tacgia ON sach.maTG = tacgia.maTG
    //         JOIN nhaxuatban ON sach.maNXB = nhaxuatban.maNXB
    //         JOIN loaisach ON sach.maLoai = loaisach.maLoai
    //         WHERE 1";
    //       if($maLoai>0){
    //         $sql.=" AND maLoai=".$maLoai;  //nối chuỗi, tách câu sql ra để thêm điều kiện
    //       }
    //       $sql.=" ORDER BY maSach DESC"; 
    //         return get_all($sql);
    // }

    function getProductHomeMuaNhieu(){
        $sql = "SELECT sach.*, 
                       tacgia.tenTG, 
                       nhaxuatban.tenNXB, 
                       loaisach.tenLoai 
                FROM sach
                JOIN tacgia ON sach.maTG = tacgia.maTG
                JOIN nhaxuatban ON sach.maNXB = nhaxuatban.maNXB
                JOIN loaisach ON sach.maLoai = loaisach.maLoai
                WHERE trangThai = 'muanhieu'";    
        $sql .= " ORDER BY sach.maSach DESC LIMIT 5"; 
        return get_all($sql);
    }
    
    function getProductHomeXemNhieu(){
        $sql = "SELECT sach.*, 
                       tacgia.tenTG, 
                       nhaxuatban.tenNXB, 
                       loaisach.tenLoai 
                FROM sach
                JOIN tacgia ON sach.maTG = tacgia.maTG
                JOIN nhaxuatban ON sach.maNXB = nhaxuatban.maNXB
                JOIN loaisach ON sach.maLoai = loaisach.maLoai
                WHERE trangThai = 'xemnhieu'";    
        $sql .= " ORDER BY sach.maSach DESC LIMIT 5"; 
        return get_all($sql);
    }
    function getProductHomeHot(){
        $sql = "SELECT sach.*, 
                 tacgia.tenTG, 
                 nhaxuatban.tenNXB, 
                 loaisach.tenLoai 
          FROM sach
          JOIN tacgia ON sach.maTG = tacgia.maTG
          JOIN nhaxuatban ON sach.maNXB = nhaxuatban.maNXB
          JOIN loaisach ON sach.maLoai = loaisach.maLoai
          WHERE trangThai = 'hot'";
        $sql.=" ORDER BY maSach DESC"; 
          return get_all($sql);
    }
    function getProductHomeDeCu(){
        $sql = "SELECT sach.*, 
                 tacgia.tenTG, 
                 nhaxuatban.tenNXB, 
                 loaisach.tenLoai 
          FROM sach
          JOIN tacgia ON sach.maTG = tacgia.maTG
          JOIN nhaxuatban ON sach.maNXB = nhaxuatban.maNXB
          JOIN loaisach ON sach.maLoai = loaisach.maLoai
          WHERE trangThai = 'decu'"; 
        $sql.=" ORDER BY maSach DESC"; 
          return get_all($sql);
    }

?>