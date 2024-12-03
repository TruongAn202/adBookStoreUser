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
                        <a href="index.php?pg=chitiethoadon" class="list-group-item list-group-item-action">Chi tiết hóa đơn</a>
                   
                        </div>
                    </div>

                    <!-- Main Content -->
                    <div class="col-md-9">
                        
                        <div class="profile-form">
                        <form>
                            <div class="form-section">
                            <div class="row">
                                <div class="col-md-3 text-center">
                                <img src="https://via.placeholder.com/100" alt="Avatar" class="profile-avatar">
                                <button type="button" class="btn btn-sm btn-link d-block mt-2">Chỉnh sửa</button>
                                </div>
                                <div class="col-md-9">
                                <div class="mb-3">
                                    <label for="fullName" class="form-label">Họ & Tên</label>
                                    <input type="text" class="form-control" id="fullName" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="diachi" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" id="diachi" value="" >
                                </div>
                                <div class="mb-3">
                                    <label for="sdt" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" id="sdt" value="<?php echo isset($_SESSION['sdt']) ? $_SESSION['sdt'] : ''; ?>">
                                </div>
                                <!-- <div class="mb-3 row">
                                    <div class="col-md-4">
                                    <label for="birthDay" class="form-label">Ngày sinh</label>
                                    <select id="birthDay" class="form-select">
                                        <option selected>20</option>
                                        <option>21</option>
                                    </select>
                                    </div>
                                    <div class="col-md-4">
                                    <label for="birthMonth" class="form-label">Tháng</label>
                                    <select id="birthMonth" class="form-select">
                                        <option selected>2</option>
                                        <option>3</option>
                                    </select>
                                    </div>
                                    <div class="col-md-4">
                                    <label for="birthYear" class="form-label">Năm</label>
                                    <select id="birthYear" class="form-select">
                                        <option selected>1999</option>
                                        <option>2000</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Giới tính</label>
                                    <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                                        <label class="form-check-label" for="male">Nam</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                        <label class="form-check-label" for="female">Nữ</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                                        <label class="form-check-label" for="other">Khác</label>
                                    </div>
                                    </div>
                                </div> -->
                                <!-- <div class="mb-3">
                                    <label for="country" class="form-label">Quốc tịch</label>
                                    <select id="country" class="form-select">
                                    <option selected>Chọn quốc tịch</option>
                                    <option>Việt Nam</option>
                                    <option>Hoa Kỳ</option>
                                    </select>
                                </div> -->
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