
//f12
// document.addEventListener('contextmenu', function(event) {
//     event.preventDefault();
// });

// document.addEventListener('keydown', function(event) {
//     if (event.key === "F12" || (event.ctrlKey && event.shiftKey && event.key === "I") || (event.ctrlKey && event.shiftKey && event.key === "J") || (event.ctrlKey && event.key === "U")) {
//         event.preventDefault();
//     }
// });

/*canh bao nguoi dung dang mo f12 */

/*end canh bao nguoi dung dang mo f12 */
//header
// let lastScrollTop = 0; //khai bao bien luu trữ cho vi trí cuộn trước đó
// const header = document.getElementById('header'); //lấy phần tử header từ DOM
// window.addEventListener('scroll', function() { // Thêm bộ lắng nghe sự kiện scroll cho cửa sổ
//     let scrollTop = window.pageYOffset || document.documentElement.scrollTop; //Lấy vị trí cuộn hiện tại
//     if (scrollTop > lastScrollTop) { //kt neu cuộn xuống
//         // Scroll down
//         header.style.top = '-75px'; // Thụt header lên trên
//     } else {
//         // Scroll up
//         header.style.top = '0'; // Hiện lại header
//     }
//     lastScrollTop = scrollTop;
// });

//thong bao them sp thanh cong
//lang nghe sk them sp hien thong bao - để ở đầu
document.querySelectorAll('.product-button').forEach(button => {
    button.addEventListener('click', function() {
      var toastContainer = document.getElementById('toast-container');
      var toastId = 'toast-' + Date.now(); // Unique ID for each toast
      var toastHTML = `
        <div id="${toastId}" class="toast liveToast bg-warning" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
          <div class="toast-header">
            <strong class="me-auto">Thông báo</strong>
            <small>Vừa xong</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            Sản phẩm đã được thêm vào giỏ hàng!
          </div>
        </div>
      `;
      toastContainer.insertAdjacentHTML('beforeend', toastHTML);
      var toastEl = document.getElementById(toastId);
      var toast = new bootstrap.Toast(toastEl);
      toast.show();
    });
  });
//end lang nghe sk them sp hien thong bao

//đóng mở bong bóng chat - phải để lên đầu mới hoạt động
$(document).ready(function(){
    $('.chat-bubble').click(function(){
      $('.chat-box').show();
      $('.chat-bubble').hide();
    });

    $('.btn-close').click(function(){
      $('.chat-box').hide();
      $('.chat-bubble').show();
    });
  });


//mo trang tt
 // Lặp qua tất cả các phần tử có lớp "product-image"
 var productImages = document.querySelectorAll('.product-image');
 productImages.forEach(function(productImage) {
     // Lấy phần tử nút trong phần tử product-image
     var button = productImage.querySelector('.product-button');
     // Thêm sự kiện nhấp cho nút
     button.addEventListener('click', function() {
         // Lấy đường dẫn từ thuộc tính href của thẻ a chứa ảnh
         var productLink = productImage.querySelector('a').getAttribute('href');
         // Chuyển hướng đến trang sản phẩm
         window.location.href = productLink;
     });
 });

/*action hien thi them vao gio */

/*end action */

/* cuon len top */
// Hiển thị nút khi cuộn xuống 100px từ đầu trang
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// Cuộn lên đầu trang khi click nút
function topFunction() {
  document.body.scrollTop = 0; // Cho Safari
  document.documentElement.scrollTop = 0; // Cho Chrome, Firefox, IE và Opera
}

/*btn them */
// document.addEventListener('DOMContentLoaded', function() {
//     var addToCartButton = document.getElementById('addToCartButton');
//     addToCartButton.addEventListener('click', function() {
//         window.location.href = 'hehe.html'; // Chuyển hướng sang trang hehe.html
//     });
// });


/* menu an*/
function toggleMenu() {
    var menu = document.querySelector('.menu-danhmuc');
    menu.classList.toggle('active');
}
/*duong dan menu-click vao the li */

/*tu chay anh */
document.addEventListener("DOMContentLoaded", function() {
    var index = 0;
    var images = document.querySelectorAll(".comment img");
    
    function showNextImage() {
        // Ẩn ảnh hiện tại
        images[index].style.display = "none";
        // Tăng chỉ số hoặc quay lại ảnh đầu tiên nếu đã qua ảnh cuối cùng
        index = (index + 1) % images.length;
        // Hiển thị ảnh tiếp theo
        images[index].style.display = "block";
    }

    // Hiển thị ảnh đầu tiên
    showNextImage();

    // Tự động chuyển đổi ảnh sau mỗi giây
    setInterval(showNextImage, 2000); // 1 giây
});

/*to-anh */
document.addEventListener("DOMContentLoaded", function() {
    var image = document.getElementById("product-image"); // Lấy tham chiếu đến phần tử ảnh với id là "product-image".
    var overlay = document.createElement("div"); // Tạo một phần tử div mới.
    overlay.classList.add("overlay-to-anh"); // Thêm lớp CSS "overlay-to-anh" vào phần tử div vừa tạo.

    image.addEventListener("click", function() {
        var imgContainer = document.querySelector(".image-container img"); // Lấy tham chiếu đến phần tử ảnh trong container có lớp CSS là "image-container".
        imgContainer.style.maxWidth = "none"; // Xóa thuộc tính max-width để ảnh có thể mở rộng ra hết.
        imgContainer.style.maxHeight = "none"; // Xóa thuộc tính max-height để ảnh có thể mở rộng ra hết.
        image.classList.add("enlarge-image"); // Thêm lớp CSS "enlarge-image" vào phần tử ảnh để thực hiện việc mở rộng.
        document.body.appendChild(overlay); // Thêm phần tử overlay vào body của trang web.
        overlay.style.display = "block"; // Hiển thị overlay để tạo hiệu ứng khi mở rộng ảnh.
    });

    overlay.addEventListener("click", function() {
        var imgContainer = document.querySelector(".image-container img"); // Lấy tham chiếu đến phần tử ảnh trong container có lớp CSS là "image-container".
        imgContainer.style.maxWidth = ""; // Khôi phục giá trị mặc định của thuộc tính max-width cho ảnh.
        imgContainer.style.maxHeight = ""; // Khôi phục giá trị mặc định của thuộc tính max-height cho ảnh.
        image.classList.remove("enlarge-image"); // Loại bỏ lớp CSS "enlarge-image" để ảnh trở về kích thước ban đầu.
        overlay.style.display = "none"; // Ẩn overlay khi click vào nó.
    });
});


/*trượt sản pham */
/*tang giam san pham */

document.addEventListener("DOMContentLoaded", function() {
    // Mã JavaScript của bạn ở đây
});

/*dang nhap-kiemtra-input */
document.addEventListener("DOMContentLoaded", function () {
    const loginBtn = document.querySelector("#login-btn");
    const usernameInput = document.querySelector("#username");
    const passwordInput = document.querySelector("#password");

    loginBtn.addEventListener("click", function (event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của nút

        // Xóa các thông báo lỗi cũ
        const errorMessages = document.querySelectorAll(".error-message");
        errorMessages.forEach(function (message) {
            message.remove();
        });

        // Kiểm tra tên đăng nhập
        const username = usernameInput.value.trim();
        if (!username) {
            const errorMessage = document.createElement("div");
            errorMessage.textContent = "Vui lòng nhập tên đăng nhập.";
            errorMessage.className = "error-message";
            usernameInput.parentNode.insertBefore(errorMessage, usernameInput.nextSibling);
        }

        // Kiểm tra mật khẩu
        const password = passwordInput.value.trim();
        if (!password) {
            const errorMessage = document.createElement("div");
            errorMessage.textContent = "Vui lòng nhập mật khẩu.";
            errorMessage.className = "error-message";
            passwordInput.parentNode.insertBefore(errorMessage, passwordInput.nextSibling);
        }
    });
});

/*from lien he */
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("#form-lienhe form");

    form.addEventListener("submit", function (event) {
        clearErrorMessages(); // Xóa các thông báo lỗi cũ trước khi kiểm tra lại

        const inputs = form.querySelectorAll("input[type='text'], textarea");

        // Kiểm tra từng trường input
        inputs.forEach(function (input) {
            const value = input.value.trim();
            if (!value) {
                const label = input.previousElementSibling.textContent.trim();
                const errorMessage = document.createElement("div");
                errorMessage.textContent = "Bạn thiếu thông tin ở đây, vui lòng nhập vào.";
                errorMessage.className = "error-message";
                input.parentNode.insertBefore(errorMessage, input.nextSibling);
                event.preventDefault(); // Ngăn chặn gửi form nếu có lỗi
            }
        });
    });

    function clearErrorMessages() {
        const errorMessages = form.querySelectorAll(".error-message");
        errorMessages.forEach(function (message) {
            message.remove();
        });
    }
});

/* slide aboutus*/

document.addEventListener("DOMContentLoaded", function() {
    const carousel = document.querySelector('.carousel');
    const slides = document.querySelectorAll('.slide');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');

    let currentIndex = 0;
    const slideWidth = slides[0].clientWidth;
    const intervalTime = 2000; //  seconds

    function goToSlide(index) {
        carousel.style.transform = `translateX(-${index * slideWidth}px)`;
        currentIndex = index;
    }

    function nextSlide() {
        currentIndex = (currentIndex === slides.length - 1) ? 0 : currentIndex + 1;
        goToSlide(currentIndex);
    }

    // Auto slide
    setInterval(nextSlide, intervalTime);

    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex === 0) ? slides.length - 1 : currentIndex - 1;
        goToSlide(currentIndex);
    });

    nextBtn.addEventListener('click', () => {
        nextSlide();
    });
});

/*tim kiem */
/*JSon thong tin */
// Đối tượng courseData
var courseData = {
    "tieudeKhoahoc" : "The Boyfriend",
    "placeCcon" : "The Boyfriend",
    "tieudeBanner": "The Boyfriend",
    "image": "../image/The_Boyfriend.jpg",
    "courseName": "The Boyfriend",
    "newPrice": "399.000đ",
    "oldPrice": "1.000.000đ",
    "description": [
        "Mua sắm theo Hướng dẫn Quà tặng Ngày lễ",
        "Mua Một Tặng Một Giảm Giá 50% Sách Dành Cho Mọi Lứa Tuổi",
        "Độc quyền của Barnes & Noble"
    ],
    "instructor": "Freida McFadden",
    "benefits": [
        "Một tác phẩm kinh dị mới đầy hấp dẫn của tác giả bán chạy nhất của tờ New York Times là The Coworker and The Housemaid !",
        "Cô ấy đang tìm kiếm người đàn ông hoàn hảo. Anh ấy đang tìm kiếm nạn nhân hoàn hảo.",
        "Sydney Shaw, giống như mọi phụ nữ độc thân ở New York, đều gặp xui xẻo trong chuyện hẹn hò. Cô đã chứng kiến ​​tất cả: những người đàn ông nói dối trong hồ sơ hẹn hò, những người đàn ông trả tiền bữa tối cho cô, và tệ nhất là những người đàn ông không thể ngừng nói về mẹ của họ. Cho đến khi cô gặp Tom. "
        
    ]
};

// Đối tượng courseData1
var courseData1 = {
    "tieudeKhoahoc" : "Khóa học excel cho người đi làm",
    "placeCcon" : "Khóa học excel cho người đi làm",
    "tieudeBanner": "Khóa học excel cho người đi làm",
    "image": "../image/excel.jpg",
    "courseName": "Khóa học excel cho người đi làm",
    "newPrice": "299.000đ",
    "oldPrice": "700.000đ",
    "description": [
        "Excel là một công cụ hữu hiệu trong công việc mà bất cứ ai muốn tăng hiệu suất đều phải nắm rõ. Với các bài giảng bài bản được chắt lọc theo hướng mang lại tính ứng dụng cao cho học viên, khóa học này sẽ đem đến cho bạn các kiến thức sau:",
        "- Các hàm hữu ích trong Excel",
        "- Cách vẽ biểu đồ và tạo báo cáo",
        "- Định dạng trong Excel",
        "- Cách xử lý dữ liệu hiệu quả"
    ],
    "instructor": "Nguyễn Văn Trường An",
    "benefits": [
        "Thành thạo các thao tác, các hàm, câu lệnh nâng cao trong Excel",
        "Nắm được các thủ thuật Excel giúp tăng tốc thao tác của bạn",
        "Áp dụng được ngay các kiến thức đã học vào công việc tổng hơp, phân tích và xử lý dữ liệu",
        "Nâng cao được năng suất và hiệu quả công việc của bạn ngay lập tức"
    ]
};

var courseData2 = {
    "tieudeKhoahoc" : "4 Bước cốt lõi xây dựng team marketing từ zero đến hero.",
    "placeCcon" : "4 Bước cốt lõi xây dựng team marketing từ zero đến hero.",
    "tieudeBanner": "4 Bước cốt lõi xây dựng team marketing từ zero đến hero.",
    "image": "../image/teamwork.png",
    "courseName": "4 Bước cốt lõi xây dựng team marketing từ zero đến hero.",
    "newPrice": "399.000đ",
    "oldPrice": "1.000.000đ",
    "description": [
    "Việc quản lý nhân viên hiệu quả là yêu cầu cơ bản của một doanh nghiệp nếu muốn đi lên một cách nhanh chóng.",
    "Lý thuyết này lại càng đúng với đội nhóm làm trong lĩnh vực marketing bởi xây dựng một team marketing ở Việt Nam là một công việc thực sự đau đầu.",
    "Nhiều quản lý đã thử hết cách này đến cách khác nhưng kết cục họ nhận được vẫn là phải “cân” team thâu đêm suốt sáng."
    ],
    "instructor": "Nguyễn Văn Trường An",
    "benefits": [
    "Thành thạo các thao tác, các hàm, câu lệnh nâng cao trong Excel",
    "Nắm được các thủ thuật Excel giúp tăng tốc thao tác của bạn",
    "Áp dụng được ngay các kiến thức đã học vào công việc tổng hơp, phân tích và xử lý dữ liệu",
    "Nâng cao được năng suất và hiệu quả công việc của bạn ngay lập tức",
    "Giúp Founder/Manager biết cách huấn luyện nhân viên trở nên giỏi hơn mình mà không tốn nhiều thời gian.",
    "Giúp Founder/Manager giảm tải 70% công việc quản lý vụn vặt, để tập trung vào những công việc cấp cao hơn như suy nghĩ hướng marketing mới, lên kế hoạch...",
    "Biết cách làm cho nhân viên ngày càng trở nên sáng tạo hơn, không còn lo cảnh bị cạn kiệt ý tưởng sau một thời gian chạy ads nữa.",
    "Giúp Founder/Manager tận dụng được trí tuệ nhân viên, tránh được cảnh 'một mình phải suy nghĩ hộ cả team' như hiện tại.",
    "Biết cách làm cho nhân viên trở nên am hiểu về khách hàng, thị trường như mình.",
    "Biết cách khiến nhân viên ngày càng tự chủ động hơn trong công việc hàng ngày, không còn lệ thuộc vào Founder/Manager nữa.",
    "Biết cách làm cho nhân viên tự biết cách gọt giũa, chọn lọc các ý tưởng của họ, giảm các ý tưởng không khả thi hoặc nhàm chán đi.",
    "Giúp Founder/Manager biết cách lựa chọn những nhân sự còn non kinh nghiệm nhưng có thể phát triển được."
    ]
};

var courseData3 = {
    "tieudeKhoahoc" : "Thuyết trình chuyên nghiệp & ấn tượng",
    "placeCcon" : "Thuyết trình chuyên nghiệp & ấn tượng",
    "tieudeBanner": "Thuyết trình chuyên nghiệp & ấn tượng",
    "image": "../image/thuyettrinh.png",
    "courseName": "Thuyết trình chuyên nghiệp & ấn tượng",
    "newPrice": "99.000đ",
    "oldPrice": "199.000đ",
    "description": [
        "Là khoá học được thiết kế dựa trên tiến trình thực tế từ lúc bạn nhận được yêu cầu thuyết trình cho đến khi hoàn thành bài thuyết trình của mình một cách hiệu quả. “Thuyết trình chuyên nghiệp &amp; ấn tượng” sẽ mang đến những kiến thức, kinh nghiệm sát với thực tế của doanh nghiệp từ chuyên gia có uy tín. Bạn sẽ có được những kiến thức &amp; kỹ năng cần thiết cho quá trình xây dựng &amp; trình bày bài thuyết trình của mình như xác định các thông tin nền tảng, quan trọng; lên ý tưởng &amp; sắp xếp bố cục hợp lý; lựa chọn cách trình bày trực quan phù hợp; vượt qua nỗi sợ thuyết trình và làm chủ giọng nói. Từ đó, bạn có thể sẵn sàng, tự tin &amp; hoàn thành tốt các buổi thuyết trình của mình."
    ],
    "instructor": "Nguyễn Văn Trường An",
    "benefits": [
    "Ôn tập kiến thức liên tục, tăng hiệu quả học tập.",
    "Học tập chủ động, học tập tương tác.",
    "Thực hành & nhận phản hồi xuyên suốt khoá học.",
    "Cung cấp kiến thức, kỹ năng & kinh nghiệm trong việc xây dựng & trình bày bài thuyết trình từ chuyên gia uy tín."
    ]
};

var courseData4 = {
    "tieudeKhoahoc" : "Lập trình C# trong 5 tuần - Nâng cao",
    "placeCcon" : "Lập trình C# trong 5 tuần - Nâng cao",
    "tieudeBanner": "Lập trình C# trong 5 tuần - Nâng cao",
    "image": "../image/cShap.jpg",
    "courseName": "Lập trình C# trong 5 tuần - Nâng cao",
    "newPrice": "500.000đ",
    "oldPrice": "1.500.000đ",
    "description": [
        "Các kiến thức nâng cao về ngôn ngữ lập trình C#."
    ],
    "instructor": "Nguyễn Văn Trường An",
    "benefits": [
        "Có được kiến thức toàn diện về ngôn ngữ lập trình C#.",
        "Có khả năng phát triển phần mềm tương tác cơ sở dữ liệu bằng C#.",
        "Xây dựng được kiến trúc đa tầng trong C#.",
        "Là cơ sở để lập trình di động đa nền tảng với Xamarin.",
        "Là cơ sở để tiếp tục nghiên cứu công nghệ mới LINQ."
    ]
};

var courseData5 = {
    "tieudeKhoahoc" : "SEO chuyên nghiệp từ cơ bản đến nâng cao",
    "placeCcon" : "SEO chuyên nghiệp từ cơ bản đến nâng cao",
    "tieudeBanner": "SEO chuyên nghiệp từ cơ bản đến nâng cao",
    "image": "../image/SEO.png",
    "courseName": "SEO chuyên nghiệp từ cơ bản đến nâng cao",
    "newPrice": "379.000đ",
    "oldPrice": "800.000đ",
    "description": [
        "SEO đóng vai trò hết sức quan trọng đối với tất cả doanh nghiệp, cá nhân,hộ kinh doanh để phát triển"
    ],
    "instructor": "Nguyễn Văn Trường An",
    "benefits": [
        "Có thể tự SEO và kinh doanh riêng.",
        "Có thể tự mở dịch vụ SEO.",
        "Làm SEO Leader tại các công ty."
    ]
};

var courseData6 = {
    "tieudeKhoahoc" : "Chiến lược tài chính",
    "placeCcon" : "Chiến lược tài chính",
    "tieudeBanner": "Chiến lược tài chính",
    "image": "../image/taichinh.jpg",
    "courseName": "Chiến lược tài chính",
    "newPrice": "699.000đ",
    "oldPrice": "1.700.000đ",
    "description": [
        "Chiến lược tài chính và những điều cần biết để có thể hoạch định kế hoạch kinh doanh của các doanh nghiệp"
    ],
    "instructor": "Nguyễn Văn Trường An",
    "benefits": [
        "Đọc và hiểu các báo cáo tài chính.",
        "Có khả năng đánh giá tài chính của công ty.",
        "Hiểu và thực hiện các chiến lược tài chính phù hợp với nhu cầu thực tế."
    ]
};

var courseData7 = {
    "tieudeKhoahoc" : "Học Photoshop trọn bộ trong 7 ngày",
    "placeCcon" : "Học Photoshop trọn bộ trong 7 ngày",
    "tieudeBanner": "Học Photoshop trọn bộ trong 7 ngày",
    "image": "../image/photoshop.png",
    "courseName": "Học Photoshop trọn bộ trong 7 ngày",
    "newPrice": "999.000đ",
    "oldPrice": "2.700.000đ",
    "description": [
        "Học thiết kế đồ họa chuyên nghiệp với Photoshop."
    ],
    "instructor": "Nguyễn Văn Trường An",
    "benefits": [
        "Nắm được các nguyên lý về cách chỉnh sửa ảnh và tối ưu việc sử dụng Photoshop.",
        "Có thể chỉnh sửa ảnh phong cảnh theo ý muốn.",
        "Có thể tạo ra những bức ảnh động.",
        "Có thể làm được banner quảng cáo 'độc' và 'lạ'."
    ]
};

var courseData8 = {
    "tieudeKhoahoc" : "Cách dạy con ưu việt của người Do Thái",
    "placeCcon" : "Cách dạy con ưu việt của người Do Thái",
    "tieudeBanner": "Cách dạy con ưu việt của người Do Thái",
    "image": "../image/daycon.jpg",
    "courseName": "Cách dạy con ưu việt của người Do Thái",
    "newPrice": "49.000đ",
    "oldPrice": "199.000đ",
    "description": [
        "Vẫn để hiện nay của các ông bố bà mẹ trẻ là nuôi dạy con theo kiểu: (1) kinh nghiệm bản thân, (2) ảnh hưởng từ những thế hệ trước (ông bà nội ngoại), ",
        "- Nội dung chính: Cách Dạy Con Ưu Việt của Người Do Thái.",
        "- Lộ Trình: đi từ câu hỏi WHY (Tại Sao) đến PHƯƠNG PHÁP (HOW) NHƯ THẾ NÀO.",
        " - Lợi ích: Học được cách thức dạy con Thông Minh Vượt Trội của Người Do Thái."
    ],
    "instructor": "Nguyễn Văn Trường An",
    "benefits": [
        "Nếu không đầu tư vào việc học cách nuôi dạy trẻ thì với cuộc sống hiện đại bận rộn hiện nay, những đứa trẻ của chúng ta lớn lên và phát triển theo kiểu tự nhiên '5 ăn, 5 thua'. Kết quả là: một số sẽ sống vị kỷ, ỷ lại, sống ích kỷ chỉ biết đến bản thân mà không quan tâm người khác, đổ lỗi và oánh trách bố mẹ... 1 số khác nghiêm trọng hơn thì nghiện games, cờ bạc, đàn đúm bạn bè, đua đòi ...Nói chung là không có mục đích sống đúng đắn và lành mạnh.",
        "Nếu kiên trì và tạo thành nếp sống hay thói quen có thể thay đổi cuộc đời và tương lai của con. Xa hơn nữa là thay đổi cả một thế hệ."
    ]
};

var courseData9 = {
    "tieudeKhoahoc" : "Quản Trị và Bán Hàng Đột Phá",
    "placeCcon" : "Quản Trị và Bán Hàng Đột Phá",
    "tieudeBanner": "Quản Trị và Bán Hàng Đột Phá",
    "image": "../image/qtbanhang.jpg",
    "courseName": "Quản Trị và Bán Hàng Đột Phá",
    "newPrice": "199.000đ",
    "oldPrice": "900.000đ",
    "description": [
        "Ngày nay khách hàng rất thông minh, nếu bạn không trở thành người bán hàng xuất sắc bạn sẽ không bán được hàng. Bạn sẽ không biết đâu là điểm tử huyệt của khách hàng. Khách hàng quyết định rất nhanh là có mua sản phẩm của bạn hay không. Do đó bạn phải nằm được yếu tố cảm xúc then chốt. và khóa học này còn chia sẻ với bạn: Khi nào tiếp cần, khi nào giải trình, khi nào đồng điệu, khi nào chốt sale, chăm sóc và giải trình làm sao. Bạn khó khăn trong việc giải quyết vấn đề của khách hàng. Làm thế nào để bạn chốt được những đơn hàng khủng và khách hàng lại happy Làm thế nào để xây dựng hệ thống nhân lực, hệ thống phân phối mạnh mẽ Làm thế nào để vượt qua những kháng cự bên trong bạn và hành động với năng lượng đỉnh cao Làm thế nào để tư duy của bạn vượt thoat từ trong tâm thức của ban."
    ],
    "instructor": "Nguyễn Văn Trường An",
    "benefits": [
        "Cách tạo ra nhiều giá trị cho xã hội mà không tốn nhiều sức.",
        "Biết cách tạo ra nhiều tiền trong tâm thức.",
        "Vượt qua được nỗi sợ trong bán hàng.",
        "Biết được quy trình bán hàng đột phá.",
        "Biết cách xây dựng đội ngũ gắn kết.",
        "Biết trở thành nhà lãnh đạo với những phẩm chất xuất sắc.",
        "Biết các quy trình tiếp thị quan trọng trong Marketing MIC.",
        "Biết cách xây dựng hệ thống bán hàng B2B và B2C."
    ]
};

var courseData10 = {
    "tieudeKhoahoc" : "Phân tích biểu đồ chứng khoán chuyên nghiệp",
    "placeCcon" : "Phân tích biểu đồ chứng khoán chuyên nghiệp",
    "tieudeBanner": "Phân tích biểu đồ chứng khoán chuyên nghiệp",
    "image": "../image/chungkhoan.jpg",
    "courseName": "Phân tích biểu đồ chứng khoán chuyên nghiệp",
    "newPrice": "699.000đ",
    "oldPrice": "1.100.000đ",
    "description": [
        "Kiến thức trong khóa đào tạo tập trung vào những và kỹ năng mà học viên sẽ cần sử dụng thường xuyên trong suốt quá trình đầu tư. - Nội dung video dễ hiểu, mọi lời nói của tác giả đều có dẫn chứng và được lấy ví dụ cụ thể trên biểu đồ chứng khoán Việt Nam. - Hướng dẫn phân tích biểu đồ trên phần mềm phân tích kỹ thuật Amibroker và biểu đồ trực tuyến."
    ],
    "instructor": "Nguyễn Văn Trường An",
    "benefits": [
        "Khóa học sẽ giúp bạn hoàn thiện kỹ năng phân tích biểu đồ bắt buộc phải có của một nhà đầu tư chứng khoán.",
        "Bạn sẽ hiểu được quy luật cung cầu và quy luật tăng giá của cổ phiếu.",
        "Không phụ thuộc vào chuyên gia tư vấn, chủ động phân tích và nắm bắt cơ hội bằng chính khả năng của mình."
    ]
};

var courseData11 = {
    "tieudeKhoahoc" : "Python Basics - Python Cơ Bản",
    "placeCcon" : "Python Basics - Python Cơ Bản",
    "tieudeBanner": "Python Basics - Python Cơ Bản",
    "image": "../image/python.jpg",
    "courseName": "Python Basics - Python Cơ Bản",
    "newPrice": "999.000đ",
    "oldPrice": "1.999.000đ",
    "description": [
        "Python là một ngôn ngữ lập trình bậc cao cho các mục đích lập trình đa năng. Python được thiết kế với ưu điểm mạnh là dễ đọc, dễ học và dễ nhớ. Python là ngôn ngữ có hình thức rất sáng sủa, cấu trúc rõ ràng, thuận tiện cho người mới học lập trình và là ngôn ngữ lập trình dễ học.",
        "Cấu trúc của Python còn cho phép người sử dụng viết mã lệnh với số lần gõ phím tối thiểu. Python vì vậy được dùng rộng rãi trong cộng đồng khoa học dữ liệu và đặc biệt là trong học máy và phát triển trí tuệ nhân tạo.",
        "Đến với khóa học này, các bạn sẽ được trang bị những kiến thức, kỹ năng và phương pháp lập trình sử dụng các tính năng cốt lõi của Python như cú pháp câu lệnh, biến và các kiểu dữ liệu cơ bản, vòng lặp, hàm dựng sẵn và nhiều tính năng khác.",
        "Đồng thời, các bạn sẽ tự tay viết và chạy chương trình của chính mình bằng những công cụ lập trình Python chuyên nghiệp như PyCharm và Google Colab."
    ],
    "instructor": "Nguyễn Văn Trường An",
    "benefits": [
        "Cung cấp kiến thức, kỹ năng và phương pháp lập trình.",
        "Thực hành sử dụng các tính năng cốt lõi của Python: cú pháp câu lệnh, vòng lặp, hàm dựng sẵn...",
        "Lập trình và chạy chương trình bằng các công cụ lập trình chuyên nghiệp: PyCharm và Google Colab.",
        "Lập trình trực tiếp trên platform.",
        "Học tập chủ động, học tập tương tác."
    ]
};

var courseData12 = {
    "tieudeKhoahoc" : "Học diễn họa kiến trúc dùng 3Ds Max",
    "placeCcon" : "Học diễn họa kiến trúc dùng 3Ds Max",
    "tieudeBanner": "Học diễn họa kiến trúc dùng 3Ds Max",
    "image": "../image/dienhoa3.png",
    "courseName": "Học diễn họa kiến trúc dùng 3Ds Max",
    "newPrice": "599.000đ",
    "oldPrice": "2.800.000đ",
    "description": [
        "Học design, học cấp tốc diễn hoạ 3D kiến trúc nội thất sử dụng 3Ds Max."
        
    ],
    "instructor": "Nguyễn Văn Trường An",
    "benefits": [
        "Được làm quen với cả 3 phần mềm 3Ds Max, Vray và Photoshop.",
        "Tự mình dựng nên được những đồ vật 3D theo ý muốn.",
        "Hiểu sâu sắc hơn về vật liệu, ánh sáng trong tự nhiên, cũng như trong môi trường 3D.",
        "Nắm được quy trình làm việc chuyên nghiệp của họa viên kiến trúc nội thất.",
        "Nắm được những thủ thuật để khiến bức ảnh của bạn thêm sống động và sáng tạo.",
        "Biết cách sử dụng và quản lý nguồn thư viện 3D đa dạng miễn phí, chất lượng cao để sử dụng trong các dự án.",
        "Sử dụng miễn phí bộ thư viện đồ họa 3D nội ngoại thất đã được các hãng nổi tiếng thế giới sản xuất nhằm hỗ trợ thiết kế tiết kiệm thời gian (hơn 11GB tài liệu)."
    ]
};

var courseData13 = {
    "tieudeKhoahoc" : "Làm chủ cảm xúc - Thúc đẩy thành công",
    "placeCcon" : "Làm chủ cảm xúc - Thúc đẩy thành công",
    "tieudeBanner": "Làm chủ cảm xúc - Thúc đẩy thành công",
    "image": "../image/lamchucamxuc.jpg",
    "courseName": "Làm chủ cảm xúc - Thúc đẩy thành công",
    "newPrice": "299.000đ",
    "oldPrice": "700.000đ",
    "description": [
        "Làm chủ cảm xúc giúp bạn thành công trong giao tiếp."
    ],
    "instructor": "Nguyễn Văn Trường An",
    "benefits": [
        "Quản trị được cảm xúc của bản thân.",
        "Phát triển các kĩ năng làm chủ cảm xúc."
        
    ]
};

var courseData14 = {
    "tieudeKhoahoc" : "Kỹ năng tuyển dụng nhân viên",
    "placeCcon" : "Kỹ năng tuyển dụng nhân viên",
    "tieudeBanner": "Khóa học excel cho người đi làm",
    "image": "../image/tuyendung.jpeg",
    "courseName": "Kỹ năng tuyển dụng nhân viên",
    "newPrice": "399.000đ",
    "oldPrice": "600.000đ",
    "description": [
        "Những vấn đề trong tuyển dụng ứng viên và các bước triển khai kế hoạch nhân sự."
    ],
    "instructor": "Nguyễn Văn Trường An",
    "benefits": [
        "Khóa học hướng dẫn cách thiết lập các chiến lược nhân sự dựa vào nhu cầu và quy mô của công ty, từ đó có những bước triển khai kế hoạch một cách hợp lý nhất."
    ]
};

var courseData15 = {
    "tieudeKhoahoc" : "Ý thức tư duy trước và liên tưởng",
    "placeCcon" : "Ý thức tư duy trước và liên tưởng",
    "tieudeBanner": "Ý thức tư duy trước và liên tưởng",
    "image": "../image/tuduy.jpg",
    "courseName": "Ý thức tư duy trước và liên tưởng",
    "newPrice": "299.000đ",
    "oldPrice": "700.000đ",
    "description": [
        "Các khóa học là chuỗi ôn tập các các phương pháp khơi dậy và rèn luyện ý thức tư duy của mỗi con người theo các bước sau:",
        "1. Được hướng dẫn các ngày trong tuần trừ chủ nhật, các bài học mới sẽ được đăng tải mỗi ngày. Vui lòng truy cập vào trang web và tham gia các lớp học.",
        "2. Một bài học kéo dài từ 5-10 phút. Để bài học đạt hiệu quả hãy chọn thời gian học thích hợp để có thể chuyên tâm học như một thói quen"
    ],
    "instructor": "Nguyễn Văn Trường An",
    "benefits": [
    "Học hỏi nhanh.",
    "Không lặp lại thất bại tương tự.",
    "Cảm nhận vấn đề, sự cố trước khi chúng xảy ra.",
    "Không gặp rắc rối khi giao tiếp.",
    "Có thể tóm gọn nội dung câu chuyện của người nói.",
    "Khả năng ghi nhớ cao.",
    "Có thể sắp sếp vấn đề.",
    "Nghe 1 nhưng có thể phỏng đoán đến 10.",
    "Đối phương chưa nói gì thì bản thân mình cũng hiểu được họ.",
    "Có thể trình bày dễ hiểu cho đối phương.",
    "Có thể hiểu những câu chuyện phức tạp.",
    "Có thể tư duy một cách Logic.",
    "Tốc độ nhanh."
    ]
};

// Hàm lưu thông tin khóa học vào localStorage
function selectCourse(data) {
    localStorage.setItem('selectedCourse', JSON.stringify(data));
}
//lay thong tin gắn vào từng thẻ bên thongtin1.html
function displayCourseInfo(courseData) {
    
    document.getElementById('place-con').textContent = courseData.tieudeBanner;
    document.getElementById('tieude-khoahoc').textContent = courseData.tieudeBanner;
    document.getElementById('tieude-banner').textContent = courseData.tieudeBanner;
    document.getElementById('product-image').src = courseData.image;
    document.getElementById('course-name').textContent = courseData.courseName;
    document.getElementById('new-price').textContent = courseData.newPrice;
    document.getElementById('old-price').textContent = courseData.oldPrice;
    document.getElementById('instructor').textContent = "Tác giả: " + courseData.instructor;

    var descriptionContainer = document.getElementById('description');
    descriptionContainer.innerHTML = ''; // Clear previous content
    courseData.description.forEach(function(desc) {
        var p = document.createElement('p');
        p.textContent = desc;
        descriptionContainer.appendChild(p);
    });

    var benefitsContainer = document.getElementById('lo-trinh');
    benefitsContainer.innerHTML = ''; // Clear previous content
    var benefitsTitle = document.createElement('h3');
    benefitsTitle.textContent = 'Tổng quan';
    benefitsContainer.appendChild(benefitsTitle);
    var ul = document.createElement('ul');
    courseData.benefits.forEach(function(benefit) {
        var li = document.createElement('li');
        li.textContent = benefit;
        ul.appendChild(li);
    });
    benefitsContainer.appendChild(ul);
}
//-tạo các phần tử, lưu vào localStorage, gắn vào từng thẻ ở thongtin1.html, ở index thì onclick = gọi hàm(phần tử), hiển thị ở thongtin1.html
//endJson
//chuyen slide pro
let slideIndex = 1;
      showSlides(slideIndex);

      function plusSlides(n) {
        showSlides((slideIndex += n));
      }

      function currentSlide(n) {
        showSlides((slideIndex = n));
      }

      function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName('mySlides');
        let dots = document.getElementsByClassName('dot');
        if (n > slides.length) slideIndex = 1;
        if (n < 1) slideIndex = slides.length;
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = 'none';
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(' active', '');
        }
        slides[slideIndex - 1].style.display = 'block';
        dots[slideIndex - 1].className += ' active';
      }

      setInterval(() => {
            plusSlides(1);
      }, 3000);
     
//end chuyen slide pro

//tiến và lùi cac san pham
// let currentIndex = 0;
// const productContainer = document.getElementById('product-container');
// const products = document.querySelectorAll('.product-item');
// const totalProducts = products.length;
// const productsPerRow = 4; // Số lượng sản phẩm trên một hàng

// function showNextProduct() {
//     if (currentIndex + productsPerRow < totalProducts) {
//         currentIndex++;
//         updateProductPosition();
//     }
// }

// function showPreviousProduct() {
//     if (currentIndex > 0) {
//         currentIndex--;
//         updateProductPosition();
//     }
// }

// function updateProductPosition() {
//     const translateXValue = -(currentIndex * 100 / productsPerRow);
//     productContainer.style.transform = `translateX(${translateXValue}%)`;
//     updateProductVisibility();
// }

// function updateProductVisibility() {
//     products.forEach((product, index) => {
//         if (index >= currentIndex && index < currentIndex + productsPerRow) {
//             product.style.opacity = 1; // Hiển thị sản phẩm
//             product.style.pointerEvents = "auto"; // Kích hoạt sự kiện chuột
//         } else {
//             product.style.opacity = 0; // Ẩn sản phẩm
//             product.style.pointerEvents = "none"; // Vô hiệu hóa sự kiện chuột
//         }
//     });
// }

// Khởi tạo hiển thị ban đầu
updateProductVisibility();
//end tien va lui cac san pham
/*thong bao them sp */

/* end thong bao them sp */

