<?php
    session_start();
    ob_start(); // tránh lỗi header();
    
    include_once "model/connectdb.php";
    include_once "model/sanpham.php";
    include_once "model/bantin.php";
    include_once "model/loaisanpham.php";
    include_once "model/user.php";
    //echo var_dump($newproduct); kiem tra xem ket noi duoc chua
    //connectdb();
    include_once "view/header.php";
    if(isset($_GET['pg'])&&($_GET['pg']!="")){ //pg là biến nếu nó = product thì thực thi lệnh case
        switch ($_GET['pg']) {
            case 'sanpham':
                if(isset($_GET['maloai'])&&($_GET['maloai']!="")){ //maloai nay la trên url chứ không phải trong csdl nên ko cần : maLoai
                    $maLoai=$_GET['maloai'];
                    
                }else{
                    $maLoai='';
                }

                //var_dump($maLoai); 

                $sanpham_list=getproduct($maLoai);
                $loaisach_list=get_loaisach(); //lấy loại sách để hiển thị danh mục bên trang sản phẩm
                include_once "view/sanpham.php";
                break;
            case 'aboutus':
                include_once "view/aboutus.php";
                break;
            case 'dangky':
                include_once "view/dangky.php";
                break;
            case 'dangnhap':
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
            case 'login':
                if(isset($_POST['login'])&&($_POST['login'])){ // nếu phuong thuc này tồn tại && được click(nó đúng)
                    $username=$_POST['user']; //user lấy bên form trang dangnhap.php
                    $password=$_POST['pass'];
                    $kq=getUserInfo($username, $password);
                    
                    $role=$kq[0]['vaiTro'];
                    if (!empty($kq) && $kq[0]['vaiTro'] === 'user'){
                        $_SESSION['vaiTro']=$role;
                        $_SESSION['iduser']=$kq[0]['email'];
                        $_SESSION['username']=$kq[0]['username'];
                        header('location: index.php'); // load lại trang thì session mới hiểu
                        break;
                    }
                }
                
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
                    $tenTG=$_POST['tenTG'];
                    $sach=["maSach"=>$maSach, "tenSach"=>$tenSach, "anh"=>$anh, "soLuong"=>$soLuong, "giaKM"=>$giaKM, "tenTG"=>$tenTG];
                    $_SESSION['giohang'][]=$sach;
                    header('location: index.php?pg=chitietgiohang');
                }
                break;
            default: //gõ tầm bậy auto vào home
                //$newproduct=getnewproduct();
                //echo var_dump($newproduct);
                include_once "view/home.php";
                break;
        }
        
    }else{
        //$newproduct=getnewproduct();
        //echo var_dump($newproduct);
        include_once "view/home.php";
    }
    include_once "view/footer.php";
?>