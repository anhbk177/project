<?php
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
$arr_prd = array();
$arr_count = array();
$sql = "SELECT * FROM product ";
if (isset($_GET['id1'])) {
    $id1 = $_GET['id1'];
    $arr_prd[] = $id1;
}
if (isset($_GET['id2'])) {
    $id2 = $_GET['id2'];
    $arr_prd[] = $id2;
}
if (isset($_GET['id3'])) {
    $id3 = $_GET['id3'];
    $arr_prd[] = $id3;
}
if (isset($_GET['id4'])) {
    $id4 = $_GET['id4'];
    $arr_prd[] = $id4;
}
if (isset($_GET['id5'])) {
    $id5 = $_GET['id5'];
    $arr_prd[] = $id5;
}
if (isset($_GET['id6'])) {
    $id6 = $_GET['id6'];
    $arr_prd[] = $id6;
}
if (isset($_GET['id7'])) {
    $id7 = $_GET['id7'];
    $arr_prd[] = $id7;
}
if (isset($_GET['id8'])) {
    $id8 = $_GET['id8'];
    $arr_prd[] = $id8;
}
if (isset($_GET['id9'])) {
    $id9 = $_GET['id9'];
    $arr_prd[] = $id9;
}
if (isset($_GET['id10'])) {
    $id10 = $_GET['id10'];
    $arr_prd[] = $id10;
}
if (isset($_GET['count1'])) {
    $count1 = $_GET['count1'];
    $arr_count[] = $count1;
}
if (isset($_GET['count2'])) {
    $count2 = $_GET['count2'];
    $arr_count[] = $count2;
}
if (isset($_GET['count3'])) {
    $count3 = $_GET['count3'];
    $arr_count[] = $count3;
}
if (isset($_GET['count4'])) {
    $count4 = $_GET['count4'];
    $arr_count[] = $count4;
}
if (isset($_GET['count5'])) {
    $count5 = $_GET['count5'];
    $arr_count[] = $count5;
}
if (isset($_GET['count6'])) {
    $count6 = $_GET['count6'];
    $arr_count[] = $count6;
}
if (isset($_GET['count7'])) {
    $count7 = $_GET['count7'];
    $arr_count[] = $count7;
}
if (isset($_GET['count8'])) {
    $count8 = $_GET['count8'];
    $arr_count[] = $count8;
}
if (isset($_GET['count9'])) {
    $count9 = $_GET['count9'];
    $arr_count[] = $count9;
}
if (isset($_GET['count10'])) {
    $count10 = $_GET['count10'];
    $arr_count[] = $count10;
}

$str_id = implode(", ", $arr_prd);
$sql = "SELECT * FROM product WHERE prd_id IN ($str_id)";
$query = mysqli_query($conn, $sql);
?>
<br>
<div class="row">
    <div class="col-lg-12"><br>
        <h1 class="page-header">Thông tin đơn hàng</h1><br>
    </div>
</div>

<table border="1" cellspacing="0" cellpadding="10" bordercolor="#305eb3" width="100%" style="background: #ffff;">
    <tr style="color: #305eb3">
        <td width="50%"><b>
                <font color="#FFFFFF" style="padding-left: 20px;">Sản phẩm</font>
            </b></td>
        <td width="10%"><b>
                <font color="#FFFFFF" style="padding-left: 20px;">Số lượng</font>
            </b></td>
        <td width="20%"><b>
                <font color="#FFFFFF" style="padding-left: 50px;">Đơn giá</font>
            </b></td>
        <td width="20%"><b>
                <font color="#FFFFFF" style="padding-left: 50px;">Thành tiền</font>
            </b></td>
    </tr>
    <?php
    $i = 0;
    $total = 0;
    while ($row = mysqli_fetch_array($query)) {
        $totals_price = $row['prd_price'] * $arr_count[$i];
        $total += $totals_price;
    ?>

        <tr>
            <td width="50%" style="padding-left: 5px;"><?php echo $row['prd_name']; ?></td>
            <td width="10%" style="padding-left: 5px;"><?php echo $arr_count[$i]; ?></td>
            <td width="20%" style="padding-left: 5px;"><?php echo number_format($row['prd_price']); ?> đ</td>
            <td width="20%" style="padding-left: 5px;"><?php echo number_format($totals_price); ?> đ</td>
        </tr>
    <?php
        $i++;
    }
    ?>
    <tr>
        <td></td>

        <td colspan="2" style="padding-left: 150px; margin-left: 100px;">
            <font style="font-weight: bold; ">Tổng tiền</font>
        </td>
        <td width="20%" style="padding-left: 5px;"><b>
                <font color="#FF0000"><?php echo number_format($total); ?> đ</font>
            </b></td>
    </tr>

</table>

<div id="customer">
    <form method="POST">
        <div class="row">
            <div id="customer-name" class="col-lg-4 col-md-4 col-sm-12">
                <input placeholder="Họ và tên (bắt buộc)" type="text" name="name1" class="form-control" required>
            </div>
            <div id="customer-phone" class="col-lg-4 col-md-4 col-sm-12">
                <input placeholder="Số điện thoại (bắt buộc)" type="text" name="phone" class="form-control" required>
            </div>
            <div id="customer-mail" class="col-lg-4 col-md-4 col-sm-12">
                <input placeholder="Email (bắt buộc)" type="text" name="mail" class="form-control" required>
            </div>
            <div id="customer-add" class="col-lg-12 col-md-12 col-sm-12">
                <input placeholder="Địa chỉ nhà riêng hoặc cơ quan (bắt buộc)" type="text" name="address1" class="form-control" required>
            </div>
            <button id="by-now" class="sbm" type="submit" name="sbm1" class="btn btn-primary"><b>Đặt hàng</b>
            </button>
        </div>
    </form>
</div>
<?php
if (isset($_POST['sbm1'])) {
    $name = $_POST['name1'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $address = $_POST['address1'];
    date_default_timezone_set("Asia/Bangkok");
    $date = date("Y-n-d H:i:s");
    // $date = '2021-12-27 00:11:53';
    $stamp = strtotime($date);
    $sql_ord = "INSERT INTO bill(name1,phone,mail,address1,date1,timestamp,totals_price,status)
                VALUES ('$name','$phone','$mail','$address','$date',$stamp,'$total', 2)";
    $query_ord = mysqli_query($conn, $sql_ord);

    $i = 0;
    $sql = "SELECT * FROM product WHERE prd_id IN ($str_id)";
    $query = mysqli_query($conn, $sql);
    //lay ra id cua bill
    $sql0 = "SELECT `AUTO_INCREMENT`
        FROM  INFORMATION_SCHEMA.TABLES
        WHERE TABLE_SCHEMA = 'project1'
        AND   TABLE_NAME   = 'bill';";
    $query_id = mysqli_query($conn, $sql0);
    $row_id = mysqli_fetch_array($query_id);
    //chuyen doi string thanh kieu int
    $id = (int)$row_id['AUTO_INCREMENT'] - 1;
    while ($row1 = mysqli_fetch_array($query)) {
        $prd_id = $row1['prd_id'];
        $prd_count = $arr_count[$i];
        $prd_price = $row1['prd_price'];
        //them vao chi tiet don hang
        if (isset($_POST['name1']) && isset($_POST['phone']) && isset($_POST['mail']) && isset($_POST['address1'])) {
            $query_detail = mysqli_query($conn, "INSERT INTO details(id,prd_id,prd_count,prd_price) VALUES ('$id','$prd_id','$prd_count','$prd_price')");
        }
        
        $i++;
        
    }
    $str_body = "";
    $str_body .= '
        <p>
            <b>Khách hàng:</b> ' . $name . '<br>
            <b>Điện thoại:</b> ' . $phone . '<br>
            <b>Địa chỉ:</b> ' . $address . '<br>
        </p>
   ';
    $str_body .= '
        <table border="1" cellspacing="0" cellpadding="10" bordercolor="#305eb3" width="100%">
	        <tr bgcolor="#305eb3">
    	        <td width="50%"><b><font color="#FFFFFF">Sản phẩm</font></b></td>
                <td width="10%"><b><font color="#FFFFFF">Số lượng</font></b></td>
                <td width="20%"><b><font color="#FFFFFF">Đơn giá</font></b></td>
                <td width="20%"><b><font color="#FFFFFF">Thành tiền</font></b></td>
            </tr>
    ';
    $sql = "SELECT * FROM product WHERE prd_id IN ($str_id)";
    $query = mysqli_query($conn, $sql);
    $totals = 0;
    while ($row = mysqli_fetch_array($query)) {
        $totals_price = $_SESSION['cart'][$row['prd_id']] * $row['prd_price'];
        $totals += $totals_price;
        $str_body .= '
            <tr>
    	        <td width="50%">' . $row['prd_name'] . '</td>
                <td width="10%">' . $_SESSION['cart'][$row['prd_id']] . '</td>
                <td width="20%">' . number_format($row['prd_price']) . ' đ</td>
                <td width="20%">' . number_format($totals_price) . ' đ</td>
            </tr>
        ';
    }
    $str_body .= '
            <tr>
            <td></td>
                <td colspan="2" width="70%" style="padding-left: 115px;font-weight: bold;">Tổng tiền</td>
                <td width="20%"><b><font color="#FF0000">' . number_format($totals) . ' đ</font></b></td>
            </tr>
        </table>
    ';
    $str_body .= '
        <p>
	        Cám ơn quý khách đã mua hàng tại Shop của chúng tôi, bộ phận giao hàng sẽ liên hệ với quý khách để xác nhận sau 5 phút kể từ khi đặt hàng thành công và chuyển hàng đến quý khách chậm nhất sau 24 tiếng.
        </p>
    ';

    //Create instance of PHPMailer
	$email = new PHPMailer();
    //Set mailer to use smtp
        $email->isSMTP();
    //Define smtp host
        $email->Host = "smtp.gmail.com";
    //Enable smtp authentication
        $email->SMTPAuth = true;
    //Set smtp encryption type (ssl/tls)
        $email->SMTPSecure = "tls";
    //Port to connect smtp
        $email->Port = "587";
        //Recipients
        $email->CharSet = 'UTF-8';
    //Set gmail username
        $email->Username = "tuanlinhbk002@gmail.com";
    //Set gmail password
        $email->Password = "linh.2000";
    //Email subject
        $email->Subject = "Xác nhận đơn hàng từ ZShop Store";
    //Set sender email
        $email->setFrom('tuanlinhbk002@gmail.com');
    //Enable HTML
        $email->isHTML(true);
    // Attachment
        $email->addAttachment('img/thankyou.jpg');
    //Email body
        $email->Body = $str_body;
        $email->AltBody = 'Mô tả đơn hàng';
    //Add recipient
        $email->addAddress($mail);
    //Finally send email
        $email->send();
    //Closing smtp connection
        $email->smtpClose();
       
        header('location:index.php?page_layout=success');
        unset($_SESSION['cart']);

}
?>