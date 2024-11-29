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
                  <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                  <li class="breadcrumb-item active">Đăng nhập</li>
                  
              </ol>
                  <div class="breadcrumb-container">
                    <h4 id="tieude-khoahoc">Đăng ký</h4>
                    <hr class="border border-warning border-3 opacity-75">
                  <br>
                  </div>
            </div>
            <!-- s -->
            <div class="container d-flex justify-content-center align-items-center">
                <div class="card shadow" style="width: 400px;">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Đăng ký</h3>
                        <form action="index.php?pg=register" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Tên người dùng</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Nhập tên người dùng" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Địa chỉ mail</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Nhập email của bạn" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Nhập mật khẩu của bạn" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Xác nhận mật khẩu</label>
                                <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Nhập lại mật khẩu" required>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">Tôi đồng ý với các <a href="#">Điều khoản dịch vụ</a>.</label>
                            </div>
                            <div class="d-grid gap-2">
                                <input type="submit" name="register" class="btn btn-color-dangnhap" value="Đăng ký">
                            </div>
                        </form>
                        <div class="mt-3 text-center">
                            <small>Đã có tài khoản? <a href="index.php?pg=login">Đăng nhập</a></small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- s -->
        </div>
    </div>