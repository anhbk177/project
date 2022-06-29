<script>
    function del_bill(name) {
        return confirm('Bạn muốn xóa người dùng: ' + name + ' ?');
    }
</script>
<?php
if (!defined("security")) {
    die("Bạn không có quyền truy cập");
}
// require 'PHPExcel/Classes/PHPExcel.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$row_per_page = 5;
$per_row = $page * $row_per_page - $row_per_page;
$total_row = mysqli_num_rows(mysqli_query($conn, "SELECT*FROM employeei"));
$total_page = ceil($total_row / $row_per_page);
$list_page = "";
$prev = $page - 1;
if ($prev <= 0) {
    $prev = 1;
}
$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=user&page=' . $prev . '">&laquo;</a></li>';
for ($i = 1; $i <= $total_page; $i++) {
    if ($i == $page) {
        $active = 'active';
    } else {
        $active = '';
    }
    $list_page .= '<li class="page-item ' . $active . ' "><a class="page-link" href="index.php?page_layout=user&page=' . $i . '">' . $i . '</a></li>';
}
$next = $page + 1;
if ($next >= $total_page) {
    $next = $total_page;
}
$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=user&page=' . $next . '">&raquo;</a></li>';
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Quản lý thành viên</li>
        </ol>
    </div>
    <!--/.row-->

    <?php
if (isset($_POST["import"])) {  
        $file=$_FILES['file']['tmp_name'];
        // $objExcel=PHPExcel_IOFactory::createReaderForFile($file);
        $objExcel=PHPExcel_IOFactory::load($file);
        $sheetData = $objExcel->getActiveSheet()->toArray();
        // print_r($sheetData);
        //so dong toi da
        $highestrow=$objExcel->setActiveSheetIndex()->getHighestRow();
        // echo $highestrow;
      
        for ($i=1; $i < $highestrow; $i++) { 
            $name = $sheetData[$i]['0'];
            $mail = $sheetData[$i]['2'];
            $level = $sheetData[$i]['4'];
            $pass = $sheetData[$i]['5'];
            $sql = "INSERT INTO employeei (user_name, user_mail, user_level, user_pass)
            VALUES('$name', '$mail', '$level', '$pass')";
            $query = mysqli_query($conn, $sql);
        }
}

?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách thành viên</h1>
        </div>
    </div>
      
    <!--/.row-->
    <div id="toolbar" class="btn-group">
  
   
        <a href="index.php?page_layout=add_user" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
        </a>
        
    </div>
 
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                <div class="product-search">
                <form id="product-search-form" action="product_listing.php?action=search" method="POST">
                    <fieldset>
                        <legend>Tìm kiếm sản phẩm:</legend>
                        ID: <input type="text" name="id" value="<?=!empty($id)?$id:""?>" />
                        Tên sản phẩm: <input type="text" name="name" value="<?=!empty($name)?$name:""?>" />
                        <input type="submit" value="Tìm" />
                    </fieldset>
                </form>
            </div>
                    <table data-toolbar="#toolbar" data-toggle="table">

                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="name" data-sortable="true">Họ & Tên</th>
                                <th data-field="price" data-sortable="true">Email</th>
                                <th>Quyền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT*FROM employeei LIMIT $per_row,$row_per_page";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td style=""><?php echo $row['user_id'] ?></td>
                                    <td style=""><?php echo $row['user_name'] ?></td>
                                    <td style=""><?php echo $row['user_mail'] ?></td>
                                    <td><?php if ($row['user_level'] == 1) {
                                            echo '<span class="label label-danger">Admin</span>';
                                        } elseif ($row['user_level'] == 2) {
                                            echo '<span class="label label-success">Member</span>';
                                        } else {
                                            echo '<span class="label label-warning">Manager</span>';
                                        } ?>
                                    </td>
                                    <td class="form-group">
                                        <a href="index.php?page_layout=edit_user&user_id=<?php echo $row['user_id'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a onclick="return del_bill('<?php echo $row['user_id']; ?>')" href="del_user.php?user_id=<?php echo $row['user_id'] ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- Xuat excel -->
                <form style="margin-left: 15px; margin-bottom: 7px;" method="post" action="export/user_export.php">
                    <input type="submit" name="export" class="btn btn-primary" value="Xuất" />
                </form>

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