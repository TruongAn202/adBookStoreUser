<div id="content">
        <div id="banner-school">
            <div class="overlay"></div>
            <div id="gr-td-dk">
                <h1 id="duongke">|</h1>
                <h1 id="tieude-banner">BẢN TIN</h1>
            </div>
        </div>
        <div id="background-KH">
            <div id="sevices">
              <div id="place">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                  <li class="breadcrumb-item active">Bản tin</li>  
                </ol>
              </div>
                <div id="product-1">
                  <div class="container mt-5">
                    <div class="row">
                      <!-- Sidebar -->
                      <div class="col-md-3 sidebar">
                      <img src="view/layout/assets/image/bannerDocTinTuc.png" alt="News Image">
                        <!-- <div class="mb-3">
                        
                          <input type="text" class="form-control search-bar" placeholder="Tìm kiếm">
                        </div> -->
                        <!-- <h5>Quảng cáo</h5> -->
                        <!-- <ul class="category-list">
                          <li><a href="#">Sách Thiếu nhi <span class="float-end soluongbaiviet">86</span></a></li>
                          <li><a href="#">Giật gân <span class="float-end soluongbaiviet">80</span></a></li>
                          <li><a href="#">Kinh dị <span class="float-end soluongbaiviet">873</span></a></li>
                          <li><a href="#">Tiểu thuyết <span class="float-end soluongbaiviet">18</span></a></li>
                          <li><a href="#">Truyện tranh <span class="float-end soluongbaiviet">71</span></a></li>
                          <li><a href="#">Khoa học <span class="float-end soluongbaiviet">927</span></a></li>
                          <li><a href="#">Xem tất cả</a></li>
                        </ul> -->
                      </div>
                
                      <!-- Main Content -->
                      <div class="col-md-9">
                        <h5 id="tintuc-h5">Tin tức mới nhất</h5>
                        <div class="breadcrumb-container">
                          <h3>Có gì mới hôm nay?</h3>
                          <hr id="the-hr-home" class="border border-warning border-3 opacity-75">
                      </div>
                      <?php
                        $bantinlist = ''; // Khởi tạo chuỗi rỗng, vì $bantinlist.='' sẽ dc gán chuỗi vào
                        foreach ($newbantin as $item) { //$newbantin phải = $newbantin bên index.php
                            extract($item); // extract để tên biến là tên cột
                            $bantinlist.=' 
                        <div class="news-item mb-4">
                          <div class="row">
                            <div class="col-md-4 news-image">
                              <img src="view/layout/assets/image/'.$anhTinTuc.'" alt="News Image">
                            </div>
                            <div  class="col-md-8 mota-full">
                              
                              <h4>'.$tieuDe.'</h4>
                              <span class="featured-tag">MỚI</span>
                              <p class="mota-p">'.$noiDungTomTat.'</p>
                              <p>By: Admin</p>

                            </div>
                          </div>
                        </div>';
                        }
                        echo $bantinlist;
                      ?>
                        <!-- News Item -->
                        <!-- <div class="news-item mb-4">
                          <div class="row">
                            <div class="col-md-4 news-image">
                              <img src="view/layout/assets/image/BestBook_2024_Headers_PictureBooks.jpg" alt="News Image">
                            </div>
                            <div  class="col-md-8 mota-full">
                              
                              <h4>Sách tranh hay nhất 2024</h4>
                              <span class="featured-tag">MỚI</span>
                              <p class="mota-p">Từ những câu chuyện trước khi đi ngủ đến việc đọc sách vào ngày mưa và những cuốn sách yêu thích mà trẻ mang theo mọi lúc mọi nơi, sách tranh…</p>
                              <p>By: Admin</p>

                            </div>
                          </div>
                        </div> -->

                        <!-- <div class="news-item mb-4">
                          <div class="row">
                            <div class="col-md-4 news-image">
                              <img src="view/layout/assets/image/YoungReaders.jpg" alt="News Image">
                            </div>
                            <div class="col-md-8">
                              
                              <h4>Sách dành cho độc giả trẻ hay nhất 2024</h4>
                              <span class="featured-tag">MỚI</span>
                              <p class="mota-p">Điều gì làm nên một cuốn sách tuyệt vời cho độc giả trẻ? Hành động, hài hước và tình cảm, trước hết, và dòng sách này có tất cả.…</p>
                              <p>By: Admin</p>
                              
                            </div>
                          </div>
                        </div> -->

                        <!-- <div class="news-item mb-4">
                          <div class="row">
                            <div class="col-md-4 news-image">
                              <img src="view/layout/assets/image/Curious.jpg" alt="News Image">
                            </div>
                            <div class="col-md-8">
                             
                              <h4>Thế giới kỳ diệu</h4>
                              <span class="featured-tag">MỚI</span>
                              <p class="mota-p">Nếu bạn từng bị thu hút bởi những điều kỳ diệu của mặt trăng, cuốn sách này dành cho bạn. Một học viện u ám đầy không khí…</p>
                              <p>By: Admin</p>
                              
                            </div>
                          </div>
                        </div> -->
                        
                        <!-- <div class="news-item mb-4">
                          <div class="row">
                            <div class="col-md-4 news-image">
                              <img src="view/layout/assets/image/powerless.jpg" alt="News Image">
                            </div>
                            <div class="col-md-8">
                             
                               
                          
                              <h4>Một giấc mơ thành sự thật</h4>
                              <span class="featured-tag">MỚI</span>
                              <p class="mota-p">Xin chúc mừng tác giả YA đoạt giải thưởng Sách thiếu nhi và YA B&N năm 2024! Lauren Roberts chưa bao giờ có ý định viết…</p>
                              <p>By: Admin</p>
                              
                            </div>
                          </div>
                        </div> -->
                
                        <!-- Repeat similar blocks for more news items if needed -->
                        
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>