
<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Nam Hot</span></h2>
    </div>
    <div class="position-relative">
        <!-- Wrapper sản phẩm -->
        <div class="products-container overflow-hidden" style="position: relative; width: 100%;">
            <div class="products-wrapper d-flex" style="transition: transform 0.5s ease;">
            
                <?php
                $displayed_products = array();
                foreach ($sanphams_hot as $sanpham):
                    
                    if (in_array($sanpham['id'], $displayed_products)) continue;
                    $displayed_products[] = $sanpham['id'];
                ?>
                    <a href="?act=chitietsp&id=<?php echo $sanpham['id'] ?>" class="text-decoration-none text-dark">
                        <div class="product-card" style="flex: 0 0 20%; max-width: 20%; padding: 0 10px; box-sizing: border-box;">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <?php if (!empty($sanpham['sale_value'])): ?>
                                        <div class="position-absolute bg-danger text-white p-1" style="top: 0; left: 0; font-size: 0.9rem; z-index: 1;">
                                            <?php
                                            if ($sanpham['sale_value'] < 100) {
                                                echo '-' . number_format($sanpham['sale_value'], 0) . '%';
                                            } else {
                                                echo '-' . number_format($sanpham['sale_value'], 0, ',', '.') . ' đ';
                                            }
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <img class="img-fluid custom-img" src="<?php echo removeFirstChar($sanpham['image']) ?>" alt="">
                                </div>

                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3"><?php echo $sanpham['title'] ?></h6>
                                    
                                    <div class="d-flex justify-content-center">
                                        <h5 class=" text-danger small-price">
                                            <?php
                                            $original_price = $sanpham['original_price'];
                                            $final_price = $original_price;
                                            $has_discount = false;

                                            // Kiểm tra giảm giá theo phần trăm hoặc giảm giá cố định
                                            if (!empty($sanpham['sale_value'])) {
                                                $has_discount = true;
                                                if ($sanpham['sale_value'] < 100) {
                                                    // Giảm giá theo phần trăm
                                                    $final_price -= ($original_price * $sanpham['sale_value'] / 100);
                                                } else {
                                                    // Giảm giá theo số tiền cố định
                                                    $final_price -= $sanpham['sale_value'];
                                                }
                                            }

                                            echo number_format(max($final_price, 0), 0, ',', '.'); // Đảm bảo giá không âm
                                            ?> đ
                                        </h5>
                                        <?php if ($has_discount): ?>
                                            <h6 class="text-muted ml-2"><del><?php echo number_format($original_price, 0, ',', '.') ?> đ</del></h6>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center bg-light border">
                                    <a href="?act=chitietsp&id=<?php echo $sanpham['id'] ?>" class="btn btn-sm text-dark p-0">
                                        Xem chi tiết
                                    </a>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
        </div>

        <!-- Nút điều hướng -->
        <button class="btn-carousel btn-left">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="btn-carousel btn-right">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</div>
<!-- Products End -->





<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->




<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Nước hoa Mới</span></h2>
    </div>
    <div class="position-relative">
        <!-- Wrapper sản phẩm -->
        <div class="products-container overflow-hidden" style="position: relative; width: 100%;">
            <div class="products-wrapper d-flex" style="transition: transform 0.5s ease;">
                <?php
                $displayed_products = array(); // Mảng lưu ID các sản phẩm đã hiển thị
                usort($sanphamnew, function ($a, $b) {
                    return strtotime($b['created_at']) - strtotime($a['created_at']);
                });

                foreach ($sanphamnew as $sp):
                    if (in_array($sp['id'], $displayed_products)) continue;
                    $displayed_products[] = $sp['id'];
                ?>
                    <a href="?act=chitietsp&id=<?php echo $sp['id'] ?>" class="text-decoration-none text-dark">
                        <div class="product-card" style="flex: 0 0 20%; max-width: 20%; padding: 0 10px; box-sizing: border-box;">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <?php if (!empty($sp['sale_value'])): ?>
                                        <div class="position-absolute bg-danger text-white p-1" style="top: 0; left: 0; font-size: 0.9rem; z-index: 1;">
                                            <?php
                                            if ($sp['sale_value'] < 100) {
                                                echo '-' . number_format($sp['sale_value'], 0) . '%';
                                            } else {
                                                echo '-' . number_format($sp['sale_value'], 0, ',', '.') . ' đ';
                                            }
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                    <img class="img-fluid custom-img" src="<?php echo removeFirstChar($sp['image']) ?>" alt="" >
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3"><?php echo $sp['title'] ?></h6>
                                    <div class="d-flex justify-content-center">
                                        <h5 class="text-danger small-price">
                                            <?php
                                            $original_price = $sp['original_price'];
                                            $final_price = $original_price;
                                            $has_discount = false;

                                            if (!empty($sp['sale_value'])) {
                                                $has_discount = true;
                                                if ($sp['sale_value'] < 100) {
                                                    $final_price -= ($original_price * $sp['sale_value'] / 100);
                                                } else {
                                                    $final_price -= $sp['sale_value'];
                                                }
                                            }

                                            echo number_format(max($final_price, 0), 0, ',', '.'); // Đảm bảo giá không âm
                                            ?> đ
                                        </h5>
                                        <?php if ($has_discount): ?>
                                            <h6 class="text-muted ml-2"><del><?php echo number_format($original_price, 0, ',', '.') ?> đ</del></h6>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center bg-light border">
                                    <a href="?act=chitietsp&id=<?php echo $sp['id'] ?>" class="btn btn-sm text-dark p-0">
                                        Xem chi tiết
                                    </a>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
        </div>

        <!-- Nút điều hướng -->
        <button class="btn-carousel btn-left">
    <i class="fas fa-chevron-left"></i>
</button>
<button class="btn-carousel btn-right">
    <i class="fas fa-chevron-right"></i>
</button>
    </div>
</div>





<!-- Offer Start -->
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-6 pb-4">
            <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                <img height="150px" src="https://tse3.mm.bing.net/th/id/OIP.2Ve38au43AQXrMbCzmSooAHaER?rs=1&pid=ImgDetMain&o=7&rm=3"  alt="">
                <div class="position-relative" style="z-index: 1;">
                    <h5 class="text-uppercase text-primary mb-3">Giảm 20% cho các sản phẩm</h5>
                    <h1 class="mb-4 font-weight-semi-bold">Thể Loại : Bad boy </h1>
                    <a href="?act=search&category_id=6" class="btn btn-outline-primary py-md-2 px-md-3">Mua Ngay</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 pb-4">
            <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                <img height="150px" src="https://as2.ftcdn.net/v2/jpg/06/54/94/51/1000_F_654945156_cQUcszp4AVyI0umti5bTUXfqzMYoCHfn.jpg"  alt="">
                <div class="position-relative" style="z-index: 1;">
                    <h5 class="text-uppercase text-primary mb-3">Giảm 20% cho các sản phẩm</h5>
                    <h1 class="mb-4 font-weight-semi-bold">Thể Loại : Kiss grey  </h1>
                    <a href="?act=search&category_id=1" class="btn btn-outline-primary py-md-2 px-md-3">Mua Ngay</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Products Start --> 
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Siêu Ưu Đãi</span></h2>
    </div>
    <div class="position-relative">
        <!-- Wrapper sản phẩm -->
        <div class="products-container overflow-hidden" style="position: relative; width: 100%;">
            <div class="products-wrapper d-flex" style="transition: transform 0.5s ease;">
                <?php
                $displayed_products = array();
                
                foreach ($sanphams_sale as $spsale):
                    
                    if (in_array($spsale['id'], $displayed_products)) continue;
                    $displayed_products[] = $spsale['id'];
                ?>
                    <a href="?act=chitietsp&id=<?php echo $spsale['id'] ?>" class="text-decoration-none text-dark">
                        <div class="product-card" style="flex: 0 0 20%; max-width: 20%; padding: 0 10px; box-sizing: border-box;">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <?php if (!empty($spsale['sale_value'])): ?>
                                        <div class="position-absolute bg-danger text-white p-1" style="top: 0; left: 0; font-size: 0.9rem; z-index: 1;">
                                            <?php
                                            if ($spsale['sale_value'] < 100) {
                                                echo '-' . number_format($spsale['sale_value'], 0) . '%';
                                            } else {
                                                echo '-' . number_format($spsale['sale_value'], 0, ',', '.') . ' đ';
                                            }
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                    <img class="img-fluid custom-img" src="<?php echo removeFirstChar($spsale['image']) ?>" alt="" >
                                </div>

                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3"><?php echo $spsale['title'] ?></h6>
                                    
                                    <div class="d-flex justify-content-center">
                                        <h5 class="text-danger small-price">
                                            <?php
                                            $original_price = $spsale['original_price'];
                                            $final_price = $original_price;
                                            $has_discount = false;

                                            // Kiểm tra giảm giá theo phần trăm hoặc giảm giá cố định
                                            if (!empty($spsale['sale_value'])) {
                                                $has_discount = true;
                                                if ($spsale['sale_value'] < 100) {
                                                    // Giảm giá theo phần trăm
                                                    $final_price -= ($original_price * $spsale['sale_value'] / 100);
                                                } else {
                                                    // Giảm giá theo số tiền cố định
                                                    $final_price -= $spsale['sale_value'];
                                                }
                                            }

                                            echo number_format(max($final_price, 0), 0, ',', '.'); // Đảm bảo giá không âm
                                            ?> đ
                                        </h5>
                                        <?php if ($has_discount): ?>
                                            <h6 class="text-muted ml-2"><del><?php echo number_format($original_price, 0, ',', '.') ?> đ</del></h6>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center bg-light border">
                                    <a href="?act=chitietsp&id=<?php echo $spsale['id'] ?>" class="btn btn-sm text-dark p-0">
                                        Xem chi tiết
                                    </a>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
        </div>

        <!-- Nút điều hướng -->
        <button class="btn-carousel btn-left">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="btn-carousel btn-right">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</div>








<script>
document.addEventListener('DOMContentLoaded', () => {
    const productContainers = document.querySelectorAll('.products-container');
    
    productContainers.forEach(container => {
        const wrapper = container.querySelector('.products-wrapper');
        const btnLeft = container.parentElement.querySelector('.btn-left');
        const btnRight = container.parentElement.querySelector('.btn-right');
        
        // Ngăn chặn kéo hình ảnh
        wrapper.querySelectorAll('img').forEach(img => {
            img.addEventListener('dragstart', (e) => e.preventDefault());
            img.style.pointerEvents = 'none'; // Vô hiệu hóa tương tác chuột với hình ảnh
        });

        let isDragging = false;
        let startX;
        let scrollLeft;
        let momentum = 0;
        let animationId;

        // Mouse events với momentum scrolling
        wrapper.addEventListener('mousedown', (e) => {
            isDragging = true;
            wrapper.classList.add('dragging');
            startX = e.pageX;
            scrollLeft = wrapper.scrollLeft;
            momentum = 0;
            cancelAnimationFrame(animationId);
            e.preventDefault(); // Ngăn chặn hành vi mặc định
        });

        wrapper.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            e.preventDefault();
            
            const x = e.pageX;
            const delta = (startX - x);
            wrapper.scrollLeft = scrollLeft + delta;
            
            momentum = delta * 0.1;
            startX = x;
            scrollLeft = wrapper.scrollLeft;
        });

        // Thêm event listener cho document để xử lý mouseup bên ngoài wrapper
        document.addEventListener('mouseup', finishDragging);
        document.addEventListener('mouseleave', finishDragging);

        function finishDragging() {
            if (!isDragging) return;
            isDragging = false;
            wrapper.classList.remove('dragging');

            function momentumScroll() {
                if (Math.abs(momentum) > 0.1) {
                    wrapper.scrollLeft += momentum;
                    momentum *= 0.95;
                    animationId = requestAnimationFrame(momentumScroll);
                }
            }
            momentumScroll();
        }

        // Button navigation với animation mượt
        btnLeft.addEventListener('click', () => {
            const scrollAmount = wrapper.offsetWidth * 0.8;
            smoothScroll(wrapper, -scrollAmount);
        });

        btnRight.addEventListener('click', () => {
            const scrollAmount = wrapper.offsetWidth * 0.8;
            smoothScroll(wrapper, scrollAmount);
        });

        function smoothScroll(element, amount) {
            const start = element.scrollLeft;
            const target = start + amount;
            const duration = 500; // ms
            const startTime = performance.now();

            function animation(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);

                // Easing function for smoother animation
                const easeProgress = 1 - Math.pow(1 - progress, 4);
                
                element.scrollLeft = start + (amount * easeProgress);

                if (progress < 1) {
                    requestAnimationFrame(animation);
                }
            }

            requestAnimationFrame(animation);
        }
    });
});
</script>




<style>
    .btn-carousel {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 123, 255, 0.8); /* Màu nền xanh mờ */
        color: white; /* Màu chữ trắng */
        border: 2px solid transparent; /* Border mặc định trong suốt */
        border-radius: 50%; /* Bo góc tròn */
        width: 40px; /* Kích thước nhỏ hơn */
        height: 40px; /* Kích thước nhỏ hơn */
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 10;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Hiệu ứng bóng */
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease;
    }

    .btn-carousel:hover {
        background-color: rgba(0, 123, 255, 1); /* Màu nền đậm hơn khi hover */
        transform: translateY(-50%) scale(1.1); /* Phóng to nhẹ khi hover */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); /* Tăng độ bóng khi hover */
    }

    .btn-carousel:active {
        border: 2px solid black; /* Border đen khi nhấn */
        transform: translateY(-50%) scale(0.95); /* Thu nhỏ nhẹ khi nhấn */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Giảm bóng khi nhấn */
    }

    .btn-left {
        left: -5px; /* Vị trí nút bên trái */
    }

    .btn-right {
        right: -5px; /* Vị trí nút bên phải */
    }

    .btn-carousel i {
        font-size: 18px; /* Kích thước icon nhỏ hơn */
    }

    .products-wrapper {
        display: flex;
        overflow-x: auto;
        scroll-behavior: auto; /* Thay đổi từ smooth sang auto để tránh xung đột với custom scrolling */
        -webkit-overflow-scrolling: touch;
        cursor: grab;
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        scroll-snap-type: x proximity; /* Thay đổi từ mandatory sang proximity để mượt hơn */
        gap: 10px; /* Thêm khoảng cách giữa các items */
    }

    .products-wrapper::-webkit-scrollbar {
        display: none;
    }

    .products-wrapper.dragging {
        cursor: grabbing;
        scroll-behavior: auto;
        scroll-snap-type: none; /* Tắt snap trong khi kéo */
    }

    .product-card {
        flex: 0 0 20%;
        max-width: 20%;
        padding: 0 10px;
        box-sizing: border-box;
        scroll-snap-align: start;
        transition: transform 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
    }

    /* Thêm media query để điều chỉnh vị trí nút trên màn hình nhỏ */
    @media (max-width: 1200px) {
        .btn-left {
            left: 10px;
        }
        
        .btn-right {
            right: 10px;
        }
    }

    /* Thêm overflow-x: hidden cho container để tránh thanh cuộn ngang */
    .container-fluid {
        overflow-x: hidden;
    }

    /* Đảm bảo scroll smooth hoạt động trên tất cả các trình duyệt */
    @supports (scroll-behavior: smooth) {
        .products-wrapper {
            scroll-behavior: smooth;
        }
    }

    /* Thêm styles để ngăn chặn việc chọn text */
    .products-wrapper {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .product-img img {
        pointer-events: none; /* Vô hiệu hóa tương tác chuột với hình ảnh */
        -webkit-user-drag: none; /* Ngăn kéo hình ảnh trên Chrome/Safari */
        -khtml-user-drag: none; /* Ngăn kéo hình ảnh trên các trình duyệt khác */
        -moz-user-drag: none;
        -o-user-drag: none;
        -user-drag: none;
    }
    .custom-img {
    width: 200px;  /* Hoặc kích thước mong muốn */
    height: 200px;
    object-fit: cover; /* Cắt ảnh để vừa khung mà không bị méo */
}


</style>

   