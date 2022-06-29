<?php
if (!defined("security")) {
    die("Bạn không có quyền truy cập");
}


date_default_timezone_set("Asia/Bangkok");
$time = strtotime(date("Y-n-d H:i:s"));  //lay ra thoi gian hien tai
$last_month = $time - 29 * 24 * 60 * 60;

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
$total13 = 0;
$total14 = 0;
$total15 = 0;
$total16 = 0;
$total17 = 0;
$total18 = 0;
$total19 = 0;
$total20 = 0;
$total21 = 0;
$total22 = 0;
$total23 = 0;
$total24 = 0;
$total25 = 0;
$total26= 0;
$total27 = 0;
$total28 = 0;
$total29 = 0;
$total30 = 0;

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Thống kê / Tháng</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Doanh số tháng vừa qua</h1>
        </div>
    </div>

    <!-- table -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table style="width:40%; border-style:double; border-collapse:collapse;">
                        <!-- danh mục -->
                        <tr style="background-color:skyblue; ">
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày</td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Doanh số</td>
                        </tr>
                        
                        <!-- thông tin -->
                        <?php
                        $sql = "SELECT * FROM bill WHERE status = 0";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                            $sub_time = $time - $row['timestamp'];  //do lech thoi gian don hang voi thoi gian hien tai
                            $stamp_day = 60 * 60 * 24; //so giay trong 1 ngay
                           
                                if ($sub_time <= $stamp_day) {$total30 += $row['totals_price'];
                                } elseif ($stamp_day < $sub_time && $sub_time <= $stamp_day * 2) {
                                    $total29 += $row['totals_price'];
                                } elseif (2 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 3) {
                                    $total28 += $row['totals_price'];
                                } elseif (3 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 4) {
                                    $total27 += $row['totals_price'];
                                } elseif (4 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 5) {
                                    $total26 += $row['totals_price'];
                                } elseif (5 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 6) {
                                    $total25 += $row['totals_price'];
                                } elseif (6 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 7) {
                                    $total24 += $row['totals_price'];
                                }elseif (7 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 8) {
                                    $total23 += $row['totals_price'];
                                }elseif (8 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 9) {
                                    $total22 += $row['totals_price'];
                                }elseif (9 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 10) {
                                    $total21 += $row['totals_price'];
                                }elseif (10 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 11) {
                                    $total20 += $row['totals_price'];
                                }elseif (11 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 12) {
                                    $total19 += $row['totals_price'];
                                }elseif (12 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 13) {
                                    $total18 += $row['totals_price'];
                                }elseif (13 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 14) {
                                    $total17 += $row['totals_price'];
                                }elseif (14 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 15) {
                                    $total16 += $row['totals_price'];
                                }elseif (15 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 16) {
                                    $total15 += $row['totals_price'];
                                }elseif (16 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 17) {
                                    $total14 += $row['totals_price'];
                                }elseif (17 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 18) {
                                    $total13 += $row['totals_price'];
                                }elseif (18 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 19) {
                                    $total12 += $row['totals_price'];
                                }elseif (19 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 20) {
                                    $total11 += $row['totals_price'];
                                }elseif (20 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 21) {
                                    $total10 += $row['totals_price'];
                                }elseif (21 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 22) {
                                    $total9 += $row['totals_price'];
                                }elseif (22 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 23) {
                                    $total8 += $row['totals_price'];
                                }elseif (23 * $stamp_day < $sub_time && $sub_time <= $stamp_day *24) {
                                    $total7 += $row['totals_price'];
                                }elseif (24 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 25) {
                                    $total6 += $row['totals_price'];
                                }elseif (25 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 26) {
                                    $total5 += $row['totals_price'];
                                }elseif (26 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 27) {
                                    $total4 += $row['totals_price'];
                                }elseif (27 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 28) {
                                    $total3 += $row['totals_price'];
                                }elseif (28 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 29) {
                                    $total2 += $row['totals_price'];
                                }elseif (29 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 30) {
                                    $total1 += $row['totals_price'];
                                }
                           
                           
                        }
                        ?>
                        <!-- danh mục -->
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month) ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total1); ?></td>
                
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total2); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*2); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total3); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*3); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total4); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*4); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total5); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*5); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total6); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*6); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total7); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*7); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total8); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*8); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total9); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*9); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total10); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*10); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total11); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*11); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total12); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*12); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total13); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*13); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total14); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*14); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total15); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*15); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total16); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*16); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total17); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*17); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total18); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*18); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total19); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*19); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total20); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*20); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total21); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*21); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total22); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*22); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total23); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*23); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total24); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*24); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total25); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*25); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total26); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*26); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total27); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*27); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total28); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*28); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total29); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày <?php echo date("d-n-Y", $last_month+$stamp_day*29); ?></td>
                            <td style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total30); ?></td>
                        </tr>
                     
                </div>
                <!-- Xuat excel -->
                <form method="post" action="export/bill_month_export.php">
                    <input type="submit" name="export" class="btn btn-primary" value="Xuất" />
                </form><br>

            </div>

        </div>
    </div>
</div>

<!--/.row-->