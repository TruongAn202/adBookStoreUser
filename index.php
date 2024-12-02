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
            case 'login': //key này lấy du lieu khi click vao nut dang nhap tren from
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
            case 'delcart':
                if(isset($_GET['ind'])&&($_GET['ind']>=0)){
                    array_splice($_SESSION['giohang'], $_GET['ind'], 1);//(mang su dung, xoa theo chi muc(ind), xoa bao nhieu phan tu)
                    header('location: index.php?pg=chitietgiohang'); //vi dung session nen phai load lai
                }              
                break;
            case 'chitietgiohang':
                include_once "view/chitietgiohang.php";
                break;
            case 'addcart':
                if(isset($_POST['btnaddcart'])){
                    $maSach=$_POST['maSach'];
                    $tenSach=$_POST['tenSach'];
                    $anh=$_POST['anh'];
                    $soLuong=$_POST['soLuong'];
                    $giaKM=$_POST['giaKM'];
                    $gia=$_POST['gia'];
                    $tenTG=$_POST['tenTG'];
                    $sach=["maSach"=>$maSach, "tenSach"=>$tenSach, "anh"=>$anh, "soLuong"=>$soLuong, "giaKM"=>$giaKM, "tenTG"=>$tenTG, "gia"=>$gia];
                    $_SESSION['giohang'][]=$sach;
                    header('location: index.php?pg=chitietgiohang');
                }
                break;
            case 'thanhtoan':
                include_once "view/thanhtoan.php";
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