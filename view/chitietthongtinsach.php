<div id="content">
        <div id="banner-school">
            <div class="overlay"></div>
            <div id="gr-td-dk">
                <h1 id="duongke">|</h1>
                <h1 id="tieude-banner"><?= $tenSach ?></h1>
            </div>
            
        </div>
        <div id="background">
            <div  class="sevices-chitietsach">
                <div id="place">
                    <p>Trang chủ > Mua sách > <?= $tenSach ?> </p>
                    <hr style="border-color: #666666;">
                    <br>
                </div>
                <div id="top-tt">
                    <div class="image-container">
                        <img src="view/layout/assets/image/<?= $anh ?>" alt="Product Image" width="400" height="400" id="product-image">
                    </div>
                    <!-- Thẻ div chứa thông tin -->
                    <div class="info-container">
                        <!-- Thẻ div chứa tiêu đề -->
                        <div class="title">
                            <h4><?= $tenSach ?></h4>
                                <!-- Thông tin và giá -->
                                <div class="ql-price">
                                    <div class="price"><?= number_format($giaKM, 0, ',', '.') ?>đ</div>
                                    <div class="old-price"><?= number_format($gia, 0, ',', '.') ?>đ</div>
                                </div>
                        </div>
                        <!-- Thẻ div chứa thông tin người bán -->
                        <div class="seller-info">
                            <p><?= $tenTG ?></p>
                        <!-- Thẻ div chứa thông tin chi tiết sản phẩm -->
                        <div class="product-details">
                            <p><?= $moTa?>...</p>
                            
                        </div>
                        <!-- Thẻ div chứa số lượng và button -->
                        <div class="tangiam">
                            
                        </div>
                        <!-- Thẻ div chứa button mua ngay và thêm vào giỏ -->
                        <div class="hanhdong">
                            <!-- <button class="buy-now">Mua Ngay</button> -->
                             <?php
                              echo '<form action="index.php?pg=addcart" method="post">
                                            <input type="hidden" value="'.$maSach.'" name="maSach">
                                            <input type="hidden" value="'.$tenSach.'" name="tenSach">
                                            <input type="hidden" value="'.$anh.'" name="anh">
                                            <input type="hidden" value="'.$giaKM.'" name="giaKM">
                                            <input type="hidden" value="'.$gia.'" name="gia">
                                            <input type="hidden" value="'.$tenTG.'" name="tenTG">
                                            <input type="hidden" value="1" name="soLuong">
                                            <input type="submit" value="Thêm vào giỏ" name="btnaddcart" class="add-to-cart">
                                        </form>';
                             ?>
                            <!-- <button class="add-to-cart">Thêm vào giỏ</button> -->
                        </div>
                    </div>
                </div>
               
            </div>
            <div id="lo-trinh" class="info-container">
                <h5>Mô tả</h5>
                <div>
                  <?= $moTaDayDu ?>
                </div>
                <!-- <ul>
                    <li>Thành thạo các thao tác, các hàm, câu lệnh nâng cao trong Excel</li>
                    <li>Nắm được các thủ thuật Excel giúp tăng tốc thao tác của bạn</li>
                    <li>Áp dụng được ngay các kiến thức đã học vào công việc tổng hơp, phân tích và xử lý dữ liệu</li>
                    <li>Nâng cao được năng suất và hiệu quả công việc của bạn ngay lập tức</li>
                    <li>Được hỗ trợ giải đáp thắc mắc của giảng viên trong quá trình học tập</li>
                </ul> -->
                <!-- <h3>Lộ trình của khóa học</h3>
                <div class="course-timeline">
                    <div class="step">
                        <div class="step-number">1</div>
                        <div class="step-info">Giới thiệu tổng quan</div>
                        <div class="step-time"> 11:00:02</div>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-info">Giới thiệu về Excel</div>
                        <div class="step-time"> 11:00:02</div>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <div class="step-info">Tổng kết</div>
                        <div class="step-time"> 11:00:02</div>
                    </div>
                    
                </div> -->
            </div>
            <!-- <div id="danh-gia" class="info-container">
                <h3>Đánh giá của học viên</h3>
                <div class="review">
                    <div class="comment">
                       
                        <img src="view/layout/assets/image/danhgia1.png" alt="Hình ảnh đánh giá">
                        <img src="view/layout/assets/image/danhgia2.png" alt="Hình ảnh đánh giá">
                    </div>
                </div>
            </div> -->
            <div class="cauhoi-thuonggap">
                <h3>Các câu hỏi thường gặp</h3>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                          Làm thế nào để dổi trả sách ? 
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Gọi hotline : +08008008</div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                          Cách liên hệ CSKH ? 
                        </button>
                      </h2>
                      <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Gọi hotline : +08008008</div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                          Sách đảm bảo 100% thật không ?
                        </button>
                      </h2>
                      <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Gọi hotline : +08008008</div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>