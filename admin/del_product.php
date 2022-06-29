<?php
session_start();
define("security", True);
include_once("../config/connect.php");
$prd_id = $_GET['prd_id'];
if (isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
    $sql = "DELETE FROM product WHERE prd_id='$prd_id'";
    mysqli_query($conn, $sql);
    header("location:index.php?page_layout=product");
}else{
    include_once("index.php");
}

?>