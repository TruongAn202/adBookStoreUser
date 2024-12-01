<?php
    // $loaisachlist = '';
    // foreach ($loaisach_list as $item) {
    //     extract($item);
    //     $linksanpham = 'index.php?pg=sanpham&maloai=' . urlencode($maLoai) . '#product-section'; //thêm #product-section để lọc => tải lại trang =>tự chuyển đến #product-section
    //     $loaisachlist .= '<li><a href="' . $linksanpham . '">' . $tenLoai . '</a></li>';
    // }
?>
<div id="content">
        <div id="banner-school">
            <div class="overlay"></div>
            <div id="gr-td-dk">
                <h1 id="duongke">|</h1>
                <h1 id="tieude-banner">MUA SÁCH</h1>
            </div>
            
        </div>
        <div id="background-KH">
        <div id="product-section">
            <div id="sevices">
                <div id="place">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                      <li class="breadcrumb-item active">Mua sách</li>
                      
                  </ol>
                      <div class="breadcrumb-container">
                        <h4 id="tieude-khoahoc">Danh mục các thể loại sách</h4>
                        <hr class="border border-warning border-3 opacity-75">
                      <br>
                      </div>
                </div>
                <!-- sd -->
                <div class="container mt-4">
                    <div class="row">
                        <!-- Sidebar -->
                        <div class="col-md-3 sidebar">
                            <div class="mb-3">
                            <form method="GET" action="index.php?pg=sanpham" id="searchForm">
                                <input type="hidden" name="pg" value="sanpham">

                                <!-- Giữ lại giá trị search -->
                                <input type="text" class="form-control search-bar" placeholder="Tìm kiếm" name="search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">

                                <!-- Giữ lại các giá trị category đã chọn -->
                                <?php if (isset($_GET['category'])): ?>
                                    <?php foreach ($_GET['category'] as $category): ?>
                                        <input type="hidden" name="category[]" value="<?= htmlspecialchars($category) ?>">
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <button type="submit" class="btn btn-primary mt-2">Tìm kiếm</button>
                            </form>
                            </div>
                            <!-- Lọc theo danh mục -->
                            <form method="GET" action="index.php?pg=sanpham" id="filterForm">
                                <input type="hidden" name="pg" value="sanpham">
                                
                                <!-- Lọc theo danh mục -->
                                <h5 class="filter-title">Lọc theo danh mục</h5>
                                <ul class="category-list">
                                    <!-- $loaisach_list từ index -->
                                    <?php
                                        foreach ($loaisach_list as $item) {
                                            // Extract các giá trị trong $item để sử dụng như các biến độc lập
                                            extract($item);
                                            // Echo các phần tử HTML với giá trị động
                                            echo '<li>';
                                            echo '<div class="form-check">';
                                            echo '<input class="form-check-input" type="checkbox" name="category[]" value="' . $maLoai . '" id="category_' . $maLoai . '"';
                                            // Kiểm tra xem category có được chọn trong URL không
                                            if (isset($_GET['category']) && in_array($maLoai, $_GET['category'])) {
                                                echo ' checked';
                                            }
                                            echo '>';
                                            echo '<label class="form-check-label" for="category_' . $maLoai . '">' . $tenLoai . '</label>';
                                            echo '</div>';
                                            echo '</li>';
                                        }
                                    ?>

                                </ul>                         
                                <!-- Lọc theo giá -->
                                <h5 class="filter-title">Lọc theo giá</h5>
                                <ul class="category-list">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="price" value="0-150000" id="price1"
                                                <?php if (isset($_GET['price']) && $_GET['price'] == '0-150000') echo 'checked'; ?>>
                                            <label class="form-check-label" for="price1">0 - 150,000₫</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="price" value="150000-300000" id="price2"
                                                <?php if (isset($_GET['price']) && $_GET['price'] == '150000-300000') echo 'checked'; ?>>
                                            <label class="form-check-label" for="price2">150,000₫ - 300,000₫</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="price" value="300000-500000" id="price3"
                                                <?php if (isset($_GET['price']) && $_GET['price'] == '300000-500000') echo 'checked'; ?>>
                                            <label class="form-check-label" for="price3">300,000₫ - 500,000₫</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="price" value="500000+" id="price4"
                                                <?php if (isset($_GET['price']) && $_GET['price'] == '500000+') echo 'checked'; ?>>
                                            <label class="form-check-label" for="price4">500,000₫ trở lên</label>
                                        </div>
                                    </li>
                                </ul>

                                <!-- Nút lọc -->
                                <button type="submit" class="btn btn-primary mt-3">Lọc</button>
                            </form>

                            </div>
                        <!-- Product List -->
                        <div id="product-1" class="col-md-9">
                        <?php
                            $sanphamlist = '';
                            foreach ($sanpham_list as $item) {
                                extract($item);
                                $sanphamlist .= '<div class="product"> 
                                    <div class="product-image">
                                        <img src="view/layout/assets/image/'.$anh.'" alt="">
                                        <form action="index.php?pg=addcart" method="post">
                                            <input type="hidden" value="'.$maSach.'" name="maSach">
                                            <input type="hidden" value="'.$tenSach.'" name="tenSach">
                                            <input type="hidden" value="'.$anh.'" name="anh">
                                            <input type="hidden" value="'.$giaKM.'" name="giaKM">
                                            <input type="hidden" value="'.$tenTG.'" name="tenTG">
                                            <input type="hidden" value="1" name="soLuong">
                                            <input type="submit" value="Thêm vào giỏ" name="btnaddcart" class="product-button">
                                        </form> 
                                    </div>
                                    <div class="product-info">
                                        <p><a href="/information/thongtin.html" onclick="selectCourse(courseData)">'.$tenSach.'</a></p>
                                        <div class="mo-ta">'.$tenNXB.'</div>
                                        <div class="tac-gia">'.$tenTG.'</div>
                                        <div class="ql-price">
                                            <div class="price">'.$giaKM.'đ</div>
                                            <div class="old-price">'.$gia.'đ</div>
                                        </div>
                                    </div>
                                </div>';
                            }
                            echo $sanphamlist;
                        ?>
                        </div>
                    </div>
                    </div>
                 <!-- sssd -->
                <div id="danh-muc">
                    <ul class="horizontal-list">
                        <!-- hiển thị kết quả vòng for ở đầu trang -->
                        
                    </ul>
                </div>
                <!-- start khung tim kiem -->
                <!-- <div class="container mt-1 mb-3">
                     
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for books, authors, or categories..." aria-label="Search">
                            <button class="btn btn-primary" type="button">Search</button>
                            </div>
                        </div>
                    </div>
                </div> -->
                 <!-- end khung tim kiem -->
                
            
                <div class="button-container">
                    <button onclick="selectButton(this)">&lt; </button>
                    <button class="selected" onclick="selectButton(this)">1</button>
                    <button onclick="selectButton(this)">2</button>
                    <button onclick="selectButton(this)">...</button>
                    <button onclick="selectButton(this)">&gt;</button>
                    
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- <script>
        function submitForm() {
            document.getElementById('filterForm').submit();
        }
    </script> -->