<?php
$conn = mysqli_connect("localhost", "root", "", "project1");
session_start();
$prd_id = $_GET['prd_id'];
if (isset($_SESSION['cart'][$prd_id])) {
    $_SESSION['cart'][$prd_id] ++;
}else {
    $_SESSION['cart'][$prd_id] =1;
}
header('location: ../../index.php?page_layout=cart')
?>