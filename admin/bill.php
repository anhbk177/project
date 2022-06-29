<script>
    function bill(name) {
        return confirm('Bạn muốn thay đổi trạng thái đơn hàng: ' + name + ' ?');
    }

    function del_bill(name) {
        return confirm('Bạn muốn xóa đơn hàng: ' + name + ' ?');
    }
</script>
<?php
if (!defined("security")) {
    die("Bạn không có quyền truy cập");
}
// Tính trang hiện tại
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
// Số lượng bản ghi hiện tại
$row_per_page = 10;
// Vị trí bản ghi cần lấy
$per_row = $page * $row_per_page - $row_per_page;
$total_row = mysqli_num_rows(mysqli_query($conn, "SELECT*FROM orders"));
$total_page = ceil($total_row / $row_per_page);
// Nút preview
$list_page = "";
$prev = $page - 1;
if ($prev <= 0) {
    $prev = 1;
}
$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=order&page=' . $prev . '">&laquo;</a></li>';
// Số page
for ($i = 1; $i <= $total_page; $i++) {
    if ($i == $page) {
        $active = 'active';
    } else {
        $active = '';
    }
    $list_page .= '<li class="page-item ' . $active . '"><a class="page-link" href="index.php?page_layout=order&page=' . $i . '">' . $i . '</a></li>';
}
// Next
$next = $page + 1;
if ($next >= $total_page) {
    $next = $total_page;
}
$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=order&page=' . $next . '">&raquo;</a></li>';

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Quản lý đơn hàng</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách đơn hàng</h1>
        </div>
    </div>

    <!-- table -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table style="width: 100%; border-style:double; margin-top:20px; border-collapse:collapse;">
                        <!-- danh mục -->
                        <tr style="background-color:skyblue; ">
                            <th style="border-style:double; border-collapse:collapse; padding-left:10px; width: 60px;">ID</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:30px; width: 150px;">Tên khách hàng</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:100px;">Địa chỉ</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:70px; width: 170px;">Email</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:13px; width: 90px;">Số điện thoại</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:10px; width: 80px;">Tổng tiền</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:10px; width: 90px;">Ngày đặt</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:13px; width: 95px;">Trạng thái</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:15px;">Hành động</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:30px; width: 120px;">Quản lý</th>
                        </tr>
                        <!-- thông tin -->
                        <?php
                        $sql = "SELECT*FROM orders ORDER BY timestamp DESC LIMIT $per_row,$row_per_page";
                        $query = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($query)) {
                            if ($row['status'] == 2) {
                                $st_next = 1;
                            } else if ($row['status'] == 1) {
                                $st_next = 0;
                            } else {
                                $st_next = 0;
                            }
                        ?>
                            <tr>
                                <th style="border-style:double; border-collapse:collapse; padding-left:5px;"><?php echo $row['order_id']; ?></th>
                                <th style="border-style:double; border-collapse:collapse; padding-left:5px;"><?php echo $row['name1']; ?></th>
                                <th style="border-style:double; border-collapse:collapse; padding-left:5px;"><?php echo $row['address1']; ?></th>
                                <th style="border-style:double; border-collapse:collapse; padding-left:5px;"><?php echo $row['mail']; ?></th>
                                <th style="border-style:double; border-collapse:collapse; padding-left:5px;"><?php echo $row['phone']; ?></th>
                                <th style="border-style:double; border-collapse:collapse; padding-left:5px;"><?php echo number_format($row['totals_price']); ?></th>
                                <th style="border-style:double; border-collapse:collapse; padding-left:5px;"><?php echo $row['date1']; ?></th>
                                <th style="border-style:double; border-collapse:collapse; text-align:center">
                                    <a href=""><?php if ($row['status'] == 3) {
                                                    echo '<span class="label label-danger">Đơn hàng mới</span>';
                                                } else if ($row['status'] ==2) {
                                                    echo '<span class="label label-warning">Đã xác nhận</span>';
                                                } else if($row['status'] ==1){
                                                    echo '<span class="label label-primary">Đang giao</span>';
                                                }else {
                                                    echo '<span class="label label-success">Thành công</span>';
                                                } ?></a>
                                </th>
                                <td style="text-align:center; border-style:double;" class="form-group">
                                    <a onclick="return del_bill('<?php echo $row['id']; ?>')" href="del_bill.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"> Hủy</a>
                                </td>
                                <th style="border-style:double; border-collapse:collapse; padding-left:5px;">
                                    <a href="index.php?page_layout=order_details&id=<?php echo $row['order_id']; ?>">Xem đơn hàng</a>
                                </th>
                            </tr>
                        <?php
                        }
                        ?>

                    </table>
                </div>

                <div class="panel-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php echo $list_page ?>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>

<!--/.row-->