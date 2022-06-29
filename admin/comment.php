<script>
    function del(name) {
        return confirm('Bạn muốn xóa sản phẩm: ' + name + ' ?');
    }
</script>
<?php
if (!defined("security")) {
    die("Bạn không có quyền truy cập");
}
// Tính trang hiện tại
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}else {
    $page = 1;
}
// Số lượng bản ghi hiện tại
$row_per_page = 5;
// Vị trí bản ghi cần lấy
$per_row = $page*$row_per_page - $row_per_page;
$total_row = mysqli_num_rows(mysqli_query($conn,"SELECT*FROM comment"));
$total_page = ceil($total_row/$row_per_page);
// Nút preview
$list_page = "";
$prev = $page - 1;
if ($prev <= 0 ) {
    $prev = 1;
}
$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=comment&page='.$prev.'">&laquo;</a></li>';
// Số page
for ($i=1; $i <= $total_page ; $i++) { 
    if ($i == $page) {
        $active = 'active';
    }else {
        $active = '';
    }
    $list_page .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=comment&page='.$i.'">'.$i.'</a></li>';
}
// Next
$next = $page + 1;
if ($next >= $total_page) {
    $next = $total_page;
}
$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=comment&page='.$next.'">&raquo;</a></li>';


?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Quản lý bình luận</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách bình luận</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">

                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="prd_id" data-sortable="true">ID Sản phẩm</th>
                                <th data-field="comm_name" data-sortable="true">Tên</th>
                                <th data-field="email" data-sortable="true">Email</th>
                                <th data-field="date" data-sortable="true">Ngày comment</th>
                                <th data-field="comm_detail" data-sortable="true">Chi tiết comment</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql1 = "SELECT*FROM comment INNER JOIN product ON comment.prd_id = product.prd_id ORDER BY comm_id DESC LIMIT $per_row,$row_per_page";
                            $query1 = mysqli_query($conn, $sql1);
                            while($row1 = mysqli_fetch_array($query1)){
                            ?>
                            <tr>
                                <td style=""><?php echo $row1['comm_id'];?></td>
                                <td style=""><?php echo $row1['prd_id'];?></td>
                                <td style=""><?php echo $row1['comm_name'];?></td>
                                <td style=""><?php echo $row1['comm_mail'];?></td>
                                <td style=""><?php echo $row1['comm_date'];?></td>
                                <td style=""><?php echo $row1['comm_details'];?></td>
                                <td style="text-align:center" class="form-group">
                                <a onclick="return del('<?php echo $row1['comm_id']; ?>')" href="del_comment.php?comm_id=<?php echo $row1['comm_id'];?>" class="btn btn-danger"> Xóa</a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
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
    <!--/.row-->
</div>
<!--/.main-->