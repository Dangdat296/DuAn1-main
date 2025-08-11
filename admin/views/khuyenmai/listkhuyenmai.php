<div class="page-wrapper">

            
          <!-- thong bao   -->
      <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa fa-exclamation-circle"></i> <?= $_SESSION['error'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if(isset($_SESSION['success'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa fa-check-circle"></i> <?= $_SESSION['success'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

                  <div class="card">
                  <div class="card-header">
                      <a href="?act=form-add-khuyen-mai" class="btn btn-success">Thêm khuyến mãi</a>
                    </div>
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                              <th>ID</th>
                              <th>Tên sản phẩm </th>
                              <th>Sale Type</th>
                              <th>Sale Value</th>
                              <th>Start Date</th>
                              <th>End Date</th>
                              <th>Status</th>
                              <th>Thao tác</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                         
                         
                            foreach ($khuyenmais as $khuyenmai) { 
                              
                          ?>
                            <tr>
                              
                              <td><?= $khuyenmai['id'] ?></td>
                              <td><?= $khuyenmai['title'] ?></td>
                              <td><?= $khuyenmai['sale_type'] ?></td>
                              <td><?= number_format($khuyenmai['sale_value'], 0, '.', ',') ?></td>
                              <td><?= date('Y-m-d H:i', strtotime($khuyenmai['start_date']))?></td>
                              <td><?= date('Y-m-d H:i', strtotime($khuyenmai['end_date'] ))?></td>
                              <td><?= $khuyenmai['status'] ?></td>
                              
                              <td>
                                <a href="?act=form-edit-khuyen-mai&id=<?=$khuyenmai['id'] ?>">

                                  <button class="btn btn-warning">sửa</button>
                                </a>
                                 
                                <a href="?act=delete-khuyen-mai&id=<?= $khuyenmai['id'] ?>">

                                  <button class="btn btn-danger" onclick="return confirm('bạn có muốn xóa không ?')"> xóa</button>
                                </a>
                              
                              </td>
                            </tr>

                        <?php } ?>
                          
                         
        
                        </tbody>
                        
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
        
</div>





        