<?php
session_start();


require_once './commons/core.php';

// Tạo đối tượng PDO
$pdo = new PDO('mysql:host=localhost;dbname=duan1', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require_once './commons/env.php';

require_once './clients/controllers/LoginController.php';
require_once './clients/controllers/AccountController.php';
require_once './clients/controllers/HomeController.php';
require_once './clients/controllers/OrderController.php';
require_once './clients/controllers/CartController.php';
require_once './clients/controllers/CheckoutController.php';
require_once './clients/controllers/PaymentController.php';

require_once './clients/models/banner.php';
require_once './clients/models/danhmuc.php';
require_once './clients/models/sanpham.php';
require_once './clients/models/binhluan.php';
require_once './clients/models/Login.php';
require_once './clients/models/Account.php';
require_once './clients/models/order.php';
require_once './clients/models/Cart.php';
require_once './clients/models/OrderList.php';
require_once './clients/models/MoMoPayment.php';


$act = $_GET['act'] ?? '/';
$publicRoutes = ['login', 'register'];
if (!in_array($act, $publicRoutes)) {
    include_once './clients/views/layouts/header.php';
}
match ($act) {

    '/' => (new HomeController())->home(),
    'chitietsp' => (new HomeController())->chitietsanpham(),
    'sanpham' => (new HomeController())->sanpham(),
    'search' =>(new HomeController())->search(),
    'lienhe' =>(new HomeController())->lienhe(),
    'add-binh-luan' => (new HomeController())->addBinhluan(),
    'add-danh-gia' => (new HomeController())->addDanhGia(),

    // giỏ hàng
    'view-shopping-cart' => (new CartController())->view_shoppingCart(),
    'add-item-to-cart' => (new CartController())->addToCart(),
    'update-quantity' => (new CartController())->updateQuantity(),
    'delete-cart-item' => (new CartController())->deleteItem(),

    // thanh toán 
    'thanhtoan' => (new CheckoutController())->index(),
    'process-checkout' => (new CheckoutController())->processCheckout(),
    'checkout' => (new CheckoutController())->index(),
    'order-success' => (new CheckoutController())->orderSuccess(),

    'index-momo' => (new CheckoutController())->index(),

    'process-momo-payment' => (new PaymentController())->processMomoPayment(),

    // đăng nhập đăng ký
    'login' => (new LoginController())->login(),
    'logout' => (new LoginController())->logout(),
    'register' => (new LoginController())->register(),

    // hồ sơ cá nhân

    'profile' => (new AccountController($pdo))->profile(),
    'edit-profile' => (new AccountController($pdo))->editProfile(),
    'change-password' => (new AccountController($pdo))->changePassword(),

   // đơn hàng
    'don-hang'=>(new OrderController())->views_order(),
    'chi-tiet-don-hang'=>(new OrderController())->getChiTietDonHang(),
    'add-reviews'=>(new OrderController())->addReview(),
    'update-status'=>(new OrderController())->handleRequest(),
    'huy-don-hang'=>(new OrderController())->huydonhang(),

};

if (!in_array($act, $publicRoutes)) {
    include_once './clients/views/layouts/footer.php';
}
