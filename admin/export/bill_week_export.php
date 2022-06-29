<?php

$output = '';
$conn = mysqli_connect("localhost", "root", "", "project1");
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

$output .= '<table style="width: 100%; border-style:double; border-collapse:collapse;">
<!-- danh mục -->
<tr style="background-color:skyblue; ">
    <th style="border-style:double; border-collapse:collapse; padding-left:10px;">Day</th>
    <th style=" width:12%;border-style:double; border-collapse:collapse; padding-left:10px;">Day 1</th>
    <th style="width:12%; border-style:double; border-collapse:collapse; padding-left:10px;">Day 2</th>
    <th style="width:12%;border-style:double; border-collapse:collapse; padding-left:10px;">Day 3</th>
    <th style="width:12%;border-style:double; border-collapse:collapse; padding-left:10px;">Day 4</th>
    <th style="width:12%;border-style:double; border-collapse:collapse; padding-left:10px;">Day 5</th>
    <th style="width:12%;border-style:double; border-collapse:collapse; padding-left:10px;">Day 6</th>
    <th style="width:12%;border-style:double; border-collapse:collapse; padding-left:10px;">Day 7</th>
</tr>';
$sql = "SELECT * FROM bill WHERE status = 0";
$query = mysqli_query($conn, $sql);
if (isset($_POST["export"])) {
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
$output .= ' <tr>
<th style="border-style:double; border-collapse:collapse; padding-left:10px;">Doanh so</th>
<th style="border-style:double; border-collapse:collapse; padding-left:10px;">'.number_format($total1).'</th>
<th style="border-style:double; border-collapse:collapse; padding-left:10px;">'.number_format($total2).'</th>
<th style="border-style:double; border-collapse:collapse; padding-left:10px;">'.number_format($total3).'</th>
<th style="border-style:double; border-collapse:collapse; padding-left:10px;">'.number_format($total4).'</th>
<th style="border-style:double; border-collapse:collapse; padding-left:10px;">'.number_format($total5).'</th>
<th style="border-style:double; border-collapse:collapse; padding-left:10px;">'.number_format($total6).'</th>
<th style="border-style:double; border-collapse:collapse; padding-left:10px;">'.number_format($total7).'</th>
</tr> </table>';
header('Content-Type: application/xls; charset=UTF-8');
header('Content-Disposition: attachment; filename=bill_week.xls');
echo $output;
}
?>