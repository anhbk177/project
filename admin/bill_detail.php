<?php
if (!defined("security")) {
    die("Bạn không có quyền truy cập");
}
$id = $_GET['id'];
$manage_id = $row['user_name'];
if(isset($_POST['sbm'])){
    $nvk=$_POST['nvk'];

   $sql0="UPDATE orders 
   SET stocker_id='$nvk', manage_id = '$manage_id' status=2 WHERE order_id=$id ";
  $query0=mysqli_query($conn,$sql0);
  header('location: index.php?page_layout=order');
        }
       
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
            <h1 class="page-header">Chi tiết đơn hàng</h1>
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
                            <th style="border-style:double; border-collapse:collapse; padding-left:10px; width: 120px;">Mã đơn hàng</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:170px; ">Tên sản phẩm</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:30px;  width: 180px;">Số lượng</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:60px; width: 180px;">Đơn giá</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:20px; width: 180px;">Thành tiền</th>
                        </tr>
                        <!-- thông tin -->
                        <?php
                        $sqlx = "SELECT*FROM order_details INNER JOIN product ON order_details.prd_id = product.prd_id WHERE id=$id";
                        $queryx = mysqli_query($conn, $sqlx);
                        while ($rowx = mysqli_fetch_array($queryx)) {
                        ?>

                            <tr>
                                <th style="border-style:double; border-collapse:collapse; padding-left:5px;"><?php echo $rowx['id']; ?></th>
                                <th style="border-style:double; border-collapse:collapse; padding-left:5px;"><?php echo $rowx['prd_name']; ?></th>
                                <th style="border-style:double; border-collapse:collapse; padding-left:5px;"><?php echo $rowx['prd_count']; ?></th>
                                <th style="border-style:double; border-collapse:collapse; padding-left:5px;"><?php echo number_format($rowx['prd_price']); ?></th>
                                <th style="border-style:double; border-collapse:collapse; padding-left:5px;"><?php echo number_format($rowx['prd_count'] * $rowx['prd_price']); ?></th>
                            </tr>
                        <?php
                        }
                        $sql1 = "SELECT*FROM orders WHERE order_id=$id";
                        $query1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_array($query1);
                        $branch = $row1['branch_id'];

                        ?>

                        <tr>
                            <!-- <th style="border-style:double; border-collapse:collapse; padding-left:5px; width: 120px;">Tổng tiền</th> -->
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:60px; background: #ace6c3;">Tổng tiền</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:5px; "><?php echo number_format($row1['totals_price']); ?> đ</th>
                        </tr>
                        <tr>
                           Tên khách hàng:  <b><?php echo $row1['name1']; ?></b><br>
                           Địa chỉ: <b><?php echo $row1['address1']; ?></b><br>
                           Số điện thoại: <b><?php echo $row1['phone']; ?></b><br>
                           Email: <b><?php echo $row1['mail']; ?></b><br>
                           Thời gian đặt hàng: <b><?php echo $row1['date1']; ?></b><br>
                           Thời gian xác nhận: <b><?php  ?></b><br>
                           Thời gian nhận hàng dự kiến: <br>
                           Nhân viên xác nhận: <b><?php echo $row['user_name']; ?></b><br><br>    
                           
                      
                        </tr>
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Nhân viên kho:</label>
                            <select name="nvgh" class="form-control">
                                <?php
                                $sql_nvk = "SELECT*FROM employeei WHERE user_level = 2 AND branch_id=$branch ORDER BY user_id ASC";
                                $query_nvk = mysqli_query($conn,$sql_nvk);
                                while($row_nvk = mysqli_fetch_array($query_nvk)){
                                ?>
                                <option value="<?php echo $row_nvk['user_id']?>"><?php echo $row_nvk['user_name']?></option>
                                <?php
                                }
                                ?>
                            </select>
                            </div>
                            <div class="form-group">
                                <label>Nhân viên giao hàng:</label>
                            <select name="nvkho" class="form-control">
                                <?php
                               $sql_nvgh = "SELECT*FROM shipper WHERE status = 1 AND branch_id=$branch ORDER BY shipper_id ASC";
                               $query_nvgh = mysqli_query($conn,$sql_nvgh);
                               $branch = $row11['branch_id'];
                                while($row_nvgh = mysqli_fetch_array($query_nvgh)){     
                                    $sql_nvgh = "SELECT*FROM shipper WHERE status = 1 AND branch_id=$branch ORDER BY shipper_id ASC";
                                    $query_nvgh = mysqli_query($conn,$sql_nvgh);
                                ?>
                                <option value="<?php echo $row_nvgh['shipper_id']?>"><?php echo mysqli_num_rows($query_nvgh)>0;
                                    if (mysqli_num_rows($query_nvgh)>0) {
                                    echo $row_nvgh['shipper_name'];
                                }else{
                                    echo 'Không có shipper sẵn sàng';
                                }?></option>
                                <?php
                                }
                                ?>
                            </select>
                            </div>
                            <?php    if (mysqli_num_rows($query_nvgh)>0) {
                                    echo '<button type="submit" name="sbm" class="btn btn-success">Xác nhận</button>';
                                }?>
                            
                        </div>
                    	</form>
                       
                    </table>
                </div>
                <!-- Xuat excel -->
                <form style="margin-left: 15px;" method="post" action="export/bill_export.php?id=<?php echo $row1['id']; ?> ">
                    <input type="submit" name="export" class="btn btn btn-primary" value="Xuất" />
                </form>

            </div>
        </div>
    </div>
</div>

<!--/.row-->