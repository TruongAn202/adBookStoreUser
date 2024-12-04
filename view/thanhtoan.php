<div id="content">
    <div id="banner-school">
            <div class="overlay"></div>
            <div id="gr-td-dk">
                <h1 id="duongke">|</h1>
                <h1 id="tieude-banner">Thanh toán</h1> 
            </div>
            
        </div>
        <div id="background">
            <div id="sevices">
              <div id="place">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                  <li class="breadcrumb-item active">Thanh toán</li>
                  
              </ol>
                  <div class="breadcrumb-container">
                    <h4 id="tieude-khoahoc">Thanh toán</h4>
                    <hr class="border border-warning border-3 opacity-75">
                  <br>
                  </div>

                  
            </div>
            <!-- start -->
            <div class="container mt-5">
                <div class="row">
                    <!-- Card Địa chỉ giao hàng -->
                    <div class="col-12 mb-4">
                        <div class="card custom-card">
                            <div class="card-header">
                                <h4>Địa chỉ giao hàng</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="index.php?pg=xacnhanthanhtoan">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Họ và tên người nhận</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ và tên người nhận" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Số điện thoại</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Địa chỉ nhận hàng</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ nhận hàng" required>
                                    </div>

                                    <!-- Card Phương thức vận chuyển -->
                                    <div class="mb-3">
                                        <label for="shipping-method" class="form-label">Phương thức vận chuyển</label>
                                        <select class="form-select" id="shipping-method" name="shipping_method" required>
                                            <option selected value="giaoTietKiem">Giao hàng tiêu chuẩn</option>
                                            <option value="giaoNhanh">Giao hàng nhanh</option>
                                        </select>
                                    </div>
                                    

                                    <!-- Card Phương thức thanh toán -->
                                    <div class="mb-3">
                                        <label for="payment-method" class="form-label">Phương thức thanh toán</label>
                                        <select class="form-select" id="payment-method" name="payment_method" required>
                                            <option value="chuyenkhoan">Online</option>
                                            <option selected value="COD">Tiền mặt khi nhận hàng</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="payment-note" class="form-label">Ghi chú</label>
                                        <textarea class="form-control" id="payment-note" name="payment_note" rows="3" placeholder="Thêm ghi chú cho đơn hàng (nếu có)"></textarea>
                                    </div>

                                    <!-- Kiểm tra lại đơn hàng -->
                                    <h4>Kiểm tra lại đơn hàng</h4>
                                    <?php
                                    if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                                        $i = 0;
                                        foreach ($_SESSION['giohang'] as $item) {
                                            extract($item);
                                            $linkdel = "index.php?pg=delcart&ind=" . $i;
                                            // Tính tổng tiền của sản phẩm (số lượng * giá khuyến mãi)
                                            $totalPrice = $soLuong * $giaKM;
                                            ?>
                                            <div class="col-12">
                                                <div class="card custom-card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- Cột 1: Ảnh sách -->
                                                            <div class="col-md-4">
                                                                <img src="view/layout/assets/image/<?php echo $anh; ?>" alt="<?php echo $tenSach; ?>" class="img-fluid">
                                                            </div>

                                                            <!-- Cột 2: Tên sách và đơn giá -->
                                                            <div class="col-md-4">
                                                                <h5 class="card-title"><?php echo $tenSach; ?></h5>
                                                                <p class="card-text">Đơn giá: <span class="price"><?php echo number_format($giaKM, 0, ',', '.') . 'đ'; ?></span></p>
                                                            </div>

                                                            <!-- Cột 3: Số lượng, tổng cộng -->
                                                            <div class="col-md-4">
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="qty">
                                                                        <p><strong>Số lượng:</strong> <?php echo $soLuong; ?></p>
                                                                    </div>
                                                                    <div class="total">
                                                                        <p>Tổng cộng: <span id="total-price"><?php echo number_format($totalPrice, 0, ',', '.') . 'đ'; ?></span></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $i++;
                                        }
                                    } else {
                                        echo '<p>Giỏ hàng của bạn đang trống.</p>';
                                    }
                                    ?>

                                    <!-- Tính tổng tất cả sản phẩm -->
                                    <?php
                                        $totalAmount = 0; // Khởi tạo biến tổng tiền

                                        // Kiểm tra nếu giỏ hàng có sản phẩm
                                        if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                                            // Duyệt qua tất cả sản phẩm trong giỏ hàng
                                            foreach ($_SESSION['giohang'] as $item) {
                                                // Tính tổng tiền của sản phẩm (giá * số lượng)
                                                $totalAmount += $item['giaKM'] * $item['soLuong'];
                                            }
                                        }
                                    ?>
                                    <!-- End tính tổng -->
                                    <div class="d-flex justify-content-end">
                                        <div class="total-amount text-end fs-3 fw-bold">
                                            <span>Tổng cộng: </span>
                                            <span id="total-price" class="text-success fs-3"><?php echo number_format($totalAmount, 0, ',', '.') . 'đ'; ?></span>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-12 text-center mt-3 mb-3">
                                        <button type="submit" class="btn btn-primary">Xác nhận thanh toán</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <!-- end -->
        </div>
     </div>
</div>