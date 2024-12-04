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
              <div class="alert alert-success text-center" role="alert">
                  <h4>Chúc mừng bạn đã đặt hàng thành công!</h4>
                  <p>Mã hóa đơn: <strong><?= htmlspecialchars($maHD) ?></strong></p>
              </div>

              <h5>Thông tin người nhận:</h5>
              <ul>
                  <li>Tên người nhận: <?= htmlspecialchars($hoadon['tenNguoiNhan']) ?></li>
                  <li>Địa chỉ: <?= htmlspecialchars($hoadon['diaChiNguoiNhan']) ?></li>
                  <li>Số điện thoại: <?= htmlspecialchars($hoadon['soDienThoai']) ?></li>
                  <li>Phương thức thanh toán: 
                      <?php 
                          if ($hoadon['phuongThucThanhToan'] == 'COD') {
                              echo 'Tiền mặt khi nhận hàng.';
                          } else {
                              echo 'Chuyển khoản.';
                          }
                      ?>
                  </li>

                  <li>Phương thức vận chuyển: 
                      <?php 
                          if ($hoadon['phuongThucGiaoHang'] == 'giaoTietKiem') {
                              echo 'Giao tiết kiệm';
                          } else {
                              echo 'Giao hàng nhanh';
                          }
                      ?>
                  </li>
              </ul>

              <h5>Chi tiết đơn hàng:</h5>
              <table class="table table-bordered">
                  <thead class="table-primary">
                      <tr>
                          <th>Tên sách</th>
                          <th>Số lượng</th>
                          <th>Đơn giá</th>
                          <th>Thành tiền</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($result as $item): ?>
                          <tr>
                              <td><?= htmlspecialchars($item['tenSach']) ?></td>
                              <td><?= $item['soLuong'] ?></td>
                              <td><?= number_format($item['donGia']) ?> đ</td>
                              <td><?= number_format($item['soLuong'] * $item['donGia']) ?> đ</td>
                          </tr>
                      <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                      <tr>
                          <td colspan="3" class="text-end">Tổng cộng:</td>
                          <td><?= number_format(array_sum(array_map(function($item) {
                              return $item['soLuong'] * $item['donGia'];
                          }, $chitiethoadon))) ?> đ</td>
                      </tr>
                  </tfoot>
              </table>

              <a href="index.php" class="btn btn-primary">Quay về trang chủ</a>
          </div>
             <!-- end -->
        </div>
     </div>
</div>