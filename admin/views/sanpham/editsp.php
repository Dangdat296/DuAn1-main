<div class="page-wrapper py-4">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12">
        <!-- Card Container -->
        <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
          <!-- Card Header -->
          <div class="card-header bg-gradient-primary py-3">
            <div class="d-flex align-items-center">
              <i class="fas fa-edit text-white me-2"></i>
              <h3 class="card-title text-white mb-0">Sửa sản phẩm</h3>
            </div>
          </div>

          <!-- Form sửa sản phẩm -->
          <form action="?act=sua-san-pham" method="POST" enctype="multipart/form-data">
            <div class="card-body p-4">
              <!-- Hidden ID -->
              <input type="hidden" name="id" value="<?= $comic['id'] ?>">

              <div class="row g-4">
                <!-- Form Section: Thông tin cơ bản -->
                <div class="col-12">
                  <h5 class="border-bottom pb-2 mb-3">Thông tin cơ bản</h5>
                </div>
                
                <!-- Tên sản phẩm -->
                <div class="col-md-6">
                  <div class="form-group mb-0">
                    <label for="title" class="form-label fw-medium">Tên sản phẩm <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg <?= isset($errors['title']) ? 'is-invalid' : '' ?>" 
                           name="title" id="title" value="<?= $comic['title'] ?>" placeholder="Nhập tên sản phẩm">
                    <?php if (isset($errors['title'])): ?>
                      <div class="invalid-feedback"><?= $errors['title']; ?></div>
                    <?php endif; ?>
                  </div>
                </div>

                <!-- Tên tác giả -->
                <div class="col-md-6">
                  <div class="form-group mb-0">
                    <label for="author_id" class="form-label fw-medium">Tên người bán <span class="text-danger">*</span></label>
                    <select class="form-select form-select-lg <?= isset($errors['author_id']) ? 'is-invalid' : '' ?>" name="author_id" id="author_id">
                      <option selected disabled>Chọn tác giả</option>
                      <?php foreach ($listTacGia as $tacGia): ?>
                        <option value="<?= $tacGia['id'] ?>" <?= ($comic['author_id'] == $tacGia['id']) ? 'selected' : '' ?>>
                          <?= $tacGia['name'] ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['author_id'])): ?>
                      <div class="invalid-feedback"><?= $errors['author_id']; ?></div>
                    <?php endif; ?>
                  </div>
                </div>

                <!-- Thể loại -->
                <div class="col-md-6">
                  <div class="form-group mb-0">
                    <label for="category_id" class="form-label fw-medium">Thể loại <span class="text-danger">*</span></label>
                    <select class="form-select form-select-lg <?= isset($errors['category_id']) ? 'is-invalid' : '' ?>" name="category_id" id="category_id">
                      <option selected disabled>Chọn thể loại</option>
                      <?php foreach ($listDanhMuc as $danhMuc): ?>
                        <option value="<?= $danhMuc['id'] ?>" <?= ($comic['category_id'] == $danhMuc['id']) ? 'selected' : '' ?>>
                          <?= $danhMuc['name'] ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['category_id'])): ?>
                      <div class="invalid-feedback"><?= $errors['category_id']; ?></div>
                    <?php endif; ?>
                  </div>
                </div>

                <!-- Ngày phát hành -->
                <div class="col-md-6">
                  <div class="form-group mb-0">
                    <label for="publication_date" class="form-label fw-medium">Ngày phát hành <span class="text-danger">*</span></label>
                    <input type="date" class="form-control form-control-lg <?= isset($errors['publication_date']) ? 'is-invalid' : '' ?>" 
                           name="publication_date" id="publication_date" value="<?= $comic['publication_date'] ?>">
                    <?php if (isset($errors['publication_date'])): ?>
                      <div class="invalid-feedback"><?= $errors['publication_date']; ?></div>
                    <?php endif; ?>
                  </div>
                </div>

                <!-- Form Section: Thông tin giá -->
                <div class="col-12">
                  <h5 class="border-bottom pb-2 mb-3 mt-2">Thông tin giá & kho hàng</h5>
                </div>

                <!-- Giá bán -->
                <div class="col-md-4">
                  <div class="form-group mb-0">
                    <label for="price" class="form-label fw-medium">Giá bán <span class="text-danger">*</span></label>
                    <div class="input-group">
                      <input type="number" class="form-control form-control-lg <?= isset($errors['price']) ? 'is-invalid' : '' ?>" 
                             id="price" name="price" value="<?= $comic['price'] ?>" placeholder="Nhập giá bán">
                      <span class="input-group-text">VNĐ</span>
                    </div>
                    <?php if (isset($errors['price'])): ?>
                      <div class="invalid-feedback d-block"><?= $errors['price']; ?></div>
                    <?php endif; ?>
                  </div>
                </div>

                <!-- Giá niêm yết -->
                <div class="col-md-4">
                  <div class="form-group mb-0">
                    <label for="original_price" class="form-label fw-medium">Giá niêm yết <span class="text-danger">*</span></label>
                    <div class="input-group">
                      <input type="number" class="form-control form-control-lg <?= isset($errors['original_price']) ? 'is-invalid' : '' ?>" 
                             id="original_price" name="original_price" value="<?= $comic['original_price'] ?>" placeholder="Nhập giá niêm yết">
                      <span class="input-group-text">VNĐ</span>
                    </div>
                    <?php if (isset($errors['original_price'])): ?>
                      <div class="invalid-feedback d-block"><?= $errors['original_price']; ?></div>
                    <?php endif; ?>
                  </div>
                </div>

                <!-- Số lượng -->
                <div class="col-md-4">
                  <div class="form-group mb-0">
                    <label for="stock_quantity" class="form-label fw-medium">Số lượng <span class="text-danger">*</span></label>
                    <input type="number" class="form-control form-control-lg <?= isset($errors['stock_quantity']) ? 'is-invalid' : '' ?>" 
                           name="stock_quantity" id="stock_quantity" value="<?= $comic['stock_quantity'] ?>" placeholder="Nhập số lượng">
                    <?php if (isset($errors['stock_quantity'])): ?>
                      <div class="invalid-feedback"><?= $errors['stock_quantity']; ?></div>
                    <?php endif; ?>
                  </div>
                </div>

                <!-- Form Section: Mô tả và hình ảnh -->
                <div class="col-12">
                  <h5 class="border-bottom pb-2 mb-3 mt-2">Mô tả và hình ảnh</h5>
                </div>

                <!-- Hình ảnh -->
                <div class="col-md-4">
                  <div class="form-group mb-0">
                    <label for="image" class="form-label fw-medium">Hình ảnh sản phẩm</label>
                    
                    <div class="mb-3">
                      <?php if ($comic['image']): ?>
                        <div class="image-preview p-2 border rounded mb-2 text-center">
                          <img src="<?= $comic['image'] ?>" alt="Hình ảnh sản phẩm" class="img-fluid" style="max-height: 200px;">
                          <p class="text-muted small mt-1 mb-0">Hình ảnh hiện tại</p>
                        </div>
                      <?php endif; ?>
                    
                      <div class="input-group">
                        <input type="file" class="form-control <?= isset($errors['image']) ? 'is-invalid' : '' ?>" 
                               name="image" id="image" accept="image/*">
                      </div>
                      <input type="hidden" name="old_image" value="<?= $comic['image'] ?>">
                      <small class="text-muted">Để trống nếu không muốn thay đổi hình ảnh</small>
                      
                      <?php if (isset($errors['image'])): ?>
                        <div class="invalid-feedback d-block"><?= $errors['image']; ?></div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                
                <!-- Mô tả -->
                <div class="col-md-8">
                  <div class="form-group mb-0">
                    <label for="description" class="form-label fw-medium">Mô tả sản phẩm</label>
                    <textarea name="description" id="description" class="form-control <?= isset($errors['description']) ? 'is-invalid' : '' ?>" 
                              rows="8" placeholder="Nhập mô tả chi tiết về sản phẩm"><?= $comic['description'] ?></textarea>
                    <?php if (isset($errors['description'])): ?>
                      <div class="invalid-feedback"><?= $errors['description']; ?></div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Card Footer with Action Buttons -->
            <div class="card-footer bg-light d-flex justify-content-between py-3">
              <a href="?act=san-pham" class="btn btn-outline-secondary px-4">
                <i class="fas fa-arrow-left me-2"></i>Quay lại
              </a>
              <button type="submit" class="btn btn-primary px-4">
                <i class="fas fa-save me-2"></i>Cập nhật sản phẩm
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add Bootstrap 5 and Font Awesome -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom styles -->
<style>
  .bg-gradient-primary {
    background: linear-gradient(45deg, #4e73df, #224abe);
  }
  
  .form-control:focus, .form-select:focus {
    border-color: #4e73df;
    box-shadow: 0 0 0 0.15rem rgba(78, 115, 223, 0.25);
  }
  
  .btn-primary {
    background-color: #4e73df;
    border-color: #4e73df;
  }
  
  .btn-primary:hover {
    background-color: #2e59d9;
    border-color: #2653d4;
  }
  
  .btn-outline-secondary:hover {
    background-color: #f8f9fc;
    color: #5a5c69;
  }
  
  /* Add image preview hover effect */
  .image-preview img {
    transition: transform 0.2s;
  }
  
  .image-preview:hover img {
    transform: scale(1.05);
  }
</style>

<!-- Add jQuery for handling image preview -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Real-time image preview
    $('#image').change(function() {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          $('.image-preview img').attr('src', e.target.result);
          $('.image-preview p').text('Hình ảnh mới');
        }
        reader.readAsDataURL(file);
      }
    });
  });
</script>