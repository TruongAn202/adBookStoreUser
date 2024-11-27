<div id="content">
        <div id="banner-school">
            <div class="overlay"></div>
            <div id="gr-td-dk">
                <h1 id="duongke">|</h1>
                <h1 id="tieude-banner">GIỎ HÀNG</h1>
            </div>
            
        </div>
        <div id="background-ctgh">
            <div id="sevices">
              <div id="place">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                  <li class="breadcrumb-item active">Giỏ hàng</li>
                  
              </ol>
                  <div class="breadcrumb-container">
                    <h4 id="tieude-khoahoc">Giỏ hàng</h4>
                    <hr class="border border-warning border-3 opacity-75">
                  <br>
                  </div>
            </div>
                
                
                <div class="container">
                    <?php
                        if(isset($_SESSION['giohang'])&&is_array($_SESSION['giohang'])){
                            $i=0;
                            foreach ($_SESSION['giohang'] as $item) { //su dung mang da tao ben trang index
                                extract($item);
                                $linkdel="index.php?pg=delcart&ind=".$i; //xoa theo $ind la xoa theo chỉ mục(index)
                                echo '<div class="card mb-3 col-lg-8">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img id="ImgSpChitietgiohang" src="view/layout/assets/image/'.$anh.'" class="img-fluid rounded-start" alt="">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body"> 
                                                <h4 class="card-title">'.$tenSach.'</h4>
                                                <p class="card-text">'.$tenTG.'</p>
                                                <div class="ql-tanggiam-price">
                                                    <div class="tangiam">
                                                        <button class="decrease qtybtn">-</button>
                                                        <input type="text" value="'.$soLuong.'" id="hienthi">
                                                        <button class="increase qtybtn">+</button>
                                                    </div>
                                                    <div class="ql-price">
                                                        <div class="price">'.$giaKM.'</div>
                                                        <div class="old-price">1.000.000đ</div>
                                                    </div>
                                                </div>
                                                <!-- Thêm icon xóa ở đây -->
                                                <a href="'.$linkdel.'" class="delete-item" title="Xóa sản phẩm">
                                                    <i class="fas fa-trash-alt"></i> <!-- Biểu tượng font-awesome -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                $i++;
                            }
                            
                        }
                    ?>
                
                    <div class="right col-lg-4">
                        <h4>Hóa đơn</h4>
                        <ul>
                        <li><div>Giảm giá</div><div id="tien-hd1">Không áp dụng</div></li>
                        <hr>
                        <li><div>Mã giảm giá</div><div id="tien-hd1">Không áp dụng</div></li>
                        <hr>
                        <li><div>Tổng cộng</div><div id="tien-hd"></div></li>
                        </ul>
                        <button>THANH TOÁN</button>
                    </div>
                </div>
                
                <h3>Có thể bạn sẽ thích</h3>
                <div id="product-1" class="product-container">
                    
                  <div class="product ">
                    <div class="product-image">
                        <img src="view/layout/assets/image/GreatBig.jpg" alt="">
                        <button class="product-button">THÊM VÀO GIỎ</button>
                    </div>
                    <div class="product-info">
                        <!-- Thông tin và giá -->
                        <p><a href="/information/thongtin.html" onclick="selectCourse(courseData1)">Great Big Beautiful Life</a></p>
                        <div class="mo-ta">Signed A&D Exclusive Edition</div>
                        <div class="tac-gia">Emily Henry</div>
                        <div class="ql-price">
                            <div class="price">299.000đ</div>
                            <div class="old-price">700.000đ</div>
                        </div>
                    </div>
                </div>
                    <div class="product ">
                      <div class="product-image">
                          <img src="view/layout/assets/image/OnyxStorm.jpg" alt="">
                          <button class="product-button">THÊM VÀO GIỎ</button>
                      </div>
                      <div class="product-info">
                          <!-- Thông tin và giá -->
                          <p><a href="/information/thongtin.html" onclick="selectCourse(courseData2)">Onyx Storm</a></p>
                          <div class="mo-ta">Deluxe Limited Edition</div>
                          <div class="tac-gia">Rebecca Yarros</div>
                          <div class="ql-price">
                              <div class="price">499.000đ</div>
                              <div class="old-price">1.100.000đ</div>
                          </div>
                      </div>
                  </div>
                  <div class="product ">
                    <div class="product-image">
                        <img src="view/layout/assets/image/TheKnightandtheMoth.jpg" alt="">
                        <button class="product-button">THÊM VÀO GIỎ</button>
                    </div>
                    <div class="product-info">
                        <!-- Thông tin và giá -->
                        <p><a href="/information/thongtin.html" onclick="selectCourse(courseData3)">The Knight and the Moth</a></p>
                        <div class="mo-ta"> A&D Exclusive Edition</div>
                        <div class="tac-gia">Rachel Gillig</div>
                        <div class="ql-price">
                            <div class="price">99.000đ</div>
                            <div class="old-price">199.000đ</div>
                        </div>
                    </div>
                </div>
                <div class="product">
                  <div class="product-image">
                      <img src="view/layout/assets/image/9781668052273_p0_v2_s600x595.jpg" alt="">
                      <button class="product-button">THÊM VÀO GIỎ</button>
                  </div>
                  <div class="product-info">
                      <!-- Thông tin và giá -->
                      <p><a href="/information/thongtin.html" onclick="selectCourse(courseData12)">War</a></p>
                      <div class="mo-ta"> A&D Book Club Edition</div>
                      <div class="tac-gia">  Bob Woodward</div>
                      <div class="ql-price">
                          <div class="price">800.000đ</div>
                          <div class="old-price">1.500.000đ</div>
                      </div>
                  </div>
              </div>
                <div class="product ">
                  <div class="product-image">
                      <img src="view/layout/assets/image/SunriseontheReaping.jpg" alt="">
                      <button class="product-button">THÊM VÀO GIỎ</button>
                  </div>
                  <div class="product-info">
                      <!-- Thông tin và giá -->
                      <p><a href="/information/thongtin.html" onclick="selectCourse(courseData16)">Sunrise on the Reaping</a></p>
                      <div class="mo-ta"> A Hunger Games Novel</div>
                      <div class="tac-gia">Suzanne Collins</div>
                      <div class="ql-price">
                          <div class="price">99.000đ</div>
                          <div class="old-price">199.000đ</div>
                      </div>
                  </div>
              </div>

                </div>
                <!-- <button id="prevButton">Qua trái</button>
                <button id="nextButton">Qua phải</button> -->
            </div>
        </div>
    </div>
    <script>
                // Lấy giá trị từ class 'price' và chuyển đổi thành số
        const priceElement = document.querySelector('.price'); // Lấy phần tử đầu tiên có class 'price'
        const pricePerUnit = parseFloat(priceElement.textContent.trim().replace(/[^\d.-]/g, '')); // Chuyển chuỗi thành số
        console.log(pricePerUnit); // Kiểm tra giá trị số đã chuyển đổi

        // Lấy các phần tử DOM cần thiết
        const decreaseBtn = document.querySelector('.decrease');
        const increaseBtn = document.querySelector('.increase');
        const quantityInput = document.getElementById('hienthi');
        const totalPriceElement = document.getElementById('tien-hd');

        // Đặt sự kiện click cho nút giảm
        decreaseBtn.addEventListener('click', function() {
            let currentQuantity = parseInt(quantityInput.value) || 1;
            if (currentQuantity > 1) {
                currentQuantity--;
                quantityInput.value = currentQuantity;
                updateTotalPrice(currentQuantity);
            }
        });

        // Đặt sự kiện click cho nút tăng
        increaseBtn.addEventListener('click', function() {
            let currentQuantity = parseInt(quantityInput.value) || 1;
            currentQuantity++;
            quantityInput.value = currentQuantity;
            updateTotalPrice(currentQuantity);
        });

        // Cập nhật tổng giá trị hóa đơn dựa trên số lượng
        function updateTotalPrice(quantity) {
            const totalPrice = quantity * pricePerUnit;
            totalPriceElement.textContent = formatCurrency(totalPrice);
        }

        // Hàm định dạng số tiền thành chuỗi có định dạng tiền tệ
        function formatCurrency(amount) {
            return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(amount);
        }

        // Cập nhật giá trị tổng giá trị ban đầu
        updateTotalPrice(parseInt(quantityInput.value)); 

                            
    </script>