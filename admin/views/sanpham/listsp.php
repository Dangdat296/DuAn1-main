<div class="page-wrapper py-4">
  <div class="container-fluid">
    <!-- Alerts Section -->
    <?php if (isset($_SESSION['message'])): ?>
      <div class="alert alert-<?= $_SESSION['message']['type'] ?> alert-dismissible fade show border-start border-4 border-<?= $_SESSION['message']['type'] ?> shadow-sm mb-4" role="alert">
        <div class="d-flex align-items-center">
          <i class="fas fa-<?= $_SESSION['message']['type'] === 'success' ? 'check-circle' : 'exclamation-circle' ?> me-2"></i>
          <div><?= $_SESSION['message']['text'] ?></div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
      <div class="alert alert-danger alert-dismissible fade show border-start border-4 border-danger shadow-sm mb-4" role="alert">
        <div class="d-flex align-items-center">
          <i class="fas fa-exclamation-circle me-2"></i>
          <div><?= $_SESSION['error'] ?></div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <!-- Main Content Card -->
    <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
      <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold text-primary">Sản phẩn nước hoa </h5>
        <div>
          <a href="?act=form-them-san-pham" class="btn btn-success">
            <i class="fas fa-plus-circle me-2"></i>Thêm Nước hoa mới
          </a>
        </div>
      </div>

      <div class="card-body p-0">
        <div class="table-responsive">
          <table id="example1" class="table table-hover align-middle mb-0">
            <thead class="bg-light">
              <tr>
                <th class="px-4 py-3" width="5%">STT</th>
                <th class="px-4 py-3" width="15%">Tên Nước Hoa</th>
                <th class="px-4 py-3" width="10%">Chủ sản phẩm </th>
                <th class="px-4 py-3" width="8%">Thể loại</th>
                <th class="px-4 py-3" width="10%">Ngày phát hành</th>
                <th class="px-4 py-3" width="6%">Sale</th>
                <th class="px-4 py-3" width="8%">Giá bán</th>
                <th class="px-4 py-3" width="8%">Giá niêm yết</th>
                <th class="px-4 py-3" width="6%">Số lượng</th>
                <th class="px-4 py-3" width="10%">Hình ảnh</th>
                <th class="px-4 py-3 text-center" width="14%">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listsp as $index => $sanPham) { ?>
                <tr>
                  <td class="px-4 py-3 text-muted"><?= $sanPham['id'] ?></td>
                  <td class="px-4 py-3 fw-medium text-truncate" style="max-width: 200px;"><?= $sanPham['title'] ?></td>
                  <td class="px-4 py-3"><?= $sanPham['author_name'] ?? '<span class="text-muted fst-italic">Không có</span>' ?></td>
                  <td class="px-4 py-3"><?= $sanPham['category_name'] ?? '<span class="text-muted fst-italic">Không có</span>' ?></td>
                  <td class="px-4 py-3"><?= date('d/m/Y', strtotime($sanPham['publication_date'])) ?></td>
                  <td class="px-4 py-3">
                    <?php if (is_numeric($sanPham['sale']) && (!isset($sanPham['sale_start']) || strtotime($sanPham['sale_start']) <= time())): ?>
                      <?php if ($sanPham['sale'] > 0): ?>
                        <span class="badge bg-danger">
                          <?= $sanPham['sale'] <= 100 ? 
                            number_format($sanPham['sale'], 0) . '%' : 
                            number_format($sanPham['sale'], 0, ',', '.') . ' đ' ?>
                        </span>
                      <?php else: ?>
                        <span class="badge bg-secondary">0%</span>
                      <?php endif; ?>
                    <?php else: ?>
                      <span class="badge bg-secondary">0%</span>
                    <?php endif; ?>
                  </td>
                  <td class="px-4 py-3 fw-medium"><?= number_format($sanPham['price'], 0, ',', '.') ?> ₫</td>
                  <td class="px-4 py-3 text-decoration-line-through text-muted"><?= number_format($sanPham['original_price'], 0, ',', '.') ?> ₫</td>
                  <td class="px-4 py-3">
                    <?php if ($sanPham['stock_quantity'] > 0): ?>
                      <span class="badge bg-success"><?= $sanPham['stock_quantity'] ?></span>
                    <?php else: ?>
                      <span class="badge bg-danger">Hết hàng</span>
                    <?php endif; ?>
                  </td>
                  <td class="px-4 py-3">
                    <?php if (!empty($sanPham['image']) && file_exists($sanPham['image'])): ?>
                      <img src="<?= $sanPham['image'] ?>" class="img-thumbnail" width="80" alt="Sách: <?= htmlspecialchars($sanPham['title']) ?>">
                    <?php else: ?>
                      <img src="path/to/default-image.jpg" class="img-thumbnail" width="80" alt="Hình ảnh mặc định">
                    <?php endif; ?>
                  </td>
                  <td class="px-4 py-3">
                    <div class="d-flex justify-content-center gap-2">
                      <a href="?act=form-sua-san-pham&id=<?= $sanPham['id'] ?>" class="btn btn-sm btn-outline-primary" title="Sửa">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="?act=chi-tiet-bien-the-sp&id=<?= $sanPham['id'] ?>" class="btn btn-sm btn-outline-info" title="Biến thể">
                        <i class="fas fa-cubes"></i>
                      </a>
                      <a href="?act=xoa-san-pham&id=<?= $sanPham['id'] ?>" 
                         class="btn btn-sm btn-outline-danger" 
                         onclick="return confirm('Bạn có chắc chắn muốn xóa sách này?')"
                         title="Xóa">
                        <i class="fas fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php } ?>
              
              <?php if (empty($listsp)): ?>
                <tr>
                  <td colspan="11" class="text-center py-5 text-muted">
                    <i class="fas fa-book fa-3x mb-3"></i>
                    <p>Chưa có sách nào trong hệ thống</p>
                    <a href="?act=form-them-san-pham" class="btn btn-sm btn-primary">Thêm sách mới</a>
                  </td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
      
      <div class="card-footer bg-white py-3 d-flex justify-content-between">
        <div class="text-muted small">Tổng số: <?= count($listsp) ?> sách</div>
        <div>
          <!-- Pagination can be added here if needed -->
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
  /* Table enhancements */
  .table thead th {
    font-weight: 600;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }
  
  .table tbody tr {
    transition: background-color 0.15s ease-in-out;
  }
  
  .table tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.02);
  }
  
  /* Button styles */
  .btn-outline-primary, .btn-outline-info, .btn-outline-danger {
    transition: all 0.2s;
  }
  
  .btn-outline-primary:hover {
    background-color: #4e73df;
  }
  
  .btn-outline-info:hover {
    background-color: #36b9cc;
  }
  
  .btn-outline-danger:hover {
    background-color: #e74a3b;
  }
  
  /* Alert styles */
  .alert {
    border-radius: 0.5rem;
  }
  
  /* Image styles */
  .img-thumbnail {
    border-radius: 0.3rem;
    transition: transform 0.2s;
  }
  
  .img-thumbnail:hover {
    transform: scale(1.05);
  }
  
  /* Badge styles */
  .badge {
    font-weight: 500;
    padding: 0.4em 0.6em;
  }
</style>

<!-- DataTables initialization script -->
<script>
  $(document).ready(function() {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "language": {
        "search": "Tìm kiếm:",
        "lengthMenu": "Hiển thị _MENU_ mục",
        "info": "Hiển thị _START_ đến _END_ trong số _TOTAL_ mục",
        "infoEmpty": "Hiển thị 0 đến 0 trong số 0 mục",
        "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
        "paginate": {
          "first": "Đầu",
          "last": "Cuối",
          "next": "Sau",
          "previous": "Trước"
        }
      }
    });
  });
</script>