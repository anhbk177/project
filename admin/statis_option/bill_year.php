
<?php
date_default_timezone_set("Asia/Bangkok");
$time = strtotime(date("Y-n-d H:i:s"));  //lay ra thoi gian hien tai
$last_year = $time - 11*30 * 24 * 60 * 60;
$total1 = 0;
$total2 = 0;
$total3 = 0;
$total4 = 0;
$total5 = 0;
$total6 = 0;
$total7 = 0;
$total8 = 0;
$total9 = 0;
$total10 = 0;
$total11 = 0;
$total12 = 0;
$sql = "SELECT * FROM bill WHERE status = 0";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                            $sub_time = $time - $row['timestamp'];  //do lech thoi gian don hang voi thoi gian hien tai
                            $stamp_month = 60 * 60 * 24 * 30; //so giay trong 30 ngay
                           
                                if ($sub_time <= $stamp_month) {
                                    $total12 += $row['totals_price'];
                                } elseif ($stamp_month < $sub_time && $sub_time <= $stamp_month * 2) {
                                    $total11 += $row['totals_price'];
                                } elseif (2 * $stamp_month < $sub_time && $sub_time <= $stamp_month * 3) {
                                    $total10 += $row['totals_price'];
                                }  elseif (4 * $stamp_month < $sub_time && $sub_time <= $stamp_month * 5) {
                                    $total8 += $row['totals_price'];
                                } elseif (5 * $stamp_month < $sub_time && $sub_time <= $stamp_month * 6) {
                                    $total7 += $row['totals_price'];
                                } elseif (6 * $stamp_month < $sub_time && $sub_time <= $stamp_month * 7) {
                                    $tota6 += $row['totals_price'];
                                }elseif (7 * $stamp_month < $sub_time && $sub_time <= $stamp_month * 8) {
                                    $tota5 += $row['totals_price'];
                                }elseif (8 * $stamp_month < $sub_time && $sub_time <= $stamp_month * 9) {
                                    $total4 += $row['totals_price'];
                                }elseif (9 * $stamp_month < $sub_time && $sub_time <= $stamp_month * 10) {
                                    $total3 += $row['totals_price'];
                                }elseif (10 * $stamp_month < $sub_time && $sub_time <= $stamp_month * 11) {
                                    $total2 += $row['totals_price'];
                                }elseif (11 * $stamp_month < $sub_time && $sub_time <= $stamp_month * 12) {
                                    $total1 += $row['totals_price'];
                                }}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Thống kê / Năm</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Doanh số 1 năm qua</h1>
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
                        <th style="border-style:double; border-collapse:collapse; padding-left:10px;">Tháng</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:10px;">Doanh số</th>
    
                           
                        </tr>
                        <!-- thông tin -->
                    
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Tháng <?php echo date("n-Y", $last_year) ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total1); ?></td>
                
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Tháng <?php echo date("n-Y", $last_year+$stamp_month); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total2); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Tháng <?php echo date("n-Y", $last_year+$stamp_month*2); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total3); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Tháng <?php echo date("n-Y", $last_year+$stamp_month*3); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total4); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Tháng <?php echo date("n-Y", $last_year+$stamp_month*4); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total5); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Tháng <?php echo date("n-Y", $last_year+$stamp_month*5); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total6); ?></td>
                        </tr>
                        <!-- <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Tháng <?php echo date("n-Y", $last_year+$stamp_month*6); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total7); ?></td>
                        </tr> -->
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Tháng <?php echo date("n-Y", $last_year+$stamp_month*7); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total8); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Tháng <?php echo date("n-Y", $last_year+$stamp_month*8); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total9); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Tháng <?php echo date("n-Y", $last_year+$stamp_month*9); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total10); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Tháng <?php echo date("n-Y", $last_year+$stamp_month*10); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total11); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Tháng <?php echo date("n-Y", $last_year+$stamp_month*11); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total12); ?></td>
                        </tr>
                      
                   
                </div>
                 <!-- Xuat excel -->
                 <form style="margin-left: 15px;" method="post" action="export/bill_year_export.php">
                                            <input type="submit" name="export" class="btn btn-success" value="Xuất" />
                                        </form>

            </div>
        </div>
    </div>
</div>

<!--/.row-->