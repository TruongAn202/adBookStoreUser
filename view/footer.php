<div id="footer">
        <div id="footer-top">
            <div class="footer-section">
                
                <img id="footer-top-logo" src="view/layout/assets/image/logo_BookStore.png" alt="Logo">
                <br>
                <span>Mua sách trực tuyến tại A&DBOOKSTOER, Nhà sách được yêu thích tại Việt Nam.</span>
                
            </div>
            <div class="footer-section">
                <!-- Thẻ div chứa thông tin -->
                <p id="dc-footer">THÔNG TIN</p>
                <ul id="information-footer">
                    <li>Lớp D21_TH01 tại Việt Nam</li>
                    <li>Địa chỉ: 180 Cao Lỗ, Phường 4, Quận 8, TP Hồ Chí Minh</li>
                    <li>Email: AD@gmail.com</li>
                    <li>Điện thoại: (028) 38 505 520</li>
                </ul>
            </div>
            <div class="footer-section">
                <!-- Thẻ div chứa iframe dẫn link đến Google Map -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15679.817641153899!2d106.6778321!3d10.7379972!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f62a90e5dbd%3A0x674d5126513db295!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgU8OgaSBHw7Ju!5e0!3m2!1svi!2s!4v1714446027103!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div id="footer-bottom">
            <div id="container">
                <div id="row">
                    <hr id="hr">
                    <div id="footer-copyright">
                    <span>© 180 Cao Lỗ, Phường 4, Quận 8, TP Hồ Chí Minh</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 1 container chua cac thong bao da them sp -->
    <div id="toast-container" class="toast-container position-fixed top-0 end-0 p-3"></div> 
    <!-- chat box -->
    <div class="chat-box border rounded">
        <div class="chat-header d-flex justify-content-between align-items-center">
          <h5>Chat box</h5>
          <button type="button" class="btn-close" aria-label="Close"></button>
        </div>
        <div class="chat-body">
          <!-- Messages will appear here -->
          <div class="chat-message">
            <strong>Admin:</strong> Xin chào, tôi giúp gì được cho bạn?
          </div>
        </div>
        <div class="chat-footer">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Type a message...">
            <button class="btn btn-warning" type="button">Send</button>
          </div>
        </div>
        </div>
    
      <div class="chat-bubble">
        <img src="https://cdn-icons-png.flaticon.com/512/1384/1384005.png" alt="Chat">
      </div>
      <!-- end chat box -->
      <div class="devtools-warning">
        <h1>Cảnh báo!</h1>
        <p>Đừng cố gắng truy cập DevTools!</p>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="bi bi-chevron-double-up"></i></button>
    <script src="view/layout/assets/js/script.js"></script>
    <script>
        function selectButton(button) { //các nút chuyển trang của trang sanpham
            const buttons = document.querySelectorAll('.button-container button');
            buttons.forEach(btn => btn.classList.remove('selected'));
            button.classList.add('selected');
        }
    </script>
</body>
</html>