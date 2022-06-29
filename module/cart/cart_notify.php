<div id="cart" class="col-lg-3 col-md-3 col-sm-12">
    <a class="mt-4 mr-2" href="index.php?page_layout=cart&&total">giỏ hàng</a>
    <span class="mt-3">
    <?php
    if (isset($_SESSION['cart'])) {
        if (isset($_POST['quantity'])) {
            $cart = $_POST['quantity'];
        }else {
            $cart = $_SESSION['cart'];
        }
        $totals = 0;
        foreach($cart as $prd_id => $qtt){
            $totals += $qtt;
        }
        echo $totals;
    }else {
        echo 0;
    }
    ?>
    </span>
</div>