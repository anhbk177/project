<?php
if(isset($_GET['status'])&&isset($_GET['id'])){
    $status = $_GET['status'];
    $id = $_GET['id'];
    $sql = "UPDATE bill SET status=('$status') WHERE id=$id ";
    $query = mysqli_query($conn, $sql);
    header("location: index.php?page_layout=order");
}


?>