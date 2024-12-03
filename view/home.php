<div id="content">
        <div id="banner">
            <p id="banner-tren">HÀNH TRÌNH VẠN DẶM BẮT ĐẦU TỪ 1 TRANG SÁCH</p> 
            <br>
            <p id="banner-duoi">HÃY ĐỂ CHÚNG TÔI DẪN LỐI CHO BẠN</p>
           <ul>
                <li>
                    <i class="fa-solid fa-graduation-cap"></i>
                    <a href="">5000+ độc giả đã chọn chúng tôi.</a>
                </li>
                <li>
                    <i class="fa-solid fa-book-open-reader"></i>
                    <a href="">Hàng nghìn tựa sách phong phú đang chờ bạn khám phá.</a>
                </li>
                <li>
                    <i class="fa-solid fa-paper-plane"></i>
                    <a href="">Mua mọi lúc, mọi nơi chỉ cần có internet.</a>
                </li>
           </ul>
           <div class="container">
                <div class="row">
                    <div class="marquee-container col-12">
                        <div class="icon">
                            <img src="view/layout/assets/image/promote.gif" alt="">
                        </div>
                        <div class="marquee">
                            <div class="marquee-content">
                                <span><span class="badge text-bg-danger">Cực hot!!!</span><a class="link-offset-2 link-underline link-underline-opacity-0" href="#"> Giảm 50% cho người mới</a></span>
                                <span><span class="badge text-bg-danger">Cực hot!!!</span><a class="link-offset-2 link-underline link-underline-opacity-0" href="#"> Giảm 99% cho người cũ</a></span>
                                <span><span class="badge text-bg-danger">Cực hot!!!</span><a class="link-offset-2 link-underline link-underline-opacity-0" href="#"> Tuần lễ vàng</a></span>
                                <span><span class="badge text-bg-danger">Cực hot!!!</span><a class="link-offset-2 link-underline link-underline-opacity-0" href="#"> Đăng nhập để mua giá ưu đãi</a></span>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
        <div id="background">
            <div class="container-khauhieu">
                <div class="card">
                    <img src="view/layout/assets/image/score.gif" alt="">
                    <p>SIÊU RẺ</p>
                </div>
                <div class="card">
                    <img src="view/layout/assets/image/quality-assurance.gif" alt="">
                    <p> 100% HÀNG THẬT</p>
                </div>
                <div class="card">
                    <img src="view/layout/assets/image/accelerometer-sensor.gif" alt="">
                    <p>FREE SHIP</p>
                </div>
                <div class="card">
                    <img src="view/layout/assets/image/notifications.gif" alt="">
                    <p>30 NGÀY ĐỔI TRẢ</p>
                </div>
            </div>
            <div id="sevices" class="container">
                
                <div class="breadcrumb-container">
                    <h3>Các cuốn sách được mua nhiều nhất tuần qua</h3>
                    <hr id="the-hr-home" class="border border-warning border-3 opacity-75">
                </div>
                
                <span>Các cuốn sách được thống kê là đã bán nhiều nhất</span>

                <div id="product-1" >
                    
                    <?php
                        $sachXemNhieuList='';
                        foreach ($sachXemNhieu_List as $item) {
                            extract($item);
                            echo '<div class="product " > 
                                    <div class="product-image">
                                        <img src="view/layout/assets/image/'.$anh.'" alt="">
                                        <form action="index.php?pg=addcart" method="post">
                                            <input type="hidden" value="'.$maSach.'" name="maSach">
                                            <input type="hidden" value="'.$tenSach.'" name="tenSach">
                                            <input type="hidden" value="'.$anh.'" name="anh">
                                            <input type="hidden" value="'.$giaKM.'" name="giaKM">
                                            <input type="hidden" value="'.$gia.'" name="gia">
                                            <input type="hidden" value="'.$tenTG.'" name="tenTG">
                                            <input type="hidden" value="1" name="soLuong">
                                            <input type="submit" value="Thêm vào giỏ" name="btnaddcart" class="product-button">
                                        </form> 
                                    </div>
                                    <div class="product-info">
                                        <!-- Thông tin và giá -->
                                        <!-- thay đổi courseData để gọi từng thông tin khác nhau = JSon -->
                                        <p><a href="index.php?pg=chitietthongtinsach&maSach='.$maSach.'">'.$tenSach.'</a></a>
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
                    ?>
                    
                                       
                </div>
                <div class="banner-tinh"> <img src="view/layout/assets/image/returnToTheOne-banner.jpg" alt=""> </div>
                <div class="breadcrumb-container">
                    <h3>Các cuốn sách nổi bật</h3>
                    <hr id="the-hr-home" class="border border-warning border-3 opacity-75">
                </div>
                <span>Những cuốn sách được tìm kiếm nhiều nhất trong tuần này</span>
                <div id="product-1">
                    <?php
                        $sachMuaNhieuList='';
                        foreach ($sachMuaNhieu_List as $item){
                            extract($item);
                            echo '<div class="product"> 
                                        <div class="product-image">
                                            <img src="view/layout/assets/image/'.$anh.'" alt="">
                                            <form action="index.php?pg=addcart" method="post">
                                            <input type="hidden" value="'.$maSach.'" name="maSach">
                                            <input type="hidden" value="'.$tenSach.'" name="tenSach">
                                            <input type="hidden" value="'.$anh.'" name="anh">
                                            <input type="hidden" value="'.$giaKM.'" name="giaKM">
                                            <input type="hidden" value="'.$gia.'" name="gia">
                                            <input type="hidden" value="'.$tenTG.'" name="tenTG">
                                            <input type="hidden" value="1" name="soLuong">
                                            <input type="submit" value="Thêm vào giỏ" name="btnaddcart" class="product-button">
                                        </form> 
                                        </div>
                                        <div class="product-info">
                                            <!-- Thông tin và giá -->
                                            <p><a href="index.php?pg=chitietthongtinsach&maSach='.$maSach.'">'.$tenSach.'</a></p>
                                            <div class="mo-ta">'.$tenNXB.' </div>
                                            <div class="tac-gia">'.$tenTG.'</div>
                                            <div class="ql-price">
                                                <div class="price">'.$giaKM.'đ</div>
                                                <div class="old-price">'.$gia.'đ</div>
                                            </div>
                                        </div>
                                </div>';
                        }
                    ?>
                    
                    
                </div>
                <!-- <div class="navigation-buttons">
                    <button class="prev" onclick="showPreviousProduct()">&#10094; Lùi</button>
                    <button class="next" onclick="showNextProduct()">Tới &#10095;</button>
                </div> -->
                <div class="breadcrumb-container">
                    <h3>Dành cho bạn</h3>
                    <hr id="the-hr-home" class="border border-warning border-3 opacity-75">
                </div>
                <span>Những cuốn sách được tuyển chọn hay nhất cho bạn. </span>
                <div class="carousel-container">
                    <div class="carousel">
                        <div class="slide"><img src="view/layout/assets/image/danhchoban1.jpg" alt="Slide 1"></div>
                        <div class="slide"><img src="view/layout/assets/image/danhchoban2.jpg" alt="Slide 2"></div>
                        <div class="slide"><img src="view/layout/assets/image/danhchoban1.jpg" alt="Slide 3"></div>
                        <div class="slide"><img src="view/layout/assets/image/danhchoban2.jpg" alt="Slide 3"></div>
                        <div class="slide"><img src="view/layout/assets/image/danhchoban1.jpg" alt="Slide 3"></div>
                        <!-- Add more slides as needed -->
                    </div>
                    <button class="prev-btn">&lt;</button>
                    <button class="next-btn">&gt;</button>
                </div>
                <div class="breadcrumb-container">
                    <h3>Tiêu điểm</h3>
                    <hr id="the-hr-home" class="border border-warning border-3 opacity-75">
                </div>
                <span> Những cuốn sách được cho là tiêu điểm gần đây</span>
                <div id="product-1">
                    <?php
                        $sachDeCuList='';
                        foreach ($sachDeCu_List as $item){
                            extract($item);
                            echo '<div class="product">
                                    <div class="product-image">
                                        <img src="view/layout/assets/image/'.$anh.'" alt="">
                                        <form action="index.php?pg=addcart" method="post">
                                            <input type="hidden" value="'.$maSach.'" name="maSach">
                                            <input type="hidden" value="'.$tenSach.'" name="tenSach">
                                            <input type="hidden" value="'.$anh.'" name="anh">
                                            <input type="hidden" value="'.$giaKM.'" name="giaKM">
                                            <input type="hidden" value="'.$gia.'" name="gia">
                                            <input type="hidden" value="'.$tenTG.'" name="tenTG">
                                            <input type="hidden" value="1" name="soLuong">
                                            <input type="submit" value="Thêm vào giỏ" name="btnaddcart" class="product-button">
                                        </form> 
                                    </div>
                                    <div class="product-info">
                                        <!-- Thông tin và giá -->
                                        <p><a href="index.php?pg=chitietthongtinsach&maSach='.$maSach.'">'.$tenSach.'</a></p>
                                        <div class="mo-ta">'.$tenNXB.'</div>
                                        <div class="tac-gia">'.$tenTG.' </div>
                                        <div class="ql-price">
                                            <div class="price">'.$giaKM.'đ</div>
                                            <div class="old-price">'.$gia.'đ</div>
                                        </div>
                                    </div>
                                </div>';
                        }
                    ?>
                    
                </div>
                <div class="breadcrumb-container">
                    <h3>Dành cho bạn</h3>
                    <hr id="the-hr-home" class="border border-warning border-3 opacity-75">
                </div>
                <span>Những cuốn sách hay </span>
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <img src="view/layout/assets/image/30778_Skinny_Hero_B_Nook_Frost_Blue_10_16_24.jpg" />
                    </div>
                    <div class="mySlides fade">
                        <img src="view/layout/assets/image/30648_Skinny_1_GOTY_10_10_24.jpg" />
                    </div>
                    <div class="mySlides fade">
                        <img src="view/layout/assets/image/30777_SkinnyHero_PuzzleMonth_10_15_24.jpg" />
                    </div>
                
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    <div class="dots-container">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                        <span class="dot" onclick="currentSlide(4)"></span>
                        <span class="dot" onclick="currentSlide(5)"></span>
                    </div>
                </div>
                <br />
              
    
                <div class="breadcrumb-container">
                    <h3>Những cuốn sách tốt nhất</h3>
                    <hr id="the-hr-home" class="border border-warning border-3 opacity-75">
                </div>
                <span>Những cuốn sách được tuyển chọn hay nhất cho bạn.</span>
                <div id="product-1">
                    <?php
                        $sachHotList='';
                        foreach ($sachHot_List as $item){
                            extract($item);
                            echo ' <div class="product">
                                        <div class="product-image">
                                            <img src="view/layout/assets/image/'.$anh.'" alt="">
                                            <form action="index.php?pg=addcart" method="post">
                                            <input type="hidden" value="'.$maSach.'" name="maSach">
                                            <input type="hidden" value="'.$tenSach.'" name="tenSach">
                                            <input type="hidden" value="'.$anh.'" name="anh">
                                            <input type="hidden" value="'.$giaKM.'" name="giaKM">
                                            <input type="hidden" value="'.$gia.'" name="gia">
                                            <input type="hidden" value="'.$tenTG.'" name="tenTG">
                                            <input type="hidden" value="1" name="soLuong">
                                            <input type="submit" value="Thêm vào giỏ" name="btnaddcart" class="product-button">
                                        </form> 
                                        </div>
                                        <div class="product-info">
                                            <!-- Thông tin và giá -->
                                            <p><a href="index.php?pg=chitietthongtinsach&maSach='.$maSach.'">'.$tenSach.'</a></p>
                                            <div class="mo-ta"> '.$tenNXB.'</div>
                                            <div class="tac-gia">  '.$tenTG.'</div>
                                            <div class="ql-price">
                                                <div class="price">'.$giaKM.'đ</div>
                                                <div class="old-price">'.$gia.'đ</div>
                                            </div>
                                        </div>
                                    </div>';
                        }
                    ?>
                   
                    
                </div>
            </div>
        </div>
    </div>