
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
    "tieudeKhoahoc" : "The Fury of the Gods",
    "placeCcon" : "The Fury of the Gods",
    "tieudeBanner": "The Fury of the Gods",
    "image": "../image/9780316539951_p0_v4_s600x595.jpg",
    "courseName": "The Fury of the Gods",
    "newPrice": "1.500.000đ",
    "oldPrice": "2.500.000đ",
    "description": [
        "The Fury of the Gods là cuốn sách cuối cùng gây chấn động trong loạt truyện giả tưởng sử thi lấy cảm hứng từ Bắc Âu của John Gwynne, chứa đầy những huyền thoại, ma thuật và sự báo thù đẫm máu. Trận chiến cuối cùng vì số phận của Vigrid đang đến gần, nơi các nhân vật chính phải đối mặt với những thử thách và hiểm nguy chưa từng thấy để bảo vệ thế giới khỏi sự diệt vong. Cuốn sách hứa hẹn sẽ mang đến một cuộc hành trình gay cấn và hồi hộp, dẫn dắt người đọc đến những kết thúc đầy bất ngờ và cảm xúc."
    ],
    "instructor": "John Gwynne",
    "benefits": [
        "Trận chiến cuối cùng vì số phận của Vigrid: Đang đến gần và là trung tâm của câu chuyện, xoay quanh cuộc đụng độ cuối cùng giữa các nhân vật chính.",
        "Varg: Anh đã trở thành thành viên của Bloodsworn và giờ phải đối mặt với nhiệm vụ tiêu diệt một con rồng cùng đồng đội.",
        "Elvar: Cô đấu tranh để củng cố quyền lực ở Snakavik và phải chuẩn bị cho cuộc xung đột sắp tới, đối đầu với sự hung dữ của thần sói.",
        "Biórr và Guðvarr: Biórr dẫn đầu nhóm chiến binh tiến về phía bắc, còn Guðvarr có tham vọng riêng, muốn giành được sự ưu ái của Lik-Rifa.",
        "Snakavik: Là nơi tất cả các con đường đều dẫn đến, vạch ra ranh giới cho trận chiến cuối cùng—một cuộc đụng độ sẽ làm rung chuyển thế giới và chứng kiến cơn thịnh nộ của các vị thần."
    ]
};

var courseData9 = {
    "tieudeKhoahoc" : "Patriot: A Memoir",
    "placeCcon" : "Patriot: A Memoir",
    "tieudeBanner": "Patriot: A Memoir",
    "image": "../image/9780593320969_p0_v2_s600x595.jpg",
    "courseName": "Patriot: A Memoir",
    "newPrice": "500.000đ",
    "oldPrice": "1.500.000đ",
    "description": [
        "Phiên bản đặc biệt giới hạn của Barnes & Noble cho cuốn Skandar and the Skeleton Curse, phần thứ tư trong loạt truyện giả tưởng kỳ diệu dành cho độ tuổi trung học của A.F. Steadman, đi kèm với bìa được đóng dấu nhũ độc quyền, lớp nhũ holographic đặc biệt, trang cuối màu xanh và nội dung bổ sung. Cuộc phiêu lưu tiếp tục với phần thứ tư đầy hồi hộp trong series Skandar, được viết bởi tác giả bán chạy hàng đầu New York Times và quốc tế A.F. Steadman! Cuốn sách hứa hẹn mang đến những bất ngờ và kịch tính mới, đưa độc giả vào những cuộc hành trình kỳ thú cùng những nhân vật yêu thích"
    ],
    "instructor": "Alexei Navalny",
    "benefits": [
    "Khám phá cuộc đời đầy cảm hứng của Alexei Navalny, một nhà lãnh đạo đối lập kiên cường và dũng cảm.",
    "Nhận thức sâu sắc về sự hi sinh và cam kết của Navalny trong cuộc chiến chống lại chế độ độc tài.",
    "Đọc những chi tiết chưa từng được tiết lộ về các nỗ lực của ông trong việc đấu tranh cho tự do cá nhân và quyền con người.",
    "Thấu hiểu những thách thức mà một nhà hoạt động chính trị phải đối mặt, bao gồm những nỗ lực ám sát và áp lực từ chính quyền.",
    "Cảm nhận tầm quan trọng của các nguyên tắc tự do cá nhân và trách nhiệm của mỗi người trong việc bảo vệ những giá trị này.",
    "Khơi dậy lòng can đảm và động lực để đứng lên vì những gì là đúng, nhờ vào câu chuyện mạnh mẽ và chân thực của Navalny."
]
};

var courseData10 = {
    "tieudeKhoahoc" : "Skandar and the Skeleton Curse",
    "placeCcon" : "Skandar and the Skeleton Curse",
    "tieudeBanner": "Skandar and the Skeleton Curse",
    "image": "../image/9781665971720_p0_v2_s600x595.jpg",
    "courseName": "Skandar and the Skeleton Curse",
    "newPrice": "1.300.000đ",
    "oldPrice": "2.500.000đ",
    "description": [
        "Ngày nay khách hàng rất thông minh, nếu bạn không trở thành người bán hàng xuất sắc bạn sẽ không bán được hàng. Bạn sẽ không biết đâu là điểm tử huyệt của khách hàng. Khách hàng quyết định rất nhanh là có mua sản phẩm của bạn hay không. Do đó bạn phải nằm được yếu tố cảm xúc then chốt. và khóa học này còn chia sẻ với bạn: Khi nào tiếp cần, khi nào giải trình, khi nào đồng điệu, khi nào chốt sale, chăm sóc và giải trình làm sao. Bạn khó khăn trong việc giải quyết vấn đề của khách hàng. Làm thế nào để bạn chốt được những đơn hàng khủng và khách hàng lại happy Làm thế nào để xây dựng hệ thống nhân lực, hệ thống phân phối mạnh mẽ Làm thế nào để vượt qua những kháng cự bên trong bạn và hành động với năng lượng đỉnh cao Làm thế nào để tư duy của bạn vượt thoat từ trong tâm thức của ban."
    ],
    "instructor": "A.F. Steadman",
    "benefits": [
    "Khám phá một cuộc phiêu lưu kỳ thú trong phần thứ tư của series Skandar, mang đến những bất ngờ và sự hồi hộp không ngừng.",
    "Theo dõi hành trình của Skandar và bạn bè khi họ đối mặt với lời nguyền đáng sợ đe dọa đến toàn bộ hòn đảo và những chú kỳ lân.",
    "Tìm hiểu về các nhân vật đa dạng và phát triển của họ khi họ chiến đấu chống lại một thế lực ác độc.",
    "Tham gia vào một câu chuyện hấp dẫn đầy tình bạn, lòng dũng cảm và quyết tâm trong cuộc chiến giành lấy tương lai của hòn đảo.",
    "Thưởng thức phiên bản đặc biệt của cuốn sách với thiết kế bìa độc quyền và nội dung bổ sung, làm tăng giá trị cho bộ sưu tập của bạn.",
    "Trải nghiệm một tác phẩm văn học được viết bởi tác giả bán chạy hàng đầu, mang đến sự hứng thú cho độc giả ở mọi lứa tuổi."
]

};

var courseData11 = {
    "tieudeKhoahoc" : "The Night We Lost Him: A Novel",
    "placeCcon" : "The Night We Lost Him: A Novel",
    "tieudeBanner": "The Night We Lost Him: A Novel",
    "image": "../image/9781668002957_p0_v3_s600x595.jpg",
    "courseName": "The Night We Lost Him: A Novel",
    "newPrice": "499.000đ",
    "oldPrice": "800.000đ",
    "description": [
        "The Night We Lost Him là cuốn tiểu thuyết đầy hấp dẫn từ tác giả bán chạy số 1 New York Times, Laura Dave. Trong phiên bản đặc biệt của Barnes & Noble, cuốn sách được ký bởi tác giả, đi kèm bìa và trang cuối độc đáo, cùng với nội dung bổ sung chỉ có cho khách hàng của Barnes & Noble. Được vinh danh là một trong những cuốn sách được mong đợi nhất mùa thu bởi Time, Goodreads và Brit + Co, cũng như là một trong những tiểu thuyết mới nhất được Oprah Daily ca ngợi. Cuốn sách kể về hai anh chị em xa cách khi phát hiện ra rằng cha họ đã giữ một bí mật suốt hơn năm mươi năm, một bí mật có thể đã dẫn đến cái chết của ông. Hành trình giải mã cái chết đầy bí ẩn này đưa họ vào một cuộc tìm kiếm không chỉ để làm sáng tỏ quá khứ mà còn để hàn gắn những vết thương trong mối quan hệ gia đình."
    ],
    "instructor": "Laura Dave",
   "benefits": [
    "Khám phá một câu chuyện ly kỳ về gia đình và bí mật được giữ kín suốt hơn năm mươi năm.",
    "Theo dõi hành trình của hai anh chị em xa cách khi họ hợp tác để giải mã cái chết đầy bí ẩn của cha mình.",
    "Trải nghiệm sự kết hợp hoàn hảo giữa yếu tố hồi hộp và kịch tính gia đình, khiến người đọc luôn bị cuốn hút.",
    "Nhận diện những chi tiết sâu sắc và tinh tế trong việc xây dựng nhân vật, từ người cha huyền bí đến những mối quan hệ phức tạp giữa các thành viên trong gia đình.",
    "Thưởng thức phiên bản đặc biệt với chữ ký của tác giả và các nội dung độc quyền, mang đến giá trị đặc biệt cho độc giả.",
    "Cảm nhận một cú sốc tâm lý mạnh mẽ với đoạn kết không thể đoán trước, để lại ấn tượng sâu sắc trong lòng người đọc."
]

};

var courseData12 = {
    "tieudeKhoahoc" : "War",
    "placeCcon" : "War",
    "tieudeBanner": "War",
    "image": "../image/9781668052273_p0_v2_s600x595.jpg",
    "courseName": "War",
    "newPrice": "800.000đ",
    "oldPrice": "1.500.000đ",
    "description": [
        "Cuốn sách của Bob Woodward, một nhà báo hai lần đoạt giải Pulitzer, mang đến cái nhìn sâu sắc về ba cuộc chiến quan trọng: Ukraine, Trung Đông và cuộc đấu tranh chính trị cho chức vụ Tổng thống Mỹ. Thông qua các câu chuyện và thông tin chưa từng được công bố, Woodward hé lộ những cuộc đối thoại căng thẳng giữa các nhà lãnh đạo hàng đầu, khám phá những quyết định chính trị có tầm ảnh hưởng lớn và những thách thức mà họ phải đối mặt trong bối cảnh chiến tranh. Với phong cách báo chí điều tra sắc sảo, tác phẩm này không chỉ cung cấp thông tin mà còn khơi dậy những suy ngẫm sâu sắc về quyền lực, trách nhiệm và sự phức tạp của chính trị toàn cầu."
    ],
    "instructor": "Bob Woodward",
   "benefits": [
    "Khám phá một giai đoạn đầy biến động trong chính trị tổng thống và lịch sử Mỹ, từ góc độ của những nhà lãnh đạo quan trọng.",
    "Nhận cái nhìn sâu sắc về các cuộc đối thoại căng thẳng giữa Tổng thống Joe Biden và các nhà lãnh đạo quốc tế như Vladimir Putin, Benjamin Netanyahu và Volodymyr Zelensky.",
    "Tìm hiểu về cách Biden quản lý cuộc chiến Ukraine, được coi là cuộc chiến đất lớn nhất ở châu Âu kể từ Thế chiến II.",
    "Được tiếp cận với những báo cáo độc quyền về chiến lược và quyết định trong bối cảnh ngoại giao thời chiến, bao gồm cả nỗ lực ngăn chặn vũ khí hạt nhân.",
    "Thấy rõ cuộc chiến chính trị giữa Biden và Trump khi người dân Mỹ chuẩn bị bỏ phiếu vào năm 2024, cùng với sự nổi bật bất ngờ của Kamala Harris.",
    "Được xem xét cận cảnh về vai trò của Phó Tổng thống Kamala Harris trong việc tiếp nối di sản của Biden và phát triển con đường riêng của mình như một ứng viên tổng thống.",
    "Tham khảo phong cách báo chí uy tín và chi tiết của Bob Woodward, người thiết lập tiêu chuẩn cao cho báo chí điều tra."
]

};

var courseData13 = {
    "tieudeKhoahoc" : "The Hotel Balzaar",
    "placeCcon" : "The Hotel Balzaar",
    "tieudeBanner": "The Hotel Balzaar",
    "image": "../image/9781536223316_p0_v1_s600x595.jpg",
    "courseName": "The Hotel Balzaar",
    "newPrice": "500.000đ",
    "oldPrice": "1.500.000đ",
    "description": [
        "Một cuốn sách ngay lập tức trở thành bestseller của New York Times! Trong phần tiếp theo đầy trí tuệ và kỳ diệu của The Puppets of Spelhorst, Kate DiCamillo đưa người đọc trở lại vùng đất Norendy, nơi những câu chuyện hòa quyện vào nhau—và mỗi khoảnh khắc đều là một câu chuyện đang hình thành. Khám phá một thế giới phong phú và hấp dẫn, nơi mà trí tưởng tượng không có giới hạn, và những cuộc phiêu lưu thú vị chờ đón ở mỗi ngã rẽ. Cuốn sách hứa hẹn mang đến một trải nghiệm kỳ diệu cho cả trẻ em và người lớn, với thông điệp sâu sắc về sức mạnh của câu chuyện và sự kết nối"
    ],
    "instructor": "Kate DiCamillo, Júlia Sardà ",
   "benefits": [
    "Khám phá cuộc sống đầy màu sắc tại Hotel Balzaar thông qua góc nhìn của Marta, một cô bé với trí tưởng tượng phong phú.",
    "Theo dõi hành trình tìm kiếm cha của Marta, một cựu quân nhân mất tích, qua những câu chuyện kỳ diệu mà một vị countess bí ẩn mang đến.",
    "Thưởng thức những câu chuyện đa dạng và hấp dẫn, mỗi câu chuyện được kể theo thứ tự hợp lý, tạo nên một trải nghiệm đọc liền mạch và cuốn hút.",
    "Được chiêm ngưỡng những hình ảnh minh họa tinh tế của Júlia Sardà, làm phong phú thêm nội dung của từng câu chuyện.",
    "Trải nghiệm những chủ đề sâu sắc về nỗi khao khát, lòng tin và sự kết nối giữa các nhân vật, mang lại cảm xúc chân thực cho người đọc.",
    "Thúc đẩy trí tưởng tượng của trẻ em và người lớn, khuyến khích họ khám phá những khía cạnh mới mẻ trong cuộc sống qua lăng kính của nghệ thuật và văn chương."
]

};

var courseData14 = {
   "tieudeKhoahoc" : "How My Neighbor Stole Christmas",
    "placeCcon" : "How My Neighbor Stole Christmas",
    "tieudeBanner": "How My Neighbor Stole Christmas",
    "image": "../image/9781464240942_p0_v2_s600x595.jpg",
    "courseName": "How My Neighbor Stole Christmas",
    "newPrice": "500.000đ",
    "oldPrice": "1.500.000đ",
    "description": [
        "Phiên bản độc quyền của Barnes & Noble mang đến bìa đặc biệt với lớp foil lấp lánh. Đây là một câu chuyện lãng mạn mùa lễ hội đầy thú vị về tình yêu từ sự thù ghét chuyển thành tình bạn, được viết bởi tác giả Meghan Quinn, một trong những cái tên bán chạy của USA Today. Trong cuốn sách này, những mâu thuẫn và những cuộc chiến tranh giành tình cảm giữa hai nhân vật chính tạo nên một hành trình cảm xúc phong phú, khi họ dần nhận ra rằng tình yêu có thể nảy nở từ những hiểu lầm và xung đột. Khám phá những khoảnh khắc hài hước và lãng mạn trong bối cảnh mùa lễ hội, nơi mà mọi thứ đều có thể xảy ra và tình yêu có thể tìm thấy bạn ở những nơi bất ngờ nhất."
    ],
    "instructor": "Meghan Quinn",
   "benefits": [
    "Khám phá tâm lý phức tạp của một nhân vật chính bị tổn thương, giúp người đọc hiểu thêm về nỗi đau và sự cô đơn trong cuộc sống.",
    "Học về giá trị của tình yêu và sự kết nối trong gia đình, đặc biệt là trong mùa lễ hội, thông qua hành trình của Cole và mối quan hệ với những người xung quanh.",
    "Nhận thức được ảnh hưởng của nỗi mất mát và sự cô đơn đến tâm trạng của một người, đồng thời khuyến khích sự đồng cảm từ phía người đọc.",
    "Trải nghiệm những chủ đề về sự chấp nhận và sự chữa lành, khi Cole dần mở lòng với những người khác và bắt đầu khám phá ý nghĩa thực sự của Giáng sinh.",
    "Thúc đẩy ý thức cộng đồng và tầm quan trọng của việc chăm sóc lẫn nhau, đặc biệt là trong những thời điểm khó khăn và đầy thử thách.",
    "Tận hưởng một câu chuyện lãng mạn ấm áp, mang lại hy vọng và ánh sáng ngay cả trong những khoảnh khắc tăm tối nhất."
]

};

var courseData15 = {
    "tieudeKhoahoc" : "Your Pasta Sucks: A (Cookbook)",
    "placeCcon" : "Your Pasta Sucks: A (Cookbook)",
    "tieudeBanner": "Your Pasta Sucks: A (Cookbook)",
    "image": "../image/9781797237138_p0_v1_s600x595.jpg",
    "courseName": "Your Pasta Sucks: A (Cookbook)",
    "newPrice": "500.000đ",
    "oldPrice": "1.500.000đ",
    "description": [
        "Cuốn sách này không chỉ đơn thuần là một cuốn sách nấu ăn; nó là một hành trình hài hước và thú vị qua thế giới ẩm thực của Matteo Lane! Với tựa đề ‘Your Pasta Sucks, But It Doesn't Have To,’ tác giả nổi tiếng này sẽ hướng dẫn bạn cách chế biến 30 công thức mì ống ngon miệng, cùng với những câu chuyện hài hước không thể nhịn cười. Matteo không chỉ mang đến cho bạn những bí quyết nấu ăn đầy sáng tạo mà còn chia sẻ những kỷ niệm, những khoảnh khắc trong cuộc sống của mình, làm cho mỗi trang sách trở nên sống động và thú vị. Dù bạn là một đầu bếp chuyên nghiệp hay chỉ đơn giản là một người yêu thích ẩm thực, cuốn sách này sẽ biến bữa ăn của bạn trở nên đáng nhớ hơn bao giờ hết!"
    ],
    "instructor": " Matteo Lane",
   "benefits": [
    "Khám phá cách làm pasta từ những công thức dễ hiểu và thực tế, giúp người đọc tự tin hơn trong bếp.",
    "Học hỏi từ những kinh nghiệm và mẹo vặt của Matteo, từ cách làm pasta tại nhà đến những bí quyết không bao giờ thất bại.",
    "Thưởng thức một cách tiếp cận hài hước và gần gũi với ẩm thực Ý, giúp người đọc không chỉ nấu ăn mà còn cảm nhận được văn hóa và lối sống của Italia.",
    "Tận hưởng sự kết hợp hoàn hảo giữa nấu ăn và giải trí, mang lại cảm giác như đang trò chuyện và nấu nướng cùng một người bạn thân thiết.",
    "Mở rộng hiểu biết về ẩm thực Ý thông qua những câu chuyện thú vị và góc nhìn độc đáo của Matteo, từ các món ăn nổi tiếng đến cách thưởng thức cafe ở Rome.",
    "Đem lại niềm vui và sự phấn khích khi nấu ăn, khuyến khích người đọc chấp nhận sự hỗn loạn trong quá trình sáng tạo món ăn, và tạo ra những bữa ăn đáng nhớ cho bạn bè và gia đình."
]

};
var courseData18 = {
    "tieudeKhoahoc" : "Hope: The Autobiography",
    "placeCcon" : "Hope: The Autobiography",
    "tieudeBanner": "Hope: The Autobiography",
    "image": "../image/9780593978771_p0_v3_s600x595.jpg",
    "courseName": "Hope: The Autobiography",
    "newPrice": "500.000đ",
    "oldPrice": "1.500.000đ",
    "description": [
        "“‘Hy vọng’ không chỉ là một cuốn tự truyện mà là một hành trình cảm động qua cuộc đời và những suy nghĩ của Giáo hoàng Francis. Với mong muốn chia sẻ câu chuyện của mình trong bối cảnh khẩn thiết của thời đại, Ngài đã viết cuốn sách này với sự chân thành và trí tuệ sâu sắc. Từ những ngày đầu của cuộc đời mình ở Argentina cho đến những thách thức trong vai trò giáo hoàng, cuốn sách đưa ra cái nhìn sâu sắc về các vấn đề nóng bỏng như chiến tranh, hòa bình, và vai trò của phụ nữ trong xã hội hiện đại. Qua những kỷ niệm và suy tư của mình, Giáo hoàng Francis không chỉ truyền tải thông điệp về niềm hy vọng mà còn khuyến khích mọi người cùng tham gia vào cuộc đối thoại về những vấn đề quan trọng hiện nay. ‘Hy vọng’ là một di sản tinh thần đáng giá cho các thế hệ tương lai, mời gọi độc giả cùng suy ngẫm và hành động vì một thế giới tốt đẹp hơn.”"
        
    ],
    "instructor": "Pope Francis, Carlo Musso , Richard Dixon",
    "benefits": [
    "Khám phá câu chuyện cuộc đời của Giáo hoàng Francis từ những năm tháng đầu đời cho đến những thách thức trong vai trò lãnh đạo tôn giáo, giúp người đọc hiểu rõ hơn về con người và niềm tin của Ngài.",
    "Tiếp cận những suy tư sâu sắc về các vấn đề hiện tại như chiến tranh, môi trường, và quyền phụ nữ, mang lại góc nhìn toàn diện về các thách thức mà xã hội đang phải đối mặt.",
    "Hưởng thụ những câu chuyện và kỷ niệm chân thực, thể hiện tính cách gần gũi và hài hước của Giáo hoàng, khiến người đọc cảm thấy như đang trò chuyện với một người bạn thân.",
    "Khám phá những bức ảnh độc đáo và chưa từng được công bố trước đây, làm phong phú thêm trải nghiệm đọc sách và tạo ra kết nối sâu sắc với cuộc sống của Giáo hoàng.",
    "Nhận được những thông điệp mạnh mẽ về hy vọng và lòng can đảm, khuyến khích người đọc hành động vì những giá trị tốt đẹp trong cuộc sống hàng ngày.",
    "Tạo ra một di sản đầy cảm hứng cho các thế hệ tương lai, nhấn mạnh tầm quan trọng của sự thấu hiểu và đoàn kết trong một thế giới đang thay đổi nhanh chóng."
]


};
var courseData17 = {
    "tieudeKhoahoc" : "Cher: The Memoir, Part One",
    "placeCcon" : "Cher: The Memoir, Part One",
    "tieudeBanner": "Cher: The Memoir, Part One",
    "image": "../image/9780062863102_p0_v3_s600x595.jpg",
    "courseName": "Cher: The Memoir, Part One",
    "newPrice": "499.000đ",
    "oldPrice": "800.000đ",
    "description": [
        "Cher: The Memoir là một cuộc hành trình khám phá cuộc đời phi thường của một trong những biểu tượng lớn nhất của âm nhạc và văn hóa. Từ những năm tháng đầu đời đầy thử thách cho đến khi trở thành một ngôi sao toàn cầu, Cher dẫn dắt độc giả qua những câu chuyện chân thực và xúc động về sự nghiệp, tình yêu và gia đình. Với phong cách kể chuyện độc đáo và sự chân thành đặc trưng, Cher không chỉ chia sẻ những khoảnh khắc đáng nhớ trong cuộc sống của mình mà còn mở lòng về những khó khăn, thành công và những bài học quý giá mà cô đã học được. Đây là một tác phẩm không thể bỏ qua cho bất kỳ ai yêu thích âm nhạc và muốn hiểu rõ hơn về người phụ nữ đứng sau những bản hit vĩ đại."
    ],
    "instructor": "Cher",
    "benefits": [
    "Khám phá cuộc đời đầy cảm hứng của Cher từ những năm tháng đầu đời cho đến khi trở thành biểu tượng âm nhạc, giúp người đọc hiểu rõ hơn về hành trình vượt khó của một người phụ nữ mạnh mẽ.",
    "Tiếp cận những câu chuyện chân thực về sự nghiệp của Cher, từ những thăng trầm trong âm nhạc đến những thành công lịch sử, nhấn mạnh sự kiên trì và đam mê trong công việc.",
    "Nhận được cái nhìn sâu sắc về mối quan hệ phức tạp với Sonny Bono, một phần quan trọng trong cuộc đời Cher, và cách mà nó đã hình thành nên con người và nghệ thuật của cô.",
    "Hưởng thụ sự hài hước và chân thành trong cách viết của Cher, khiến độc giả cảm thấy gần gũi và dễ dàng đồng cảm với những trải nghiệm cá nhân của cô.",
    "Khám phá những khía cạnh chưa từng được kể về cuộc sống riêng tư của Cher, từ vai trò của một người mẹ cho đến những khó khăn và niềm vui trong gia đình.",
    "Đem lại nguồn cảm hứng mạnh mẽ cho độc giả, khuyến khích họ theo đuổi ước mơ của mình bất chấp mọi thử thách, giống như Cher đã làm trong suốt sự nghiệp của mình."
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

