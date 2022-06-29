<?php
//export.php  
$connect = mysqli_connect("localhost", "root", "", "project1");
$output = '';
if (isset($_POST["export"])) {
    $query = "SELECT*FROM comment INNER JOIN product ON comment.prd_id = product.prd_id ORDER BY comm_id DESC";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>ID</th> 
                         <th>ID sản phẩm</th> 
                         <th>Tên</th> 
                         <th>Email</th> 
                         <th>Ngày</th> 
                         <th>Nội dung</th> 
                    </tr>
  ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
    <tr>  
                         <td>' . $row["comm_id"] . '</td>  
                         <td>' . $row["prd_id"] . '</td> 
                         <td>' . $row["comm_name"] . '</td> 
                         <td>' . $row["comm_mail"] . '</td> 
                         <td>' . $row["comm_date"] . '</td> 
                         <td>' . $row["comm_details"] . '</td>  
                    </tr>
   ';
        }
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=comment.xls');
        echo $output;
    }
}
?>
