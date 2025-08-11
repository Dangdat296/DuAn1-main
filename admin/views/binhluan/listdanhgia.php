<!-- Đánh giá -->
<div class="page-wrapper">
    <hr>
    <h2>Đánh giá của sản phẩm</h2>
    <div class="">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm </th>
                    <th>Tên người mua</th>
                    <th>Đánh giá</th>
                    <th>Nội dung</th>
                    <th>Thời gian</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($danhgias as $key => $danhgia): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td>
                            <a>
                                <?= $danhgia['title'] ?>
                            </a>
                        </td>
                        <td><?= $danhgia['name'] ?></td>
                        <td><?= $danhgia['rating'] ?></td>
                        <td><?= $danhgia['review_text'] ?></td>
                        <td><?= $danhgia['created_at'] ?></td>
                        <td><?= $danhgia['status'] ?></td>
                        <td>
                            <div class="btn-group">
                                <!-- Nút Duyệt -->
                                <a href="<?= BASE_URL_ADMIN . '?act=approve-danhgia&id=' . $danhgia['id'] ?>"
                                    class="btn btn-success btn-sm">Duyệt</a>
                                <!-- Nút Từ chối -->
                                <a href="<?= BASE_URL_ADMIN . '?act=reject-danhgia&id=' . $danhgia['id'] ?>"
                                    class="btn btn-warning btn-sm">Từ chối</a>
                                <!-- Nút Xóa -->
                                <a href="<?= BASE_URL_ADMIN . '?act=delete-danhgia&id=' . $danhgia['id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc muốn xóa đánh giá này?');">Xóa</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>