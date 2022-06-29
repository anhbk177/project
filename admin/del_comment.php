<?php
session_start();
define("security", True);
include_once("../config/connect.php");
$comm_id = $_GET['comm_id'];
if (isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
    $sql = "DELETE FROM comment WHERE comm_id='$comm_id'";
    mysqli_query($conn, $sql);

    header("location:index.php?page_layout=comment");
}else{
    include_once("index.php");
}

?>