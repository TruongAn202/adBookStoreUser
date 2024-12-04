<div id="content">
    <div id="banner-school">
        <div class="overlay"></div>
        <div id="gr-td-dk">
            <h1 id="duongke">|</h1>
            <h1 id="tieude-banner">Đơn hàng của tôi</h1> 
        </div>
    </div>
    <div id="background">
        <div id="sevices">
            <div id="place">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Đơn hàng của tôi</li>
                </ol>
                <div class="breadcrumb-container">
                    <h4 id="tieude-khoahoc">Đơn hàng của tôi</h4>
                    <hr class="border border-warning border-3 opacity-75">
                    <br>
                </div>
            </div>

            <div>
                <!-- start -->
                <div class="container mt-5">
                    <div class="row">
                        <!-- Thanh điều hướng bên trái -->
                        <div class="col-md-3">
                            <div class="list-group">
                                <a href="index.php?pg=thongtintk" class="list-group-item list-group-item-action">Thông tin tài khoản</a>
                                <a href="#" class="list-group-item list-group-item-action">Đơn hàng của tôi</a>
                            </div>
                        </div>

                        <!-- Nội dung chính bên phải: Danh sách Đơn hàng -->
                        <div class="col-md-9">
                            <h2 class="mb-4">Danh sách Đơn hàng của bạn</h2>

                            <!-- Kiểm tra xem có đơn hàng nào không -->
                            <?php if (!empty($hoadon)): ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã Đơn hàng</th>
                                            <th scope="col">Ngày Đặt</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Phương thức thanh toán</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($hoadon as $order): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($order['maHD']) ?></td>
                                                <td><?= date('d-m-Y', strtotime($order['ngayLapHD'])) ?></td>
                                                <td>
                                                    <?php 
                                                        if ($order['trangThaiHD'] == 'choxuly') {
                                                            echo 'Chờ xử lý';
                                                        } else {
                                                            echo htmlspecialchars($order['trangThaiHD']);
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        if ($order['phuongThucThanhToan'] == 'COD') {
                                                            echo 'Tiền mặt';
                                                        } else {
                                                            echo 'Online';
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        if ($order['phuongThucGiaoHang'] == 'giaoTietKiem') {
                                                            echo 'Giao tiết kiệm';
                                                        } else {
                                                            echo 'Giao hàng nhanh';
                                                        }
                                                    ?>
                                                </td>
                                            </tr>

                                            <!-- Chi tiết hóa đơn, hiển thị ngay bên dưới đơn hàng -->
                                            <tr>
                                                <td colspan="4">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Sản phẩm</th>
                                                                <th>Số lượng</th>
                                                                <th>Đơn giá</th>
                                                                <th>Thành tiền</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                // Lấy chi tiết hóa đơn
                                                                $sql_cthd = $conn->prepare("SELECT ct.maSach, s.tenSach, ct.soLuong, ct.donGia 
                                                                                            FROM chitiethoadon ct 
                                                                                            JOIN sach s ON ct.maSach = s.maSach 
                                                                                            WHERE maHD = :maHD");
                                                                $sql_cthd->bindParam(':maHD', $order['maHD'], PDO::PARAM_STR);
                                                                $sql_cthd->execute();
                                                                $chitiethoadon = $sql_cthd->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach ($chitiethoadon as $item): 
                                                            ?>
                                                                <tr>
                                                                    <td><?= htmlspecialchars($item['tenSach']) ?></td>
                                                                    <td><?= htmlspecialchars($item['soLuong']) ?></td>
                                                                    <td><?= number_format($item['donGia'], 0, ',', '.') ?> VND</td>
                                                                    <td><?= number_format($item['soLuong'] * $item['donGia'], 0, ',', '.') ?> VND</td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <div class="alert alert-warning" role="alert">
                                    Bạn chưa có đơn hàng nào.
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- end -->
            </div>
        </div>
    </div>
</div>
