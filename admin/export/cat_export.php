
<?php
//export.php  
$connect = mysqli_connect("localhost", "root", "", "project1");
$output = '';
if (isset($_POST["export"])) {
    $query = "SELECT * FROM category";
    $result = mysqli_query($connect, $query);
  
    if (mysqli_num_rows($result) > 0) {
        $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>ID</th> 
                         <th>Category</th>  
                    </tr>
  ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
    <tr>  
                         <td>' . $row["cat_id"] . '</td>  
                         <td>' . $row["cat_name"] . '</td>  
                    </tr>
   ';
        }
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=category.xls');
        echo $output;
    }
}
?>
