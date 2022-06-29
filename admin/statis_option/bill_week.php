<?php
if (!defined("security")) {
    die("Bạn không có quyền truy cập");
}

//lay ra thoi gian hien tai
date_default_timezone_set("Asia/Bangkok"); 
$time_now = strtotime(date("Y-n-d H:i:s"));
$last_week = $time_now - 6 * 24 * 60 * 60;
$total1 = 0;
$total2 = 0;
$total3 = 0;
$total4 = 0;
$total5 = 0;
$total6 = 0;
$total7 = 0;
?>
<?php
if (!defined("security")) {
    die("Bạn không có quyền truy cập");
}

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Thống kê / Tuần</li>
        </ol>
    </div>
    <!-- table -->
    <div class="row">
        
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="margin-left: 10px;">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Doanh số 7 ngày qua</h1>
        </div>
    </div>

    <!-- table -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table style="width: 100%; border-style:double; border-collapse:collapse;">
                        <!-- danh mục -->
                        <tr style="background-color:skyblue; ">
                            <th style="border-style:double; border-collapse:collapse; padding-left:10px;">Ngày</th>
                            <th style=" width:12%;border-style:double; border-collapse:collapse; padding-left:10px;">Ngày 1</th>
                            <th style="width:12%; border-style:double; border-collapse:collapse; padding-left:10px;">Ngày 2</th>
                            <th style="width:12%;border-style:double; border-collapse:collapse; padding-left:10px;">Ngày 3</th>
                            <th style="width:12%;border-style:double; border-collapse:collapse; padding-left:10px;">Ngày 4</th>
                            <th style="width:12%;border-style:double; border-collapse:collapse; padding-left:10px;">Ngày 5</th>
                            <th style="width:12%;border-style:double; border-collapse:collapse; padding-left:10px;">Ngày 6</th>
                            <th style="width:12%;border-style:double; border-collapse:collapse; padding-left:10px;">Ngày 7</th>
                        </tr>
                        <!-- thông tin -->
                        <?php
                        $sql = "SELECT * FROM bill WHERE timestamp>=$last_week AND status = 0";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                            $sub_time = $time_now - $row['timestamp'];
                            $stamp_day = 60 * 60 * 24;

                            if ($sub_time <= $stamp_day) {
                                $total7 += $row['totals_price'];
                            } elseif ($stamp_day < $sub_time && $sub_time <= $stamp_day * 2) {
                                $total6 += $row['totals_price'];
                            } elseif (2 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 3) {
                                $total5 += $row['totals_price'];
                            } elseif (3 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 4) {
                                $total4 += $row['totals_price'];
                            } elseif (4 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 5) {
                                $total3 += $row['totals_price'];
                            } elseif (5 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 6) {
                                $total2 += $row['totals_price'];
                            } elseif (6 * $stamp_day < $sub_time && $sub_time <= $stamp_day * 7) {
                                $total1 += $row['totals_price'];
                            }
                        }
                        ?>
                        <tr>
                            <th style="border-style:double; border-collapse:collapse; padding-left:10px;">Doanh số</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total1); ?></th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total2); ?></th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total3); ?></th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total4); ?></th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total5); ?></th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total6); ?></th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:10px;"><?php echo number_format($total7); ?></th>
                        </tr>
                        <?php  ?>
                </div>
                <!-- Xuat excel -->
                <form method="post" action="export/bill_week_export.php">
                    <input type="submit" name="export" class="btn btn-primary" value="Xuất" />
                </form><br>

            </div>

        </div>
    </div>
</div>

<!--/.row-->