<div id="content">
    <div id="banner-school">
            <div class="overlay"></div>
            <div id="gr-td-dk">
                <h1 id="duongke">|</h1>
                <h1 id="tieude-banner">ĐĂNG NHẬP</h1> 
            </div>
            
        </div>
        <div id="background">
            <div id="sevices">
              <div id="place">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                  <li class="breadcrumb-item active">Đăng nhập</li>
                  
              </ol>
                  <div class="breadcrumb-container">
                    <h4 id="tieude-khoahoc">Đăng nhập</h4>
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
                                <form method="POST" action="process_payment.php">
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
                                    <!-- <div class="mb-3">
                                        <label for="country" class="form-label">Quốc gia</label>
                                        <select class="form-select" id="country" name="country" required>
                                            <option selected>Việt Nam</option>
                                        </select>
                                    </div> -->
                                    <!-- <div class="mb-3">
                                        <label for="city" class="form-label">Tỉnh/Thành Phố</label>
                                        <select class="form-select" id="city" name="city" required>
                                            <option selected>Chọn tỉnh/thành phố</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="district" class="form-label">Quận/Huyện</label>
                                        <select class="form-select" id="district" name="district" required>
                                            <option selected>Chọn quận/huyện</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ward" class="form-label">Phường/Xã</label>
                                        <select class="form-select" id="ward" name="ward" required>
                                            <option selected>Chọn phường/xã</option>
                                        </select>
                                    </div> -->
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Card Phương thức vận chuyển -->
                    <div class="col-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <h4>Phương thức vận chuyển</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="process_payment.php">
                                    <div class="mb-3">
                                        <label for="shipping-method" class="form-label">Phương thức vận chuyển</label>
                                        <select class="form-select" id="shipping-method" name="shipping_method" required>
                                            <option selected>Chọn phương thức vận chuyển</option>
                                            <option value="1">Giao hàng tiêu chuẩn</option>
                                            <option value="2">Giao hàng nhanh</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="note" class="form-label">Ghi chú</label>
                                        <textarea class="form-control" id="note" name="note" rows="3" placeholder="Thêm ghi chú cho đơn hàng (nếu có)"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Card Phương thức thanh toán -->
                    <div class="col-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <h4>Phương thức thanh toán</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="process_payment.php">
                                    <div class="mb-3">
                                        <label for="payment-method" class="form-label">Phương thức thanh toán</label>
                                        <select class="form-select" id="payment-method" name="payment_method" required>
                                            <option selected>Chọn phương thức thanh toán</option>
                                            <option value="1">Online</option>
                                            <option value="2">Tiền mặt khi nhận hàng</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="payment-note" class="form-label">Ghi chú</label>
                                        <textarea class="form-control" id="payment-note" name="payment_note" rows="3" placeholder="Thêm ghi chú cho đơn hàng (nếu có)"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Kiểm tra lại đơn hàng -->
                    <div class="col-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <h4>Kiểm tra lại đơn hàng</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Cột 1: Ảnh sách -->
                                    <div class="col-md-4">
                                        <img src="path_to_image.jpg" alt="Tên sách" class="img-fluid">
                                    </div>

                                    <!-- Cột 2: Tên sách và đơn giá -->
                                    <div class="col-md-4">
                                        <h5 class="card-title">Tên sách</h5>
                                        <p class="card-text">Đơn giá: <span class="price">300.000đ</span></p>
                                    </div>

                                    <!-- Cột 3: Số lượng, tổng cộng -->
                                    <div class="col-md-4">
                                        <div class="d-flex justify-content-between">
                                            <div class="qty">
                                                <p><strong>Số lượng:</strong> 1</p> <!-- Hiển thị số lượng cố định -->
                                            </div>
                                            <div class="total">
                                                <p>Tổng cộng: <span id="total-price">300.000đ</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-12 text-center mt-3 mb-3">
                        <button type="submit" class="btn btn-primary">Xác nhận thanh toán</button>
                    </div>

                </div>
            </div>

             <!-- end -->
        </div>
     </div>
</div>