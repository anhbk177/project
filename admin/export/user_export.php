
<?php
//export.php  
$connect = mysqli_connect("localhost", "root", "", "project1");
$output = '';
if (isset($_POST["export"])) {
    $query = "SELECT * FROM user";
    $result = mysqli_query($connect, $query);
  
    if (mysqli_num_rows($result) > 0) {
        $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>ID</th> 
                         <th>Họ và tên</th>  
                         <th>Email</th>  
                         <th>Quyền</th> 
                    </tr>
  ';
        while ($row = mysqli_fetch_array($result)) {
            if ($row["user_level"] == 1) {
                $quyen = 'Admin';
            } else {
                $quyen = 'Member';
            }
            $output .= '
    <tr>  
                         <td>' . $row["user_id"] . '</td>  
                         <td>' . $row["user_full"] . '</td>  
                         <td>' . $row["user_mail"] . '</td>  
                        <td>' . $quyen . '</td>  
                    </tr>
   ';
        }
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=user.xls');
        echo $output;
    }
}
?>
