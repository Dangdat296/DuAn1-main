<?php
// Thêm ở đầu file navbar.php
require_once 'clients/models/danhmuc.php';
$modelDanhMuc = new DanhMuc();
$listdm = $modelDanhMuc->getAllDanhMuc();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

</body>

</html>
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
    <div class="col-lg-3 d-none d-lg-block">
    <div class="category-dropdown position-relative">
        <!-- Nút mở menu -->
        <button class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
            onclick="toggleMenu()"
            style="height: 65px; margin-top: -1px; padding: 0 30px;">
            <h6 class="font-weight-semi-bold m-0">Danh mục</h6>
            <i class="fa fa-angle-down"></i>
        </button>
        
        <!-- Danh mục sản phẩm -->
        <div id="categoryMenu" class="nav flex-column bg-white border position-absolute w-100"
            style="display: none; top: 100%; left: 0; z-index: 1000;">
            <a href="?act=sanpham" 
               class="nav-item nav-link <?= empty($_GET['category_id']) ? 'active' : '' ?>">Tất cả danh mục</a>
            <?php foreach ($listDanhMuc as $danhmuc): ?>
                <a href="?act=search&category_id=<?= $danhmuc['id']; ?>" 
                   class="nav-item nav-link <?= (isset($_GET['category_id']) && $_GET['category_id'] == $danhmuc['id']) ? 'active' : '' ?>">
                    <?= htmlspecialchars($danhmuc['name']); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="?act=/" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold">
                        <span class="text-primary font-weight-bold border px-3 mr-1">E</span>Web 
                    </h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="?act=/" class="nav-item nav-link active">Trang chủ</a>
                        <a href="?act=sanpham" class="nav-item nav-link">Sản phẩm</a>
                        <a href="?act=lienhe" class="nav-item nav-link">Liên hệ</a>
                    </div>
                    <?php
                    if (isset($_SESSION['user'])) {
                        // Lấy thông tin email người dùng
                        $email = $_SESSION['user']['email'] ?? 'Người dùng';

                        // Kiểm tra xem người dùng có phải admin hay không
                        $isAdmin = ($_SESSION['user']['role'] ?? '') === 'admin'; // Lấy role từ session

                        // Hiển thị menu dropdown tài khoản
                        echo '<div class="dropdown">';
                        echo '<button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">';
                        echo '<img src="clients/assets/img/avata.jpg" alt="Account" style="height: 30px; width: auto;" /> ' . htmlspecialchars($email);
                        echo '</button>';
                        echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                        echo '<li><a class="dropdown-item" href="?act=profile">Hồ Sơ Cá Nhân</a></li>';
                        echo '<li><a class="dropdown-item" href="?act=don-hang">Đơn hàng</a></li>';


                        // Thêm mục chuyển đến trang admin nếu là admin
                        if ($isAdmin) {
                            $_SESSION['admin_auth'] = true;
                            echo '<li><a class="dropdown-item text-danger" href="http://localhost/DuAn1/admin/?act=/">Trang Admin</a></li>';
                        }


                        echo '<li><a class="dropdown-item" href="?act=logout">Đăng Xuất</a></li>';
                        echo '</ul>';
                        echo '</div>';
                    } else {
                        // Nếu người dùng chưa đăng nhập
                        echo '<a href="?act=login" class="nav-item nav-link">Đăng nhập</a>';
                    }
                    ?>

                </div>
            </nav>
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $firstActive = true; // Biến kiểm tra để gán "active" cho banner đầu tiên hợp lệ
                    $hasActiveBanner = false; // Biến kiểm tra xem có banner nào hiển thị không
                    foreach ($listbanner as $banner): 
                        if ($banner['Status'] == 1): // Kiểm tra trạng thái
                            $hasActiveBanner = true; // Có ít nhất một banner hợp lệ
                    ?>
                            <div class="carousel-item <?= $firstActive ? 'active' : '' ?>" style="height: 410px;">
                                <img class="img-fluid" src="admin/<?= $banner['Image'] ?>" alt="">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                       
                                        <a href="?act=sanpham" ></a>
                                    </div>
                                </div>
                            </div>
                    <?php 
                            $firstActive = false; // Gán active cho banner đầu tiên, các banner sau không cần
                        endif;
                    endforeach; 
                    
                    // Nếu không có banner nào hiển thị, hiển thị banner mặc định
                    if (!$hasActiveBanner):
                        ?>
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="https://tse2.mm.bing.net/th/id/OIP.GR5VuA4btEexXcRE27l9agHaEG?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Default Banner">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">Welcome to Our Store</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Discover Amazing Products</h3>
                                    <a href="?act=sanpham" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>


                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Navbar End -->

<script>
function toggleMenu() {
    var menu = document.getElementById("categoryMenu");
    if (menu.style.display === "none" || menu.style.display === "") {
        menu.style.display = "block";
    } else {
        menu.style.display = "none";
    }
}
</script>

<style>
    .category-dropdown {
        position: relative;
    }

    #category-menu {
        width: 100%;
        background: white;
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .nav-item.nav-link {
    color: black !important;
    }
    .dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown button */
.dropdown-toggle {
  background-color: #f8f9fa;
  border: 1px solid #ccc;
  border-radius: 30px;
  padding: 8px 20px;
  font-size: 16px;
  color: #333;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background-color 0.3s, border-color 0.3s;
}

/* Avatar icon in the dropdown button */
.dropdown-toggle img {
  border-radius: 50%;
  margin-right: 10px;
  height: 30px;
  width: 30px;
}

/* Button hover effect */
.dropdown-toggle:hover {
  background-color: #007bff;
  border-color: #007bff;
  color: white;
}

/* Dropdown menu */
.dropdown-menu {
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 8px;
  min-width: 200px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 10px 0;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1000;
  display: none;
  transition: opacity 0.3s ease-in-out;
}

/* Display the dropdown when clicked */
.dropdown-menu.show {
  display: block;
}

/* Dropdown menu items */
.dropdown-menu .dropdown-item {
  padding: 8px 20px;
  color: #333;
  font-size: 16px;
  font-weight: 500;
  border-radius: 8px;
  transition: background-color 0.3s;
}

/* Item hover effect */
.dropdown-menu .dropdown-item:hover {
  background-color: #f0f0f0;
  color: #007bff;
}

/* Active or danger items (e.g., Admin or Logout) */
.dropdown-menu .text-danger {
  color: #dc3545 !important;
}

/* Ensure dropdown items are aligned */
.dropdown-menu .dropdown-item {
  display: block;
  text-align: left;
}

/* Small screen adjustments */
@media (max-width: 768px) {
  .dropdown-toggle {
    font-size: 14px;
    padding: 6px 15px;
  }

  .dropdown-menu {
    min-width: 180px;
  }

  .dropdown-menu .dropdown-item {
    font-size: 14px;
  }
}
</style>