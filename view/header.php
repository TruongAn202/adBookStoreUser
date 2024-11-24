<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANEDUSHOP - Lead Your Future</title>
    <link rel="icon" type="image/png" href="view/layout/assets/image/icon-conen.png">
    <link rel="stylesheet" href="view/layout/assets/css/style.css">
    <link rel="stylesheet" href="view/layout/assets/css/styleKH.css"> 
    <link rel="stylesheet" href="view/layout/assets/css/styleAbout.css">
    <link rel="stylesheet" href="view/layout/assets/css/styleLH.css">
    <link rel="stylesheet" href="view/layout/assets/css/styleBanTin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- them icon cua bootstrap o trên de them icon -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>
    <nav class=" navbar navbar-expand-xl fixed-top" id="header">
        <a class="navbar-brand" href="/index.html"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" id="#nut-menu-nho">
            <i class="bi bi-list" id="icon-nho"></i>
        </button>
        <div class="collapse navbar-collapse le-phai" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 menu-action">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="index.php">Trang chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?pg=sanpham">Mua sách</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?pg=aboutus" tabindex="-1" aria-disabled="true">Về chúng tôi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?pg=lienhe" tabindex="-1" aria-disabled="true">Liên hệ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?pg=bantin" tabindex="-1" aria-disabled="true">Bản tin</a>
            </li>
          </ul>
          <form id="search" class="d-flex">
            <input id="input-search" list="datalistOptions" class="form-control me-2" type="search" placeholder="Tìm kiếm">
            <datalist id="datalistOptions">
                <option value="Khóa học làm giàu">
                <option value="Khóa học IT">
                <option value="Khóa học Toeic 500">
                <option value="Dạy Con">
                <option value="Excel nâng cao">
              </datalist>
            <button type="submit"><img src="view/layout/assets/image/icons-search-32.png" alt="Search"></button>
          </form>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 menu-action">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-cart-fill"></i> <span class="badge bg-warning cart-item-count">1</span> Giỏ hàng 
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li class="dropdown-item">
                  <div class="d-flex align-items-center">
                    <img src="view/layout/assets/image/The_Boyfriend.jpg" alt="Sản phẩm 1" class="img-fluid me-2" style="width: 50px;">
                    <div class="flex-grow-1">
                      <div class="fw-bold">The Boyfriend</div>
                      <div class="text-muted"></div>
                    </div>
                    <button type="button" class="btn-close" aria-label="Close"></button>
                  </div>
                </li>
                <li><hr class="dropdown-divider"></li>
                <!-- <li class="dropdown-item">
                  <div class="d-flex align-items-center">
                    <img src="/image/excel.jpg" alt="Sản phẩm 2" class="img-fluid me-2" style="width: 50px;">
                    <div class="flex-grow-1">
                      <div class="fw-bold">Excel</div>
                      <div class="text-muted">Trần Thị Hoa</div>
                    </div>
                    <button type="button" class="btn-close" aria-label="Close"></button>
                  </div>
                </li> -->
                <li><hr class="dropdown-divider"></li>
                <!-- Thêm các sản phẩm khác tương tự -->
                <li><a class="dropdown-item" href="/chitietgiohang.html">Tới giỏ hàng</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/chitietgiohang.html">Thanh toán</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-fill"></i> Tài khoản
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/login.html">Đăng nhập</a></li>
                <li><a class="dropdown-item" href="/login.html">Đăng ký</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/login.html">Thông tin TK</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>