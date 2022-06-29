<?php
if (isset($_SESSION['cart'])) {
    if (isset($_POST['sbm'])) {
        foreach ($_POST['quantity'] as $prd_id => $val) {
            $_SESSION['cart'][$prd_id] = $val;
        }
    }
    $arr = array();
    foreach ($_SESSION['cart'] as $prd_id => $qtt) {
        $arr[] = $prd_id;
    }
    $str_id = implode(", ", $arr);
    $sql = "SELECT * FROM product WHERE prd_id IN ($str_id)";
    $query = mysqli_query($conn, $sql);
?>
    <div id="my-cart">
        <div class="row">
            <div class="cart-nav-item col-lg-7 col-md-7 col-sm-12">Thông tin sản phẩm</div>
            <div class="cart-nav-item col-lg-2 col-md-2 col-sm-12">Tùy chọn</div>
            <div class="cart-nav-item col-lg-3 col-md-3 col-sm-12">Giá</div>
        </div>
        <form method="POST">
            <?php
            $totals = 0;
            $i=1;
            $link = "";
            while ($row = mysqli_fetch_array($query)) {
                $totals_price = $_SESSION['cart'][$row['prd_id']] * $row['prd_price'];
                $totals += $totals_price;
                $link .= '&&id'.$i.'=';
                $link .= $row['prd_id'] ;
                $link .= '&&count'.$i.'=';
               $link .= $_SESSION['cart'][$row['prd_id']] ;
               $i++;
            ?>
                <div class="cart-item row">
                    <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                        <img class="img-fluid" src="admin/img/products/<?php echo $row['prd_image'] ?>">
                        <h4><?php echo $row['prd_name'] ?></h4>
                    </div>

                    <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                        <input type="number" name="quantity[<?php echo $row['prd_id'] ?>]" id="quantity" class="form-control form-blue quantity" value="<?php echo $_SESSION['cart'][$row['prd_id']] ?>" min="1">
                    </div>
                    <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo number_format($totals_price) ?></b><a href="module/cart/del_cart.php?prd_id=<?php echo $row['prd_id'] ?>">Xóa</a></div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                    <button id="update-cart" class="btn btn-success" type="submit" name="sbm">Cập nhật giỏ hàng</button>
                </div>
                <div class="cart-total col-lg-2 col-md-2 col-sm-12"><b>Tổng cộng:</b></div>
                <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo number_format($totals) ?></b></div>
            </div>
            
        </form>

    </div>
    <!--	End Cart	-->
    <div id="customer">
    <a href="index.php?page_layout=order<?php echo $link; ?>" id="by-now" class="sbm" class="btn btn-primary"><b>Đặt hàng</b><span>Giao hàng tận nơi siêu tốc</span></a>
    </div>
<?php
} else {
    echo '<div class="alert text-danger alert-danger mt-3">Giỏ hàng của bạn hiện tại không có sản phẩm nào!</div>';
}

?>
<!--	End Customer Info	-->