
<?php
//export.php  
$connect = mysqli_connect("localhost", "root", "", "project1");
$output = '';
$prd_id = $_GET['prd_id'];
if (isset($_POST["export"])) {
    $query = "SELECT*FROM product INNER JOIN category ON product.cat_id = category.cat_id WHERE prd_id=$prd_id";
    $result = mysqli_query($connect, $query);
  
    if (mysqli_num_rows($result) > 0) {
        $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Mã sản phẩm</th> 
                         <th>Tên sản phẩm</th>
                         <th>Danh mục</th> 
                         <th>Giá bán</th> 
                         <th>Bảo hành</th>
                         <th>Phụ kiện</th> 
                         <th>Khuyến mãi</th>
                         <th>Tình trạng</th>  
                         <th>Trạng thái</th>  
                         <th>Mô tả</th>  
                    </tr>
  ';
        while ($row = mysqli_fetch_array($result)) {
            if ($row["prd_status"]=1) {
                $tinhtrang = 'Còn hàng';
            }else{
                $tinhtrang = 'Hết hàng';
            }
            $output .= '
    <tr>  
                         <td>' . $row["prd_id"] . '</td>  
                         <td>' . $row["prd_name"] . '</td> 
                         <td>' . $row["cat_name"] . '</td>   
                         <td>' . $row["prd_price"] . '</td>  
                         <td>' . $row["prd_warranty"] . '</td>  
                         <td>' . $row["prd_accessories"] . '</td>  
                         <td>' . $row["prd_promotion"] . '</td>  
                         <td>' . $row["prd_new"] . '</td>  
                         <td>' . $tinhtrang . '</td>  
                         <td>' . $row["prd_details"] . '</td>  
                    </tr>
   ';
        }
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=product_details.xls');
        echo $output;
    }
}
?>
