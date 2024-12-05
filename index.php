<?php
    session_start();
    ob_start(); // tránh lỗi header();
    
    include_once "model/connectdb.php";
    include_once "model/sanpham.php";
    include_once "model/bantin.php";
    include_once "model/loaisanpham.php";
    include_once "model/user.php";
    include_once "model/chitietthongtinsach.php";
    include_once "model/home.php";
    //echo var_dump($newproduct); kiem tra xem ket noi duoc chua
    //connectdb();
    include_once "view/header.php";
    if(isset($_GET['pg'])&&($_GET['pg']!="")){ //pg là biến nếu nó = product thì thực thi lệnh case
        switch ($_GET['pg']) {
            case 'sanpham':
                // Lấy tham số từ URL
                $maLoai = isset($_GET['category']) && !empty($_GET['category']) ? $_GET['category'] : [];//ma loai cua khung tìm kiếm , neu ko co thì ở hàm đã setup mặc định rỗng
                $searchKeyword = isset($_GET['search']) ? trim($_GET['search']) : '';
                $giaTien = isset($_GET['price']) ? $_GET['price'] : '';
                $danhMucLoaiSach = isset($_GET['category']) ? $_GET['category'] : [];
                // Nếu có từ khóa tìm kiếm, lọc theo từ khóa và loại
                if (!empty($searchKeyword)) {
                    $sanpham_list = searchProducts($searchKeyword, $maLoai);
                } else {
                    if (!empty($danhMucLoaiSach) && !empty($giaTien)) {
                        // Lọc theo cả loại sản phẩm và giá
                        $sanpham_list = getFilteredProducts($danhMucLoaiSach, $giaTien);
                    } elseif (!empty($danhMucLoaiSach)) {
                        // Lọc chỉ theo loại sản phẩm
                        $sanpham_list = getFilteredProducts($danhMucLoaiSach, '');
                    } elseif (!empty($giaTien)) {
                        // Lọc chỉ theo giá
                        $sanpham_list = getFilteredProducts([], $giaTien);
                    } else {
                        // Nếu không có gì (không lọc), lấy tất cả sản phẩm
                        $sanpham_list = getFilteredProducts([], '');
                    }
                    
                }
                // Lấy danh sách loại sách để hiển thị
                $loaisach_list = get_loaisach();
                // Bao gồm view sản phẩm
                include_once "view/sanpham.php";
                break;            
            case 'thongtintk':
                if (isset($_SESSION['username'])) {
                    // Người dùng đã đăng nhập, hiển thị trang thông tin tài khoản
                    include_once "view/thongtintk.php";
                }else {
                    // Chuyển hướng người dùng đến trang đăng nhập nếu chưa đăng nhập
                    header("Location: index.php?pg=dangnhap");
                }
                break;
            case 'chitiethoadon': 
                if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
                    $email = $_SESSION['email'];            
                    $conn = connectdb(); //ko co cai nay khng ket noi duoc
                    // Lấy thông tin hóa đơn theo email
                    $sql_hd = $conn->prepare("SELECT * FROM hoadon WHERE email = :email");
                    $sql_hd->bindParam(':email', $email, PDO::PARAM_STR);
                    $sql_hd->execute();

                    if ($sql_hd->rowCount() > 0) {
                        // Lấy tất cả hóa đơn của người dùng
                        $hoadon = $sql_hd->fetchAll(PDO::FETCH_ASSOC);
                        
                        // Lấy chi tiết các hóa đơn
                        $chitiethoadon = [];
                        foreach ($hoadon as $hd) {
                            $maHD = $hd['maHD'];  // Lấy maHD của từng hóa đơn
                            $sql_cthd = $conn->prepare("SELECT ct.maSach, s.tenSach, ct.soLuong, ct.donGia 
                                                        FROM chitiethoadon ct 
                                                        JOIN sach s ON ct.maSach = s.maSach 
                                                        WHERE ct.maHD = :maHD");
                            $sql_cthd->bindParam(':maHD', $maHD, PDO::PARAM_STR);
                            $sql_cthd->execute();
                            
                            if ($sql_cthd->rowCount() > 0) {
                                $chitiethoadon[] = $sql_cthd->fetchAll(PDO::FETCH_ASSOC);
                            } else {
                                $chitiethoadon[] = [];  // Trường hợp không có chi tiết cho hóa đơn
                            }
                        }
                    } else {
                        echo "Không tìm thấy hóa đơn cho email này.";
                        // Optionally, handle the case where no orders are found
                    }
                } else {
                    echo "Email không hợp lệ.";
                }
                include_once "view/chitiethoadon.php";
                break;
            case 'chucmungthanhtoan':
                if (isset($_GET['maHD']) && !empty($_GET['maHD'])) {
                    $maHD = $_GET['maHD'];
                    //var_dump($maHD); // Kiểm tra xem maHD có nhận đúng giá trị hay không

                    // Kiểm tra xem người dùng đã đăng nhập hay chưa
                    $isLoggedIn = isset($_SESSION['email']); // Giả sử bạn lưu email trong session khi người dùng đăng nhập

                    // Truy vấn cơ bản không bao gồm roleadminuser
                    $sql = "
                        SELECT *
                        FROM 
                            hoadon h
                        JOIN 
                            chitiethoadon c ON h.maHD = c.maHD
                        JOIN 
                            sach s ON c.maSach = s.maSach
                    ";

                    // Nếu người dùng đã đăng nhập, thêm JOIN với roleadminuser
                    if ($isLoggedIn) {
                        $sql .= " 
                        JOIN 
                            roleadminuser r ON h.email = r.email
                        ";
                    }

                    $sql .= " WHERE h.maHD = '$maHD'";

                    // Lấy dữ liệu từ hàm get_all
                    $result = get_all($sql);
                    
                    if ($result) {
                        $hoadon = $result[0]; // Lấy phần tử đầu tiên trong mảng kết quả
                        //var_dump($hoadon);
                        // Truy vấn chi tiết hóa đơn 
                        $sql_cthd = "SELECT * FROM chitiethoadon WHERE maHD = '$maHD'";
                        $chitiethoadon = get_all($sql_cthd);

                        // Chuyển đến trang chúc mừng thanh toán và truyền dữ liệu vào
                        include_once "view/chucmungthanhtoan.php";
                    } else {
                        echo "Mã hóa đơn không hợp lệ hoặc không tồn tại.";
                    }
                } else {
                    echo "Mã hóa đơn không hợp lệ.";
                }
                break;

            case 'dangky':
                if (isset($_POST['dangky']) && $_POST['dangky']) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $confirm_password = $_POST['confirm_password'];
            
                    // Kiểm tra mật khẩu khớp nhau
                    if ($password !== $confirm_password) {
                        $error = "Mật khẩu và nhập lại mật khẩu không khớp!";
                        include_once "view/dangky.php";
                        break;
                    }
            
                    // Kiểm tra email đã tồn tại chưa
                    $sql = "SELECT * FROM roleadminuser WHERE email = '$email'";
                    $result = get_all($sql);
            
                    if (!empty($result)) {
                        $error = "Email đã tồn tại!";
                        include_once "view/dangky.php";
                        break;
                    }
            
                    // Mã hóa mật khẩu
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
                    // Lưu thông tin người dùng vào database
                    $sql = "INSERT INTO roleadminuser (email, username, `password`) 
                            VALUES ('$email', '$username', '$hashed_password')";
                    $conn = connectdb();
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
            
                    $success = "Đăng ký thành công! Bạn sẽ được chuyển về trang đăng nhập trong giây lát.";
                    
                }
                include_once "view/dangky.php";
                break;
                
            case 'dangnhap': //trang dang nhap khi click vao các nút đăng nhập
                include_once "view/dangnhap.php";
                break;
            case 'dangxuat':
                unset($_SESSION['vaiTro']);
                unset($_SESSION['iduser']);
                unset($_SESSION['username']);
                unset($_SESSION['giohang']); 
                header('location: index.php');
                break;   
            case 'lienhe':
                include_once "view/lienhe.php";
                break;
            case 'aboutus':
                include_once "view/aboutus.php";
                break;
            case 'chitietthongtinsach':
                if (isset($_GET['maSach']) && !empty($_GET['maSach'])) { //neu ma sach ton tai(<a href="index.php?pg=chitietthongtinsach&maSach='.$maSach.'">'.$tenSach.'</a>)
                    $maSach = $_GET['maSach'];                   
                    // Gọi hàm lấy thông tin sách
                    $sach = getChiTietSach($maSach);
                    if ($sach) {
                        $tenSach = $sach['tenSach']; //lay tu biến $sach đã được truy vấn từ csdl, phần tử key = tenSach(tên cột trong CSDL)
                        $gia = number_format($sach['gia']);
                        $giaKM = number_format($sach['giaKM']);
                        $tenTG = $sach['tenTG'];
                        $anh = $sach['anh'];
                        $moTa = $sach['moTa'];
                        $moTaDayDu = $sach['moTaDayDu'];
                        
                    } else {
                        echo "Không tìm thấy thông tin sách.";
                    }
                } else {
                    // Nếu không có mã sách trong URL
                    echo "Mã sách không hợp lệ.";
                }
                include_once "view/chitietthongtinsach.php";
                break;
            case 'login': //key này lấy du lieu khi click vao nut dang nhap tren from cua trang dangnhap
                if (isset($_POST['login']) && $_POST['login']) {
                    $username = $_POST['user']; 
                    $password = $_POST['pass']; 
                    
                    // Gọi hàm getUserInfo để lấy thông tin
                    $kq = getUserInfo($username);
                    
                    if (!empty($kq)) { // Kiểm tra nếu kết quả không rỗng
                        $hashedPassword = $kq[0]['password']; // Lấy mật khẩu đã mã hóa từ CSDL(câu sql chỉ trả về 1 phần tử thì đương nhiên là pt thứ 0)
                        
                        if (password_verify($password, $hashedPassword)) { //kiểm tra xem pass lấy từ form có giống với password đã dùng hàm mã trong csdl không
                            // Đăng nhập thành công
                            $_SESSION['vaiTro'] = $kq[0]['vaiTro'];
                            $_SESSION['iduser'] = $kq[0]['email'];
                            $_SESSION['username'] = $kq[0]['username']; // Đảm bảo không có lỗi
                            $_SESSION['email'] = $kq[0]['email'];
                            $_SESSION['diachi'] = $kq[0]['diaChi'];
                            $_SESSION['sdt'] = $kq[0]['soDienThoai'];
                            unset($_SESSION['giohang']); //khi dang nhap thanh cong thi xoa gio hang khi chua dang nhap, chi khi nao đặt hàng thành cong mới luu vao csdl, còn chưa đặt hàng thì xóa hết
                            // header('location: index.php');
                            $successDN = "Đăng nhập thành công, xin chờ giây lát chuyển về trang chủ!";
                        } else {
                            // Mật khẩu sai
                            $errorDN = "Mật khẩu không chính xác!";
                            
                        }
                    } else {
                        // Không tìm thấy tài khoản
                        $errorDN = "Tên đăng nhập không tồn tại!";
                        
                    }
                }
                include_once "view/dangnhap.php";
                
            case 'bantin':
                $newbantin = getnewbantin(); //getnewbantin() này ở bantin.php bên model(câu lệnh sql)
                //echo var_dump($newbantin);
                include_once "view/bantin.php";
                break;
            case 'delcart': //xóa sp trong giỏ
                if(isset($_GET['ind'])&&($_GET['ind']>=0)){
                    array_splice($_SESSION['giohang'], $_GET['ind'], 1);//(mang su dung, xoa theo chi muc(ind), xoa bao nhieu phan tu)
                    header('location: index.php?pg=chitietgiohang'); //vi dung session nen phai load lai
                }              
                break;
            case 'chitietgiohang': //trang gio hang
                $sachDeCu_List = getProductHomeDeCu();
                include_once "view/chitietgiohang.php";
                break;
            case 'addcart': //nút thêm san pham
                if (!isset($_SESSION['giohang'])) {
                    $_SESSION['giohang'] = [];
                }
                if (isset($_POST['btnaddcart'])) {
                    $maSach = $_POST['maSach'];
                    $tenSach = $_POST['tenSach'];
                    $anh = $_POST['anh'];
                    $giaKM = $_POST['giaKM'];
                    $gia = $_POST['gia'];
                    $tenTG = $_POST['tenTG'];
                    $soLuong = $_POST['soLuong'];
                    // Kiểm tra sản phẩm có trong giỏ hàng chưa
                    $found = false;
                    foreach ($_SESSION['giohang'] as &$item) {
                        if ($item['maSach'] === $maSach) {
                            $item['soLuong'] += $soLuong; // Tăng số lượng
                            $found = true;
                            break;
                        }
                    }
                    // Nếu chưa có sản phẩm, thêm sản phẩm mới
                    if (!$found) {
                        $_SESSION['giohang'][] = [
                            'maSach' => $maSach,
                            'tenSach' => $tenSach,
                            'anh' => $anh,
                            'giaKM' => $giaKM,
                            'gia' => $gia,
                            'tenTG' => $tenTG,
                            'soLuong' => $soLuong
                        ];
                    }
                    header('Location: index.php?pg=chitietgiohang');
                }
                break;
            case 'updateCart':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['decrease']) || isset($_POST['increase'])) {
                        $index = isset($_POST['decrease']) ? $_POST['decrease'] : $_POST['increase']; // Lấy chỉ số sản phẩm từ form
                        $soLuong = $_POST['soLuong']; // Lấy số lượng từ input

                        // Kiểm tra giỏ hàng có tồn tại và là mảng
                        if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])) {
                            $product = &$_SESSION['giohang'][$index]; // Lấy sản phẩm từ giỏ hàng theo index

                            // Xử lý tăng hoặc giảm số lượng
                            if (isset($_POST['decrease']) && $product['soLuong'] > 1) {
                                $product['soLuong']--; // Giảm số lượng
                            } elseif (isset($_POST['increase'])) {
                                $product['soLuong']++; // Tăng số lượng
                            }

                            // Sau khi cập nhật số lượng, chuyển hướng về trang giỏ hàng
                            header('Location: index.php?pg=chitietgiohang');
                            exit;
                        }
                    }
                }
                break;
            case 'thanhtoan':
                include_once "view/thanhtoan.php";
                break;
            case 'xacnhanthanhtoan':
                // Kiểm tra giỏ hàng trống
                if (empty($_SESSION['giohang'])) {
                    // Xử lý khi giỏ hàng trống
                    echo "Giỏ hàng của bạn trống. Vui lòng thêm sản phẩm vào giỏ hàng.";
                    exit;
                }

                // Lấy thông tin từ form thanh toán
                $email = $_SESSION['email'];
                $tenNguoiNhan = isset($_POST['name']) ? trim($_POST['name']) : '';
                $diaChiNguoiNhan = isset($_POST['address']) ? trim($_POST['address']) : '';
                $soDienThoai = isset($_POST['phone']) ? trim($_POST['phone']) : '';
                $phuongThucGiaoHang = isset($_POST['shipping_method']) ? $_POST['shipping_method'] : '';
                $phuongThucThanhToan = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';
                $ghiChu = isset($_POST['payment_note']) ? trim($_POST['payment_note']) : '';
                $ngayLapHD = date('Y-m-d'); // Lấy ngày hiện tại

                // Tạo mã hóa đơn duy nhất
                $maHD = uniqid('HD');

                // Kết nối cơ sở dữ liệu
                $conn = connectdb();

                // Lưu thông tin hóa đơn vào database
                $sql_hoadon = "INSERT INTO hoadon (maHD, email, tenNguoiNhan, diaChiNguoiNhan, soDienThoaiHD, ngayLapHD, phuongThucGiaoHang, phuongThucThanhToan, ghiChu) 
                            VALUES (:maHD, :email, :tenNguoiNhan, :diaChiNguoiNhan, :soDienThoai, :ngayLapHD, :phuongThucGiaoHang, :phuongThucThanhToan, :ghiChu)";
                $stmt = $conn->prepare($sql_hoadon);
                $stmt->execute([
                    ':maHD' => $maHD,
                    ':email' => $email,
                    ':tenNguoiNhan' => $tenNguoiNhan,
                    ':diaChiNguoiNhan' => $diaChiNguoiNhan,
                    ':soDienThoai' => $soDienThoai,
                    ':ngayLapHD' => $ngayLapHD,
                    ':phuongThucGiaoHang' => $phuongThucGiaoHang,
                    ':phuongThucThanhToan' => $phuongThucThanhToan,
                    ':ghiChu' => $ghiChu
                ]);

                // Lưu chi tiết hóa đơn từ giỏ hàng
                foreach ($_SESSION['giohang'] as $item) {
                    $maSach = $item['maSach'];
                    $soLuong = $item['soLuong'];
                    $donGia = $item['giaKM'] > 0 ? $item['giaKM'] : $item['gia']; // Kiểm tra giá khuyến mãi

                    $sql_chitiethd = "INSERT INTO chitiethoadon (maHD, maSach, soLuong, donGia) 
                                    VALUES (:maHD, :maSach, :soLuong, :donGia)";
                    $stmt = $conn->prepare($sql_chitiethd);
                    $stmt->execute([
                        ':maHD' => $maHD,
                        ':maSach' => $maSach,
                        ':soLuong' => $soLuong,
                        ':donGia' => $donGia
                    ]);
                }

                // Xóa giỏ hàng sau khi thanh toán thành công
                unset($_SESSION['giohang']);

                // Chuyển hướng tới trang xác nhận thanh toán
                header("Location: index.php?pg=chucmungthanhtoan&maHD=$maHD");
                exit;
                break;
            default: //gõ tầm bậy auto vào home
                //$newproduct=getnewproduct();
                //echo var_dump($newproduct);
                include_once "view/home.php";
                break;
        }
        
    }else{
        $sachXemNhieu_List = getProductHomeXemNhieu();
        $sachMuaNhieu_List = getProductHomeMuaNhieu();
        $sachDeCu_List = getProductHomeDeCu();
        $sachHot_List = getProductHomeHot();
        include_once "view/home.php";
    }
    include_once "view/footer.php";

?>