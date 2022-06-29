<?php
if (!defined("security")) {
	die("Bạn không có quyền truy cập");
}
$conn = mysqli_connect('localhost', 'root', '', 'project');
if ($conn) {
    mysqli_query($conn, "SET NAMES 'utf8'");
}else {
    echo "Kết nối thất bại";
}
?>