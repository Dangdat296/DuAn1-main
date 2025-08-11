<?php
class OrderController{
    private $modelOrder;
    

    public function __construct(){
        $this->modelOrder = new Order();

    }
    public function views_order() {
        $orders=$this->modelOrder->getAll();
        $orders_items=$this->modelOrder->getAllOrderItem();
        $danhgias=$this->modelOrder->getAllDanhGia();
        require_once 'clients/views/donhang/thongtin.php';
    }
    public function formchitietdonhang(){
        $orders_items=$this->modelOrder->getAllOrderItem();
        // $orders_items=$this->modelOrder->getOrderById('order_id');

        require_once 'clients/views/donhang/chitietdonhang.php';
        
    }
    public function addReview() {
        // Kiểm tra phương thức yêu cầu
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $user_id = $_POST['user_id'] ?? null;
            $comic_id = $_POST['comic_id'] ?? null;
            $order_id = $_POST['order_id'] ?? null;
            $rating = $_POST['rating'] ?? null;
            $review_text = $_POST['review_text'] ?? '';
            // Kiểm tra dữ liệu hợp lệ
            if (empty($user_id) || empty($comic_id) || empty($order_id) || empty($rating) || empty($review_text)) {
                echo "Dữ liệu không hợp lệ. Vui lòng điền đầy đủ thông tin!";
                return false;
            }
    
            // Gọi model để thêm đánh giá
            $result = $this->modelOrder->addReview($user_id, $comic_id, $order_id, $rating, $review_text);
    
            if ($result) {
                // Điều hướng hoặc phản hồi nếu thành công
                header("Location: ?act=don-hang");
                exit;
            } else {
                echo "Có lỗi xảy ra khi thêm đánh giá. Vui lòng thử lại!";
            }
        }
        require_once 'clients/views/donhang/danhgia.php';
    }
    public function viewOrder($order_id) {
        $order = $this->modelOrder->getOrderById($order_id);
        if ($order) {
            include 'views/order_detail.php'; // File giao diện hiển thị chi tiết đơn hàng
        } else {
            echo "Đơn hàng không tồn tại.";
        }
    }

    // Xử lý cập nhật trạng thái đơn hàng (hủy hoặc hoàn tiền)
    public function handleRequest() {
        // Kiểm tra nếu có các tham số từ URL
        if (isset($_GET['act']) && $_GET['act'] === 'update-status' 
            && isset($_GET['order_id']) && isset($_GET['status'])) {
            
            $order_id = $_GET['order_id'];  // Lấy order_id từ URL
            $status = $_GET['status'];      // Lấy status từ URL
            
            $this->updateOrderStatus($order_id, $status);  // Gọi phương thức cập nhật trạng thái
        } else {
            echo "Thiếu tham số để xử lý.";
        }
    }
    public function huydonhang() {
        // Kiểm tra nếu có tham số 'act' và giá trị là 'huy-don-hang'
        if (isset($_GET['act']) && $_GET['act'] === 'huy-don-hang') {
            if (isset($_GET['order_id'])) {
                $order_id = $_GET['order_id'];  // Lấy order_id từ URL
                $status = 'cancelled';  // Trạng thái 'canceled' khi hủy đơn hàng
    
                $this->updateOrderStatus($order_id, $status);  // Cập nhật trạng thái đơn hàng
            } else {
                echo "Thiếu thông tin đơn hàng để hủy.";
            }
        } else {
            echo "Không có hành động hủy đơn hàng hợp lệ.";
        }
    }
    

    // Phương thức cập nhật trạng thái đơn hàng
    public function updateOrderStatus($order_id, $status) {
        // Kiểm tra tham số hợp lệ
        if ($order_id && $status) {
            // Gọi Model để cập nhật trạng thái đơn hàng trong DB
            $result = $this->modelOrder->updateOrderStatus($order_id, $status);
            
            // Kiểm tra kết quả và trả về thông báo
            if ($result) {
                header('location:?act=don-hang');
            } else {
                echo "Có lỗi xảy ra khi cập nhật trạng thái.";
            }
        } else {
            echo "Thông tin đơn hàng không hợp lệ.";
        }
    }
    

    // Phương thức hiển thị chi tiết đơn hàng
    public function getChiTietDonHang() {
        // Lấy order_id từ URL
        $id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;
    
        // Kiểm tra xem id có hợp lệ hay không
        if ($id <= 0) {
            // Trả về lỗi nếu id không hợp lệ
            echo json_encode(['status' => 'error', 'message' => 'Invalid order ID.']);
            return;
        }
    // comment
        try {
            // Lấy chi tiết đơn hàng từ model
            $orderDetails = $this->modelOrder->getOrderDetailsThongTin($id);
            // lấy chi tiết thông tin khách hàng
            $orderInfo = $this->modelOrder->getOrderThongTinKhachHang($id);
            
            // Kiểm tra xem có đơn hàng nào không
            if ($orderDetails&&$orderInfo) {
                // Nếu có, chuyển tiếp đến view chi tiết đơn hàng
                require_once 'clients/views/donhang/chitietdonhang.php';
            } else {
                // Nếu không tìm thấy đơn hàng, hiển thị thông báo
                echo "<div class='alert alert-warning text-center'>Không tìm thấy chi tiết đơn hàng nào.</div>";
            }
        } catch (Exception $e) {
            // Nếu có lỗi xảy ra trong quá trình lấy dữ liệu
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    
}
  