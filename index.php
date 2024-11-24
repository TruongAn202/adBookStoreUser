<?php
    include_once "model/connectdb.php";
    include_once "model/sanpham.php";
    include_once "model/bantin.php";
    //echo var_dump($newproduct); kiem tra xem ket noi duoc chua
    //connectdb();
    include_once "view/header.php";

    if(isset($_GET['pg'])&&($_GET['pg']!="")){ //pg là biến nếu nó = product thì thực thi lệnh case
        switch ($_GET['pg']) {
            case 'sanpham':
                if(isset($_GET['catalog'])&&($_GET['catalog']>0)){
                    $catalogname="Sản phẩm nam";
                }
                include_once "view/sanpham.php";
                break;
            case 'aboutus':
                include_once "view/aboutus.php";
                break;
            case 'lienhe':
                include_once "view/lienhe.php";
                break;
            case 'bantin':
                $newbantin = getnewbantin();
                //echo var_dump($newbantin);
                include_once "view/bantin.php";
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