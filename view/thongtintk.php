
<?php
// Khởi tạo biến
$full_name = "";
$email = "";
$diaChi = "";
$soDienThoai = "";

// Lấy thông tin từ cơ sở dữ liệu
try {
    $conn = connectdb();
    $sql = "SELECT full_name, email, diaChi, soDienThoai FROM roleadminuser WHERE email = :email";
    $stmt = $conn->prepare($sql);
    
    // Giả sử bạn đã có email từ session hoặc tham số GET
    $current_email = isset($_SESSION['email']) ? $_SESSION['email'] : ''; 
    $stmt->bindParam(':email', $current_email);
    $stmt->execute();

    // Lấy dữ liệu người dùng
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        $full_name = $user['full_name'];
        $email = $user['email'];
        $diaChi = $user['diaChi'];
        $soDienThoai = $user['soDienThoai'];
    }
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>

<div id="content">
        <div id="banner-school">
            <div class="overlay"></div>
            <div id="gr-td-dk">
                <h1 id="duongke">|</h1>
                <h1 id="tieude-banner">Thông tin tài khoản</h1> 
            </div>
            
        </div>
        <div id="background">
            <div id="sevices">
              <div id="place">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                  <li class="breadcrumb-item active">Thông tin tài khoản</li>
                  
              </ol>
                  <div class="breadcrumb-container">
                    <h4 id="tieude-khoahoc">Thông tin tài khoản</h4>
                    <hr class="border border-warning border-3 opacity-75">
                  <br>
                  </div>
            </div>

                <div>
                <!-- start -->
                <div class="container my-5">
                    <div class="row">
                    <!-- Sidebar -->
                    <div class="col-md-3">
                        <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">Thông tin tài khoản</a>
                        <a href="index.php?pg=chitiethoadon" class="list-group-item list-group-item-action">Đơn hàng của tôi</a>
                   
                        </div>
                    </div>

                    <!-- Main Content -->
                    <div class="col-md-9">
                        
                        <div class="profile-form">
                        <form method="POST" action="index.php?pg=suaThongTinTK">
                            <div class="form-section">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="mb-3">
                                            <label for="fullName" class="form-label">Họ & Tên</label>
                                            <input type="text" class="form-control" id="fullName" name="full_name" value="<?php echo htmlspecialchars($full_name ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email ?? '', ENT_QUOTES, 'UTF-8'); ?>" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="diachi" class="form-label">Địa chỉ</label>
                                            <input type="text" class="form-control" id="diachi" name="diaChi" value="<?php echo htmlspecialchars($diaChi ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="sdt" class="form-label">Số điện thoại</label>
                                            <input type="text" class="form-control" id="sdt" name="soDienThoai" value="<?php echo htmlspecialchars($soDienThoai ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                            </div>
                        </form>



                        </div>
                    </div>
                    </div>
                </div>
                <!-- end -->

                   

                </div>
            </div>
        </div>
    </div>