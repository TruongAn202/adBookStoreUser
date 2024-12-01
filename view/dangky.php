<!-- thong bao dang ky -->
<!-- Modal for Success -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="successModalLabel">Thành công</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo isset($success) ? $success : ''; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Error -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="errorModalLabel">Lỗi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo isset($error) ? $error : ''; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    <?php if (isset($success)): ?>
      var successModal = new bootstrap.Modal(document.getElementById('successModal'));
      successModal.show();
      
      // Chuyển hướng sau 2 giây
      setTimeout(function() {
        window.location.href = "index.php?pg=dangnhap";
      }, 2000);
    <?php endif; ?>

    <?php if (isset($error)): ?>
      var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
      errorModal.show();
    <?php endif; ?>
  });
</script>


 <!-- end thong bao dang ky -->
<div id="content">
        <div id="banner-school">
            <div class="overlay"></div>
            <div id="gr-td-dk">
                <h1 id="duongke">|</h1>
                <h1 id="tieude-banner">ĐĂNG KÝ</h1> 
            </div>
            
        </div>
        <div id="background">
            <div id="sevices">
              <div id="place">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                  <li class="breadcrumb-item active">Đăng ký</li>
                  
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
                        <h4 class="card-title text-center mb-4 dangkyh4">Đăng ký</h4>
                        <form action="index.php?pg=dangky" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Tên đăng nhập</label>
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
                                <input type="submit" name="dangky" class="btn btn-color-dangnhap" value="Đăng ký">
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