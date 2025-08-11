<?php
ob_start();
require_once '../commons/core.php';

class DanhMucController
{
    public $modelDanhmuc;

    public function __construct()
    {
        $this->modelDanhmuc = new DanhMuc();
    }
// 
    public function danhSachDanhMuc()
    {
        $listDanhMuc = $this->modelDanhmuc->getAllDanhMuc();
        require_once './views/danhmuc/listdm.php';
    }

    public function formAddDanhMuc()
    {
        require_once './views/danhmuc/adddm.php';
    }


    public function postAddDanhMuc()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];

            if ($this->modelDanhmuc->insertDanhMuc($name, $description)) {
                $_SESSION['success'] = "Thêm danh mục thành công!";
                header('Location: ?act=listdm');
                exit();
            } else {
                // echo 'loi';
                $_SESSION['error'] = "Có lỗi xảy ra khi thêm danh mục!";

            }
        }
    }

    public function formEditDanhMuc()
    {
        $id = $_GET['id']; // Use null coalescing to handle missing ID

        if ($id) {
            $danhMuc = $this->modelDanhmuc->getDetailDanhMuc($id);
            if ($danhMuc) {
                require_once './views/danhmuc/suadm.php';
                return;
            }
        }
        header("Location: " . BASE_URL_ADMIN . '?act=listdm');
        exit();
    }


    public function postEditDanhMuc()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id']; // Ensure the ID is retrieved from the form submission
            $name = $_POST['name'];
            $description = $_POST['description'];


            if ($this->modelDanhmuc->updateDanhMuc($id, $name, $description)) {
                $_SESSION['success'] = "Sửa danh mục thành công!";
                header('Location: ?act=listdm');
                exit();
            } else {
                // echo 'loi';
                $_SESSION['error'] = "Có lỗi xảy ra khi sửa danh mục!";

            }



        }
    }
    public function deleteDanhMuc()
    {
        $id = $_GET['id'];
        $danhMuc = $this->modelDanhmuc->getDetailDanhMuc($id);
    
        if ($danhMuc) {
            $productCount = $this->modelDanhmuc->countSanPhamTrongDanhMuc($id);
    
            if ($productCount > 0) {
                $_SESSION['error'] = "Không thể xóa danh mục vì đang có sản phẩm!";
            } else {
                $this->modelDanhmuc->deleteDanhMuc($id);
                $_SESSION['success'] = "Xóa danh mục thành công!";
            }
        }
    
        header("Location: " . BASE_URL_ADMIN . '?act=listdm');
        exit();
    }
}
ob_end_flush();
