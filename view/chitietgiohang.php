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
                if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])) {
                    $i = 0;
                    foreach ($_SESSION['giohang'] as $item) {
                        extract($item);
                        $linkdel = "index.php?pg=delcart&ind=" . $i; 
                        echo '<div class="card mb-3 col-lg-8 product-item-hoadon" data-price="' . $giaKM . '">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img id="ImgSpChitietgiohang" src="view/layout/assets/image/' . $anh . '" class="img-fluid rounded-start" alt="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body"> 
                                        <h4 class="card-title">' . $tenSach . '</h4>
                                        <p class="card-text">' . $tenTG . '</p>
                                        <div class="ql-tanggiam-price">
                                            <div class="tangiam">
                                                <button class="decrease qtybtn">-</button>
                                                <input type="text" value="' . $soLuong . '" class="hienthi">
                                                <button class="increase qtybtn">+</button>
                                            </div>
                                            <div class="ql-price">
                                                <div class="price">' . $giaKM . 'đ</div>
                                                <div class="old-price">' . $gia . 'đ</div>
                                            </div>
                                        </div>
                                        <a href="' . $linkdel . '" class="delete-item" title="Xóa sản phẩm">
                                            <i class="fas fa-trash-alt"></i>
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
                    <a  href="index.php?pg=thanhtoan">Thanh toán</a>
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
           document.querySelectorAll('.product-item-hoadon').forEach(function (productItem) {
            const priceElement = productItem.querySelector('.price');
            const pricePerUnit = parseFloat(priceElement.textContent.replace(/[^\d.-]/g, ''));

            const decreaseBtn = productItem.querySelector('.decrease');
            const increaseBtn = productItem.querySelector('.increase');
            const quantityInput = productItem.querySelector('.hienthi');

            decreaseBtn.addEventListener('click', function () {
                let currentQuantity = parseInt(quantityInput.value) || 1;
                if (currentQuantity > 1) {
                    currentQuantity--;
                    quantityInput.value = currentQuantity;
                    updateOverallTotal();
                }
            });

            increaseBtn.addEventListener('click', function () {
                let currentQuantity = parseInt(quantityInput.value) || 1;
                currentQuantity++;
                quantityInput.value = currentQuantity;
                updateOverallTotal();
            });

            function updateOverallTotal() {
                let overallTotal = 0;
                document.querySelectorAll('.product-item-hoadon').forEach(function (item) {
                    const itemPrice = parseFloat(item.querySelector('.price').textContent.replace(/[^\d.-]/g, '')) || 0;
                    const quantity = parseInt(item.querySelector('.hienthi').value) || 1;
                    overallTotal += itemPrice * quantity;
                });
                document.querySelector('#tien-hd').textContent = formatCurrency(overallTotal);
            }

            function formatCurrency(amount) {
                return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(amount);
            }

            updateOverallTotal(); // Cập nhật tổng cộng khi load trang.
        });


                            
    </script>