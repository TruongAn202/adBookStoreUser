<?php
    $loaisachlist = '';
    foreach ($loaisach_list as $item) {
        extract($item);
        $linksanpham = 'index.php?pg=sanpham&maloai=' . urlencode($maLoai) . '#product-section'; //thêm #product-section để lọc => tải lại trang =>tự chuyển đến #product-section
        $loaisachlist .= '<li><a href="' . $linksanpham . '">' . $tenLoai . '</a></li>';
    }
?>
<div id="content">
        <div id="banner-school">
            <div class="overlay"></div>
            <div id="gr-td-dk">
                <h1 id="duongke">|</h1>
                <h1 id="tieude-banner">MUA SÁCH</h1>
            </div>
            
        </div>
        <div id="background-KH">
        <div id="product-section">
            <div id="sevices">
                <div id="place">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                      <li class="breadcrumb-item active">Mua sách</li>
                      
                  </ol>
                      <div class="breadcrumb-container">
                        <h4 id="tieude-khoahoc">Danh mục các thể loại sách</h4>
                        <hr class="border border-warning border-3 opacity-75">
                      <br>
                      </div>
                </div>
                
                <div id="danh-muc">
                    <ul class="horizontal-list">
                        <!-- hiển thị kết quả vòng for ở đầu trang -->
                        <?=$loaisachlist?> 
                    </ul>
                </div>
            
                <div id="product-1">
                    <?php
                        $sanphamlist='';
                        foreach ($sanpham_list as $item) {
                            extract($item);
                            $sanphamlist.='<div class="product " > 
                        <div class="product-image">
                            <img src="view/layout/assets/image/'.$anh.'" alt="">
                            <form action="index.php?pg=addcart" method="post">
                                <input type="hidden" value="'.$maSach.'" name="maSach" >
                                <input type="hidden" value="'.$tenSach.'" name="tenSach" >
                                <input type="hidden" value="'.$anh.'" name="anh" >
                                <input type="hidden" value="'.$giaKM.'" name="giaKM" >
                                <input type="hidden" value="'.$tenTG.'" name="tenTG" >
                                <input type="hidden" value="1" name="soLuong" >
                                <input type="submit" value="Thêm vào giỏ" name="btnaddcart" >
                            </form> 
                        </div>
                        <div class="product-info">
                            <!-- Thông tin và giá -->
                             <!-- thay đổi courseData để gọi từng thông tin khác nhau = JSon -->
                            <p><a href="/information/thongtin.html" onclick="selectCourse(courseData)">'.$tenSach.'</a></a>
                            </p>
                            <div class="mo-ta"> '.$tenNXB.' </div>
                            <div class="tac-gia"> '.$tenTG.'</div>
                            <div class="ql-price">
                                <div class="price">'.$giaKM.'đ</div>
                                <div class="old-price">'.$gia.'đ</div>
                                <br>
                            </div>
                        </div>
                    </div>';
                        }
                        echo $sanphamlist; 
                    ?>
                </div>
            
                <div class="button-container">
                    <button onclick="selectButton(this)">&lt; </button>
                    <button class="selected" onclick="selectButton(this)">1</button>
                    <button onclick="selectButton(this)">2</button>
                    <button onclick="selectButton(this)">...</button>
                    <button onclick="selectButton(this)">&gt;</button>
                    
                </div>
            </div>
        </div>
        </div>
    </div>