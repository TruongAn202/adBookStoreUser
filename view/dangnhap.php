<!-- start dang nhap -->
 <!-- Modal for Success (Đăng nhập thành công) -->
<div class="modal fade" id="successDN" tabindex="-1" aria-labelledby="successDNLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="successDNLabel">Thành công</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo isset($successDN) ? $successDN : ''; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Error (Lỗi đăng nhập) -->
<div class="modal fade" id="errorDN" tabindex="-1" aria-labelledby="errorDNLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="errorDNLabel">Lỗi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo isset($errorDN) ? $errorDN : ''; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    <?php if (isset($successDN)): ?>
      var successModal = new bootstrap.Modal(document.getElementById('successDN'));
      successModal.show();
      
      // Chuyển hướng sau 2 giây
      setTimeout(function() {
        window.location.href = "index.php"; // Chuyển về trang index
      }, 2000);
    <?php endif; ?>

    <?php if (isset($errorDN)): ?>
      var errorModal = new bootstrap.Modal(document.getElementById('errorDN'));
      errorModal.show();
    <?php endif; ?>
  });
</script>

 <!-- end dang nhap -->
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
                    <h4 id="tieude-khoahoc">Đăng nhập</h4>
                    <hr class="border border-warning border-3 opacity-75">
                  <br>
                  </div>
            </div>
            <div class="container d-flex justify-content-center align-items-center">
                <div class="card shadow" style="width: 400px;">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Đăng nhập</h3>
                        <form action="index.php?pg=login" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Tên tài khoản</label>
                                <input  name="user" class="form-control" id="email" placeholder="Nhập tên tài khoản của bạn" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" name="pass" class="form-control" id="password" placeholder="Nhập mật khẩu của bạn" required>
                            </div>
                            <div class="d-grid gap-2">
                                <input type="submit" name="login" class="btn btn-color-dangnhap" value="Đăng nhập"></input>
                            </div>
                        </form>
                        <div class="mt-3 text-center">
                        <small>Chưa có tài khoản? <a href="index.php?pg=dangky">Đăng ký</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>