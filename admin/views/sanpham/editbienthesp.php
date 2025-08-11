
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12"></div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Sửa Biến Thể Cho Sản Phẩm</h3>
        </div>

        <!-- Form with simplified action -->
        <form action="?act=sua-bien-the" method="POST" enctype="multipart/form-data">
          <div class="row card-body">
            <!-- Hidden fields -->
            <input type="hidden" name="id" value="<?= $variant['id'] ?>">
            <input type="hidden" name="comic_id" value="<?= $variant['comic_id'] ?>">
            <input type="hidden" name="old_image" value="<?= $variant['image'] ?>">

            <!-- Format -->
            <div class="form-group col-6">
              <label for="format">Định dạng</label>
              <select class="form-control" name="format">
                <option value="Bìa cứng" <?= $variant['format'] == 'Bìa cứng' ? 'selected' : '' ?>>Bìa Cứng</option>
                <option value="Bìa mềm" <?= $variant['format'] == 'Bìa mềm' ? 'selected' : '' ?>>Bìa Mềm</option>
              </select>
            </div>

            <!-- Language -->
            <div class="form-group col-6">
              <label for="language">Nguồn(trong nước-Ngoài nước)</label>
              <input type="text" class="form-control" name="language"
                value="<?= htmlspecialchars($variant['language']) ?>" required>
            </div>

            <!-- Price fields -->
            <div class="form-group col-6">
              <label for="price">Giá bán</label>
              <input type="number" class="form-control" name="price" value="<?= $variant['price'] ?>" required>
            </div>

            <div class="form-group col-6">
              <label for="original_price">Giá niêm yết</label>
              <input type="number" class="form-control" name="original_price" value="<?= $variant['original_price'] ?>">
            </div>

            <!-- Stock -->
            <div class="form-group col-6">
              <label for="stock_quantity">Số lượng</label>
              <input type="number" class="form-control" name="stock_quantity" value="<?= $variant['stock_quantity'] ?>"
                required>
            </div>

            <!-- Publication date -->
            <div class="form-group col-6">
              <label for="publication_date">Ngày phát hành</label>
              <input type="date" class="form-control" name="publication_date"
                value="<?= $variant['publication_date'] ?>" required>
            </div>

            <!-- ISBN -->
            <div class="form-group col-6">
              <label for="isbn">ISBN</label>
              <input type="text" class="form-control" name="isbn" value="<?= htmlspecialchars($variant['isbn']) ?>"
                required>
            </div>

            <!-- Image -->
            <div class="form-group col-6">
              <label for="image">Hình ảnh mới</label>
              <input type="file" class="form-control" name="image">
              <?php if (!empty($variant['image'])): ?>
                <img src="<?= $variant['image'] ?>" alt="Current image" style="max-width: 100px; margin-top: 10px;">
              <?php endif; ?>
            </div>

            <!-- Submit Button -->
            <div class="form-group col-12">
              <button type="submit" class="btn btn-success">Cập nhật biến thể</button>
              <a href="?act=chi-tiet-bien-the-sp&id=<?= $variant['comic_id'] ?>" class="btn btn-secondary">Quay lại</a>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
