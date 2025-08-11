<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Thêm sản phẩm</h3>
          </div>

          <form action="?act=them-san-pham" method="POST" enctype="multipart/form-data">
            <div class="row card-body">

              <!-- Tên sản phẩm -->
              <div class="form-group col-6">
                <label for="title">Tên sản phẩm</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nhập tên sản phẩm"
                  value="<?= $_POST['title'] ?? ''; ?>">
                <?php if (isset($errors['title'])): ?>
                  <p class="text-danger"><?= $errors['title']; ?></p>
                <?php endif; ?>
              </div>

              <!-- Tên tác giả -->
              <div class="form-group col-6">
                <label for="author_id">Tên người bán</label>
                <select class="form-control" name="author_id" id="author_id">
                  <option selected disabled>Chọn tác giả sản phẩm</option>
                  <?php foreach ($listTacGia as $tacGia): ?>
                    <option value="<?= $tacGia['id']; ?>" <?= (isset($_POST['author_id']) && $_POST['author_id'] == $tacGia['id']) ? 'selected' : ''; ?>>
                      <?= $tacGia['name']; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <?php if (isset($errors['author_id'])): ?>
                  <p class="text-danger"><?= $errors['author_id']; ?></p>
                <?php endif; ?>
              </div>

              <!-- Thể loại -->
              <div class="form-group col-6">
                <label for="category_id">Thể loại</label>
                <select class="form-control" name="category_id" id="category_id">
                  <option selected disabled>Chọn danh mục sản phẩm</option>
                  <?php foreach ($listDanhMuc as $danhMuc): ?>
                    <option value="<?= $danhMuc['id']; ?>" <?= (isset($_POST['category_id']) && $_POST['category_id'] == $danhMuc['id']) ? 'selected' : ''; ?>>
                      <?= $danhMuc['name']; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <?php if (isset($errors['category_id'])): ?>
                  <p class="text-danger"><?= $errors['category_id']; ?></p>
                <?php endif; ?>
              </div>

              <!-- Ngày phát hành -->
              <div class="form-group col-6">
                <label for="publication_date">Ngày phát hành</label>
                <input type="date" class="form-control" id="publication_date" name="publication_date"
                  placeholder="Nhập ngày phát hành" value="<?= $_POST['publication_date'] ?? ''; ?>">
                <?php if (isset($errors['publication_date'])): ?>
                  <p class="text-danger"><?= $errors['publication_date']; ?></p>
                <?php endif; ?>
              </div>

              <!-- Giá bán -->
              <div class="form-group col-6">
                <label for="price">Giá bán</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá sản phẩm"
                  value="<?= $_POST['price'] ?? ''; ?>">
                <?php if (isset($errors['price'])): ?>
                  <p class="text-danger"><?= $errors['price']; ?></p>
                <?php endif; ?>
              </div>
              <!-- Giá niệm yết -->
              <div class="form-group col-6">
                <label for="original_price">Giá niệm yết</label>
                <input type="number" class="form-control" id="original_price" name="original_price"
                  placeholder="Nhập giá niệm yết sản phẩm" value="<?= $_POST['original_price'] ?? ''; ?>">
                <?php if (isset($errors['original_price'])): ?>
                  <p class="text-danger"><?= $errors['original_price']; ?></p>
                <?php endif; ?>
              </div>
              <!-- Số lượng -->
              <div class="form-group col-6">
                <label for="stock_quantity">Số lượng</label>
                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity"
                  placeholder="Nhập số lượng sản phẩm" value="<?= $_POST['stock_quantity'] ?? ''; ?>">
                <?php if (isset($errors['stock_quantity'])): ?>
                  <p class="text-danger"><?= $errors['stock_quantity']; ?></p>
                <?php endif; ?>
              </div>

              <!-- Hình ảnh -->
              <div class="form-group col-6">
                <label for="image">Hình ảnh</label>
                <input type="file" class="form-control" id="image" name="image">
                <?php if (isset($errors['image'])): ?>
                  <p class="text-danger"><?= $errors['image']; ?></p>
                <?php endif; ?>
              </div>

              <!-- Mô tả -->
              <div class="form-group col-12">
                <label for="description">Mô tả</label>
                <textarea name="description" id="description" class="form-control"
                  placeholder="Nhập mô tả"><?= $_POST['description'] ?? ''; ?></textarea>
              </div>

              <button type="submit" class="btn btn-primary" style="margin: 0 5px 40px;">Thêm</button>
              <a href="?act=san-pham" class="btn btn-primary" style="margin: 0 5px 40px;">Quay lại</a>

            </div>
          </form>

        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>