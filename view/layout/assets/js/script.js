
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
document.querySelectorAll('.input[type="submit"][name="btnaddcart"]').forEach(button => {
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
    "newPrice": "500.000đ",
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
    "tieudeKhoahoc" : "Great Big Beautiful Life",
    "placeCcon" : "Great Big Beautiful Life",
    "tieudeBanner": "Great Big Beautiful Life",
    "image": "../image/GreatBig.jpg",
    "courseName": "Great Big Beautiful Life",
    "newPrice": "299.000đ",
    "oldPrice": "700.000đ",
    "description": [
        "Một nữ thừa kế khó nắm bắt, một câu chuyện tình yêu và một bí ẩn. Thanh lọc, lãng mạn, bi thảm và quyến rũ, Emily Henry nói với độc giả của mình rằng cuốn sách này đã thách thức cô ấy như chưa từng có. Hãy lấy thêm một bản sao — bạn sẽ muốn chia sẻ nó với tất cả mọi người mà bạn biết."
    ],
    "instructor": "Freida McFadden",
    "benefits": [
        "Hai nhà văn cạnh tranh nhau để có cơ hội kể câu chuyện lớn hơn cuộc đời về một người phụ nữ với nhiều tình tiết bất ngờ trong cuốn tiểu thuyết mới hấp dẫn và sâu sắc này của Emily Henry.",
        "Hài hước và sâu sắc: Cuốn sách mang đến sự pha trộn giữa hài hước và những suy tư sâu sắc về sự tự do, độc lập, cùng những khó khăn trong việc chấp nhận các giá trị xã hội áp đặt lên phụ nữ.",
        "Chủ đề cuộc sống hiện đại: Cuốn sách tập trung vào các khía cạnh của cuộc sống hiện đại, đặc biệt là đối với những phụ nữ độc thân, phản ánh những thay đổi trong xã hội về quan niệm hôn nhân và gia đình.",
        "Văn phong sống động: Tác giả sử dụng lối viết linh hoạt, sống động, kết hợp giữa các tình huống đời thường và sự quan sát thông minh, thu hút người đọc qua các câu chuyện cá nhân hài hước và đầy màu sắc."
    ]
};

var courseData2 = {
    "tieudeKhoahoc" : "Onyx Storm",
    "placeCcon" : "Onyx Storm",
    "tieudeBanner": "Onyx Storm",
    "image": "../image/OnyxStorm.jpg",
    "courseName": "Onyx Storm",
    "newPrice": "399.000đ",
    "oldPrice": "1.000.000đ",
    "description": [
    "Cái kết gây sốc của Iron Flame khiến chúng ta chóng mặt vì muốn xem phần thứ ba trong loạt phim phi thường của Yarros. Với tình yêu đã giành được và mất đi, những trận chiến đã diễn ra và chiến thắng — Onyx Storm là một chuyến đi sắc bén khác trên lưng rồng."
    ],
    "instructor": "Rebecca Yarros",
    "benefits": [
    "Sau gần mười tám tháng học tại Cao đẳng Chiến tranh Basgiath, Violet Sorrengail biết rằng không còn thời gian cho việc học nữa. Không còn thời gian cho sự bất định nữa.",
    "Bởi vì trận chiến đã thực sự bắt đầu, và với kẻ thù đang tiến đến từ bên ngoài bức tường và bên trong hàng ngũ của họ, không thể biết nên tin tưởng ai.",
    "Bây giờ Violet phải vượt qua những khu vực Aretian đang suy yếu để tìm kiếm đồng minh từ những vùng đất xa lạ để sát cánh cùng Navarre. Chuyến đi sẽ thử thách mọi trí thông minh, may mắn và sức mạnh của cô, nhưng cô sẽ làm bất cứ điều gì để cứu những gì cô yêu quý—rồng, gia đình, nhà cửa và anh .",
    "Họ cần một đội quân. Họ cần sức mạnh. Họ cần phép thuật . Và họ cần một thứ duy nhất mà chỉ Violet mới có thể tìm thấy—sự thật.",
    "Nhưng một cơn bão đang đến...và không phải ai cũng có thể sống sót sau cơn thịnh nộ của nó."
    ]
};

var courseData3 = {
    "tieudeKhoahoc" : "The Knight and the Moth",
    "placeCcon" : "The Knight and the Moth",
    "tieudeBanner": "The Knight and the Moth",
    "image": "../image/TheKnightandtheMoth.jpg",
    "courseName": "The Knight and the Moth",
    "newPrice": "99.000đ",
    "oldPrice": "199.000đ",
    "description": [
        "Một câu chuyện cổ tích khiến bạn mê mẩn, Rachel Gillig ( One Dark Window ) đan xen giữa sự lãng mạn, phép thuật và văn hóa dân gian thành một câu chuyện tuyệt vời. Câu chuyện này hoàn hảo cho những người hâm mộ Naomi Novik và Ava Reid."
    ],
    "instructor": "Rachel Gillig",
    "benefits": [
    "Sybil Delling đã dành chín năm mơ ước không có giấc mơ nào cả.",
    "Trong giấc mơ, cô nhận được những hình ảnh từ sáu nhân vật siêu nhiên được gọi là Điềm báo..",
    "Từ họ, cô có thể dự đoán những điều khủng khiếp trước khi chúng xảy ra, và các lãnh chúa cũng như người dân thường đều du hành khắp vương quốc đồng cỏ lộng gió của Traum để biết tương lai của họ thông qua những giấc mơ của cô."
    ]
};

var courseData4 = {
    "tieudeKhoahoc" : "One Dark Window",
    "placeCcon" : "One Dark Window",
    "tieudeBanner": "One Dark Window",
    "image": "../image/OneDarkWindow.jpg",
    "courseName": "One Dark Window",
    "newPrice": "500.000đ",
    "oldPrice": "1.500.000đ",
    "description": [
        "Tác phẩm đầu tay kỳ ảo đen tối, tươi tốt này mang đến thế giới đầy cảm xúc, phép thuật giống như bài tarot của phù thủy và một chủ đề lãng mạn nồng nhiệt. Đây là sự tưởng tượng lại một cách lỏng lẻo của bản ballad dân gian Anh The Highwayman và đọc giống như một câu chuyện ngụ ngôn vượt thời gian. Hoàn hảo cho những người hâm mộ Sarah J. Maas, Naomi Novik, Hannah Whitten và những người muốn có một chút gia vị trong thế giới tưởng tượng quái vật gothic của họ."
    ],
    "instructor": " Rachel Gillig",
    "benefits": [
        "Elspeth cần một con quái vật. Con quái vật đó có thể là cô.",
        "Elspeth Spindle cần nhiều hơn may mắn để được an toàn trong vương quốc kỳ lạ, bị sương mù bao phủ mà cô gọi là nhà—cô cần một con quái vật. Cô gọi anh ta là Ác mộng, một linh hồn cổ xưa, thất thường bị mắc kẹt trong đầu cô. Anh ta bảo vệ cô. Anh ta giữ bí mật của cô.",
        "Nhưng không có gì là miễn phí, đặc biệt là phép thuật.",
        "Khi Elspeth gặp một tên cướp đường bí ẩn trên con đường rừng, cuộc sống của cô đã thay đổi hoàn toàn. Bị đẩy vào một thế giới bóng tối và lừa dối, cô tham gia vào một nhiệm vụ nguy hiểm để chữa khỏi vương quốc khỏi ma thuật đen đang lây nhiễm nó. Ngoại trừ tên cướp đường tình cờ là cháu trai của Nhà vua, Đội trưởng của Destriers… và phạm tội phản quốc.",
        "Anh ta và Elspeth có thời gian cho đến Solstice để thu thập mười hai Thẻ Providence—chìa khóa để chữa khỏi. Nhưng khi tiền cược tăng cao và sức hấp dẫn không thể phủ nhận của họ ngày càng mãnh liệt, Elspeth buộc phải đối mặt với bí mật đen tối nhất của mình: Ác mộng đang từ từ, đen tối, chiếm lấy tâm trí cô. Và cô có thể không thể ngăn cản anh ta."
    ]
};

var courseData5 = {
    "tieudeKhoahoc" : "The Mighty Red",
    "placeCcon" : "The Mighty Red",
    "tieudeBanner": "The Mighty Red",
    "image": "../image/TheMightyRed.jpg",
    "courseName": "The Mighty Red",
    "newPrice": "379.000đ",
    "oldPrice": "800.000đ",
    "description": [
        "Tác giả đoạt giải Pulitzer Louise Erdrich trở lại thế giới của The Beet Queen trong câu chuyện sâu sắc về thế giới tự nhiên, địa điểm và cộng đồng, hoàn hảo cho những người hâm mộ Demon Copperhead của Barbara Kingsolver và The Overstory của Richard Powers."
    ],
    "instructor": "Louise Erdrich",
    "benefits": [
        "Trong cuốn tiểu thuyết tuyệt vời này, tác giả đoạt giải Pulitzer và Giải thưởng Sách quốc gia Louise Erdrich kể câu chuyện về tình yêu, sức mạnh tự nhiên, khát vọng tâm linh và tác động bi thảm của những hoàn cảnh không thể kiểm soát lên cuộc sống của những người bình thường.",
        "Lịch sử là một trận lụt. Màu đỏ hùng mạnh...",
        "Gary Geist, một chàng trai trẻ sợ hãi sắp được thừa kế hai trang trại, vô cùng muốn kết hôn với Kismet Poe, một người đàn ông Goth bốc đồng, sa ngã, không thể đọc được tương lai của mình nhưng dường như đã quyết định được tương lai của mình. "
    ]
};

var courseData6 = {
    "tieudeKhoahoc" : "Intermezzo",
    "placeCcon" : "Intermezzo",
    "tieudeBanner": "Intermezzo",
    "image": "../image/Intermezzo.jpg",
    "courseName": "Intermezzo",
    "newPrice": "699.000đ",
    "oldPrice": "1.700.000đ",
    "description": [
        "Tất cả chúng ta đều bị Sally Rooney mê hoặc với tác phẩm đầu tay tuyệt vời Conversations with Friends — giờ chúng ta đã sẵn sàng để yêu thêm lần nữa. Intermezzo thực sự thăng hoa với những mối quan hệ phức tạp (lãng mạn và gia đình) và lối viết đặc trưng mà chúng ta không thể ngừng yêu từ một biểu tượng văn học."
    ],
    "instructor": " Sally Rooney",
    "benefits": [
        "Một câu chuyện vô cùng cảm động về nỗi đau, tình yêu và gia đình từ hiện tượng toàn cầu Sally Rooney.",
        "Ngoài việc là anh em, Peter và Ivan Koubek dường như có rất ít điểm chung.",
        "Peter là một luật sư ở Dublin ngoài ba mươi tuổi—thành đạt, có năng lực và dường như không thể bị tấn công. Nhưng sau cái chết của cha mình, anh phải dùng thuốc để ngủ và đấu tranh để quản lý mối quan hệ của mình với hai người phụ nữ rất khác nhau—mối tình đầu bền bỉ của anh, Sylvia, và Naomi, một sinh viên đại học mà cuộc sống chỉ là một trò đùa dài.",
        "Ivan là một kỳ thủ cờ vua chuyên nghiệp hai mươi hai tuổi. Anh luôn coi mình là người vụng về trong giao tiếp xã hội, một kẻ cô độc, trái ngược hẳn với người anh trai lắm lời của mình. Bây giờ, trong những tuần đầu của nỗi đau mất mát, Ivan gặp Margaret, một người phụ nữ lớn tuổi đang thoát khỏi quá khứ đầy biến động của chính mình, và cuộc sống của họ nhanh chóng và gắn bó chặt chẽ với nhau.",
        "Đối với hai anh em đang đau buồn và những người họ yêu thương, đây là một khoảng thời gian mới - một giai đoạn của khát khao, tuyệt vọng và khả năng; một cơ hội để tìm hiểu xem cuộc sống của một người có thể chứa đựng được bao nhiêu mà không bị tan vỡ."
    ]
};

var courseData7 = {
    "tieudeKhoahoc" : "The Striker",
    "placeCcon" : "The Striker",
    "tieudeBanner": "The Striker",
    "image": "../image/TheStriker.jpg",
    "courseName": "The Striker",
    "newPrice": "999.000đ",
    "oldPrice": "2.700.000đ",
    "description": [
        "Đây là Ted Lasso với mối tình bị cấm đoán mà tất cả chúng ta đều khao khát. Liệu nữ diễn viên ballet tài năng này có thể chiếm được trái tim (và cái tôi) của cầu thủ bóng đá giỏi nhất thế giới không?"
    ],
    "instructor": "Ana Huang",
    "benefits": [
        "Cô ấy là người phụ nữ duy nhất anh muốn...và cũng là người duy nhất anh không thể có được.",
        "Asher Donovan là một huyền thoại sống - cầu thủ được yêu thích nhất của Giải Ngoại hạng Anh, cầu thủ bóng đá (có thể nói là) vĩ đại nhất thế giới.",
        "Nhưng những trò hề liều lĩnh và việc chuyển đội gần đây của anh đã gây ra nhiều tranh cãi, và khi mối thù của anh với đối thủ trở thành đồng đội khiến họ mất chức vô địch, họ buộc phải gắn kết trong quá trình tập luyện chéo ngoài mùa giải.",
        "Sống sót qua mùa hè không phải là điều khó khăn...cho đến khi Asher gặp huấn luyện viên mới của họ. Cô ấy xinh đẹp, tài năng, và dù anh có cố gắng thế nào, anh cũng không thể rời mắt khỏi cô.",
        "Vấn đề duy nhất? Cô ấy là em gái của đối thủ của anh ta—và hoàn toàn không được phép đụng tới.",
        "Scarlett DuBois là một cựu diễn viên ba lê nổi tiếng nhưng sự nghiệp của cô đã bị cắt ngắn bởi một tai nạn thương tâm.",
        "Hiện là giáo viên tại một học viện khiêu vũ danh tiếng nhưng vẫn bị ám ảnh bởi những bóng ma quá khứ, điều cuối cùng cô muốn là dành cả mùa hè để huấn luyện chéo với Asher Donovan.",
        "Cô ấy đã thề sẽ không bao giờ hẹn hò với một cầu thủ bóng đá, nhưng khi anh trai cô rời thị trấn vì có việc khẩn cấp, cô thấy mình bị đẩy vào tình thế nguy hiểm khi ở rất gần với chàng tiền đạo đẹp trai, quyến rũ này.",
        "Tập luyện, cô ấy có thể giải quyết được. Nhưng yêu? Điều đó là không thể - đặc biệt là khi anh ấy là người duy nhất có khả năng làm tan vỡ trái tim cô ấy."
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
    "Khám phá câu chuyện kịch tính, nơi những nhân vật mạnh mẽ đối mặt với các thử thách khắc nghiệt và những mối đe dọa không thể đoán trước, mang lại những giờ phút đọc cuốn hút.",
    "Trải nghiệm những trận chiến sử thi và những cuộc xung đột vĩ đại giữa các vị thần, loài người và sinh vật huyền thoại, tạo nên một câu chuyện sử thi đầy hành động và cảm xúc.",
    "Khám phá những yếu tố thần thoại Bắc Âu qua góc nhìn mới mẻ, đưa bạn vào thế giới của rồng, thần sói và cuộc chiến đầy cam go để giành quyền kiểm soát vận mệnh.",
    "Đi theo hành trình phát triển của các nhân vật như Arg, Elvar và Biórr khi họ đối diện với những lựa chọn khó khăn và những trận chiến nội tâm phức tạp, mang đến chiều sâu tâm lý đáng suy ngẫm.",
    "Chứng kiến cuộc đối đầu cuối cùng trong trận đại chiến tại Snakavik, nơi mà số phận của tất cả các nhân vật chính sẽ được định đoạt trong một cuộc chiến có thể thay đổi cả thế giới." ]
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
        "Skandar and the Skeleton Curse là cuốn thứ tư đầy kịch tính trong loạt truyện phiêu lưu giả tưởng nổi tiếng dành cho lứa tuổi trung học của tác giả A.F. Steadman. Trong ấn bản đặc biệt giới hạn của Barnes & Noble, cuốn sách này sở hữu một bìa dập nổi độc quyền, giấy in lá holographic lung linh, trang lót màu xanh lá và nội dung bổ sung đặc biệt chỉ dành riêng cho phiên bản này.Trong phần tiếp theo đầy hấp dẫn này, Skandar và những người bạn bước vào năm thứ tư tại Eyrie, đối mặt với một lời nguyền khủng khiếp đe dọa làm thay đổi mọi thứ. Với những kỳ lân của hòn đảo bị ảnh hưởng nghiêm trọng, Skandar và nhóm bạn của mình phải chạy đua với thời gian để ngăn chặn thảm họa trước khi quá muộn. Cuộc phiêu lưu mới này không chỉ thách thức lòng can đảm mà còn đẩy Skandar đến những lựa chọn quyết định cho tương lai của hòn đảo."


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

/*them 2 sp cua 10 sp dau */
var courseData16 = {
    "tieudeKhoahoc" : "Sunrise on the Reaping",
    "placeCcon" : "Sunrise on the Reaping",
    "tieudeBanner": "Sunrise on the Reaping",
    "image": "../image/SunriseontheReaping.jpg",
    "courseName": "Sunrise on the Reaping",
    "newPrice": "499.000đ",
    "oldPrice": "800.000đ",
    "description": [
        "Cuốn sách thứ năm phi thường trong loạt truyện Hunger Games! Phiên bản độc quyền của Barnes & Noble này có cuộc trò chuyện sâu sắc giữa Suzanne Collins và nhà xuất bản của cô, David Levithan."
    ],
    "instructor": "Suzanne Collins",
    "benefits": [
    "Khi ngày đầu tiên của Hunger Games lần thứ năm mươi bắt đầu, nỗi sợ hãi bao trùm các quận của Panem. Năm nay, để vinh danh Quarter Quell, số lượng vật phẩm được đưa ra khỏi nhà sẽ tăng gấp đôi.",
    "Trở lại Quận 12, Haymitch Abernathy đang cố gắng không nghĩ quá nhiều về cơ hội của mình. Tất cả những gì anh quan tâm là vượt qua ngày hôm nay và ở bên cô gái anh yêu.",
    "Khi tên của Haymitch được gọi, anh có thể cảm thấy mọi giấc mơ của mình tan vỡ. Anh bị tách khỏi gia đình và tình yêu của mình, bị đưa đến Capitol cùng với ba cống phẩm khác của Quận 12: một người bạn trẻ gần như là chị em với anh, một người cá cược bắt buộc và là cô gái kiêu ngạo nhất thị trấn. ",
    "Khi Thế vận hội bắt đầu, Haymitch hiểu rằng anh đã bị sắp đặt để thất bại. Nhưng có điều gì đó trong anh muốn chiến đấu... và để cuộc chiến đó vang vọng xa hơn đấu trường chết chóc."
]
};
var courseData19 = {
    "tieudeKhoahoc" : "Two Twisted Crowns",
    "placeCcon" : "Two Twisted Crowns",
    "tieudeBanner": "Two Twisted Crowns",
    "image": "../image/TwoTwistedCrowns.jpg",
    "courseName": "Two Twisted Crowns",
    "newPrice": "499.000đ",
    "oldPrice": "800.000đ",
    "description": [
        "Toàn bộ vương quốc đang gặp nguy hiểm và quái vật tràn lan! Two Twisted Crowns có tất cả những yếu tố kỳ ảo đen tối khiến bạn yêu thích bộ truyện cùng với sự trao quyền cho phụ nữ và âm hưởng không khí."
    ],
    "instructor": "Rachel Gillig",
    "benefits": [
    "Trong  phần tiếp theo bán chạy nhất của New York Times của  One Dark Window , Elspeth phải đối mặt với sức nặng của những hành động của mình khi cô và Ravyn bắt đầu một nhiệm vụ nguy hiểm để cứu vương quốc—hoàn hảo cho độc giả của For the Wolf của Hannah Whitten và The Year of the Witching  của Alexis Henderson",
    "Bị một vị vua bạo chúa nắm giữ và bị ma thuật đen thống trị, vương quốc đang gặp nguy hiểm. Elspeth và Ravyn đã thu thập được hầu hết mười hai Thẻ Providence, nhưng thẻ cuối cùng—và quan trọng nhất—vẫn chưa được tìm thấy: Twin Alders. Nếu họ muốn tìm thấy thẻ trước Solstice và giải thoát vương quốc, họ sẽ cần phải đi qua khu rừng sương mù nguy hiểm. Người duy nhất có thể dẫn họ đi qua là con quái vật có chung đầu với Elspeth: Ác mộng.",
    "Và hắn không còn muốn chia sẻ nữa."
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
/*add san pham vao gio hang ma khong can chuyen trang */
// $(document).ready(function() {
//     // Khi form được submit
//     $('#add-to-cart-form').submit(function(event) {
//         event.preventDefault(); // Ngừng hành động mặc định (reload trang)

//         var formData = $(this).serialize(); // Lấy tất cả dữ liệu từ form

//         // Thực hiện yêu cầu AJAX
//         $.ajax({
//             url: 'index.php?pg=addcart', // Đường dẫn gửi yêu cầu
//             type: 'POST', // Phương thức gửi
//             data: formData, // Dữ liệu gửi đi
//             dataType: 'json', // Kiểu dữ liệu trả về
//             success: function(response) {
//                 if (response.success) {
//                     alert(response.message); // Hiển thị thông báo thành công
//                     $('#cart-item-count').text(response.newCartCount); // Cập nhật số lượng giỏ hàng (nếu có phần tử này)
//                 } else {
//                     alert('Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng!');
//                 }
//             },
//             error: function() {
//                 alert('Lỗi kết nối đến server!');
//             }
//         });
//     });
// });

