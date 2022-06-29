
<?php 
//export 
$connect = mysqli_connect("localhost", "root", "", "project1");
$output = '';
$id = $_GET['id'];
 //lay Tong tien
 $sql1 = "SELECT*FROM bill WHERE id=$id";
 $query1 = mysqli_query($connect, $sql1);
 $row1 = mysqli_fetch_array($query1);
if (isset($_POST["export"])) {
    $query = "SELECT*FROM details INNER JOIN product ON details.prd_id = product.prd_id WHERE id=$id";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $output .= '
   <table class="table" bordered="1" charset=utf-8 style="width: 100%; border-style:double; margin-top:20px; border-collapse:collapse;">  
                    <tr style="background-color:skyblue; ">  
                    <th style="border-style:double; border-collapse:collapse; padding-left:10px; width: 120px;">ID order</th> 
                    <th style="border-style:double; border-collapse:collapse; padding-left:170px; ">Product</th> 
                    <th style="border-style:double; border-collapse:collapse; padding-left:30px;  width: 180px;">Count</th> 
                    <th style="border-style:double; border-collapse:collapse; padding-left:60px; width: 180px;">Price</th> 
                    <th style="border-style:double; border-collapse:collapse; padding-left:20px; width: 180px;">Quantity price</th> 
                    </tr>
  ';
        while ($row = mysqli_fetch_array($result)) {            
            $output .= '
    <tr>  
    <td style="border-style:double; border-collapse:collapse; padding-left:5px;">' . $row["id"] . '</td>  
    <td style="border-style:double; border-collapse:collapse; padding-left:5px;">' . $row["prd_name"] . '</td> 
    <td style="border-style:double; border-collapse:collapse; padding-left:5px;">' . $row["prd_count"] . '</td> 
    <td style="border-style:double; border-collapse:collapse; padding-left:5px;">' . $row["prd_price"] . '</td> 
    <td style="border-style:double; border-collapse:collapse; padding-left:5px;">' . $row["prd_count"]*$row["prd_price"] . '</td>   
                    </tr>
   ';
        }
       
        $output .= '
    <tr>  
    <td></td>  
    <td></td> 
    <td></td> 
    <td>Total</td> 
    <td>' . $row1['totals_price'] . '</td>   
                    </tr>
   ';

        $output .= '</table>';
        header('Content-Type: application/xls , charset=utf-8');
        header('Content-Disposition: attachment; filename=bill_details.xls');
        echo $output;
    }
}
?>
